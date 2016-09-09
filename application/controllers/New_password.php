<?php

class New_password extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('users_model');
  }

  public function index() {
    echo "HELLO";
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
