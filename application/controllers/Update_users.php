<?php
  class Update_users extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
    }

    public function index() {
      $user_id = $this->input->post('id');
      //Validating First Name Field
      $this->form_validation->set_rules('inputFirstName','First Name','required|min_length[2]|max_length[30]');
      //Validating Last Name Field
      $this->form_validation->set_rules('inputLastName','Last Name','required|min_length[2]|max_length[30]');
      //Validating Email Field
      $this->form_validation->set_rules('inputEmail','Email','required|valid_email');
      //Validating Password Field
      $this->form_validation->set_rules('inputPassword','Password','required|min_length[8]|max_length[25]');
      //Validating Password Field
      $this->form_validation->set_rules('confirmPassword','Password confirmation','required|matches[inputPassword]');
      //Validating Mobile Field
      $this->form_validation->set_rules('inputMobile','Mobile Number','regex_match[/^[0-9]{11}$/]');
      //Validating Landline Field
      $this->form_validation->set_rules('inputLandline','Landline Number','regex_match[/^[0-9]{11}$/]');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('admin_views/user_details');
        $this->load->view('templates/footer');
      } else {

      }


    }


  }
