<?php
  class Update_users2 extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
      $this->load->model('users_model');
    }

    public function index() {
      $user_id = $this->input->post('user_id');
      //Validating First Name Field
      $this->form_validation->set_rules('firstName','First Name','required|min_length[2]|max_length[30]');
      //Validating Last Name Field
      $this->form_validation->set_rules('lastName','Last Name','required|min_length[2]|max_length[30]');
      //Validating Landline Field
      $this->form_validation->set_rules('landline','Landline Number','regex_match[/^[0-9]{11}$/]');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('admin_views/user_update2');
        $this->load->view('templates/footer');
      } else {
          //Setting values for table columns
          if ($this->input->post('activated') == "Yes") {
            $active = 1;
            if ($this->users_model->check_id_in_profiles($user_id) == false) {
              $this->insert_model->insert_id_in_profiles($user_id);
            }
          } else {
            $active = 0;
          }
          $user_data = array(
          'fname' => $this->input->post('firstName'),
          'lName' => $this->input->post('lastName'),
          'landline' => $this->input->post('landline'),
          'age' => $this->input->post('age'),
          'standard' => $this->input->post('standard'),
          'active' => $active,
          'activated' => 1
          );
          $profile_data = array(
            'active' => $active
          );
          $this->insert_model->activate_profile($profile_data, $user_id);
          $this->insert_model->update_users($user_data, $user_id);
          $data['update2_message'] = 'Record Updated Successfully';
          //Loading View
          $this->load->view('templates/header', $data);
          $this->load->view('admin_views/admin_home', $data);
          $this->load->view('templates/footer', $data);

      }// end of else
    }
  }
