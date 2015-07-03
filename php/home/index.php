<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start(); session_destroy();  require 'C:\wamp\www\malaria_camp\config\constants.php';  ?>
<html>
    <head>
          <title>Home</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="<?php echo URL ?>css/home/homesheet.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/style.css">
        <script type="text/javascript" src="<?php echo URL ?>js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?php echo URL ?>js/home/homejs.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
    </head>
    <body>
        <div class="wrapper">
                <section>
                    <div class="home-header-image">
                        <img src="<?php echo URL ?>img/app-header.jpg">
                    </div>
                    
                </section>
                <section>
                    
                   <div class="home-info">
                       <div class="nav-home-home">
                        <ul>
                            <li><a href="http://testandtreatmalaria.org">Home</a></li>
                        </ul>
                        </div>
                       <span>Are you over-sabi or are you medically on-point</span>
                       <div onclick="navInfo('You')" class="home-nav one"><a onclick="navInfo('You')">Find out yourself</a></div>
                        <div onclick=" navInfo('Someone')" class="home-nav two"><a onclick=" navInfo('Someone')">Find out for someone else</a></div>
                        <div class="home-footer">
                        
                             <ul>
                                  <li><img src="<?php echo URL ?>img/part1.png"></li>
                                 <li><img src="<?php echo URL ?>img/Malaria Logo.png"></li>
                                  <li><img src="<?php echo URL ?>img/part5.png"></li>
                                   <li><img src="<?php echo URL ?>img/un.png"></li>
                                     <li><img src="<?php echo URL ?>img/ng.png"></li>
                             </ul>
                        </div>
                    </div>
                </section>
        </div>
    </body>
</html>
