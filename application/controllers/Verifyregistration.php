<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyRegistration extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user','',TRUE);
    error_reporting(0);
  }

  function index()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('password', 'Hasło', 'trim|required');
    $this->form_validation->set_rules('username', 'Nazwa użytkownika', 'trim|required|callback_check_database');
    $this->form_validation->set_rules('f_name', 'Imie', 'trim|required');
    $this->form_validation->set_rules('l_name', 'Nazwisko', 'trim|required');
    $this->form_validation->set_rules('date', 'Data', 'trim|required');
    $this->form_validation->set_rules('about', 'O sobie', 'trim|required');
    $this->form_validation->set_rules('profile','Zdjecie profilowe','callback_profile_validation');
    $this->form_validation->set_rules('background','Zdjęcie na tło','callback_background_validation');


    if($this->form_validation->run() == FALSE)
    {
      $this->load->view('registration_view');
    }
    else
    {
      $this->user->registration(md5($_POST['password']),$_POST['f_name'],$_POST['l_name'],$_POST['date'],$_POST['about'],$_POST['username'],
                                file_get_contents($_FILES['profile']['tmp_name']), file_get_contents($_FILES['background']['tmp_name']));
      redirect('login', 'refresh');
    }

  }

  function profile_validation($file){
    if(!file_exists($_FILES['profile']['tmp_name']) || !is_uploaded_file($_FILES['profile']['tmp_name'])){
      $this->form_validation->set_message('profile_validation', " brak zdjęcia profilowego");
      return false;
    }else{
      $typ = $_FILES['profile']['type'];

      if($typ == 'image/jpg'||$typ == 'image/jpeg'|| $typ == 'image/png' || $typ =='image/gif'){
        return true;
      }else{
        $this->form_validation->set_message('profile_validation', " zły typ zdjęcia profilowego = ".$typ);
        return false;
      }
    }
  }

  function background_validation($file){

    if(!file_exists($_FILES['background']['tmp_name']) || !is_uploaded_file($_FILES['background']['tmp_name'])){
      $this->form_validation->set_message('background_validation', " brak zdjęcia na tło");
      return false;
    }else{
      $typ = $_FILES['background']['type'];

      if($typ == 'image/jpg'||$typ == 'image/jpeg'|| $typ == 'image/png' || $typ =='image/gif'){
        return true;
      }else{
        $this->form_validation->set_message('background_validation', " zły typ zdjęcia profilowego = ".$typ);
        return false;
      }
    }

  }

  function check_database($username)
  {

    $result = $this->user->isuser($username);

    if($result)
    {
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Taki użytkownik już istnieje w naszej bazie danych');
      return false;
    }
  }
}
?>
