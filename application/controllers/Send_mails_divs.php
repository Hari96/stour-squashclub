<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Send_mails_divs extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function index() {
    $subject = $this->input->post('subject');
    $content = $this->input->post('content');
      $email_arr = array();
      $name_arr = array();
      $c = 0;
      $num = $this->input->post('num');
      for ($i = 1; $i <= $num; $i++) {
        if ($this->input->post('ch' . $i) == 'y') {
          $email_arr[$c] = $this->input->post('mail'.$i);
          $name_arr[$c] = $this->input->post('fn'.$i);
          $c++;
        }
      }
      for ($j = 0; $j < $c; $j++) {
        $message = "Hi ".$name_arr[$j]."\n\n";
        $message.= $content;
        mail($email_arr[$j], $subject, $message, "From: support@rgbmarketing.co.uk");
      }
      $data['mail_sent_message'] = "Mails have been sent";   
    //copy to admin
    $admin_email = "support@rgbmarketing.co.uk";
    $message = $content;
    $subject.= " - COPY TO ADMIN";
    mail($admin_email, $subject, $message, "From: Stour Squash Club admin");
    $this->load->view('templates/header', $data);
    $this->load->view('admin_views/admin_home', $data);
    $this->load->view('templates/footer', $data);
  }
}
