<?php
defined('BASEPATH') or exit('No direct access allowed');

class Dbcontrol extends CI_Model{

  public function __construct(){
    parent :: __construct();
    $this->load->database();
    $this->load->library('session');
  }

  public function user_logged(){
    return $this->session->has_userdata('logged_in') AND $this->session->logged_in;
  }

  public function get_user($serial = NULL){
    if ($serial != NULL)
      return $this->db->where('id', $serial)->or_where('email', $serial)->get('users')->row();
    else
      return $this->db->where('email', $this->session->email)->get('users')->row();
  }

  public function subscribe($user, $hash){
    return $this->db->insert('subscribers', array(
                                      'id' => $user,
                                      'email' => $this->input->post('email'),
                                      'phone' => $this->input->post('phone'),
                                      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                                      'hash' => $hash,
                                      'activated' => FALSE,
                                      'package' => $this->input->post('package'),
                                      'sub_date' => strtotime('now'),
                                      'has_paid' => FALSE,
                            ));
  }

  public function enter_session($subs){
    $this->load->library('user_agent');
    return $this->db->insert('subs_session', array(
                                          'subscriber' => $subs,
                                          'login_time' => strtotime('now'),
                                          'ip_address' => $this->input->ip_address(),
                                          'agent' => $this->agent->agent_string()
                            ));
  }

  public function get_user_videos($table, $user){
    return $this->db->limit(4)->where('user', $user)->get($table)->result();
  }

  public function get_recent_skits($user = NULL){
    if ($user != NULL){
      $offset = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);
      $query = "SELECT skits.id skit, skits.title,skits.thumbnail,skits.duration, users.name,users.id prod
                FROM users,skits WHERE skits.user = {$user} AND users.id={$user}
               LIMIT {$offset},8";
    }else{
      $offset = (empty($this->uri->segment(3))) ? 0 : $this->uri->segment(3);
      $query = "SELECT skits.id skit, skits.title,skits.thumbnail,skits.duration, users.name,users.id prod
                FROM users,skits WHERE skits.user = users.id
               LIMIT {$offset},6";
    }
    return $this->db->query($query)->result();
  }

  public function get_recent_series($user = NULL){

    if ($user != NULL){
        $offset = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);
      "SELECT series.id series,series.title,series.cover,users.name,users.id prod
                FROM users,series WHERE series.user = {$user} series.user = users.id
                LIMIT {$offset}, 6";
    }else{
        $offset = (empty($this->uri->segment(3))) ? 0 : $this->uri->segment(3);
      $query = "SELECT series.id series,series.title,series.cover,users.name,users.id prod
                FROM users,series WHERE series.user = users.id
                LIMIT {$offset}, 6";
    }

    return $this->db->query($query)->result();
  }

  public function get_recent_movies($user = NULL){
    if ($user != NULL){
      $offset = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);
      $query = "SELECT movies.cover, movies.id movie, movies.title, movies.duration, movies.thumbnail, users.name,users.id prod
                FROM users,movies WHERE movies.user={$user} AND movies.user = users.id
                LIMIT {$offset},6";
    }else{
      $offset = (empty($this->uri->segment(3))) ? 0 : $this->uri->segment(3);
      $query = "SELECT movies.cover, movies.id movie, movies.title, movies.duration, movies.thumbnail, users.name,users.id prod
                FROM users,movies WHERE movies.user = users.id
                LIMIT {$offset},6";
    }
    return $this->db->query($query)->result();
  }

  public function load_recent_videos(){
    if ($this->session->has_userdata('logged_in')){
        $package = $this->get_subscriber()->package;
         switch($package){
           case 1:
                return $this->db->limit(12)
                            ->select("'movies' as tbl, movies.id video, movies.thumbnail, movies.duration, movies.title, users.id user, users.name")
                            ->from("users, movies")
                            ->where("movies.user = users.id")
                            ->order_by('movies.upload_time', 'DESC')
                            ->get()->result();
                break;
           case 2:
                 return $this->db->imit(12)
                             ->select("'episodes' as tbl, episodes.id video, episodes.season, episodes.thumbnail, episodes.duration, episodes.title, episodes.episode, series.title series, users.id user, users.name")
                             ->from("users, series, episodes")
                             ->where("series.user = users.id")
                             ->where("episodes.series = series.id")
                             ->order_by('episodes.upload_time', 'DESC')
                             ->get()->result();
                 break;
           case 3:
                 return $this->db->limit(12)
                             ->select("'skits' as tbl, skits.id video, skits.thumbnail, skits.duration, skits.title, users.id user, users.name")
                             ->from("users, skits")
                             ->where("skits.user = users.id")
                             ->order_by('skits.upload_time', 'DESC')
                             ->get()->result();
                 break;
          case 4:
                $video1 = $this->db->limit(6)
                                  ->select("'movies' as tbl, movies.id video, movies.thumbnail, movies.duration, movies.title, users.id user, users.name")
                                  ->from("users, movies")
                                  ->where("movies.user = users.id")
                                  ->order_by('movies.upload_time', 'DESC')
                                  ->get()->result();

                $video2 = $this->db->limit(6)
                                    ->select("'episodes' as tbl, episodes.season, episodes.id video, episodes.thumbnail, episodes.duration, episodes.title, episodes.episode, series.title series, users.id user, users.name")
                                    ->from("users, series, episodes")
                                    ->where("series.user = users.id")
                                    ->where("episodes.series = series.id")
                                    ->order_by('episodes.upload_time', 'DESC')
                                    ->get()->result();

                $videos = array_merge($video1, $video2);
                shuffle($videos);

                return $videos;
                break;
            case 5:
                $video1 = $this->db->limit(6)
                            ->select("'movies' as tbl, movies.id video, movies.thumbnail, movies.duration, movies.title, users.id user, users.name")
                            ->from("users, movies")
                            ->where('movies.user = users.id')
                            ->order_by('movies.upload_time', 'DESC')
                            ->get()->result();

                $video2 = $this->db->limit(6)
                            ->select("'skits' as tbl, skits.id video, skits.thumbnail, skits.duration, skits.title, users.id user, users.name")
                            ->from("users, skits")
                            ->where('skits.user = users.id')
                            ->order_by('skits.upload_time', 'DESC')
                            ->get()->result();

                  $videos = array_merge($video1, $video2);
                  shuffle($videos);

                  return $videos;
                  break;

            case 6:
                  $video1 = $this->db->limit(6)
                                      ->select("'episodes' as tbl, episodes.id video, episodes.season, episodes.thumbnail, episodes.duration, episodes.title, episodes.episode, series.title series, users.id user, users.name")
                                      ->from("users, series, episodes")
                                      ->where("series.user = users.id")
                                      ->where("episodes.series = series.id")
                                      ->order_by('episodes.upload_time', 'DESC')
                                      ->get()->result();

                  $video2 = $this->db->limit(6)
                              ->select("'skits' as tbl, skits.id video, skits.thumbnail, skits.duration, skits.title, users.id user, users.name")
                              ->from("users, skits")
                              ->where(" skits.user = users.id ")
                              ->order_by('skits.upload_time', 'DESC')
                              ->get()->result();

                  $videos = array_merge($video1, $video2);
                  shuffle($videos);

                  return $videos;
                  break;

            case 7:
                  $video3 = $this->db->limit(4)
                                    ->select("'movies' as tbl, movies.id video, movies.thumbnail, movies.duration, movies.title, users.id user, users.name")
                                    ->from("users, movies")
                                    ->where("movies.user = users.id ")
                                    ->order_by('movies.upload_time', 'DESC')
                                    ->get()->result();

                  $video1 = $this->db->limit(4)
                                      ->select("'episodes' as tbl, episodes.id video, episodes.thumbnail, episodes.duration, episodes.title, episodes.season, episodes.episode, series.title series, users.id user, users.name")
                                      ->from("users, series, episodes")
                                      ->where("series.user = users.id")
                                      ->where("episodes.series = series.id")
                                      ->order_by('episodes.upload_time', 'DESC')
                                      ->get()->result();

                  $video2 = $this->db->limit(4)
                              ->select("'skits' as tbl, skits.id video, skits.thumbnail, skits.duration, skits.title, users.id user, users.name")
                              ->from("users, skits")
                              ->where(" skits.user = users.id ")
                              ->order_by('skits.upload_time', 'DESC')
                              ->get()->result();

                  $videos = array_merge($video3, $video2);
                  $videos = array_merge($videos, $video1);

                  shuffle($videos);

                  return $videos;
                  break;
         }
    }else{
      $videos = $this->db->limit(4)
                        ->select("'movies' as tbl, movies.id video, movies.thumbnail, movies.duration, movies.title, users.id user, users.name")
                        ->from('users, movies')
                        ->where("movies.user = users.id")
                        ->get()->result();

      $videos = array_merge($videos,$this->db->limit(4)
                        ->select("'skits' as tbl, skits.id video, skits.thumbnail, skits.duration, skits.title, users.id user, users.name")
                        ->from("users, skits")
                        ->where("skits.user = users.id")
                        ->get()->result());

      shuffle($videos);
      return $videos;
    }
  }

  public function request_code_exist($code, $video){
    return $this->db->where('code', $code)->where('video', $video)->get('view_request')->num_rows() > 0;
  }

  public function get_request_code($code){
    return $this->db->where('code', $code)->get('view_request')->row();
  }

  public function update_request_code($code){
    return $this->db->set('times_used','times_used + 1', FALSE)
                    ->set('last_used', strtotime('now'))
                    ->where('code',$code)
                    ->update('view_request');
  }

  public function put_request_code($code, $video){
    return $this->db->insert('view_request', array(
                                            'code' => $code,
                                            'video' => $video,
                                            'times_used' => 0,
                                            'last_used' => strtotime('now')
                            ));
  }

  public function get_most_viewed($serial){
    $most_count = $this->db->select('video, count(*) count')
                            ->from('views')
                            ->where('user', $serial)
                            ->group_by('video')
                            ->order_by('count', 'DESC')
                            ->get()
                            ->first_row()->video;

    $most_viewed = $this->db->where('id', $most_count)->get('movies')->row();

    if (! empty($most_viewed)){
      $most_viewed->table = 'movies';
      return $most_viewed;
    }else{
      $most_viewed = $this->db->where('id', $most_count)->get('skits')->row();
      if (! empty($most_viewed)){
        $most_viewed->table = 'skits';
        return $most_viewed;
      }else{
        $most_viewed = $this->db->where('id', $most_count)->get('episodes')->row();
        $most_viewed->table = 'episodes';
        return $most_viewed;
      }
    }
  }

  public function add_view($table, $video){
    $table = ($table == 'episodes') ? 'series' : $table;
    $view = ($this->session->has_userdata('logged_in')) ? 1 : 2;
    $subquery = ($table == 'series') ? "(SELECT user FROM {$table} WHERE id = (SELECT series FROM episodes WHERE id = {$video}))" : "(SELECT user FROM {$table} WHERE id={$video})";
    $query = "REPLACE INTO `views`
              SET `user` = {$subquery},
                  `subscriber` = '{$this->session->subs}',
                  `view_type` = {$view},
                  `video` = {$video},
                  `date_stamp` =". strtotime('now');
    return $this->db->query($query);
  }

  public function get_episodes($series){
    $offset =  (empty($this->uri->segment(3))) ? 0 : $this->uri->segment(3);
    $query = "SELECT episodes.thumbnail, episodes.title, episodes.season, episodes.episode, episodes.id as epi, episodes.duration, series.title name
                FROM series,episodes
                WHERE episodes.series = {$series} AND episodes.series = series.id";
      return $this->db->query($query)->result();
  }

  public function get_views($video){
    return $this->db->select('count(*) as count')->where('video', $video)->get('views')->row()->count;
  }

  public function get_video($table, $video){
    $query = "SELECT * FROM users,{$table} WHERE {$table}.id='{$video}'";
    return $this->db->query($query)->row();
  }

  public function like_video($video){
    return $this->db->insert('likes', array('subscriber' => $this->session->subs, 'video' => $video, 'time' => strtotime('now')));
  }

  public function get_genre($table, $video){
    if ($table == 'skits'){
      return NULL;
    }elseif ($table == 'movies'){
      $genre = $this->db->select('genre')->where('id', $video)->get($table)->row()->genre;
      $genre = explode(',', $genre);
      $array = array();
      foreach($genre as $key => $gen){
        $array[$key] = $this->db->where('serial', $gen)->get('genres')->row()->name;
      }
      return $array;
    }else{
      return NULL;
    }
  }

  public function get_related($table, $video){

      switch ($table) {
        case 'skits':
                  $user = $this->db->where('id', $video)->get($table)->row();
                  $videos = $this->db->limit(8)
                            ->select("skits.title, skits.thumbnail, skits.id related, users.name, users.id user, 'skits' as tbl")
                            ->from('users,skits')
                            ->where('skits.user', $user->user)->where('users.id', $user->user)
                            ->get();
                  $main = $videos->result();
                  if ($videos->num_rows() > 7){
                    return $main;
                  }else{
                    $titles = explode(' ',$user->title);
                    print_r($titles);
                    if(count($titles) > 3)
                      $adds = $this->db->limit((8-$videos->num_rows()))
                                       ->select("skits.title, skits.thumbnail, skits.id related, users.name, users.id user, 'skits' as tbl")
                                       ->from("$table, users")
                                       ->where_not_in('skits.id', $video)
                                       ->like('title', $user->title)->or_like('title', $titles[1])->or_like('title', $titles[2])
                                       ->where('users.id', $user->user)->get()->result();
                    else
                    $adds = $this->db->limit((8-$videos->num_rows()))
                                      ->select("skits.title, skits.thumbnail, skits.id related, users.name, users.id user, 'skits' as tbl")
                                      ->from("$table, users")
                                      ->where_not_in('skits.id', $video)
                                      ->like('title', $user->title)
                                      ->where('users.id', $user->user)->get()->result();
                  //  $adds = array_slice($adds, 0, 8-$videos->num_rows);
                    return array_merge($main, $adds);
                  }
          break;
        case 'movies':
                $user = $this->db->where('id', $video)->get($table)->row();
                $genre = explode(',',$user->genre);
                $query = "SELECT `movies`.`title`, `movies`.`id` `related`, `movies`.`thumbnail`, `users`.`name`, `users`.`id` `user`, 'movies' as tbl
                          FROM `movies`, `users`
                          WHERE {$video} NOT IN('movies.id') AND (`genre` LIKE '%{$genre[0]},%' OR `genre` LIKE '%{$genre[1]},%' OR `genre` LIKE '%{$genre[0]},{$genre[1]}%')
                          AND `users`.`id` = `movies`.`user` LIMIT 8";
                $rgenres = $this->db->query($query)->result();
                return $rgenres;
          break;
        case 'episodes':
            $user = $this->db->select('series.user, episodes.id,episodes.series,episodes.episode')->where('episodes.id', $video)->get('series,episodes')->row();
            $videos = $this->db->limit(8)
                                ->select('episodes.title, episodes.thumbnail, episodes.id related, series.title name, series.id user, "episodes" as tbl')
                                ->from('episodes,series')
                                ->where('episodes.episode >', $user->episode)
                                ->where('series.id', $user->series)
                                ->get();
              return $videos->result();

        default:
          # code...
          break;
      }


    return array();
  }

  public function search(){
    $this->db->insert('search_queries', array('query' => $this->input->post('search')));
    $search = $this->input->post('search');
    $query = "SELECT 'episodes' as tbl, episodes.id video, thumbnail, episodes.title, description, users.name
              FROM episodes,users,series
              WHERE episodes.series = series.id AND series.user = users.id AND (episodes.title like '%$search%' OR series.title like '%$search%' OR series.description LIKE '%$search%')
              LIMIT 4";

    $series = $this->db->query($query)->result();

    $query = "SELECT'skits' as tbl, skits.id video,thumbnail, title, duration, description, users.name
              FROM skits,users
              WHERE skits.user = users.id AND (title like '%$search%' OR description LIKE '%$search%')
              LIMIT 4";

    $skits =  $this->db->query($query)->result();

    $query = "SELECT 'movies' as tbl, movies.id video,thumbnail, title, duration, description, users.name
              FROM movies,users
              WHERE movies.user = users.id AND (title like '%$search%' OR description LIKE '%$search%')
              LIMIT 4";

    $movies = $this->db->query($query)->result();

      $result = array_merge($series, $skits);
      $result = array_merge($result, $movies);
      return $result;
  }

  public function count_search(){
    $search = $this->input->post('search');
    $query = "SELECT 'episodes' as tbl, episodes.id video, thumbnail, episodes.title, description, users.name
              FROM episodes,users,series
              WHERE episodes.series = series.id AND series.user = users.id AND (episodes.title like '%$search%' OR series.title like '%$search%' OR series.description LIKE '%$search%') ";

    $series = $this->db->query($query)->result();

    $query = "SELECT'skits' as tbl, skits.id video,thumbnail, title, duration, description, users.name
              FROM skits,users
              WHERE skits.user = users.id AND (title like '%$search%' OR description LIKE '%$search%') ";

    $skits =  $this->db->query($query)->result();

    $query = "SELECT 'movies' as tbl, movies.id video,thumbnail, title, duration, description, users.name
              FROM movies,users
              WHERE movies.user = users.id AND (title like '%$search%' OR description LIKE '%$search%') ";

    $movies = $this->db->query($query)->result();

      $result = array_merge($series, $skits);
      $result = array_merge($result, $movies);
      return count($result);

  }
  public function get_history($user){
    $query = "SELECT skits.title, skits.description, views.date_stamp, views.video, 'skits' as tbl
              FROM skits,views WHERE views.subscriber = '{$user}' AND skits.id = views.video";

    $skits = $this->db->query($query)->result();

    $query = "SELECT 'movies' as tbl, movies.title, movies.description, views.date_stamp, views.video
              FROM movies,views WHERE views.subscriber = '{$user}' AND movies.id = views.video";

    $movies = $this->db->query($query)->result();

    $query = "SELECT 'episodes' as tbl, episodes.title, series.title description, views.date_stamp, views.video
              FROM episodes,views,series WHERE views.subscriber = '{$user}' AND episodes.id = views.video AND series.id = episodes.series";

    $episodes = $this->db->query($query)->result();

    $result = array_merge($skits,$movies,$episodes);
    uasort($result, "compare");
    return $result;
  }

  public function get_favourites($user){
    $query = "SELECT skits.title, skits.description, likes.date_stamp, likes.video, 'skits' as tbl
              FROM skits,likes WHERE likes.subscriber = '{$user}' AND skits.id = likes.video";

    $skits = $this->db->query($query)->result();

    $query = "SELECT 'movies' as tbl, movies.title, movies.description, likes.date_stamp, likes.video
              FROM movies,likes WHERE likes.subscriber = '{$user}' AND movies.id = likes.video";

    $movies = $this->db->query($query)->result();

    $query = "SELECT 'episodes' as tbl, episodes.title, series.title description, likes.date_stamp, likes.video
              FROM episodes,likes,series WHERE likes.subscriber = '{$user}' AND episodes.id = likes.video AND series.id = episodes.series";

    $episodes = $this->db->query($query)->result();

    $result = array_merge($skits,$movies,$episodes);
    uasort($result, "compare");
    return $result;
  }

  public function get_total($table, $where = NULL, $where_arg = NULL){
    if ($where == NULL OR $where_arg == NULL)
      return $this->db->get($table)->num_rows();
    else
      return $this->db->where($where, $where_arg)->get($table)->num_rows();
  }

  public function logout(){
    return $this->db->where('subscriber', $this->session->subs)->set('logout_time', strtotime('now'))->update('subs_session');
  }

  public function email_exist(){
    return $this->db->where('email', $this->input->post('email'))->get('subscribers')->num_rows() > 0;
  }

  public function get_subscriber(){
    if ($this->session->has_userdata('logged_in')){
      return $this->db->where('id', $this->session->subs)->get('subscribers')->row();
    }else{
      return $this->db->where('email', $this->input->post('email'))->get('subscribers')->row();
    }
  }


}
