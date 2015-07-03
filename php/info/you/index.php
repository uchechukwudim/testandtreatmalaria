<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start(); session_destroy();  require 'C:\wamp\www\malaria_camp\config\constants.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <script>var JURL = <?php echo URL ?></script>
        <link rel="stylesheet" href="<?php echo URL ?>css/info/infosheet.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/style.css">
        <script type="text/javascript" src="<?php echo URL ?>js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?php echo URL ?>js/info/info.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Player information</title>
    </head>
    <body>
        <div id="wrapper">
            <section>
                <header>
                     <img src="<?php echo URL ?>img/slim-app-header.jpg">
                    <span class="reset"><a href="<?php echo URL ?>php/home/">Restart</a></span>
                </header>
            </section>
            
            <section>
               <div class="questions-holder">
                     <h3></h3>
                    <div class="question"><b>are you:</b></div>
                        <form method="post" class="ques-form" >
               
                            <div class="opt-holder">    
                                <div id="radio-listDiv1" class="radio-listDiv"><input type="radio" value="Me"  name="radio" id="radio1" class="css-checkbox" /><label for="radio1" class="css-label radGroup2">Male</label></div>
                                <div id="radio-listDiv2" class="radio-listDiv"><input type="radio" value="Me"  name="radio" id="radio2" class="css-checkbox" /><label for="radio2" class="css-label radGroup2">Female</label></div>
                                <div id="radio-listDiv3" class="radio-listDiv" style=" border-bottom:  1px solid rgba(0, 0, 0, 0.1)"><input type="radio" value="Me"  name="radio" id="radio3" class="css-checkbox" /><label for="radio3" class="css-label radGroup2">Or Something else</label></div>
                               
                                </div>
                    
                            <button onclick="BackToHome()" type="button" class="prev"><img src="<?php echo URL ?>img/left_inactive.png"><span>Back</span></button>  <button  onclick="processInfo()" type="button" class="next"> <span>Next</span><img src="<?php echo URL ?>img/right.png"></button>
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
