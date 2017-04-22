<?php

class Books_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }
    
  function getBook($book_id){
    
  }
  
  function listBooks(){
    //title ug_id and condition
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
    
  }
  
  function returnBook(){
    
  }
}
?>