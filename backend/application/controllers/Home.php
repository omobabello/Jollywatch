<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct(){
		 parent :: __construct();
		 $this->load->library('session');
		 $this->load->model('dbcontrol');
	 }

// =============================================================================
	public function index(){
		$this->load->helper('cookie');
		$user = get_cookie('user');
		$user = NULL;

		if (! empty($user)){
			$time = strtotime('now');

			$this->session->set_userdata('login_time', $time);
			$this->session->set_userdata('loggedin', TRUE);
			$this->session->set_userdata('user', $user);

			$this->dbcontrol->enter_session($user, $time, TRUE);

			redirect(site_url("home/dashboard/{$user}"));
		}elseif($this->session->has_userdata('user')){
			redirect(site_url("home/dashboard/{$this->session->user}"));
		}else{
			$this->login('');
			return;
		}
	}

	public function dashboard($id = NULL){
		if ($this->_is_active()){
			$id = (! empty($id)) ? $id : $this->session->user;
			$user = $this->dbcontrol->get_user($id);

			if (! $user->is_activated){
				$this->load->view('not_activated');
			}elseif(! $user->has_paid){
				$this->load->view('not_paid');
			}else{
				$data = $this->_get_packages();
				$data['notifications'] = array();
				$data['crumbs']  = array('last' => 'Dashboard');
				$data['title'] = 'Dashboard';
				$data['limit'] = $this->_package_limit();
				$data['most_viewed'] = $this->dbcontrol->get_most('views');
				$data['most_liked'] = $this->dbcontrol->get_most('likes');
				$data['data_consumed'] = $this->dbcontrol->get_sum_uploaded();
				$case = $this->_get_packages();
				if ($case['has_movies']){
					$data['movies'] = $this->dbcontrol->get_total_uploaded('movies');
					$data['movie_size'] = $this->dbcontrol->get_total_uploaded('movies', TRUE);
				}
				if ($case['has_series']){
					$data['episodes'] = $this->dbcontrol->get_total_uploaded('episodes');
					$data['epi_size'] = $this->dbcontrol->get_total_uploaded('episodes', TRUE);
				}
				if ($case['has_skits']){
					$data['skits'] = $this->dbcontrol->get_total_uploaded('skits');
					$data['skits_size'] = $this->dbcontrol->get_total_uploaded('skits', TRUE);
				}
				load_view('head','dashboard','foot',$data);
			}
		}
	}

// ======================Registration and Sign up===============================
	public function sign_up(){
		$this->load->view('signup');
	}

	public function register(){
		//validates registration data and sends to database;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Business Name', "trim|required|regex_match[/^([a-zA-Z'-\.]+\s)*[\sa-zA-Z'-.]+$/]");
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_unique_email');
		$this->form_validation->set_rules('mobile','Mobile Number', 'trim|required|min_length[10]|regex_match[/[\+]?([\d{2,11}][\.\-\s]?)*/]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('repass', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_message('regex_match', 'Invalid %s provided');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('signup');
		}else{
			$hash = sha1("foo".microtime()."bar"); //generate unique hash for activating account
			$data['link'] = $link = site_url("home/activate/{$this->input->post('email')}/{$hash}"); //generating link for activation;
			$data['link_text'] = "Activate";
			$data['message'] = "Welcome to Jollywatch, <br/><br/> Please click the below to activate your account.
											if the button doesn't work, copy and paste this link {unwrap}{$link}{/unwrap}";
			$message = $this->load->view('message', $data, TRUE);
			$config = array(
									'charset' => 'utf-8',
									'wordwrap' => TRUE,
									'mailtype' => 'html'
								);
			$this->load->library('email', $config);
			$this->email->to($this->input->post('email'))
									->from('info@marah.com', 'Marah Admin')
									->subject('Activate Account via Email')
									->message($message);
			//$this->email->send();

			if($this->dbcontrol->register($hash)){
				redirect(site_url('home/login/'));
			}else{
				$data['message'] = "<p class='alert alert-warning'></p>";
				$this->load->view('signup', $data);
			}
		}
	}

	public function activate_account(){
		if ($this->_is_active()){
			$var = $this->dbcontrol->get_user($this->session->user);
			$data['link'] = site_url("home/activate/{$var->hash}/{$var->id}");
			$message = $this->load->view('message', $data, TRUE);
			$config = array(
									'charset' => 'utf-8',
									'wordwrap' => TRUE,
									'mailtype' => 'html'
								);
			$this->load->library('email', $config);
			$this->email->to($this->input->post('email'))
									->from('info@marah.com', 'Marah Admin')
									->subject('Activate Account via Email')
									->message($message);
			//$this->email->send();
			$data['message'] = "Activation code has been sent to your email <strong>{$var->email}</strong>,
													please check your inbox or spam to continue";
		//	$data['link'] = site_url('home/dashboard');
			$data['link_text'] = "Return Home";
			$this->load->view('message', $data);
		}
	}

	public function activate($hash, $id){
		if ($this->dbcontrol->activate($hash, $id)){
			$this->index();
		}else{
			$this->index();
		}
	}

	public function package($package){
		if ($this->dbcontrol->put_package($package)){
			$data['message'] = "You have succesfully subscribed for this package.";
			$data['link'] = site_url();
			$data['link_text'] = 'Go to Dashboard';
		}else{
			$data['message'] = "We could not complete payment procedure at the moment.";
			$data['link'] = site_url();
			$data['link_text'] = 'Go to Dashboard';
		}
		$this->load->view('message', $data);
	}

// =========================Login and logout ===================================
	public function login($message = "<p class='alert alert-danger'>Invalid Login Credentials</p>", $link = NULL){
		$data['link'] = $link;
		$data['message'] = ($message == '0') ? NULL : $message;
		$this->load->view('login', $data);
	}

	public function attempt_login(){
		$link = $this->input->post('link');
		if($this->dbcontrol->email_exists($this->input->post('email'), 'users')){
			$user = $this->dbcontrol->get_user($this->input->post('email'));
			if (password_verify($this->input->post('password'), $user->password)){
					$time = strtotime('now');
					$this->session->set_userdata('login_time', $time);
					$this->session->set_userdata('loggedin', TRUE);
					$this->session->set_userdata('user', $user->id);
					if ($this->input->post('checkbox') === 'TRUE'){
						$this->load->helper('cookie');
						set_cookie('loggedin', TRUE, 259200, site_url(), '/', '', FALSE, TRUE);
						set_cookie('user', $user->id, 259200, site_url(), '/', '', FALSE, TRUE);
					}
					$this->dbcontrol->enter_session($user->id, $time, FALSE);
					if ($this->input->post('link') != NULL){
						redirect($link);
					}else{
						redirect(site_url("home/dashboard/{$user->id}"));
					}
			}else{
				$this->login("<p class='col-md-12 alert alert-danger'>Invalid Password</p>", $link);
			}
		}else{
			$this->login("<p class='col-md-12 alert alert-danger'>Invalid Email</p>", $link);
		}
	}

	public function logout(){
		$this->load->helper('cookie');
		delete_cookie('loggedin');
		delete_cookie('user');
		$this->dbcontrol->logout($this->session->login_time);
		$this->session->unset_userdata(array('loggedin','login_time','user'));
		redirect(site_url('home/login/0'));
	}

	public function forgot_password(){
		$this->load->view('forgot_password');
	}

	public function request_reset(){
	 $this->load->library('form_validation');
	 $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

	 if ($this->form_validation->run() === FALSE){
		 $this->load->view('forgot_password');
	 }else{
		 $hash = sha1($this->input->post('email').microtime());
		 $user = $this->dbcontrol->get_user($this->input->post('email'))->id;
		 $data['link'] = $link = site_url("home/restore_password/{$hash}/{$user}");
		 $message = $this->load->view('email_confirm', $data, TRUE);
		 $config = array(
								 'charset' => 'utf-8',
								 'wordwrap' => TRUE,
								 'mailtype' => 'html'
							 );
		 $this->load->library('email', $config);
		 $this->email->to($this->input->post('email'))
		 						->from('info@marah.com', 'Marah Admin')
								->subject('Password Reset Request')
		 						->message($message);
		 //$this->email->send();
		 $this->dbcontrol->password_request($user, $hash);
		 echo "<a href='{$link}'>Reset Password</a>";
	 }
	}

	public function restore_password($hash, $user){
		$data['user'] = $user;
		$data['hash'] = $hash;

		if ($this->dbcontrol->reset_request_exists($hash, $user)){
			$this->load->view('restore', $data);
		}else{
			show_404(base_url('application/views/404.php'),FALSE);
		}
	}

	public function restore(){
		//this function is called when user enters new password, valides and changes the password
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

		if ($this->form_validation->run() === FALSE){
			$data['user'] = $this->input->post('user');
			$data['hash'] = $this->input->post('hash');
			$this->load->view('restore', $data);
		}else{
			if ($this->dbcontrol->restore_password()){
				$this->login("<p class='alert alert-info'>Password Restored, Login Now</p>");
			}else{
				show_error('Could not restore password, Try again later', 403);
			}
		}
	}

// ==========================Videos Functions===================================

	public function my_videos($type){
		if($this->_is_active()){
			$data = $this->_get_packages();
			$data['notifications'] = array();
			switch($type){
				case 1:
								$data['title'] = 'My Movies';
								$data['crumbs'] = array('last' => 'Movies');
								$data['type'] = $type;
								$data['text'] = "New Movie";
								$data['videos'] = $this->dbcontrol->get_user_movies();
								//print_r($this->dbcontrol->get_user_movies());
								load_view('head','videos','foot', $data);
								break;
				case 2:
								$data['title'] = 'My Series';
								$data['crumbs'] = array('last' => 'Series');
								$data['type'] = $type;
								$data['text'] = "New Series";
								$data['videos'] = $this->dbcontrol->get_user_series();
								load_view('head','series','foot', $data);
								break;
				case 3:
								$data['title'] = 'My Movies';
								$data['crumbs'] = array('last' => 'Skits');
								$data['type'] = $type;
								$data['text'] = "New skits";
								$data['videos'] = $this->dbcontrol->get_user_skits();
								load_view('head','videos','foot', $data);
								break;
			}
		}
	}

	public function add_video($type, $series = NULL){
		//depending on the type passed, this function load the right view to uplad what needs to be
		//uploaded;
		if($this->_is_active()){
			$data = $this->_get_packages();
			$data['notifications'] = array();
			$data['type'] = $type;
			switch($type) {
				case 1:
							if($data['has_movies']){
								$data['title'] = 'New Movie';
								$data['crumbs'] = array('Movies' => site_url('home/my-videos/1'),'last'=>'New movie');
								$data['genres'] = $this->dbcontrol->get_genres();
								$data['notifications'] = array();
								load_view('head','add_movie','foot',$data);
								break;
							}else{
								redirect('home/dashboard');
							}
				case 2:
						if($data['has_series']){
							$data['title'] = 'New Series';
							$data['crumbs'] = array('Series' => site_url('home/my-videos/2'),'last'=>'New Series');
							$data['genres'] = $this->dbcontrol->get_genres();
							$data['notifications'] = array();
							load_view('head','add_series','foot',$data);
						}else{
							redirect('home/dashboard');
						}
						break;
				case 3:
					if($data['has_skits']){
							$data['title'] = 'New Skit';
							$data['crumbs'] = array('Skits' => site_url('home/my-videos/3'),
																			'last'  => 'New Skit'
																		);
							$data['notifications'] = array();
							load_view('head','add_skit','foot',$data);
						}else{
							redirect('home/dashboard');
						}
						break;
				case 4:
					if($data['has_series']){
						$data['title'] = 'New Episode';
						$data['last_season'] = $season = $this->dbcontrol->get_last_season($series);
						$data['last_episode'] = $this->dbcontrol->get_last_episode($series, $season);
						$data['series'] = $series;
						$data['crumbs'] = array('Series' => site_url('home/my-videos/2'),'last'=>'New episode');
						$data['notifications'] = array();
						load_view('head','add_episode','foot',$data);
					}else{
						redirect('home/dashboard');
					}
					break;
				default:
							show_404();
			}
		}
	}
	public function test(){
	/*	$videos = array('10806886','11881012','11881012','17772841','18149751','18457796','18909430','19349670','19349670','19349670','19550570','20675413','20902673','28560662','31741777','32128592','32636180','49954193','77973288','77973288','79135829','86178866','93357102','96944517');
		$subs  = array('16563959', '36537559', '63212759', '82542159','82265359', '34581459','75412159');
		$this->load->database();
		$this->load->helper('array');
		$guys = $this->db->where('date_stamp <', 1400000)->get('views')->result();


		foreach($guys as $guy){
			if($this->db->set('date_stamp', mt_rand(1498910630,1502104195))->where('serial', $guy->serial)->update('views'));
					echo "{$guy->serial} ==> <br/>";
					//$i++; */
					//echo "'".$guy->video."',";

		//}
		echo "Between : ".strtotime('August 1st 2016 00:00:00')." And ".strtotime('August 1st 2016 11:59:59')."<br/> ";
		echo (-strtotime('August 1st 2016 00:00:00') + strtotime('August 1st 2016 23:59:59'))." seconds <br/>";
		echo date('F jS, Y', 1500137698);
		//$this->load->view('test');
	}

	public function do_test(){
		$way = $_SERVER['DOCUMENT_ROOT'].'/maradmin/assets/getid3/getid3.php';
		require_once($way);
		$config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'mp4|mkv';
    $config['max_size']             = 80000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

		$this->load->library('upload', $config);
		echo 'File link  :' . $_FILES['userfile']['size'];
							if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
												print_r($error);
                        $this->load->view('test', $error);
                }
                else
                {
												$getID3 = new getID3;
												$file = $this->upload->data();
												echo "<pre>";
												print_r($file);
												echo "</pre>";
												$filename = $file['full_path'];
												$files = $getID3->analyze($filename);
												echo "<pre>";
												print_r($files);
												echo "</pre><br/>";
                        $data = array('upload_data' => $this->upload->data());
												print_r($data);
                        $this->load->view('test', $data);
                }

	}

	public function add_skit(){
			$this->load->library('file_analysis');
			$total_size = NULL;
				if($this->_is_active()){
					$filename = assign_id();

					$config = array(
										'upload_path' => './thumbnails/',
										'allowed_types' => 'gif|jpg|png',
										'file_name' => 'thumb_'.$filename,
										'max_size' => 100,
					);

					$this->load->library('upload', $config);

					if (! $this->upload->do_upload('thumbnail')){
						$data['message'] = 'For thumbnail file: '.$this->upload->display_errors('','');
						$data['success'] = false;
					}else{
							$thumbnail = $this->upload->data('file_name');
							$total_size += $this->upload->data('file_size');
							$config = array(
												'upload_path' => './skits/',
												'allowed_types' => 'mp4|avi|mkv|mov',
												'file_name' => $filename,
												'max_size' => 500,
							);

							$this->upload->initialize($config);
							$size = $this->_convert_memory('byte', 'megabyte', $_FILES['skit']['size']);
							if ($this->_can_upload($size)){
								if(! $this->upload->do_upload('skit') ){
									$data['message'] = 'For Movie file: '.$this->upload->display_errors('','');
									$data['success'] = false;
								}else{
										$total_size += $this->upload->data('file_size');
										$duration =	$this->file_analysis->get_duration($this->upload->data('full_path'));
										$video = $this->upload->data('file_name');
									if ( ! $this->dbcontrol->add_skit($filename, $thumbnail, $video, $total_size, $duration)){
										$data['message'] = 'Upload Failed';
										$data['success'] = false;
									}else{
											$data['message'] = 'Upload SuccessFul';
											$data['success'] = true;
									}
								}
							}else{
								$data['message'] = 'Uploading this file exists the limit of your package';
								$data['sucess'] = false;
							}

					}
					echo json_encode($data);
				}
	}

	public function add_movie(){
		if($this->_is_active()){
			$this->load->library('upload');
			$total_size = NULL;
			$filename = assign_id();
			$config = array(
									'file_name' => 'cover_'.$filename,
									'allowed_types' => 'jpg|png|gif',
									'upload_path' => './covers',
									'max_size' => 100,
			);
			$this->upload->initialize($config);

			if( ! $this->upload->do_upload('cover')){
				$data['message'] = 'For Cover file : '.$this->upload->display_errors('','');
				$data['success'] = false;
			}else{
				$cover = $this->upload->data('file_name');
				$total_size += $this->upload->data('file_size');
				$config = array(
										'file_name' => 'thumb_'.$filename,
										'allowed_types' => 'jpg|png|gif',
										'upload_path' => './thumbnails',
										'max_size' => 2048,
				);
				$this->upload->initialize($config);
				if( ! $this->upload->do_upload('thumb')){
						$data['message'] = 'For Thumbnail file : '.$this->upload->display_errors('','');
						$data['success'] = false;
				}else{
						$thumbnail = $this->upload->data('file_name');
						$total_size += $this->upload->data('file_size');
						$config = array(
												'file_name' => $filename,
												'allowed_types' => 'mov|avi|mp4|mkv',
												'upload_path' => './movies',
												'max_size' => 5120,
						);
						$this->upload->initialize($config);
						$size = $this->_convert_memory('byte', 'megabyte', $_FILES['movie']['size']);
						if ($this->_can_upload($size)){
							if( ! $this->upload->do_upload('movie')){
								$data['message'] = 'For Movie file : '.$this->upload->display_errors('','');
								$data['success'] = false;
							}else{
								$this->load->library('file_analysis');
								$video = $this->upload->data('file_name');
								$total_size += $this->upload->data('file_size');
								$duration = $this->file_analysis->get_duration($this->upload->data('full_path'));
									if( ! $this->dbcontrol->add_movie($filename,$cover, $thumbnail , $video, $total_size, $duration)){
										$data['message'] = 'Error connecting to server';
										$data['success'] = false;
									}else{
										$data['message'] = 'Upload complete';
										$data['success'] = true;
									}
							}
						}else{
							$data['message'] = 'Uploading this file exists the limit of your package';
							$data['sucess'] = false;
						}
					}
			}
			echo json_encode($data);
		}
	}

	public function add_series(){
		$this->load->library('upload');
		$filename = assign_id();
		$config = array(
				'upload_path' => './covers/',
				'allowed_types'  => 'png|jpg|gif',
				'file_name' => 'cover_'.$filename,
				'max_size' => 120
		);
		$this->upload->initialize($config);

		if (! $this->upload->do_upload('cover')){
			$data['message'] = $this->upload->display_errors('','');
			$data['success'] = false;
		}else{
			$cover = $this->upload->data('file_name');
			if ($this->dbcontrol->add_series($filename, $cover)){
				$data['message'] = 'Upload complete';
				$data['success'] = true;
			}else{
				$data['message'] = 'Error connecting to server, Try again';
				$data['success'] = false;
			}
		}
		echo json_encode($data);
	}

	public function add_episode(){
		if ($this->_is_active()){
				$filename = assign_id();
				$total_size = NULL;
				$config = array(
									'upload_path' => './thumbnails/',
									'allowed_types' => 'gif|jpg|png',
									'file_name' => 'thumb_'.$filename,
									'max_size' => 120,
				);

				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('thumbnail')){
					$data['message'] = 'For thumbnail file: '.$this->upload->display_errors('','');
					$data['success'] = false;
				}else{
					$thumbnail = $this->upload->data('file_name');
					$total_size += $this->upload->data('file_size');
					$config = array(
										'upload_path' => './episodes/',
										'allowed_types' => 'mp4|avi|mkv|mov',
										'file_name' => $filename,
										'max_size' => 2048,
					);

					$this->upload->initialize($config);
					$size = $this->_convert_memory('byte', 'megabyte', $_FILES['video']['size']);
					if ($this->_can_upload($size)){
						if(! $this->upload->do_upload('video') ){
							$data['message'] = 'For Episode file: '.$this->upload->display_errors('','');
							$data['success'] = false;
						}else{
									$video = $this->upload->data('file_name');
									$total_size += $this->upload->data('file_size');
									$this->load->library('file_analysis');
									$duration =	$this->file_analysis->get_duration($this->upload->data('full_path'));
								if ( ! $this->dbcontrol->add_episode($filename, $thumbnail, $video, $total_size, $duration)){
									$data['message'] = 'Upload Failed';
									$data['success'] = false;
								}else{
										$data['message'] = 'Upload SuccessFul';
										$data['success'] = true;
								}
						}
					}else{
						$data['message'] = 'Uploading this file exists the limit of your package';
						$data['sucess'] = false;
					}
				}
				echo json_encode($data);
		}
	}

	public function video($table, $video){
		$det = $this->dbcontrol->get_video($table, $video);
		$data = $this->_get_packages();
		$data['notifications'] = array();
		if ($table == 'series'){
			$data['title'] = 'Episodes';
			$data['crumbs'] = array('My Series' => site_url('home/my_videos/2'), $det->title => current_url(), 'last' => 'episodes');
			$data['type'] = NULL;
			$data['text'] = "New Episodes";
			$data['videos'] = $this->dbcontrol->get_series_episodes($video);
			load_view('head', 'videos', 'foot', $data);
		}
		else{
			$data['title'] = "Episodes";
			$data['crumbs'] = array("My {$table}" =>  site_url('home/'), 'last' => $det->title);
			$data['chart'] = $this->dbcontrol->get_views_chart($video);
			$data['video'] = $this->dbcontrol->get_video($table, $video);
			load_view('head', 'video', 'foot', $data);
		}
	}

// ===========================Accounts =========================================

	public function per_video(){
		$data = $this->_get_packages();
		$data['title'] = 'Video Breakdown';
		$data['notifications'] = array();
		$data['text'] = "Videos";
		$data['crumbs'] = array('last' => 'Video Accounts');
		$data['videos'] = $this->dbcontrol->get_videos_analysis();
		$config['base_url'] = site_url('home/per_video');
		$config['total_rows'] = $this->dbcontrol->get_videos_analysis(TRUE);
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		load_view('head', 'vid_account', 'foot', $data);
	}

// ==========================Random Functions===================================
	function unique_email(){
		//checks if the email is unique
		return ( ! $this->dbcontrol->email_exists($this->input->post('email'), 'users'));
	}

	private function _is_active(){
		//checks if user session is still active;
		if($this->session->loggedin){
			return TRUE;
		}else{
			$this->login("<p class='col-md-12 alert alert-danger'>Login Again</p>", current_url());
		}
	}

	private function _package_limit(){
		switch($this->dbcontrol->get_user()->package){
			case 1: return 20000000000; break;
			case 2: return 3000000000; break;
			case 3: return 500000000; break;
			case 4: return 25000000000; break;
			case 5: return 21000000000; break;
			case 6: return 4000000000; break;
			case 7: return 30000000000; break;
		}
	}

	private function _get_packages(){
		$pkge = $this->dbcontrol->get_user()->package;
		switch ($pkge) {
			case 1: return array('has_movies' => TRUE, 'has_series' => FALSE, 'has_skits' => FALSE);
			case 2: return array('has_movies' => FALSE, 'has_series' => TRUE, 'has_skits' => FALSE);
			case 3: return array('has_movies' => FALSE, 'has_series' => FALSE, 'has_skits' => TRUE);
			case 4: return array('has_movies' => TRUE, 'has_series' => TRUE, 'has_skits' => FALSE);
			case 5: return array('has_movies' => TRUE, 'has_series' => FALSE, 'has_skits' => TRUE);
			case 6: return array('has_movies' => FALSE, 'has_series' => TRUE, 'has_skits' => TRUE);
			case 7: return array('has_movies' => TRUE, 'has_series' => TRUE, 'has_skits' => TRUE);
		}
	}


	private function _can_upload($to_upload){
		$limit = $this->_package_limit();
		$uploaded = $this->dbcontrol->get_sum_uploaded();
		return $to_upload < ($limit - $uploaded);
	}

	private function _convert_memory($from, $to, $data){
		$from = strtolower($from);
		$to = strtolower($to);
		$result = NULL;
		switch($from){
			case 'byte' :
									switch($to){
										case 'kilobyte' : $result = round($data/1024, 2); break;
										case 'megabyte': $result = round($data/1048576, 2); break;
										case 'gigabyte': $result = round($data/1073741824, 2); break;
									}
			break;

			case 'kilobyte' :
									switch($to){
										case 'byte' : $result = $data * 1024; break;
										case 'megabyte': $result = round($data/1024, 2); break;
										case 'gigabyte': $result = round($data/1048576, 2); break;
									}
			break;

			case 'megabyte':
									switch($to){
										case 'byte' : $result = $data * 1048576; break;
										case 'kilobyte' : $result = round($data * 1024, 2); break;
										case 'gigabyte' : $result = round($data/1024, 2); break;
									}
			break;

			case 'gigabyte':
								switch($to){
									case 'byte' : $result = $data * 1073741824; break;
									case 'kilobyte' : $result = $data * 1048576; break;
									case 'megabyte' : $result = $data * 1024; break;
								}
			break;
		}
		return $result;
	}
}
