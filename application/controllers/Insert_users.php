<?php
  class Insert_users extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
      $this->load->model('users_model');
    }

    public function index() {
      $email = $this->input->post('inputEmail');
      if(isset($_SESSION['mail'])) {
        if ($_SESSION['mail'] == $email) {
          $data['announcements'] = $this->users_model->get_announcements();
          $this->load->view('templates/header', $data);
          $this->load->view('pages/home', $data);
          $this->load->view('templates/footer', $data);
        }
      }
      //Validating First Name Field
      $this->form_validation->set_rules('inputFirstName','First Name','required|min_length[2]|max_length[30]');
      //Validating Last Name Field
      $this->form_validation->set_rules('inputLastName','Last Name','required|min_length[2]|max_length[30]');
      //Validating Email Field
      $this->form_validation->set_rules('inputEmail','Email','required|valid_email');
      //Validating Password Field
      $this->form_validation->set_rules('inputPassword','Password','required|min_length[8]|max_length[25]');
      //Validating confirmation Password Field
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
          $data['email_message'] = 'Email address already exists, login with that address, or input a different address';
          $this->load->view('templates/header', $data);
          $this->load->view('model_views/register', $data);
          $this->load->view('templates/footer', $data);
        } else {
          $reg_data = array(
            'mail' => $email
          );
          $this->session->set_userdata($reg_data);
        //hashing password
        $password = $this->input->post('inputPassword');
        $wordpress_pass = $password;
        $salt = file_get_contents('http://www.rgbmarketing.co.uk/_private69/salt.txt');
        $password = hash_hmac('whirlpool',$password, $salt);
        // Checks to see if player wishes to play in league
        $league_player = false;
        if ( isset($_POST['league_player']) ) {
          if ($this->input->post('league_player') == "league") {
            $league_player = "true";
          }
        }
        //Setting values for table columns
        $fName = $this->input->post('inputFirstName');
        $fName = ucfirst(strtolower($fName));
        $lName = $this->input->post('inputLastName');
        $lName = ucfirst(strtolower($lName));
        $name = $fName . " " . $lName;
        $date = date('Y-m-d');
        $data = array(
        'fname' => $fName,
        'lName' => $lName,
        'email' => $email,
        'password' => $password,
        'mobile' => $this->input->post('inputMobile'),
        'landline' => $this->input->post('inputLandline'),
        'age' => $this->input->post('age'),
        'standard' => $this->input->post('standard'),
        'SignUpDate' => $date
        );
        //Transfering data to Model
        $this->insert_model->form_insert($data);
        //Inserting user into wordpress forum
        require(APPPATH.'libraries/wordpress_hash.php');
        $wp_hasher = new PasswordHash(34, true);   // 34 digit hashing password
        $pass = $wp_hasher->HashPassword(trim($wordpress_pass));
        $date = date('Y-m-d\TH:i:sO');
        $data = array(
          'user_login' => $name,
          'user_pass' => $pass,
          'user_nicename' => $name,
          'display_name' => $name,
          'user_email' => $email,
          'user_registered' => $date
        );
        $this->insert_model->wordpress_insert($data, $email);
        $data['reg_message'] = "Registration successful, you will receive an activation email soon.\nNote: You may need to look in your junk folder!";
        $code = uniqid('', true);
        $data_code = array(
          'activation_code' => $code,
          'user_id' => $this->insert_model->get_user_id()
        );
        $this->insert_model->code_insert($data_code);
        $message = "Activate your account with us by going to: http://www.stoursquashclub.co.uk/insert_users/complete_registration?activate_code=" . $code . "&league_player=" . $league_player;
		    mail($email, "Activate your account today!", $message, "From: noreply@stoursquashclub.co.uk\n");
        //unset($_SESSION['reg']);
        //Loading View
        $data['announcements'] = $this->users_model->get_announcements();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
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
        $user_id = $this->users_model->get_id_from_code($code);
        $name = $this->users_model->get_name_from_id($user_id);
        $league_player = $this->input->get('league_player');//true or false
        $this->insert_model->activation_insert($user_id, $league_player);//initiates leagues (maybe not necessary?) and intiates profile
        //Informing admin of new registration
        if ($league_player == true) {
          $pl_message = "does wish to play in the league";
        } else {
          $pl_message = "Does NOT wish to play in the league";
        }
        $email = "support@rgbmarketing.co.uk";// admin email (replace as necessary)
        $message = "A new player has just signed up, the name is: " . $name . ", who " . $pl_message;
        mail($email, "New player registration", $message, "From: noreply@stoursquashclub.co.uk\n");
        $data['activation_message'] = "You are now activated and can login";
        $this->load->view('templates/header', $data);
        $this->load->view('model_views/login', $data);
        $this->load->view('templates/footer', $data);
      }

    }



  }//end of class
