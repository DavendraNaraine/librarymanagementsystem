<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
  
  public function get_user(){
    echo "get di user";
    //$this->output->enable_profiler(TRUE);
  } 
  
  public function list_users(){
    echo "list di user";
    //$this->output->enable_profiler(TRUE);
  }
  
  public function update_user(){
    echo "update di user";
    //$this->output->enable_profiler(TRUE);
  }
  
  public function create_user(){
    $this->load->database();
    $this->load->model('users_model');
    $data['response'] = $this->users_model->addUser();
    
    $this->load->view('api/api_view', $data);
  }
  
  public function delete_user(){
    echo "delete di user";
    //$this->output->enable_profiler(TRUE);
  }
}
?>