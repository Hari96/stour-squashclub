<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Captcha_Controller extends CI_Controller {

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
              //Check email exists in system
              $email = $this->input->post('inputEmail');
              if($this->users_model->check_for_email($email) == FALSE) {
                $data['no_email_message'] = "That email address is not in the system";
                  $this->load->view('templates/header', $data);
                  $this->load->view('model_views/forgot_password', $data);
                  $this->load->view('templates/footer', $data);
                }
                $this->captcha_setting();
                $code = $this->users_model->get_id_from_email($email);
                $message = "Enter a new password by going to: http://www.stoursquashclub.co.uk/new_password/view?code=" . $code;
                mail($email, "Enter a new password for Stour Squash Club", $message, "From: noreply@stoursquashclub.co.uk\n");
                 } else {
                   echo "<script type='text/javascript'> alert('Try Again'); </script>";
                     $this->captcha_setting();
            }
          }
        }

    // This function generates CAPTCHA image and stores in "image folder".
    public function captcha_setting() {
      $values = array(
      'word' => '',
      'word_length' => 6,
      'img_path' => './images/',
      'img_url' =>  base_url() .'images/',
      'font_path'  => base_url() . 'system/fonts/texb.ttf',
      'img_width' => '150',
      'img_height' => 50,
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
      $this->load->view('model_views/forgot_password', $data);
      $this->load->view('templates/footer', $data);
    }

    // For new image on click refresh button.
    public function captcha_refresh() {
      $values = array(
        'word' => '',
        'word_length' => 6,
        'img_path' => './images/',
        'img_url' =>  base_url() .'images/',
        'font_path'  => base_url() . 'system/fonts/texb.ttf',
        'img_width' => '150',
        'img_height' => 50,
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
