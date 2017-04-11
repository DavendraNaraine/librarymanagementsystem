<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller{
  
  public function index(){
    $this->load->database();
    $this->load->model('book_model');
    $this->load->view('main/header');
    $this->load->view('main/book');
    $this->load->view('main/footer');
    
    $this->output->enable_profiler(TRUE);
  }
}
?>