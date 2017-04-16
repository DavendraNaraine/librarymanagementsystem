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
      return 'User added';
    }
  }
  
  function getUser($user_id){
    $active = 1; 
    
    $data = array(
      'user_id' => $user_id,
      'active' => $active
    );
    
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where($data);
    $query = $this->db->get();
    
    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'User does not exist';
    }
  }
  
  function listUsers(){
    $active = 1; 
    
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('active', $active);
    $query = $this->db->get();
    
    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'Error loading list';
    }
  }
  
  function updateUser($user_id, $payload){

  }
  
  function deleteUser($user_id){
    $data = array(
      'active' => 0
    );
    
    $this->db->where('user_id', $user_id);
    $this->db->update('users', $data);
    
    return $user_id;
  }
  
  function login(){
    
  }
  
  function logout(){
    
  }
}
?>