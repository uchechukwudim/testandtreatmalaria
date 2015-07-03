<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php require 'C:\wamp\www\malaria_camp\config\constants.php';
      require 'C:\wamp\www\malaria_camp\php\result\sabinus\process\index.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta property="og:url" content="http://testandtreatmalaria.org/" /> 
        <meta property="og:title" content="<?php echo $Resultov ?>" />
        <meta property="og:description" content="Test before you treat" /> 
        <meta property="og:image" content="<?php echo URL ?>/img/home_img.png" /> 

        <link rel="stylesheet" href="<?php echo URL ?>css/result/resultsheet.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/style.css">
        <script type="text/javascript" src="<?php echo URL ?>js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?php echo URL ?>js/result/result.js"></script>
        <title>Result</title>
    </head>
    <body>
        <script>
                window.fbAsyncInit = function() {
                  FB.init({
                    appId      : '1496995027250577',
                    xfbml      : true,
                    version    : 'v2.2'
                  });
                };

                (function(d, s, id){
                   var js, fjs = d.getElementsByTagName(s)[0];
                   if (d.getElementById(id)) {return;}
                   js = d.createElement(s); js.id = id;
                   js.src = "//connect.facebook.net/en_US/sdk.js";
                   fjs.parentNode.insertBefore(js, fjs);
                 }(document, 'script', 'facebook-jssdk'));
                 function fbthings(){
                    FB.ui({
                       method: 'feed',
                       name: '<?php echo $Resultov ?>',
                       link: 'http://localhost/malaria_camp/php/home',
                       app_id: '1496995027250577',
                       caption: 'The MalariaFaceOff Challenge',
                       picture: '<?php echo URL ?>img/app-head.png',
                       description: 'http://testandtreatmalaria.org/',
                       redirect_uri: 'http://testandtreatmalaria.org/game/MalariaFaceOff/php/home'
                     }, function(response){});
                 }
                 
                 function tweet(){
                     newwindow=window.open('https://twitter.com/share?url=http://testandtreatmalaria.org&text=Your <?php echo $name ?> is a <?php echo $grade ?>&via=thisisuchedim&hashtags=testandtreatmalaria','name','height=450,width=600, left=400,top=100,resizable=yes,scrollbars=yes,toolbar=yes,status=yes');
                        if (window.focus) {
                            newwindow.focus();

                        }
                 }
                 
        </script>
        <div id="wrapper">
            <section>
                <header class="resultheader">
                    <img src="<?php echo URL ?>img/sabinus-header.jpg">
                    <span class="reset end"><a href="<?php echo URL ?>php/home/">Restart</a></span>
                </header>
            </section>
                    <div class="nav-home-home">
                        <ul>
                            <li><a href="http://testandtreatmalaria.org">Home</a></li>
                            <li><a href="http://testandtreatmalaria.org/game/MalariaFaceOff/php/home/">MFC-Home</a></li>
                        </ul>
                    </div>
                 <div class="result_holder">
                
                    <div class="result-answer">
                         <?php echo $Resultov ?><br>
                        <div class="socialMed">
                            <ul>
                                <li onclick="fbthings()" class="FB">Share on facebook</li>
                                <li  class="TWT"><a onclick="tweet()">Share on Twitter</a></li>
                            </ul>
                        </div>
                        <div style="display: none"><div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button"></div></div>
                    </div>
                    
                     <div class="slog">
                        Stop playing Doctor with Malaria Test before you treat
                    </div>
                    <div class="test">
                        <ul>
                            <li><img src="<?php echo URL ?>img/test_2.png" width="130"></li>
                            <li><img src="<?php echo URL ?>img/test_1.png" width="150"></li>
                        </ul>
                    </div>
                    
                    <div class="websiteling">To get tested, visit a Malaria Quick test center. You can also buy and use the test kit by yourself<br><br><a href="www.testandtreatmalaria.org">Visit www.testandtreatmalaria.org for more information</a></div>
                    <div class="info-footer">   
                     <ul>
                        <li><img src="<?php echo URL ?>img/part1.png"></li>
                          <li><img src="<?php echo URL ?>img/Malaria Logo.png"></li>
                          <li><img src="<?php echo URL ?>img/part5.png"></li>
                          <li><img src="<?php echo URL ?>img/un.png"></li>
                          <li><img src="<?php echo URL ?>img/ng.png"></li>
                     
                    </ul>
                </div>
                </div>
             
                
            <section>
                
            </section>
        </div>
    </body>
</html>
