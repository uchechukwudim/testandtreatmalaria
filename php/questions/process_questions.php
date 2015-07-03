<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'C:\wamp\www\malaria_camp\config\connect.php';
header("Content-Type: text/html; charset=utf-8");
$questions = array();
$options = array();
$answers = array();

//echo print_r(getAnswerOpt(getQuestions("Female")));

if(isset($_POST['player_type'])){
    session_start();
    $_SESSION['player_type'] = getGenderFromType(filter_var($_POST['player_type']));
    $_SESSION['play'] = true;
    $_SESSION['name'] = getWho($_POST['player_type']);
    $_SESSION['result'] = 0;
    echo json_encode(true);

}else{
     session_start();
    if(!isset($_SESSION['play'])){
        header("location: ".URL.HOME);
        exit();
    }
}


if(isset($_SESSION['play'])){
    $ques_type = $_SESSION['player_type'];
    $questions = getQuestions($ques_type);
    $options = getAnswerOpt($questions);
    $name =   $_SESSION['name'];

}

function getGenderFromType($type){
    $female = "Female";
    $male = "Male";
    $self = "Self";
    
    $me = "Me";
    $mother = "Wife";
    $sister = "Sister";
    $father = "Husband";
    $brother = "Brother";
    $friendMale = "Friend-male";
    $friendFemale = "Friend-female";
    
    if($type === $mother ||  $type === $sister || $type === $friendFemale){
        return $female;
    }
    
    if($type === $father ||  $type === $brother || $type === $friendMale){
        return $male;
    }
    
    if($type === $me){
        return $self;
    }
}

function getWho($who){
    $me = 'Me';
    $friendMale = 'Friend-male';
    $friendFemale = 'Friend-female';
    
    $you = 'You';
    $friend = 'Friend';
    if($who === $me){
        return $you;
    }else if($who === $friendFemale || $who === $friendMale){
        return $friend;
    }else{
        return $who;
    }
}