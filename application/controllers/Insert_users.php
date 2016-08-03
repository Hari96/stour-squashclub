<?php
  class Insert_users extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
    }

    public function index() {
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
        $this->load->view('model_views/register');
        $this->load->view('templates/footer');
      } else {
        //hashing password
        $password = $this->input->post('inputPassword');
        $salt = file_get_contents('http://rgbmarketing.co.uk/_private69/salt.txt');
        $password = hash_hmac('whirlpool',$password, $salt);

        //Setting values for table columns
        $data = array(
        'fname' => $this->input->post('inputFirstName'),
        'lName' => $this->input->post('inputLastName'),
        'email' => $this->input->post('inputEmail'),
        'password' => $password,
        'mobile' => $this->input->post('inputMobile'),
        'landline' => $this->input->post('inputLandline'),
        'age' => $this->input->post('age'),
        'standard' => $this->input->post('standard')
        );
        //Transfering data to Model
        $this->insert_model->form_insert($data);
        $data['message'] = 'Data Inserted Successfully';
        //Loading View
        $this->load->view('templates/header', $data);
        $this->load->view('model_views/register', $data);
        $this->load->view('templates/footer', $data);
      }


    }


  }
