<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('add','',TRUE);
  }

  function index(){
    $text = $_POST['text'];
    $title = $_POST['title'];
    $session_data = $this->session->userdata('logged_in');
    $id = $session_data['id'];

    $this -> add -> addpost($text, $title, $id);
    echo '{"msg":"dodano"}';
  }

  function addcomments(){
    $text = $_POST['text'];
    $id_post = $_POST['id_post'];
    $post = true;
    $session_data = $this->session->userdata('logged_in');
    $id = $session_data['id'];

    $result = $this -> add -> addcomments($text, $id_post, $id,$post);

    return '{"msg":"'.$result.'"}';
  }

}

?>
