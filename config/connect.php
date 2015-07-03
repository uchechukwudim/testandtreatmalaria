<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function connectdb(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "malaria_faceoff";
    
    $db = new PDO('mysql:host='.$host.';dbname='.$database.'', $username, $password);
    
    return $db;
}

function getQuestions($player_type){
    $db = connectdb();
    $sql = "SELECT * FROM questions WHERE type = :type ORDER BY question_id ASC LIMIT 0, 1";
    $sth = $db->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $sth->execute(array(':type'=>$player_type));
    
    $questions = $sth->fetchAll();
    
    return $questions;
}

function getAnswerOpt($questions){
    $options = array();
    $db = connectdb();

        $sql = "SELECT * FROM answer_options WHERE question_id = :question_id";
        $sth = $db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':question_id'=>(int)$questions[0]['question_id']));
        $options[0] = $sth->fetchAll();
    
    
    return $options;
}


function getoneQuestion($question_id, $player_type){
    $db = connectdb();
    $sql = "SELECT * FROM questions WHERE type = :type AND question_id = :question_id ORDER BY question_id ASC";
    $sth = $db->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $sth->execute(array(':type'=>$player_type, ':question_id'=>$question_id));
    
    $questions = $sth->fetchAll();
    
    return $questions;
}


function checkResult($question_id, $answer_opt_id){
    $db = connectdb();
    $sql = "SELECT score FROM answer_options WHERE question_id = :question_id AND answer_option_id = :answer_option_id";
    $sth = $db->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $sth->execute(array(':answer_option_id'=>$answer_opt_id, ':question_id'=>$question_id));
    
    $result = $sth->fetchAll();
    
    return  (int)$result[0]['score'];
}