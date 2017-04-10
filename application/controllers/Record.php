<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record extends CI_Controller{
  
  public function index(){
    $this->load->database();
    $this->load->model('record_model');
    $this->load->view('record');
    
    $this->output->enable_profiler(TRUE);
  }
}
?>