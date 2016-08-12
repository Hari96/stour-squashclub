<?php
  class Update_users extends CI_Controller {

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
      //Validating Email Field
      $this->form_validation->set_rules('email','Email','required|valid_email');
      //Validating Mobile Field
      $this->form_validation->set_rules('mobile','Mobile Number','regex_match[/^[0-9]{11}$/]');
      //Validating Landline Field
      $this->form_validation->set_rules('landline','Landline Number','regex_match[/^[0-9]{11}$/]');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('admin_views/user_update');
        $this->load->view('templates/footer');
      } else {
        //checking for duplicate email
        $email = $this->input->post('email');
        //echo $email . "<br>" . $user_id;
       if($this->users_model->check_other_emails($email, $user_id) == true) {
         $data['email_message'] = 'Email address already exists, please try a different address';
         $this->load->view('templates/header', $data);
         $this->load->view('admin_views/admin_home', $data);
         $this->load->view('templates/footer', $data);
        } else {
          //Setting values for table columns
          $data = array(
          'fname' => $this->input->post('firstName'),
          'lName' => $this->input->post('lastName'),
          'email' => $email,
          'mobile' => $this->input->post('mobile'),
          'landline' => $this->input->post('landline'),
          'age' => $this->input->post('age'),
          'standard' => $this->input->post('standard')
          );
          //Transfering data to Model
          $this->insert_model->update_users($data, $user_id);
          $data['message'] = 'Record Updated Successfully';
          //Loading View
          $this->load->view('templates/header', $data);
          $this->load->view('admin_views/admin_home', $data);
          $this->load->view('templates/footer', $data);

        }// end of second else

      }// end of first else


    }
  }
