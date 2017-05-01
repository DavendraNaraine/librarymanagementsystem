<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller{

    public function index(){
        $passData = array(

            'title_name' => $this->input->post('title'),
            'title_author' => $this->input->post('author'),
            'title_coauthor' => $this->input->post('coAuthor'),
            'title_edition' => $this->input->post('edition'),
            'title_publisher' => $this->input->post('publisher'),
            'title_isbn' => $this->input->post('isbn')

        );
        var_dump($passData);
        implode(" ",$passData);
        $url = $this->config->base_url().'index.php/v1/titles';

        echo '<br><hr><h2>'.$this->postCURL($url, $passData).'</h2><br><hr><br>';

    }

    private function postCURL($_url, $_param){
        echo "<br>";
        echo "<br>";
        echo $_url."  ";
        print_r($_param);
        echo "<br>";
        echo "<br>";
       
        $postData = '';
        //create name value pairs seperated by &
        foreach($_param as $k => $v) 
        { 
            $postData .= $k .'='.$v.'&'; 
        }
        rtrim($postData, '&');
        echo "<br>".$postData."<br>";


        $ch = curl_init($_url);
        curl_setopt($ch, CURLOPT_URL,$_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0); 
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    

        $output = curl_exec($ch);
        
        echo curl_getinfo($ch) . '<br/>';
        echo curl_errno($ch) . '<br/>';
        echo curl_error($ch) . '<br/>';
        
        //var_dump($output);
        
        curl_close($ch);
        
        return $output;
    } 

}
?>