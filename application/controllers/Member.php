<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{
  
  public function index(){
    $this->load->database();
    $this->load->model('member_model');
    $this->load->view('member');
    
    $this->output->enable_profiler(TRUE);
  }
}
?>