<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Captcha_contact extends CI_Controller {

  // Load Helper in and Start session.
  function __construct() {
    parent::__construct();
    $this->load->helper('captcha');
    $this->load->model('users_model');
    //session_start();
  }

  // This function show values in view page and check capcha value.
  public function form() {
      if(empty($_POST)){
         $this->captcha_setting();
      } else {
        // Case comparing values.
        if (strcasecmp($_SESSION['captchaWord'], $_POST['captcha']) == 0) {
          $this->form_validation->set_rules('inputEmail','Email','required|valid_email');
          if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('pages/home');
            $this->load->view('templates/footer');
          } else {
          $to = "support@rgbmarketing.co.uk";//admin email address
          $name = $this->input->post('inputName');
          $email = $this->input->post('inputEmail');
          $message = $this->input->post('inputText');
          $message .= "\nSender's email: " . $email;
          mail($to, "Message from " . $name, $message, "From: noreply@stoursquashclub.co.uk\n");
          $data['message_sent'] = "Your message has been sent";
          $this->load->view('templates/header', $data);
          $this->load->view('pages/home', $data);
          $this->load->view('templates/footer', $data);
        }
      } else {
        echo "<script type='text/javascript'> alert('Try Again'); </script>";
        $em_data['wrong'] = "Wrong letters - try again";
        $this->captcha_setting();
      }
    }
  }

  // This function generates CAPTCHA image and stores in "image folder".
  public function captcha_setting() {
    $values = array(
      'word' => '',
      'word_length' => 5,
      'img_path' => './images/',
      'img_url' =>  base_url() .'images/',
      'font_path'  => base_url() . 'system/fonts/texb.ttf',
      'img_width' => 150,
      'img_height' => 40,
      'expiration' => 3600,
      'pool' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
      'colors' => array(
        'background' => array(255, 255, 255),
        'border' => array(0, 0, 0),
        'text' => array(0, 0, 0),
        'grid' => array(255, 40, 40)
      )
    );
    $data = create_captcha($values);
    $_SESSION['captchaWord'] = $data['word'];
    // image will store in "$data['image']" index and its send on view page
    $this->load->view('templates/header', $data);
    $this->load->view('pages/contact', $data);
    $this->load->view('templates/footer', $data);
  }

  // For new image on click refresh button.
  public function captcha_refresh() {
    $values = array(
      'word' => '',
      'word_length' => 5,
      'img_path' => './images/',
      'img_url' =>  base_url() .'images/',
      'font_path'  => base_url() . 'system/fonts/texb.ttf',
      'img_width' => 150,
      'img_height' => 40,
      'expiration' => 3600,
      'pool' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
      'colors' => array(
        'background' => array(255, 255, 255),
        'border' => array(0, 0, 0),
        'text' => array(0, 0, 0),
        'grid' => array(255, 40, 40)
      )
  );
          $data = create_captcha($values);
                $_SESSION['captchaWord'] = $data['word'];
         echo $data['image'];

     }
  }
