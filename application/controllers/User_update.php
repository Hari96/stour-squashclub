<?php

class User_update extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('insert_model');
  }

  public function index() {
    //Validating First Name Field
    $this->form_validation->set_rules('inputFirstName','First Name','required|min_length[2]|max_length[30]');
    //Validating Last Name Field
    $this->form_validation->set_rules('inputLastName','Last Name','required|min_length[2]|max_length[30]');
    //Validating Email Field
    $this->form_validation->set_rules('inputEmail','Email','required|valid_email');
    if ($this->input->post['inputPassword'] != "") {
      //Validating Password Field
      $this->form_validation->set_rules('inputPassword','Password','required|min_length[8]|max_length[25]');
      //Validating confirmation Password Field
      $this->form_validation->set_rules('confirmPassword','Password confirmation','required|matches[inputPassword]');
    }
    //Validating Mobile Field
    $this->form_validation->set_rules('inputMobile','Mobile Number','regex_match[/^[0-9]{11}$/]');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header');
      $this->load->view('model_views/myaccount');
      $this->load->view('templates/footer');
    } else {
      $old_email = $this->session->userdata('email');//in case email is changed
      $user_id = $this->input->post('id');
      //checking for duplicate email
      $email = $this->input->post('inputEmail');
      if($this->users_model->check_other_emails($email, $user_id) == true) {
        $data['email_message'] = 'Email address already exists, please input a different address';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer', $data);
      } else  {
        //creating new password if necessary
        if ($this->input->post('inputPassword') != "") {
          //hashing password
          $password = $this->input->post('inputPassword');
          $salt = file_get_contents('http://rgbmarketing.co.uk/_private69/salt.txt');
          $password = hash_hmac('whirlpool',$password, $salt);
          //Setting values for table columns
          $data = array(
          'fname' => $this->input->post('inputFirstName'),
          'lName' => $this->input->post('inputLastName'),
          'email' => $email,
          'password' => $password,
          'mobile' => $this->input->post('inputMobile')
          );
          $this->insert_model->update_users($data, $user_id);
          if ($email != $old_email) {
            unset($_SESSION['email']);
            unset($_SESSION['logged_in']);
            unset($_SESSION['role']);
            $data['email_changed'] = "Since you have changed your email you will need to login again";
          }
          $data['password_changed'] = "Please login again using your new password";
          $data['id'] = $user_id;
          unset($_SESSION['email']);
          unset($_SESSION['logged_in']);
          unset($_SESSION['role']);
          //Loading Views
          $this->load->view('templates/header', $data);
          $this->load->view('pages/home', $data);
          $this->load->view('templates/footer', $data);
        } else {
          //Setting values for table columns
          $data = array(
          'fname' => $this->input->post('inputFirstName'),
          'lName' => $this->input->post('inputLastName'),
          'email' => $email,
          'mobile' => $this->input->post('inputMobile')
          );
          $this->insert_model->update_users($data, $user_id);
          if ($email != $old_email) {
            unset($_SESSION['email']);
            unset($_SESSION['logged_in']);
            unset($_SESSION['role']);
            $data['email_changed'] = "Since you have changed your email you will need to login again";
          }
          $data['success_message'] = 'Details updated';
          //Loading Views
          $this->load->view('templates/header', $data);
          $this->load->view('pages/home', $data);
          $this->load->view('templates/footer', $data);
        }
      }
    }
  }

  public function user_account() {
    $email = $this->session->userdata('email');
    $data['email'] = $email;
    $row = $this->users_model->getNamesFromEmail($email);
    $fName = $row->fName;
    $lName = $row->lName;
    $mobile = $row->mobile;
    $user_id = $row->id;
    $data['firstname'] = $fName;
    $data['lastname'] = $lName;
    $data['mobile'] = $mobile;
    $data['id'] = $user_id;
    $data['message'] = "To be completed";
    $this->load->view('templates/header', $data);
    $this->load->view('model_views/myaccount', $data);
    $this->load->view('templates/footer', $data);
  }

}
