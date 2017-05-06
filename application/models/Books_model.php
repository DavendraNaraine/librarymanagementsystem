<?php

class Books_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  function getBook($book_id){

  }

  function listBooks(){

  }


  function updateBook($book_id){
    $update = array (
      'condition_id' => $this->input->post('condition'),
      'ug_id' => $this->input->post('ugid')
    );

    $data = array(
      'book_id' => $book_id,
      'active' => 1
    );

    $this->db->select('book_id');
    $this->db->from('books');
    $this->db->where($data);
    $query = $this->db->get();

    if($query->num_rows() == 1){
      $this->db->where('book_id', $book_id);
      $this->db->update('books', $update);
      return $book_id;
    }
    else{
      return 'Book cannot be updated';
    }
  }

  function addBook(){
    $data = array(
      'title_id' => $this->input->post('titleid'),
      'ug_id' => $this->input->post('ugid'),
      'condition_id' => $this->input->post('conditionid'),
      'active' => 1
    );

    $this->db->select('ug_id');
    $this->db->from('books');
    $this->db->where('ug_id' , $data['ug_id']);  
    $query = $this->db->get();

    if($query->num_rows() > 0){
      return 'Book exists';
    }
    else{
      $this->db->insert('books', $data); 
      return 'Book added';
    }
  }

  function deleteBook($book_id){
    $update = array ('active' => 0);

    $data = array(
      'book_id' =>$book_id,
      'active' => 1
    );

    $this->db->select('book_id');
    $this->db->from('books');
    $this->db->where($data);
    $query = $this->db->get();

    if($query->num_rows() > 0){
      $this->db->where('book_id', $book_id);
      $this->db->update('books', $update);
      return $book_id;
    }
    else{
      return 'Book does not exist';
    }
  }

  function searchBook(){

  }

  function borrowBook(){

  }

  function returnBook($borrowed_book_id){
    $update = array(
      'actual_return_date'=> $this->input->post('returnDate'),
      'staff_return_id'=> $this->input->post('staffReturnId'),
      'return_condition_id'=> $this->input->post('condition')
    );

    $data = array(
      'borrowed_book_id' =>$borrowed_book_id,
    );

    $this->db->select('actual_return_date, staff_return_id, return_condition_id');
    $this->db->from('borrowed_books');
    $this->db->where($data);
    $query = $this->db->get();

    if($query->num_rows() > 0){
      $this->db->where('borrowed_book_id', $borrowed_book_id);
      $this->db->update('borrowed_books', $update);
      return $borrowed_book_id;
    }
    else{
      return 'Invalid update';
    }
  }
}
?>