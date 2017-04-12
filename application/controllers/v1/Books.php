<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller{
  
  public function get_book(){
    echo "get di book";
    //$this->output->enable_profiler(TRUE);
  } 
  
  public function list_books(){
    echo "list di book";
    //$this->output->enable_profiler(TRUE);
  }
  
  public function update_book(){
    echo "update di book";
    //$this->output->enable_profiler(TRUE);
  }
  
  public function create_book(){
    echo "create di book";
    //$this->output->enable_profiler(TRUE);
  }
  
  public function delete_book(){
    echo "delete di book";
    //$this->output->enable_profiler(TRUE);
  } 
}
?>