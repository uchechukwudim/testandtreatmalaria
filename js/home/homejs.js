/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var JURL = "http://localhost/malaria_camp/";
$(document).ready(function(){
   // alert($('#wrapper').width());
});

function goToGetPLayerInfo(which){
    $('.whoToPlay').html('<form action="'+JURL+'html/questions/" return false;">\n\
                             <div>\n\
                             <input type="text" name="playerName" class="playerName" placeholder=" Player Name" title="'+which+'">\n\
                            </div>\n\
                            <button onclick="goBackToWhoToPlay()" class="back"><img src="http://localhost/malaria_camp/img/rewind.png"></button><button onclick="goToQuestion()" class="continue" ><img onclick="goToQuestion()" src="http://localhost/malaria_camp/img/play.png"></button>\n\
                        </form>');
}

function goBackToWhoToPlay(){
    $('.whoToPlay').html(' <ul>\n\
                            <li><a href="http://localhost/malaria_camp/html/questions/"">check for yourself</a></li>\n\
                            <li class= "nolink" onclick="goToGetPLayerInfo("check for someone  else") ">check for someone  else</li>\n\
                          </ul>');
}

function goToQuestion(){
   window.location.replace("http://localhost/malaria_camp/html/questions/");
      return false;
} 



function navInfo(which){
    var you = "You";
    var someone = "Someone";
    
    if(which === you){
        window.location.replace(JURL+"php/info/you/");
        return false;
    }else if(which === someone){
        window.location.replace(JURL+"php/info/someone/");
        return false;
    }
}