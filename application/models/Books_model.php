<?php

class Books_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }
    
  function getBook($ug_id){
    /*
    $this->db->select('*');
    $this->db->from('books');
    $this->db->where('ug_id', $ug_id);
    $query = $this->db->get();
    
    if($query->num_rows() == 1){
      return $query->result_set();
    }
    else{
      return 'Book cannot be found';
    }
    */
  }
  
  function listBooks(){
    //title ug_id and condition
    $this->db->select('*');
    $this->db->from('books');
    $this->db->join('titles', 'title_id = title_name');
    $this->db->join('conditions', 'condition_id = condition_name');
    $query = $this->db->get();
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
  
  function addBook($title_id){    
    $data = array (
    
    );
    
    $this->db->insert_batch('books', $data);
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
    /*
    $data = array (
      'student_usi' => $this->input->post('')
      'book_id' => $this->input->post('')
      'staff_lent_id' => $this->input->post('')
      'current_date' => $this->input->post('')
      'borrowed_condition_id' => $this->input->post('')
    );
    */
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