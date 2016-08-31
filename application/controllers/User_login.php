<?php

class User_login extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function index() {
    //Validating Email Field
    $this->form_validation->set_rules('inputEmail','Email','required|valid_email');
    //Validating Password Field
    $this->form_validation->set_rules('inputPassword','Password','required|min_length[8]|max_length[25]');
    //Validating Password Field
    $this->form_validation->set_rules('confirmPassword','Password confirmation','required|matches[inputPassword]');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header');
      $this->load->view('model_views/login');
      $this->load->view('templates/footer');
    } else {
      //checking for existence of email
      $email = $this->input->post('inputEmail');
      if($this->users_model->check_for_email($email) == TRUE) {
        // check password is correct for this user
        $password = $this->input->post('inputPassword');
        $salt = file_get_contents('http://rgbmarketing.co.uk/_private69/salt.txt');
        $password = hash_hmac('whirlpool', $password, $salt);
        if($this->users_model->check_password($email, $password) == FALSE) {
          $data['wrong_password_message'] = "The password is incorrect, please try again";
          $this->load->view('templates/header', $data);
          $this->load->view('model_views/login', $data);
          $this->load->view('templates/footer', $data);
        } else {
          //successful login
          $user_data = array(
            'email'     => $email,
            'logged_in' => TRUE
          );
          $this->session->set_userdata($user_data);
          if($this->users_model->get_role($email) == TRUE) {
            //admin user
            $admin_data = array(
              'email' => $email,
              'role' => 1,
              'logged_in' => TRUE
            );
            $this->session->set_userdata($admin_data);
          } else {
            unset($_SESSION['role']);
          }
          $this->load->view('templates/header');
          $this->load->view('pages/home');
          $this->load->view('templates/footer');
        }
      } else {
        $data['no_email_message'] = "No user with that email address exists";
          $this->load->view('templates/header', $data);
          $this->load->view('model_views/login', $data);
          $this->load->view('templates/footer', $data);
      }
    }
  }
  public function user_logout() {
    unset($_SESSION['email']);
    unset($_SESSION['logged_in']);
    unset($_SESSION['role']);
    $this->load->view('templates/header');
    $this->load->view('pages/home');
    $this->load->view('templates/footer');
  }

}
