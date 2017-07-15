<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Player_preferences extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('insert_model');
  }

  public function index() {
    $this->load->view('templates/header');
    $this->load->view('model_views/create_preferences');
    $this->load->view('templates/footer');
  }
}
