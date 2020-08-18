<?php
defined('BASEPATH') or exit('No direct access allowed');

class Dbcontrol extends CI_Model{

    public function __construct(){
      parent :: __construct();
      $this->load->database();
      $this->load->library('session');
    }

    public function register($hash){
      //sends the signup data into database table 'users'
      return $this->db->insert('users', array(
              'name' => $this->input->post('name'),
              'mobile' => $this->input->post('mobile'),
              'email' => $this->input->post('email'),
              'hash' => $hash,
              'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
              'is_activated' => FALSE,
              'has_paid' => FALSE,
              'date_joined' => strtotime('now')
      ));
    }

    public function enter_session($prod, $time, $case){
      //saves the login information, every time a user logs in
      $this->load->library('user_agent');
      return $this->db->insert('user_session', array(
                    'user' => $prod,
                    'login_time' => $time,
                    'from_cookie' => $case,
                    'ip_address' => $this->input->ip_address(),
                    'agent' => $this->agent->agent_string()
                  ));
    }

    public function activate($hash, $id){
      //activates user based on clicked link
      return $this->db->where('hash', $hash)->where('id', $id)
                      ->set('is_activated', TRUE)->update('users');
    }

    public function password_request($user, $hash){
      //saves the info, when a user requests for a password reset_request
      return $this->db->insert('reset_request', array(
                              'user' => $user,
                              'hash' => $hash,
                              'time' => strtotime('now')
                            ));
    }

    public function reset_request_exists($hash, $user){
      //checks for the existence of a reset password request
      return $this->db->where('hash', $hash)
                      ->where('user', $user)
                      ->get('reset_request')->num_rows() > 0;
    }

    public function put_package($package){
      //updates user package;
      return $this->db->where('id', $this->session->user)
                      ->set('package', $package)
                      ->set('has_paid', TRUE)
                      ->set('sub_date', strtotime('now'))
                      ->update('users');
    }

    public function restore_password(){
      //changes the password of a user
      $this->db->where('hash', $this->input->post('hash'))->delete('reset_request');
      return $this->db->where('id', $this->input->post('user'))
                      ->set('password', password_hash($this->input->post('password'), PASSWORD_DEFAULT))
                      ->update('users');


    }

    public function get_user_movies(){
      //gets user movies
      return $this->db->select("id, title, description, (SELECT count(*) FROM views WHERE video = movies.id) as views, 'movies' as tbl, approved, upload_time")
                      ->where('user', $this->session->user)
                      ->get('movies')
                      ->result();
    }

    public function get_user_skits(){
      //get user skits
      return $this->db->select("id, title, description, (SELECT count(*) FROM views WHERE video = skits.id) as views, 'skits' as tbl, approved, upload_time")
                      ->where('user', $this->session->user)
                      ->get('skits')
                      ->result();
    }

    public function get_user_series(){
      //gets user series
      return $this->db->select("id, title, description, start_year")
                      ->where('user', $this->session->user)
                      ->get('series')
                      ->result();
    }

    public function get_series_episodes($series){
      //gets all episodes in a series ;
      return $this->db->select("episodes.id, episodes.title, episode, season, (SELECT count(*) FROM views WHERE video = episodes.id) as views, 'episodes' as tbl, approved, upload_time ")
                      ->where('series.user', $this->session->user)
                      ->where('series.id = `episodes.series`')
                      ->from("episodes, series")
                      ->get()
                      ->result();
    }

    public function get_videos_analysis($count = FALSE){
      if ($count){
        $skits = $this->db->select("skits.id, skits.title, upload_time, 'skits' as type, (SELECT count(*) FROM VIEWS WHERE video = skits.id) as total_views, (SELECT count(*) FROM VIEWS WHERE view_type = 1 and video = skits.id)  as sub_views, (SELECT count(*) FROM VIEWS WHERE view_type = 2 and video = skits.id) as anon_views")
                          ->from('skits')
                          ->where('skits.user', $this->session->user)
                          ->get()->num_rows();

        $movies =  $this->db->select("movies.id, movies.title, upload_time, 'movies' as type, (SELECT count(*) FROM VIEWS WHERE video = movies.id) as total_views, (SELECT count(*) FROM VIEWS WHERE view_type = 1 and video = movies.id)  as sub_views, (SELECT count(*) FROM VIEWS WHERE view_type = 2 and video = movies.id) as anon_views")
                          ->from('movies')
                          ->where('movies.user', $this->session->user)
                          ->get()->num_rows();

        $episodes = $this->db->select("episodes.id, episodes.title, upload_time, 'series' as type, (SELECT count(*) FROM VIEWS WHERE video = episodes.id) as total_views, (SELECT count(*) FROM VIEWS WHERE view_type = 1 and video = episodes.id)  as sub_views, (SELECT count(*) FROM VIEWS WHERE view_type = 2 and video = episodes.id) as anon_views")
                             ->from("episodes, series")
                             ->where('series.user', $this->session->user)
                             ->where('series.id = `episodes.series`')
                             ->get()->num_rows();

        $result = $skits + $movies + $episodes;

        return $result;
      }else{
        $skits = $this->db->select("skits.id, skits.title, upload_time, 'skits' as type, (SELECT count(*) FROM VIEWS WHERE video = skits.id) as total_views, (SELECT count(*) FROM VIEWS WHERE view_type = 1 and video = skits.id)  as sub_views, (SELECT count(*) FROM VIEWS WHERE view_type = 2 and video = skits.id) as anon_views")
                          ->from('skits')
                          ->where('skits.user', $this->session->user)
                          ->get()->result();

        $movies =  $this->db->select("movies.id, movies.title, upload_time, 'movies' as type, (SELECT count(*) FROM VIEWS WHERE video = movies.id) as total_views, (SELECT count(*) FROM VIEWS WHERE view_type = 1 and video = movies.id)  as sub_views, (SELECT count(*) FROM VIEWS WHERE view_type = 2 and video = movies.id) as anon_views")
                          ->from('movies')
                          ->where('movies.user', $this->session->user)
                          ->get()->result();

        $episodes = $this->db->select("episodes.id, episodes.title, upload_time, 'episodes' as type, (SELECT count(*) FROM VIEWS WHERE video = episodes.id) as total_views, (SELECT count(*) FROM VIEWS WHERE view_type = 1 and video = episodes.id)  as sub_views, (SELECT count(*) FROM VIEWS WHERE view_type = 2 and video = episodes.id) as anon_views")
                             ->from("episodes, series")
                             ->where('series.user', $this->session->user)
                             ->where('series.id = `episodes.series`')
                             ->get()->result();

        $result = array_merge($skits, $movies);
        $result = array_merge($result, $episodes);

        uasort($result, 'upload_sort');

        return array_slice($result,$this->uri->segment(3),15);
      }
    }

    public function get_video($table, $video){

      return $this->db->select("{$table}.id, {$table}.title, {$table}.thumbnail, {$table}.link, (SELECT count(*) FROM LIKES WHERE video = {$table}.id) as likes,
                              {$table}.filesize, {$table}.duration, {$table}.upload_time, (SELECT count(*) FROM VIEWS WHERE video = {$table}.id) as views ")
                      ->from($table)
                      ->where('id', $video)->get()->row();
    }

    public function add_skit($id, $thumbnail, $video, $size, $duration){
      //adds skit information to database
      return $this->db->insert('skits', array(
                                'id' => $id,
                                'user' => $this->session->user,
                                'title' => $this->input->post('title'),
                                'description' => $this->input->post('desc'),
                                'thumbnail' => 'thumbnails/'.$thumbnail,
                                'link' => 'skits/'.$video,
                                'filesize' => $size,
                                'duration' => $duration,
                                'view_rating' => $this->input->post('rating'),
                                'approved' => FALSE,
                                'upload_time' => strtotime('now')
                          ));
    }

    public function add_movie($id, $cover, $thumbnail, $video, $size, $duration){
      //adds movie information to database
      return $this->db->insert('movies', array(
                                  'id' => $id,
                                  'user' => $this->session->user,
                                  'title' => $this->input->post('title'),
                                  'description' => $this->input->post('desc'),
                                  'lead_actor' => $this->input->post('lead_actor'),
                                  'other_actors' => $this->input->post('other_acts'),
                                  'genre' => $this->input->post('genre'),
                                  'filesize' => $size,
                                  'duration' => $duration,
                                  'view_rating' => $this->input->post('rating'),
                                  'prod_year' => $this->input->post('prod_year'),
                                  'language' => $this->input->post('language'),
                                  'cover' => 'covers/'.$cover,
                                  'thumbnail' => 'thumbnails/'.$thumbnail,
                                  'link' => 'movies/'.$video,
                                  'approved' => FALSE,
                                  'upload_time' => strtotime('now')
                        ));
    }

    public function add_series($id, $cover){
      //adds series information to database
      return $this->db->insert('series', array(
                              'id' => $id,
                              'user' => $this->session->user,
                              'title' => $this->input->post('title'),
                              'genre' => $this->input->post('genre'),
                              'description' => $this->input->post('desc'),
                              'cover' => 'covers/'.$cover,
                              'start_year' => $this->input->post('prod_year')
                        ));
    }

    public function add_episode($id, $thumbnail, $video, $size, $duration){
      return $this->db->insert('episodes', array(
                                'id' => $id,
                                'series' => $this->input->post('series'),
                                'season' => $this->input->post('season'),
                                'episode' => $this->input->post('episode'),
                                'title' => $this->input->post('title'),
                                'thumbnail' => 'thumbnails/'.$thumbnail,
                                'link' => 'episodes/'.$video,
                                'filesize' => $size,
                                'duration' => $duration,
                                'approved' => FALSE,
                                'upload_time' => strtotime('now')
                        ));
    }

    public function get_last_episode($series, $season){
      //gets the last episode of a season in a series
      $query = "SELECT MAX(episode) as last_episode FROM episodes WHERE series='{$series}' AND season='{$season}'";
      $epi = $this->db->query($query)->row()->last_episode;

      return ($epi > 0) ? $epi : 0;
    }

    public function get_last_season($series){
      //gets the last season of an episode;
      $query = "SELECT MAX(season) as last_season FROM episodes WHERE series='{$series}'";
      $ser = $this->db->query($query)->row()->last_season;

      return ($ser > 0) ? $ser : 1;
    }

    public function most_viewed(){
      //gets the most viewed video;
      $query = "SELECT MAX('SELECT COUNT(*) FROM views WHERE user={$this->session->user} GROUP BY video_id') FROM views";
      return $this->db->query($query)->row();
    }

    public function most_liked(){
      return $this->db->query($query)->row();
    }

    public function get_genres(){
      return $this->db->get('genres')->result();
    }

    public function logout($time){
      //saves the logout time in the database;
      return $this->db->where('login_time', $time)->set('logout_time', strtotime('now'))->update('user_session');
    }

    public function get_user($needle = NULL){
      //get users details by email or by id
      if ($needle != NULL)
        return $this->db->where('email', $needle)->or_where('id', $needle)->get('users')->row();
      else
        return $this->db->where('id', $this->session->user)->get('users')->row();
    }

    public function email_exists($email, $table){
      //checks if an email exists in a given table
      return $this->db->where('email', $email)->get($table)->num_rows() > 0;
    }

    public function get_sum_uploaded(){
      //gets the total size of videos uploaded
      return ($this->db->select("ceil(SUM(filesize)) sum")
              ->from('movies')
              ->where('movies.user', $this->session->user)
              ->get()->row()->sum + $this->db->select("ceil(SUM(filesize)) sum")
                      ->from('skits')
                      ->where('skits.user', $this->session->user)
                      ->get()->row()->sum + $this->db->select("ceil(SUM(episodes.filesize)) sum")
                                                ->from("series, episodes")
                                                ->where("series.user", $this->session->user)
                                                ->where("series.id = episodes.series")
                                                ->get()->row()->sum);
    }

    public function get_most($table){
      //returns the most watched video or most liked video of a user;
      $id = db_max($this->db->query("SELECT count(*) count, video id FROM {$table} WHERE user = {$this->session->user} group by video")->result());
      $video = $this->db->select("title, id, 'movies' as type")->where('id', $id)->get('movies')->row();
      if (empty($video)){
        $video = $this->db->select("title, id, 'skits' as type")->where('id', $id)->get('skits')->row();
        if (empty($video)){
          $video = $this->db->select("title, id, 'episodes' as type")->where('id', $id)->get('skits')->row();
          if (empty($video)){
            return NULL;
          }else{
            return $video;
          }
        }else{
          return $video;
        }
      }else{
        return $video;
      }
    }

    public function get_total_uploaded($table, $size = FALSE){
      //if size is set to true, returns the total size of the vidoes uploaded in a table
      //else it returns the total amount of videos uploaded
      if($size){
        return ($table == 'episodes') ?
         $this->db->query("SELECT ceil(sum(filesize)) count FROM series,{$table} WHERE series.user = {$this->session->user} AND series.id = episodes.series")->row()->count
                : $this->db->query("SELECT ceil(sum(filesize)) sum FROM {$table} WHERE {$table}.user = {$this->session->user}")->row()->sum;
      }else{
        return ($table == 'episodes') ?
        $this->db->where('series.user', $this->session->user)->where('series.id = `episodes.series`')->from('series, episodes')->get()->num_rows()
        : $this->db->where("{$table}.user", $this->session->user)->get($table)->num_rows();
      }
    }

    public function get_views_chart($video){
      //returns the views for a video in the past week
      return $this->db->query("SELECT date_stamp day, COUNT(*) views
                        FROM VIEWS WHERE video = $video
                        AND date_stamp BETWEEN ".strtotime('- 7 days')." AND ".strtotime('last second')." GROUP BY CAST(date_stamp/86399 AS INT)")->result();
    }

}
