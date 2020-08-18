<?php
defined('BASEPATH') or exit('No direct access allowed');

/*
  @author Bello Opeyemi
  @date 21st June 2017
  @contact opybee07@gmail.com

*/
if (! function_exists('load_view')){
  //this function loads the head, body and foot view

  function load_view($head,$body,$foot, $data = NULL){
    $env = &get_instance();
    $env->load->view($head,$data);
    $env->load->view($body);
    $env->load->view($foot);
  }
}

if (! function_exists('time_elapsed')){
  //this function takes a time string and returns elapsed time from the current time

  function time_elapsed($time){
    $diff = strtotime('now') - $time;

    if ($diff > 561599) :
        return date('jS F, Y', $time);
    elseif ($diff > 172700) :
        return date('l', $time)." at ".date('h:i a', $time);
    elseif ($diff > 86399) :
        return "Yesterday at ". date('h:i a',$time);
    elseif ($diff > 43199) :
        return "Today at ". date('h:i a', $time);
    elseif ($diff > 3599) :
        return  (intval($diff/3600) > 1) ? intval($diff/3600)." hours ago" : intval($diff/3600)." hour ago";
    elseif ($diff > 59) :
        return  (intval($diff/60) > 1) ? intval($diff/60)." mins ago" : intval($diff/60)." min ago";
    else :
        return ($diff > 1) ? ($diff)." seconds ago" : ($diff)."second ago";
    endif;
  }
}

if (! function_exists('assign_id')){
  //this function generates unique id for people
  function assign_id(){
    return substr(uniqid(mt_rand(15, 1000000), TRUE),0,8);
  }
}

if (! function_exists('upload_sort')){
  function upload_sort($a, $b){
    if ($a->upload_time > $b->upload_time) return -1;
    if ($a->upload_time < $b->upload_time) return 1;
    return 0;
  }
}

if (! function_exists('db_max')){
  function db_max($object){
    $max = 0;
    for($i=0; $i< count($object)-1; $i++){
      if ($object[$i]->count > $max){
        $max = $object[$i]->count;
        $id = $object[$i]->id;
      }
    }
    return $id;
  }
}

if (! function_exists('size_word')){
  function size_word($size){
    if (($size / 1000000) >= 1){
      return round($size/1048576, 2)." GB";
    }elseif(($size / 1000) >= 1){
      return round($size/1024, 2)." MB";
    }
  }
}
