<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php require 'C:\wamp\www\malaria_camp\config\constants.php'; 
      require PROCQUES_REQUR;

?>

<html>
    <head>
        
        <meta charset="UTF-8">
 
           <?php $c = 0; ?>

        <link rel="stylesheet" href="<?php echo URL ?>css/question/questionsheet.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/style.css">
        <script type="text/javascript" src="<?php echo URL ?>js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?php echo URL ?>js/question/question.js"></script>
         
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Question</title>
    </head>
    <body>
        <div class="wrapper">
           
            <section>
                <header>
                     <img src="<?php echo URL ?>img/slim-app-header.jpg">
                    <span class="reset"><a href="<?php echo URL ?>php/home/">Restart</a></span>
                </header>
            </section>
            
            <section class="hold" >
               
                <div class="questions-holder firstQues">
                     
                    <div class="question"><b><?php echo $questions[0]['question'] ?></b></div>
                        <form method="post" class="ques-form" >
                            
                          <?php// for($loop = 0; $loop < count($options[0]); $loop++){ ?>
                            <div class="opt-holder">
                                
                                <div id="radio-listDiv1"  class="radio-listDiv"><input type="radio" value="<?php echo $options[0][0]['answer_option_id'] ?>" name="radio" id="radio1" class="css-checkbox" /><label for="radio1" class="css-label radGroup2"><?php echo $options[0][0]['option'] ?></label></div>
                                <div id="radio-listDiv2" class="radio-listDiv"><input type="radio" value="<?php echo $options[0][1]['answer_option_id'] ?>"  name="radio" id="radio2" class="css-checkbox" /><label for="radio2" class="css-label radGroup2"><?php echo $options[0][1]['option'] ?></label></div>
                                <div id="radio-listDiv3" class="radio-listDiv"><input type="radio" value="<?php echo $options[0][2]['answer_option_id'] ?>"  name="radio" id="radio3" class="css-checkbox" /><label for="radio3" class="css-label radGroup2"><?php echo $options[0][2]['option'] ?></label></div>
                                <div id="radio-listDiv4" class="radio-listDiv" style=" border-bottom:  1px solid rgba(0, 0, 0, 0.1)"><input type="radio" value="<?php echo $options[0][3]['answer_option_id'] ?>"  name="radio" id="radio4" class="css-checkbox" /><label for="radio4" class="css-label radGroup2"><?php echo $options[0][3]['option'] ?></label></div>
                               
                                </div>
                          <?php //} ?>
                            <button onclick="getQuestion('Prev', '<?php echo $_SESSION['player_type']; ?>', '<?php echo $questions[0]['question_id'] ?>', '<?php echo $_SESSION['name'] ?>')" type="button" class="prev"><img src="<?php echo URL ?>img/left_inactive.png"><span>Back</span></button>  <button  onclick="getQuestion('Next', '<?php echo $_SESSION['player_type']; ?>', '<?php echo $questions[0]['question_id'] ?>', '<?php echo $_SESSION['name'] ?>')" type="button" class="next"> <span>Next</span><img src="<?php echo URL ?>img/right.png"></button>
                      </form>
               </div>
                
                 <div class="info-footer">
                    
                     <ul>
                          <li><img src="<?php echo URL ?>img/part1.png"></li>
                          <li><img src="<?php echo URL ?>img/Malaria Logo.png"></li>
                          <li><img src="<?php echo URL ?>img/part5.png"></li>
                          <li><img src="<?php echo URL ?>img/un.png"></li>
                          <li><img src="<?php echo URL ?>img/ng.png"></li>
                    </ul>
                </div>
            </section>
        </div>
    </body>
</html>
