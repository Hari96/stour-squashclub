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
        echo "Hello";
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
    $this->load->view('pages/results_form', $data);
    $this->load->view('templates/footer', $data);
  }
}
