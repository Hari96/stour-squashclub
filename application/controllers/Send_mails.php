<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Send_mails extends CI_Controller {

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
        $name_arr[$c] = $this->input->post('fn'.$i) . " " . $this->input->post('ln'.$i);
        $c++;
      }
    }
    $subject.= " - from Stour Squash Club";
    for ($j = 0; $j < $c; $j++) {
      $message = "Hi ".$name_arr[$j].", a message from Squash Club Admin:\n\n";
      $message.= $content;
      mail($email_arr[$j], $subject, $message, "From: support@rgbmarketing.co.uk");
    }
    $data['mail_sent_message'] = "Mail has been sent";
    $this->load->view('templates/header', $data);
    $this->load->view('admin_views/admin_home', $data);
    $this->load->view('templates/footer', $data);
  }
}
