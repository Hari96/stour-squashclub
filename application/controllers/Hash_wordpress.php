<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hash_wordpress extends CI_Controller {

  public function index() {
    require(APPPATH.'libraries/wordpress_hash.php');
    $wp_hasher = new PasswordHash(34, true);   // 34 digit hashing password
    $pass = $wp_hasher->HashPassword( trim( '12345678' ) ); //$posted['password'] is your password
    
  }
}
