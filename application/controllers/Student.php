<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller{
  
  public function index(){
    $this->load->database();
    $this->load->model('student_model');
    $this->load->view('student');
    
    $this->output->enable_profiler(TRUE);
  }
}
?>