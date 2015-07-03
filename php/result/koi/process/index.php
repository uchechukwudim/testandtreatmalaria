<?php
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$name = '';
$grade = '';
$Result = '';

 if(isset($_POST['result']) && isset($_POST['grade']) && isset($_POST['name'])){
      session_start();
      $_SESSION['decrypt'] = decrypt($_POST['result']);
      $name = $_SESSION['name'];
      $_SESSION['grade'] = $_POST['grade'];
      echo json_encode($_SESSION['decrypt']);
 }else{
     session_start();
     if(!isset($_SESSION['decrypt'])){
          header("location: ".URL."php/home/");
          exit();
     }
 }
 
 if(isset($_SESSION)){
     $you = "You";
  $name = $_SESSION['name'];
   $grade = $_SESSION['grade'];
   
   if($name === $you){
       $Result = "You are a ".$grade;
   }else{
       $Result = "Your $name is a $grade";
   }
 }
 
  function decrypt($str){
        $compare = 'koiresultisgood4124';
        $encoded = $str;
        $decoded = "";
        $strlen = strlen( $str );
        for( $i = 0; $i < strlen($encoded); $i++ ) {
            $b = ord($encoded[$i]);
            $a = $b ^ 123;  // <-- must be same number used to encode the character
            $decoded .= chr($a);
        }
        
        if($decoded === $compare){
            return true;
        }else{
            return false;
        }
      
        
    }