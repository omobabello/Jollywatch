<?php

// ---------------------------------------------------------------
if (! function_exists('load_view')){

  function load_view($head,$body,$foot,$data = NULL){
    $instance = &get_instance();
    $instance->load->view($head,$data);
    $instance->load->view($body);
    $instance->load->view($foot);
  }
}

// ===============================================================
if (! function_exists('assign_id')){
  //this function generates unique id for people
  function assign_id(){
    return substr(uniqid(mt_rand(), TRUE),0,8);
  }
}

// ================================================================

if (! function_exists('video_code')){
  //this function generates a unique id for bought videos
  function video_code(){
    return strtoupper(substr(uniqid('n',TRUE),0,8));
  }
}

if (! function_exists('get_views')){
  function get_views($video){
    $instance = &get_instance();
    $instance->load->library('dbcontrol');
    return $instance->dbcontrol->get_views($video);
  }
}


// ===============================================================
if (! function_exists('compare')){
  function compare($a, $b){
    if ($a->date_stamp > $b->date_stamp) return -1;
    if ($a->date_stamp < $b->date_stamp) return 1;
    return 0;
  }
}
