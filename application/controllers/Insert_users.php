<?php
  class Insert_users extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
      $this->load->model('users_model');
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
        //checking for duplicate email
        $email = $this->input->post('inputEmail');
        if($this->users_model->check_for_email($email) == true) {
          $data['email_message'] = 'Email address already exists, please input a different address';
          $this->load->view('templates/header', $data);
          $this->load->view('model_views/register', $data);
          $this->load->view('templates/footer', $data);
        } else {
        //hashing password
        $password = $this->input->post('inputPassword');
        $salt = file_get_contents('http://rgbmarketing.co.uk/_private69/salt.txt');
        $password = hash_hmac('whirlpool',$password, $salt);

        //Setting values for table columns
        $data = array(
        'fname' => $this->input->post('inputFirstName'),
        'lName' => $this->input->post('inputLastName'),
        'email' => $email,
        'password' => $password,
        'mobile' => $this->input->post('inputMobile'),
        'landline' => $this->input->post('inputLandline'),
        'age' => $this->input->post('age'),
        'standard' => $this->input->post('standard')
        );
        //Transfering data to Model
        $this->insert_model->form_insert($data);
        $data['message'] = 'Data Inserted Successfully';
        $code = uniqid('', true);
        $data_code = array(
          'activation_code' => $code,
          'user_id' => $this->insert_model->get_user_id()
        );
        $this->insert_model->code_insert($data_code);
        $message = "Activate your account with us by going to: http://www.stoursquashclub.co.uk/insert_users/complete_registration?activate_code=" . $code;
		    mail($email, "Activate your account today!", $message, "From: noreply@stoursquashclub.co.uk\n");
        //Loading View
        $this->load->view('templates/header', $data);
        $this->load->view('model_views/register', $data);
        $this->load->view('templates/footer', $data);
        }//end of second else
      }//end of first else

    }// end of index function

    public function complete_registration() {
      $code = $this->input->get('activate_code');
      $code = trim($code);
      $code = stripslashes($code);
      $code = htmlspecialchars($code);
      if(empty($code)) {
  		  echo 'faulty';//message to produce goes to activate view?
  	  } else {
        $user_id = $this->insert_model->get_id_from_code($code);
        $this->insert_model->activation_insert($user_id);
        $data['activation_message'] = "You are now activated and can login";
        $this->load->view('templates/header', $data);
        $this->load->view('model_views/login', $data);
        $this->load->view('templates/footer', $data);
      }

    }



  }//end of class
