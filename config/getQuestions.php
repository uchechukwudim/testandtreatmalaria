<?php
session_start();
if(!isset($_SESSION['result'])){$_SESSION['result'] = 0;}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'C:\wamp\www\malaria_camp\config\connect.php';
require 'C:\wamp\www\malaria_camp\config\constants.php'; 

if(isset($_GET['nav']) && isset($_GET['type']) && isset($_GET['question_id'])){
 
    $next = 'Next'; $prev = 'Prev';
    $nav = $_GET['nav'];
    (int)$question_id = (int)$_GET['question_id'];
    $player_type = $_GET['type'];
   
    if($nav === $next){
        $aws = (int)$_GET['answer_id'];
        score($question_id, $aws); //score answer
     
        //then go to the next queston
        if(canDoNext($player_type ,  $question_id)){
                $question_id = $question_id + 1;
                $ques = getoneQuestion($question_id, $player_type);
                $opts = getAnswerOpt($ques);
                echo json_encode(laodQueston($ques, $opts, $player_type));
        }else{
                echo json_encode(checkIfSabinusOrKoi((int)$_SESSION['result']));  
        }
      
    }else if($nav === $prev){
          $question_id = $question_id -1;
          removeScore($question_id); //remove scored answer 
          
         if(canDoNext($player_type ,  $question_id)){
                
                $ques = getoneQuestion($question_id, $player_type);
                $opts = getAnswerOpt($ques);
                echo json_encode(laodQueston($ques, $opts, $player_type));    
         }else{
                 echo json_encode(checkIfSabinusOrKoi((int)$_SESSION['result']));  
         }
    }

}


function laodQueston($question, $options, $type){
        $next = 'Next'; $prev = 'Prev';
    $data = ' 
            <div class="question"><b>'.$question[0]['question'].'</b></div>
                        <form method="post" class="ques-form" >
                          <div class="opt-holder">
                                <div id="radio-listDiv1"  onclick="selectRadio1()" class="radio-listDiv"><input type="radio" value="'.$options[0][0]['answer_option_id'].'" name="radio" id="radio1" class="css-checkbox" /><label for="radio1" class="css-label radGroup2">'. $options[0][0]['option'].'</label></div>
                                <div id="radio-listDiv2"  onclick="selectRadio2()" class="radio-listDiv"><input type="radio" value="'.$options[0][1]['answer_option_id'].'"  name="radio" id="radio2" class="css-checkbox" /><label for="radio2" class="css-label radGroup2">'.$options[0][1]['option'].'</label></div>
                                <div id="radio-listDiv3"  onclick="selectRadio3()" class="radio-listDiv"><input type="radio" value="'.$options[0][2]['answer_option_id'].'"  name="radio" id="radio3" class="css-checkbox" /><label for="radio3" class="css-label radGroup2">'.$options[0][2]['option'].'</label></div>
                                <div id="radio-listDiv4"  onclick="selectRadio4()" class="radio-listDiv" style=" border-bottom:  1px solid rgba(0, 0, 0, 0.1)"><input type="radio" value="'.$options[0][3]['answer_option_id'].'"  name="radio" id="radio4" class="css-checkbox" /><label for="radio4" class="css-label radGroup2">'.$options[0][3]['option'].'</label></div>
                          </div>
                          <button onclick="getQuestion(\''.$prev.'\', \''.$type.'\', \''.$question[0]['question_id'].'\', \''.$_SESSION['name'].'\')" type="button" class="prev"><img src="'.URL.'img/left_inactive.png"><span>Back</span></button>  <button onclick="getQuestion(\''.$next.'\', \''.$type.'\', \''.$question[0]['question_id'].'\', \''.$_SESSION['name'].'\')" type="button" class="next"><span>Next</span><img src="'.URL.'img/right.png"></button>
                      </form>';
    
    return $data;
}

function loadOptions($options){
    
    $data = '';
    for($loop = 0; $loop < count($options); $loop++){
         $data .= '<div class="opt-holder">
                  <input id="radio1" type="radio" name="radio" value="'.$options[$loop]['answer_option_id'].'" ><label for="radio1"><span><span></span></span>'.$options[$loop]['option'].'</label>
            </div>';
    }

    return $data;
}

function canDoNext($type, $id_num){
    $female = "Female";
    $male = "Male";
    $self = "Self";
    
    $female_ques_count = 9;
    $male_ques_count = 18;
    $self_ques_count = 27;
    
    if($type === $female && $id_num <= $female_ques_count){
        return true;
    }
    
    if($type === $male && $id_num <= $male_ques_count){
        return true;
    }
    
    if($type === $self && $id_num <= $self_ques_count){
        return true;
    }
    
    return false;
}


function score($question_id, $answer_opt_id){
    (int)$score = checkResult($question_id, $answer_opt_id);
        $_SESSION['isScored'.$question_id.''] = $score;
        $_SESSION['result'] = (int)$_SESSION['result'] + $score;
   
}

function removeScore($question_id){
  
   $_SESSION['result'] = (int)$_SESSION['result'] - (int)$_SESSION['isScored'.$question_id.''];
    
}


function loadResult($result){
    $data = '';
}

function checkIfSabinusOrKoi($result){
    $total_score = 590;
    $koi_one = 332;
    $koi_two = 249;
    $koi_three = 166;
      
    $sabi_one = 161;
    $sabi_two = 83;
    $sabi_three = 0;
    $grade_one_koi = 'GRADE 1 Dr Koi';
    $grade_two_koi = 'GRADE 2 Dr Koi';
    $grade_three_koi = 'GRADE 3 Dr Koi';
    
    $grade_one_oversabi = 'GRADE 1 Over-Sabi';
    $grade_two_oversabi = 'GRADE 2 Over-Sabi';
    $grade_three_oversabi = 'GRADE 3 Over-Sabi';
  
    if((int)$result >= $koi_one  && (int)$result <= $total_score ){ // > 332 < 415
        return $grade_one_koi;
    }
    
    if((int)$result >= $koi_two && (int)$result <= $koi_one){ // > 249 < 332
        return $grade_two_koi;
    }
    
    if((int)$result >=$koi_three && (int)$result <= $koi_two){// > 166 < 249
        return $grade_three_koi;
    }
    
    if((int)$result >= $sabi_one && (int)$result <= $koi_three){// >161 < 166
        return $grade_one_oversabi;
    }
    
    if((int)$result >= $sabi_two && (int)$result <= $sabi_one){// > 83 < 161
        return $grade_two_oversabi;
    }
    
    if((int)$result >=$sabi_three && (int)$result <= $sabi_two){// > 0 < 83 
       return $grade_three_oversabi;
    }
    
}