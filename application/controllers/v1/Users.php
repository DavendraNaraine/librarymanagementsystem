<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
  
  public function get_user(){
    
  } 
  
  public function list_users(){
    $this->load->database();
    $this->load->model('users_model');
    $data['response'] = $this->users_model->viewUsers();
    
    $this->load->view('api/api_view', $data);
  }
  
  public function update_user(){
    
  }
  
  public function create_user(){
    $this->load->database();
    $this->load->model('users_model');
    $data['response'] = $this->users_model->addUser();
    
    $this->load->view('api/api_view', $data);
  }
  
  public function delete_user($user_id){
    $this->load->database();
    $this->load->model('users_model');
    $data['response'] = $this->users_model->deleteUser($user_id);
    
    $this->load->view('api/api_view', $data);
  }
}
?>