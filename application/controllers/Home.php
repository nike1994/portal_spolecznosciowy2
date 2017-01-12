<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('nav','',TRUE);
  }

  function index(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');
      $id = $session_data['id'];
      $result =  $this->nav->home($id);
      if($result){
        $data = array();
        foreach($result['users'] as $row){
          $data = array(
            'id'=> $row->id,
            'username' => $row->username,
            'profile' => $row->profile,
            'f_name' => $row->f_name,
            'l_name' => $row->l_name,
            'date_b' => $row->date_b,
            'background' => $row->background,
            'about' => $row->about,
            'posts' => $result['posts'],
            'str' => 'home'
          );
          $this->load->view('home_view', $data);
        }
        return TRUE;
      }else{
        $data['error']=true;
        $this->load->view('home_view', $data);
        return false;
      }
    }else{
      //If no session, redirect to login page
      redirect('login', 'refresh');
	   }
  }

  function logout()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('home', 'refresh');
  }

  function comments(){
    $id= $_POST['id'];
    $result = $this -> nav -> comments($id);

    if($result){
      $data='{';
      $i=0;
      foreach ($result as $row) {
        if($i==0){
            $data=$data.'"'.$i.'":{"date": "'.$row -> date.'",  "text": "'.$row -> text.'", "id_author": "'.$row -> id_author.'", "photo_author": "'. base64_encode($row -> photo_author).'",  "nick_author": "'.$row -> nick_author.'",  "name_author": "'.$row -> name_author.'"}';
        }else{
            $data=$data.', "'.$i.'":{"date": "'.$row -> date.'",  "text": "'.$row -> text.'", "id_author": "'.$row -> id_author.'", "photo_author": "'. base64_encode($row -> photo_author).'",  "nick_author": "'.$row -> nick_author.'",  "name_author": "'.$row -> name_author.'"}';
        }

          $i = $i+1;
      }
      $data=$data."}";
    }else{
      $data = '{"error":"error"}';
    }
    echo $data;
  }

  function profile($user){
    if($this->session->userdata('logged_in')){
      $result =  $this->nav->profile($user);
      if($result){
        $data = array();
        foreach($result['users'] as $row){
          $data = array(
            'id'=> $row->id,
            'username' => $row->username,
            'profile' => $row->profile,
            'f_name' => $row->f_name,
            'l_name' => $row->l_name,
            'date_b' => $row->date_b,
            'background' => $row->background,
            'about' => $row->about,
            'posts' => $result['posts'],
            'str' => 'fav'
          );
          $this->load->view('home_view', $data);
        }
        return TRUE;
      }else{
        $data['error']=true;
        $this->load->view('home_view', $data);
        return false;
      }
    }else{
      //If no session, redirect to login page
      redirect('login', 'refresh');
     }
  }

}

?>
