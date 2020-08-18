<?php
defined ('BASEPATH') or exit('No Direct access Allowed');

class File_analysis{

    public function __construct(){
      require_once($_SERVER['DOCUMENT_ROOT'].'/maradmin/assets/getid3/getid3.php');
    }

    public function get_duration($file){
      $info = new getID3;
      $file = $info->analyze($file);
      return $file['playtime_string'];
    }

}
