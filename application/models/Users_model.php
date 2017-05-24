<?php

class Users_model extends CI_Model{

  function __construct(){
    parent::__construct();
  } 

  function addUser($user){
    //         $data = array(
    //             'username' => $this->input->post('username'),
    //             'password' => md5($this->input->post('password')),
    //             'first_name' => $this->input->post('firstname'),
    //             'last_name' => $this->input->post('lastname'),
    //             'student_usi' => $this->input->post('student_usi'),
    //             'role' => $this->input->post('role')
    //         );

    //         $this->db->select('username');
    //         $this->db->from('users');
    //         $this->db->where('username', $data['username']);  
    //         $query = $this->db->get();

    //         if($query->num_rows() > 0){
    //             return 1;
    //         }
    //         else{
    //             $this->db->insert('users', $data);
    //             //header("Location: http://librarymanagementsystem--.codeanyapp.com/librarymanagementsystem/index.php/user");
    //             return 0;
    //         }
    $q = $this->db->insert('users', $user);
    return "User Added";
  }

  function addUserView(){
    $add = $this->addUser();
    if($add==0){
      //User added successfully, redirect to success page
      header("Location: http://librarymanagementsystem--.codeanyapp.com/librarymanagementsystem/index.php/user-success");
    }
    else {
      //User add was unsuccessful, reidrect to fail page
      header("Location: http://librarymanagementsystem--.codeanyapp.com/librarymanagementsystem/index.php/user-fail");
    }
  }

  function getUser($user_id){
    $active = 1; 
    $data = array(
      'user_id' => $user_id,
      'active' => $active
    );

    $this->db->select('username, first_name, last_name, role');
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
    $this->db->select('user_id, username, first_name, last_name, role');
    $this->db->from('users');
    $this->db->where('active', 1);
    $this->db->order_by('users.first_name', 'asc');
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

  function updateUser($user_id = NULL, $user = NULL){
    //     $update = array (
    //       'username' => $this->input->post('username'),
    //       'password' => $this->input->post('password'),
    //       'first_name' => $this->input->post('firstname'),
    //       'last_name' => $this->input->post('lastname'),
    //       'student_usi' => $this->input->post('student_usi'),
    //       'role' => $this->input->post('role')
    //     );

    //     $data = array(
    //       'user_id' => $user_id,
    //       'active' => 1
    //     );

    //     $this->db->select('user_id');
    //     $this->db->from('users');
    //     $this->db->where($data);
    //     $query = $this->db->get();

    //     if($query->num_rows() == 1){
    //       $this->db->where('user_id', $user_id);
    //       $this->db->update('users', $update);
    //       return $user_id;
    //     }
    //     else{
    //       return 'User cannot be updated';
    //     }
    $q = $this->db->where('users.user_id', $user_id)->update('users', $user);
    return $q;

  }

  function deleteUser($user_id){
    $data = array(
      'active' => 0
    );

    $q = $this->db->where('users.user_id', $user_id)->update('users', $data);
	 	return $q;
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