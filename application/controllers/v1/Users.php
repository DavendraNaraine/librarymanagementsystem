<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
  
  public function get_user($user_id){
    $this->load->database();
    $this->load->model('users_model');
    $data['response'] = $this->users_model->getUser($user_id);
    
    $this->load->view('api/api_view', $data);
  } 
  
  public function list_users(){
    $this->load->database();
    $this->load->model('users_model');
    $data['response'] = $this->users_model->listUsers();
    
    $this->load->view('api/api_view', $data);
  }
  
  public function searchUserBy(){
    $this->load->database();
    $this->load->model('users_model');
    $data['response'] = $this->users_model->searchUser();
    
    $this->load->view('api/api_view', $data);
  }
  
  public function update_user($user_id){
    $this->load->database();
    $this->load->model('users_model');
    $data['response'] = $this->users_model->updateUser($user_id);
    
    $this->load->view('api/api_view', $data);
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
  
  public function login(){
    $this->load->database();
    $this->load->model('users_model');
    $data['response'] = $this->users_model->loginUser();
    
    $this->load->view('api/api_view', $data);
  }
  
  public function logout(){
    $this->load->database();
    $this->load->model('users_model');
    $data['response'] = $this->users_model->logoutUser();
    
    $this->load->view('api/api_view', $data);
  }
}
?>