<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Return extends CI_Controller{
  
  public function index(){
    $this->load->database();
    $this->load->model('returns_model');
    $this->load->view('main/header');
    $this->load->view('main/navbar');
    $this->load->view('main/return');
    $this->load->view('main/footer');
    
    //$this->output->enable_profiler(TRUE);
  }
}
?>