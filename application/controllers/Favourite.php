<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favourite extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('nav','',TRUE);
    $this->load->model('add','',TRUE);
  }

  function index(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');
      $id = $session_data['id'];
      $result =  $this->nav->favourite($id);
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
            'fav' => $result['fav'],
          );
          $this->load->view('favourite_view', $data);
        }
        return TRUE;
      }else{
        $data['error']=true;
        $this->load->view('favourite_view', $data);
        return false;
      }
    }else{
      //If no session, redirect to login page
      redirect('login', 'refresh');
	   }
  }

  function liked(){
    $session_data = $this->session->userdata('logged_in');
    $id = $session_data['id'];
    $nick = $_POST['nick'];
    $result =  $this->add->liked($nick, $id);

    if($result){
      $data= ['msg'=>"polubiono"];
    }else{
      $data =['msg'=>"już polubiłeś ten profil"];
    }
    echo json_encode( $data );
  }

}

?>
