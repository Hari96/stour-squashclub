<?php
//if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

  function __construct() {
    parent::__construct();
   $this->load->model('users_model');
  }

  public function view($page = 'home') {
    if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
      // whoops don't have a page for that!
      show_404();
    }

    $data['title'] = ucfirst($page); // Capitalize the first letter
    $data['announcements'] = $this->users_model->get_announcements();
    $this->load->view('templates/header', $data);
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer', $data);
  }

  public function home_view() {
    $data['announcements'] = $this->users_model->get_announcements();

    $this->load->view('templates/header', $data);
    $this->load->view('pages/home', $data);
    $this->load->view('templates/footer', $data);
  }
}
