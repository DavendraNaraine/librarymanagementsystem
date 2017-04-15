<?php

class Users_model extends CI_Model{
  
  function __construct(){
    parent::__construct();
  } 
  
  function addUser(){
    $data = array(
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'first_name' => $this->input->post('firstname'),
      'last_name' => $this->input->post('lastname'),
      'student_usi' => $this->input->post('student_usi'),
      'role' => $this->input->post('role')
    );
    
    $this->db->select('username');
    $this->db->from('users');
    $this->db->where('username', $data['username']);  
    $query = $this->db->get();
    
    if($query->num_rows() > 0){
      return 'Username exists';
    }
    else{
      $this->db->insert('users', $data);
    }
  }
  
  function viewUser(){
    
  }
  
  function updateUser(){
    
  }
  
  function deleteUser(){
    
  }
  
  function login(){
    
  }
  
  function logout(){
    
  }
}
?>