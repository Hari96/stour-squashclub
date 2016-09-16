<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Captcha_results extends CI_Controller {

  // Load Helper in and Start session.
  function __construct() {
    parent::__construct();
    $this->load->helper('captcha');
    $this->load->model('users_model');
    //session_start();
  }

  public function form() {
      if(empty($_POST)){
         $this->captcha_setting();
      } else {
        if (strcasecmp($_SESSION['captchaWord'], $_POST['captcha']) == 0) {

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
    $email = $_SESSION['email'];
    $div = $this->users_model->get_div_for_player($email);
    $table_data['players'] = $this->users_model->find_players_in_div($div);
    $data = create_captcha($values);
    $_SESSION['captchaWord'] = $data['word'];
    // image will store in "$data['image']" index and its send on view page
    $this->load->view('templates/header', $data);
    $this->load->view('templates/results_form_table', $table_data);
    $this->load->view('pages/results_form', $data);
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
