<?php
  class Remove_login extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
    }

    public function index() {
      $user_id = $this->input->get('user_id');
      $this->insert_model->unactivate_user($user_id);
      $data['remove_login_message'] = "The player's login has been removed";
      $this->load->view('templates/header', $data);
      $this->load->view('admin_views/admin_home', $data);
      $this->load->view('templates/footer', $data);
    }
  }
