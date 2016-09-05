<?php

class Lost_password extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function index() {

    $verif_box = $this->input->post('verif_box');
    $email = $this->input->post('inputEmail');
    if($this->users_model->check_for_email($email) == FALSE) {
      $data['no_email_message'] = "That email address is not in the system";
        $this->load->view('templates/header', $data);
        $this->load->view('model_views/forgot_password', $data);
        $this->load->view('templates/footer', $data);
    }  else if(md5($verif_box).'a4xn' == $_COOKIE['tntcon']){
      $message = "Enter a new password by going to: http://www.stoursquashclub.co.uk/";
      mail($email, "Enter a new password for Stour Squash Club", $message, "From: noreply@stoursquashclub.co.uk\n");
      setcookie('tntcon','');
    }
  }


}
