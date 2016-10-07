<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

  class Delete_users extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('users_model');
    }

    public function index() {
      $user_id = $this->input->get('user_id');
      $this->users_model->delete_user($user_id);
      $data['delete_message'] = "The player has been successfully deleted";
      $this->load->view('templates/header', $data);
      $this->load->view('admin_views/admin_home', $data);
      $this->load->view('templates/footer', $data);
    }
  }
