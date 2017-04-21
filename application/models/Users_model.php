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
    
    $this->db->select('*');//May need to change from all
    $this->db->from('users');
    $this->db->where($data);
    $query = $this->db->get();
    
    if($query->num_rows() == 1){
      return $query->result();
    }
    else{
      return 'User does not exist';
    }
  }
  
  function listUsers(){
    $active = 1; 
    
    $this->db->select('*');//May need to change from all
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
  
  function searchUser(){
    $username = null;
    $firstname = null;
    $lastname = null;
    $student_usi = null;
    $active = 1; 
    
    $username = $this->input->post('username');
    $firstname = $this->input->post('firstname');
    $lastname = $this->input->post('lastname');
    $student_usi = $this->input->post('student_usi');
    
    $this->db->select('*');//May need to change from all
    $this->db->from('users');
    
    if($username != null){
      $this->db->where('username', $username);
      $this->db->where('active', $active);
    }
    elseif($firstname != null){
      $this->db->where('first_name', $firstname);
      $this->db->where('active', $active);
    }
    elseif($lastname != null){
      $this->db->where('last_name', $lastname);
      $this->db->where('active', $active);
    }
    else{
      $this->db->where('student_usi', $student_usi);
      $this->db->where('active', $active);
    }
    
    $query = $this->db->get();
    
    if($query->num_rows() > 0){
      return $query->result();
    }
    else{
      return 'User not found';
    }
  }
  
  function updateUser($user_id){
    
    $update = array (
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'first_name' => $this->input->post('firstname'),
      'last_name' => $this->input->post('lastname'),
      'student_usi' => $this->input->post('student_usi'),
      'role' => $this->input->post('role')
    );
    
    $data = array(
     'user_id' => $user_id,
     'active' => 1
    );
    
    $this->db->select('user_id');
    $this->db->from('users');
    $this->db->where($data);
    $query = $this->db->get();
    
    if($query->num_rows() == 1){
      $this->db->where('user_id', $user_id);
      $this->db->update('users', $update);
      return $user_id;
    }
    else{
      return 'User cannot be updated';
    }
  }
  
  function deleteUser($user_id){
    $update = array ('active' => 0);
    
    $data = array(
      'user_id' =>$user_id,
      'active' => 1
    );
    
    $this->db->select('user_id');
    $this->db->from('users');
    $this->db->where($data);
    $query = $this->db->get();
    
    if($query->num_rows() > 0){
      $this->db->where('user_id', $user_id);
      $this->db->update('users', $update);
      return $user_id;
    }
    else{
      return 'User does not exist';
    }
  }
  
  function loginUser(){
    $data = array(
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'active' => 1
    );
    
    $this->db->select('user_id, username ,student_usi, role');
    $this->db->from('users');
    $this->db->where($data);
    $query = $this->db->get();
    
    if($query->num_rows() == 1){
      return $query->result();
    }
    else{
      return 'Error login in';
    }
  }
  
  function logoutUser(){
    
  }
}
?>