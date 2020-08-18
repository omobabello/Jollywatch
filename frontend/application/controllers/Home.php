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
		$this->load->model('dbcontrol');
	}
	public function index()
	{
		$data = ($this->dbcontrol->user_logged()) ? $this->_get_packages() : array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => TRUE);
		$data['title'] = 'Jollywatch';
		$data['videos'] = $this->dbcontrol->load_recent_videos();
		load_view('head','main','foot',$data);
	//	$this->load->view('welcome_message');
	}

// ==================Sign Up and Registration==================================
	public function sign_up(){
		$data['title'] = 'Sign Up';
		$this->load->view('signup', $data);
	}

	public function signup(){
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('phone','Mobile Number',"trim|regex_match[/d{9,11}/]");
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_unique_email');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]');
		$this->form_validation->set_rules('passconf','Confirmation','trim|required|matches[password]');
		$this->form_validation->set_rules('package','Subscribtion','callback_package_selected');
		$this->form_validation->set_message('package_selected', 'Please select a package');
		$this->form_validation->set_message('unique_email', 'Provided email has already been used');

		if ($this->form_validation->run() === FALSE){
			$data['title'] = 'Sign Up';
			$this->load->view('signup', $data);
		}else{
			$user = assign_id();
			$hash = sha1("fran".microtime().'gore');
			$link = site_url("home/activate_account/{$user}/{$hash}");
			$data = array('heading' => 'Activate Account',
										'message' => "Thank you for creating an account with us, click the button below to
																	activate your account or copy and paste this link {unwrap}{$link}{unwrap}",
										'link' => $link,
										'link_text' => 'Activate'
							);
			$message = $this->load->view('message', $data, TRUE);
			$this->load->library('email');
			$this->email->from('registration@marah.com', "Registration Admin")
									->to($this->input->post('email'))
									->subject('Activate Account')
									->message($message);
									//->send()
			if ($this->dbcontrol->subscribe($user, $hash)){
				$data  = array(
						'heading' => 'Subscribtion complete',
						'message' => "Thank you for subscribing, Activation code has been sent to your email, <strong>{$this->input->post('email')}</strong>
													check your email and activate your account",
						'link' => site_url('home/sign-in'),
						'link_text' => 'Login',
				);
				$this->load->view('message', $data);
			}else{
				$data['message'] = "<p class='error'>Problem connecting to server, Try again later</p>";
				$this->load->view('signup', $data);
			}
		}
	}



// ======================Login and logout===============================================

	public function sign_in(){
		$data['title'] = 'Sign In';
		$this->load->view('signin', $data);
	}

	public function signin(){
		if ($this->dbcontrol->email_exist()){
			$subs = $this->dbcontrol->get_subscriber();
			if (password_verify($this->input->post('password'), $subs->password)){
					$this->load->library('session');
					$this->session->set_userdata('logged_in', TRUE);
					$this->session->set_userdata('subs', $subs->id);
					$this->session->set_userdata('email', $subs->email);
					$this->dbcontrol->enter_session($subs->id);
					redirect('home/');
			}else{
				$data = array(
									'title' => 'Sign In',
									'message' => "<p class='danger'>Incorrect Password</p>"
								);

				$this->load->view('signin', $data);
			}
		}else{
			$data['message'] = "<p class='danger'>Invalid Email</p>";
			$data['title'] = 'Sign In';
			$this->load->view('signin', $data);
		}
	}

	public function logout(){
		$this->dbcontrol->logout();
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('subs');
		$this->session->unset_userdata('email');
		redirect('home');
	}

// ====================================Videos  ==============================
	public function skits($state ='normal', $user = NULL){
		$data = ($this->dbcontrol->user_logged()) ? $this->_get_packages() : array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => TRUE);
		$data['title'] = 'Skits';
		if ($state != 'normal' ){
			$user = $this->uri->segment(3);
			$data['skits'] = $this->dbcontrol->get_recent_skits($user);
			$config['total_rows'] = $this->dbcontrol->get_total('skits', 'user', $user);
			$config['base_url'] = site_url("home/skits/{$user}");
		}else{
			$data['skits'] = $this->dbcontrol->get_recent_skits();
			$config['total_rows'] = $this->dbcontrol->get_total('skits');
			$config['base_url'] = site_url('home/skits');
		}
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		load_view('head', 'skits','foot', $data);

	}

	public function movies($state = 'normal', $user = NULL){
		$data = ($this->dbcontrol->user_logged()) ? $this->_get_packages() : array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => TRUE);
		$data['title'] = 'Movies';
		if ($state != 'normal'){
			$user = $this->uri->segment(3);
			$data['movies'] = $this->dbcontrol->get_recent_movies($user);
			$config['total_rows'] = $this->dbcontrol->get_total('movies', 'user', $user);
			$config['base_url'] = site_url("home/movies/{$user}");
		}else{
			$data['movies'] = $this->dbcontrol->get_recent_movies();
			$config['total_rows'] = $this->dbcontrol->get_total('movies');
			$config['base_url'] = site_url('home/movies');
		}
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		load_view('head', 'movies','foot', $data);
	}

	public function series($state= 'normal', $user = NULL){
		$data = ($this->dbcontrol->user_logged()) ? $this->_get_packages() : array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => TRUE);
		$data['title'] = 'Series';
		if ($state != 'normal'){
			$user = $this->uri->segment(3);
			$data['series'] = $this->dbcontrol->get_recent_series($user);
			$config['total_rows'] = $this->dbcontrol->get_total('series','user', $user);
			$config['base_url'] = site_url("home/series/{$user}");
		}else{
			$data['series'] = $this->dbcontrol->get_recent_series();
			$config['total_rows'] = $this->dbcontrol->get_total('series');
			$config['base_url'] = site_url('home/series');
		}
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		load_view('head', 'series','foot', $data);
	}

	public function episodes($series){
		$data = ($this->dbcontrol->user_logged()) ? $this->_get_packages() : array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => TRUE);
		$data['title'] = $this->dbcontrol->get_video('series', $series)->title;
		$data['episodes'] = $this->dbcontrol->get_episodes($series);
		$config['total_rows'] = $this->dbcontrol->get_total('episodes', 'series', $series);
		$config['base_url'] = site_url("home/episodes/{$series}");
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		load_view('head', 'episodes', 'foot', $data);
	}

	public function watch($table, $video){
			if ($this->session->has_userdata('subs')){
				$data = ($this->dbcontrol->user_logged()) ? $this->_get_packages() : array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => TRUE);
				$data['genres'] = $this->dbcontrol->get_genre($table, $video);
				$data['views'] = $this->dbcontrol->get_views($video);
				$data['related_videos'] = $this->dbcontrol->get_related($table, $video);
				$data['video'] = $videos = $this->dbcontrol->get_video($table,$video);
				$data['title'] = 'Watch | ' . $videos->title ;
				$this->dbcontrol->add_view($table,$video);
				load_view('head','watch','foot', $data);
			//$this->load->view('watch', $data);
			}else{
				$data['title'] = 'Request code';
				$data['table'] = $table;
				$data['video'] = $video;
				$this->load->view('request_code', $data);
			}

	}

	public function like($video){
		$data['success'] = $this->dbcontrol->like_video($video);
		echo json_encode($data);
	}

	public function search(){
		$data = ($this->dbcontrol->user_logged()) ? $this->_get_packages() : array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => TRUE);
		$data['title'] = "Results for : '{$this->input->post('search')}'";
		$config['base_url'] = site_url('home/search');
		$config['total_rows'] = $this->dbcontrol->count_search();
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['search'] = $this->input->post('search');
		$data['results'] = $results = $this->dbcontrol->search();
		load_view('head', 'search','foot', $data);
	}

	public function request_code(){
		if ($this->dbcontrol->request_code_exist($this->input->post('code'),$this->input->post('video'))){
				$code = $this->dbcontrol->get_request_code($this->input->post('code'),$this->input->post('video'));
				if ($code->times_used < 3){
						$this->session->set_userdata('subs', $code->code);
						if ($this->dbcontrol->update_request_code($this->input->post('code')))
							redirect("home/watch/{$this->input->post('table')}/{$this->input->post('video')}");
						else
								$this->request_code();
				}else{
					$data['title'] = 'Request code';
					$data['table'] = $this->input->post('table');
					$data['video'] = $this->input->post('video');
					$data['message'] = "<div class='danger'>You have exceeded view limit on this code</div>";
					$this->load->view('request_code', $data);
				}
		}else{
			$data['title'] = 'Request code';
			$data['table'] = $this->input->post('table');
			$data['video'] = $this->input->post('video');
			$data['message'] = "<div class='danger'>Invalid View code</div>";
			$this->load->view('request_code', $data);
		}
	}

	public function generate_code($table, $video){
			$code = video_code();
			$data['title'] = 'Generated code';
			$data['table'] = $table;
			$data['video'] = $video;
			$data['message'] = "<div class='success'>Your new generated code is {$code}</div>";
			if ($this->dbcontrol->put_request_code($code))
				$this->load->view('request_code', $data);
			else
				$this->generate_code($table, $video);
	}

// ==============================Users======================================

	public function user($serial){
		$data = ($this->dbcontrol->user_logged()) ? $this->_get_packages() : array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => TRUE);
		$data['user'] = $serial;
		$data['title'] = $this->dbcontrol->get_user($serial)->name;
		$data['most_viewed'] = $this->dbcontrol->get_most_viewed($serial);
		$data['movies'] = $this->dbcontrol->get_user_videos('movies',$serial);
		$data['skits'] = $this->dbcontrol->get_user_videos('skits',$serial);
		$data['series'] = $this->dbcontrol->get_user_videos('series',$serial);

		load_view('head', 'user', 'foot', $data);
	}

	public function history($user){
		$data = ($this->dbcontrol->user_logged()) ? $this->_get_packages() : array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => TRUE);
		$data['title'] = 'History';
		$data['histories'] = $this->dbcontrol->get_history($user);
		load_view('head', 'history', 'foot', $data);
	}

	public function favorites($user){
			$data = ($this->dbcontrol->user_logged()) ? $this->_get_packages() : array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => TRUE);
			$data['title'] = 'Favorites';
			$data['favorites'] = $this->dbcontrol->get_favourites($user);
			load_view('head', 'favorites','foot', $data);
	}

// ======================Random functions ===================================
	function package_selected(){
		return ($this->input->post('package')  != '0');
	}

	function unique_email(){
		return ! $this->dbcontrol->email_exist();
	}

	function _get_packages(){
		$pkge = $this->dbcontrol->get_subscriber()->package;
		switch ($pkge){
			case 1: return array('is_movie' => TRUE, 'is_series' => FALSE, 'is_skits' => FALSE);
			case 2: return array('is_movie' => FALSE, 'is_series' => TRUE, 'is_skits' => FALSE);
			case 3: return array('is_movie' => FALSE, 'is_series' => FALSE, 'is_skits' => TRUE);
			case 4: return array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => FALSE);
			case 5: return array('is_movie' => TRUE, 'is_series' => FALSE, 'is_skits' => TRUE);
			case 6: return array('is_movie' => FALSE, 'is_series' => TRUE, 'is_skits' => TRUE);
			case 7: return array('is_movie' => TRUE, 'is_series' => TRUE, 'is_skits' => TRUE);
		}
	}

}
