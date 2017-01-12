<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('add','',TRUE);
  }

  function addcomments(){
    $text = $_POST['text'];
    $id_photo = $_POST['id_photo'];
    $post = false;
    $session_data = $this->session->userdata('logged_in');
    $id = $session_data['id'];

    $result = $this -> add -> addcomments($text, $id_photo, $id,$post);

    return '{"msg":"'.$result.'"}';
  }
  function addphoto(){
    $text = $_POST['text'];
    $title=$_POST['title'];
    $photo=$_FILES['photo']['tmp_name'];
    $photo=file_get_contents($photo);
    $session_data = $this->session->userdata('logged_in');
    $id = $session_data['id'];

    $this->add->addphoto($text,$title,$photo,$id);
    echo '{"msg":"dodano"}';
  }
}

?>
