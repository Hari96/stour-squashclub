<?php

class New_password extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('users_model');
    $this->load->model('insert_model');
  }

  public function index() {
    $user_id = $this->input->post('id');
    $data['user_id'] = $user_id;
    //Validating Password Field
    $this->form_validation->set_rules('inputPassword','Password','required|min_length[8]|max_length[25]');
    //Validating Confirm Password Field
    $this->form_validation->set_rules('confirmPassword','Password confirmation','required|matches[inputPassword]');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('model_views/create_password', $data);
      $this->load->view('templates/footer', $data);
    }
    $password = $this->input->post('inputPassword');
    $salt = file_get_contents('http://rgbmarketing.co.uk/_private69/salt.txt');
    $password = hash_hmac('whirlpool',$password, $salt);
    $newdata = array(
      'password' => $password
    );
    $this->insert_model->update_users($newdata, $user_id);
    $data['changed_password'] = "New password created, you can now login";
    $this->load->view('templates/header', $data);
    $this->load->view('model_views/login', $data);
    $this->load->view('templates/footer', $data);
  }

  public function view($page = 'create_password') {
    if (!file_exists(APPPATH.'views/model_views/'.$page.'.php')) {
      // whoops don't have a page for that!
      show_404();
    }
    $code = $this->input->get('code');
    $code = trim($code);
    $code = stripslashes($code);
    $code = htmlspecialchars($code);
    if(empty($code)) {
      echo 'faulty';//message to produce goes to activate view?
    } else {
      $data['user_id'] = $code;
      $this->load->view('templates/header', $data);
      $this->load->view('model_views/create_password', $data);
      $this->load->view('templates/footer', $data);
    }
  }
}
