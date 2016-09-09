<?php

class Lost_password extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper('url_helper');
  }

  function view($page = 'forgot_password') {
    if (!file_exists(APPPATH.'views/model_views/'.$page.'.php')) {
      // whoops don't have a page for that!
      show_404();
    }
    $this->load->view('templates/header');
    $this->load->view('model_views/'.$page);
    $this->load->view('templates/footer');

  }
}
