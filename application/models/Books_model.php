<?php

class Books_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }
  
  function addTitle(){    
    $data = array(
      'title_name' => $this->input->post('title'),
      'title_author' => $this->input->post('author'),
      'title_coauthor' => $this->input->post('coAuthor'),
      'title_edition' => $this->input->post('edition'),
      'title_publisher' => $this->input->post('publisher'),
      'title_isbn' => $this->input->post('isbn'),
      'title_copies' => $this->input->post('copies') 
    );
    
    $this->db->select('title_isbn');
    $this->db->from('titles');
    $this->db->where('title_isbn' , $data['title_isbn']);  
    $query = $this->db->get();
    
    if($query->num_rows() > 0){
      return 'Book exist';
    }
    else{
      $this->db->insert('titles', $data); 
      $insert_id = $this->db->insert_id();    
      return $insert_id;

    }  
  }
  
  function getBook(){
    
  }
  
  function listBooks(){
    
  }
  
  
  function updateBook(){
    
  }
  
  function deleteBook(){
    
  }
  
  function borrowBook(){
    
  }
  
  function returnBook(){
    
  }
}
?>