/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
 //alert($('.info-footer').width());
 radioChecker();
});
var EMPTY = '';
var JURL = "http://localhost/malaria_camp/";
function processInfo(){
    $('button.next img').attr('src', JURL+"img/ajax-loader.gif");
    var player_type = '';
    var who =  $("input[name=radio]:checked").val();
 
    player_type = decideType(who);
    
    if(player_type  === EMPTY){
        alert('Please choose who you are checking for');
    }else{
         ajaxing(player_type);
    }
  
}

function decideType(type){
    var friendMale = "Friend-male";
     var friendFemale = "Friend-female";
    var wife = 'Wife';
    var sister = 'Sister';
    var husband = 'Husband';
    var brother = 'Brother';
    var me = "Me";
    
    if(type === friendMale){
        return friendMale;
    }else if(type === friendFemale){
        return friendFemale;
    }else if(type === wife){
        return wife;
    }else if(type === husband){
        return husband;
    }else if(type === sister){
        return sister;
    }else if(type === brother){
        return brother;
    }else if(type === me){
        return me;
    }else{
        return EMPTY;
    }
    
    
}

function ajaxing(player_type){
    $.ajax({
        crossDomin: true,
        url: JURL+"php/questions/process_questions.php",
        type: "POST",
        dataType: "json",
        data: {player_type: player_type},
        success:function(data){
            if(data === true){
                window.location.href = JURL+'php/questions/';
            }
        }
        
    });
}

function addGender(){
var friend = "Friend";
var whoVal = $('.play_for').val();
 if(friend === whoVal){
    $('.opt-holder').html('<input   id="radio1" type="radio" name="radio" value="Female" ><label for="radio1" style="margin-right: 40px;"><span><span></span></span>Female</label>\n\
                      <input  id="radio2" type="radio" name="radio" value="Male" ><label for="radio2"><span><span></span></span>Male</label>\n\
                     ');
        checkRadio();
    }else{
         $('.opt-holder').html('');
    }
}





function getCheckFor(){

    var female = 'Female';
    var male = 'Male';
    var somethingelse = 'Or Something else';
    
    
    var forMale = '<div class="question"><b>Check for:</b></div>\n\
                                 <form method="post" class="ques-form" >\n\
                                        <div class="opt-holder">\n\
                                        <div id="radio-listDiv1" class="radio-listDiv"><input type="radio" value="Husband"  name="radio" id="radio1" class="css-checkbox" /><label for="radio1" class="css-label radGroup2">Husband</label></div>\n\
                                        <div id="radio-listDiv2" class="radio-listDiv"><input type="radio" value="Brother"  name="radio" id="radio2" class="css-checkbox" /><label for="radio2" class="css-label radGroup2">Brother</label></div>\n\
                                        <div id="radio-listDiv3" class="radio-listDiv" style=" border-bottom:  1px solid rgba(0, 0, 0, 0.1)"><input type="radio" value="Friend-male"  name="radio" id="radio3" class="css-checkbox" /><label for="radio3" class="css-label radGroup2">Friend</label></div>\n\
                                    </div>\n\
                                    <button onclick="backToGender()" type="button" class="prev"><img src="'+JURL+'img/left_inactive.png"><span>Back</span></button>  <button  onclick="processInfo()" type="button" class="next"> <span>Next</span><img src="'+JURL+'img/right.png"></button>\n\
                                </form>';
    var forFemale = '<div class="question"><b>Check for:</b></div>\n\
                                 <form method="post" class="ques-form" >\n\
                                        <div class="opt-holder">\n\
                                        <div id="radio-listDiv1" class="radio-listDiv"><input type="radio" value="Wife"  name="radio" id="radio1" class="css-checkbox" /><label for="radio2" class="css-label radGroup2">Wife</label></div>\n\
                                        <div id="radio-listDiv2" class="radio-listDiv"><input type="radio" value="Sister"  name="radio" id="radio2" class="css-checkbox" /><label for="radio2" class="css-label radGroup2">Sister</label></div>\n\
                                        <div id="radio-listDiv3" class="radio-listDiv" style=" border-bottom:  1px solid rgba(0, 0, 0, 0.1)"><input type="radio" value="Friend-female"  name="radio" id="radio3" class="css-checkbox" /><label for="radio3" class="css-label radGroup2">Friend</label></div>\n\
                                    </div>\n\
                                    <button onclick="backToGender()" type="button" class="prev"><img src="'+JURL+'img/left_inactive.png"><span>Back</span></button>  <button  onclick="processInfo()" type="button" class="next"> <span>Next</span><img src="'+JURL+'img/right.png"></button>\n\
                                </form>';
    
    var forSomethingelse = '<div class="question"><b>Check for:</b></div>\n\
                                 <form method="post" class="ques-form" >\n\
                                        <div class="opt-holder">\n\
                                        <div id="radio-listDiv1" class="radio-listDiv"><input type="radio" value="Husband"  name="radio" id="radio1" class="css-checkbox" /><label for="radio1" class="css-label radGroup2">Husband</label></div>\n\
                                        <div id="radio-listDiv2" class="radio-listDiv"><input type="radio" value="Brother"  name="radio" id="radio2" class="css-checkbox" /><label for="radio2" class="css-label radGroup2">Brother</label></div>\n\
                                         <div id="radio-listDiv3" class="radio-listDiv"><input type="radio" value="Wife"  name="radio" id="radio3" class="css-checkbox" /><label for="radio3" class="css-label radGroup2">Wife</label></div>\n\
                                        <div id="radio-listDiv4" class="radio-listDiv"><input type="radio" value="Sister"  name="radio" id="radio4" class="css-checkbox" /><label for="radio4" class="css-label radGroup2">Sister</label></div>\n\
                                        <div id="radio-listDiv5" class="radio-listDiv" style=" border-bottom:  1px solid rgba(0, 0, 0, 0.1)"><input type="radio" value="Friend-female"  name="radio" id="radio5" class="css-checkbox" /><label for="radio5" class="css-label radGroup2">Female Friend</label></div>\n\
                                        <div id="radio-listDiv6" class="radio-listDiv" style=" border-bottom:  1px solid rgba(0, 0, 0, 0.1)"><input type="radio" value="Friend-male"  name="radio" id="radio6" class="css-checkbox" /><label for="radio6" class="css-label radGroup2">Male Friend</label></div>\n\
                                    </div>\n\
                                    <button onclick="backToGender()" type="button" class="prev"><img src="'+JURL+'img/left_inactive.png"><span>Back</span></button>  <button  onclick="processInfo()" type="button" class="next"> <span>Next</span><img src="'+JURL+'img/right.png"></button>\n\
                                </form>';
 
    
    var checkedradio = $('input[name=radio]:checked').val();
    if(checkedradio === female){
            animateQues();
            $('.questions-holder').html(forFemale);
              radioChecker();
    }else if(checkedradio === male){
        animateQues();
        $('.questions-holder').html(forMale);
          radioChecker();
    }else if(checkedradio === somethingelse){
         animateQues();
        $('.questions-holder').html(forSomethingelse);
          radioChecker();
    }else{
        alert('Please choose gender');
    }
}
function animateQues(){
     $('html').css({"overflow-x": "hidden"});  
     $('.questions-holder').css({position:"relative", left:"800px"}).animate({"left":"0px"}, "slow");
}



function BackToHome(){
    window.location.href = JURL+'php/home/';
}


function backToGender(){
    var backToGender = '<div class="question"><b>Is the person:</b></div>\n\
                                 <form method="post" class="ques-form" >\n\
                                        <div class="opt-holder">\n\
                                        <div id="radio-listDiv1" class="radio-listDiv"><input type="radio" value="Male"  name="radio" id="radio1" class="css-checkbox" /><label for="radio1" class="css-label radGroup2">Male</label></div>\n\
                                        <div id="radio-listDiv2" class="radio-listDiv"><input type="radio" value="Female"  name="radio" id="radio2" class="css-checkbox" /><label for="radio2" class="css-label radGroup2">Female</label></div>\n\
                                        <div id="radio-listDiv3" class="radio-listDiv" style=" border-bottom:  1px solid rgba(0, 0, 0, 0.1)"><input type="radio" value="Or Something else"  name="radio" id="radio3" class="css-checkbox" /><label for="radio3" class="css-label radGroup2">Or Something else</label></div>\n\
                                    </div>\n\
                                    <button onclick="BackToHome()" type="button" class="prev"><img src="'+JURL+'img/left_inactive.png"><span>Back</span></button>  <button  onclick="getCheckFor()" type="button" class="next"> <span>Next</span><img src="'+JURL+'img/right.png"></button>\n\
                                </form>';
    animateQues();
    $('.questions-holder').html(backToGender);
    radioChecker();
}









function radioChecker(){
    $('#radio-listDiv1').click(function(){
           $('input:radio[name=radio]:nth(0)').prop('checked', true);
           $('#radio-listDiv1').css({"background":"#dddddd"});
           $('#radio-listDiv2').css({"background":"whitesmoke"});
           $('#radio-listDiv3').css({"background":"whitesmoke"});
           $('#radio-listDiv4').css({"background":"whitsmoke"});
            $('#radio-listDiv5').css({"background":"whitesmoke"});
             $('#radio-listDiv6').css({"background":"whitesmoke"});
    });
    $('#radio-listDiv2').click(function(){
         $('input:radio[name=radio]:nth(1)').prop('checked',true);
         $('#radio-listDiv2').css({"background":"#dddddd"});
         $('#radio-listDiv1').css({"background":"whitesmoke"});
           $('#radio-listDiv3').css({"background":"whitesmoke"});
           $('#radio-listDiv4').css({"background":"whitesmoke"});
            $('#radio-listDiv5').css({"background":"whitesmoke"});
             $('#radio-listDiv6').css({"background":"whitesmoke"});
     });
     $('#radio-listDiv3').click(function(){
         $('input:radio[name=radio]:nth(2)').prop('checked',true);
         $('#radio-listDiv3').css({"background":"#dddddd"});
         $('#radio-listDiv1').css({"background":"whitesmoke"});
           $('#radio-listDiv2').css({"background":"whitesmoke"});
           $('#radio-listDiv4').css({"background":"whitesmoke"});
            $('#radio-listDiv5').css({"background":"whitesmoke"});
             $('#radio-listDiv6').css({"background":"whitesmoke"});
     });
     $('#radio-listDiv4').click(function(){
         $('input:radio[name=radio]:nth(3)').prop('checked',true);
         $('#radio-listDiv4').css({"background":"#dddddd"});
         $('#radio-listDiv1').css({"background":"whitesmoke"});
           $('#radio-listDiv2').css({"background":"whitesmoke"});
           $('#radio-listDiv3').css({"background":"whitesmoke"});
             $('#radio-listDiv5').css({"background":"whitesmoke"});
              $('#radio-listDiv6').css({"background":"whitesmoke"});
     });
      $('#radio-listDiv5').click(function(){
         $('input:radio[name=radio]:nth(4)').prop('checked',true);
         $('#radio-listDiv5').css({"background":"#dddddd"});
          $('#radio-listDiv6').css({"background":"whitesmoke"});
         $('#radio-listDiv4').css({"background":"whitesmoke"});
         $('#radio-listDiv1').css({"background":"whitesmoke"});
           $('#radio-listDiv2').css({"background":"whitesmoke"});
           $('#radio-listDiv3').css({"background":"whitesmoke"});
          
     });
     
     $('#radio-listDiv6').click(function(){
         $('input:radio[name=radio]:nth(5)').prop('checked',true);
         $('#radio-listDiv6').css({"background":"#dddddd"});
         $('#radio-listDiv5').css({"background":"whitesmoke"});
         $('#radio-listDiv4').css({"background":"whitesmoke"});
         $('#radio-listDiv1').css({"background":"whitesmoke"});
           $('#radio-listDiv2').css({"background":"whitesmoke"});
           $('#radio-listDiv3').css({"background":"whitesmoke"});
     });
     
     
     
}

function selectRadio1(){
    $('#radio-listDiv1').click(function(){
           $('input:radio[name=radio]:nth(0)').prop('checked',true);
           $('#radio-listDiv1').css({"background":"#dddddd"});
           $('#radio-listDiv2').css({"background":"whitesmoke"});
           $('#radio-listDiv3').css({"background":"whitesmoke"});
           $('#radio-listDiv4').css({"background":"whitsmoke"});
    });
}
function selectRadio2(){
    $('#radio-listDiv2').click(function(){
         $('input:radio[name=radio]:nth(1)').prop('checked',true);
         $('#radio-listDiv2').css({"background":"#dddddd"});
         $('#radio-listDiv1').css({"background":"whitesmoke"});
         $('#radio-listDiv3').css({"background":"whitesmoke"});
         $('#radio-listDiv4').css({"background":"whitesmoke"});
     });
}
function selectRadio3(){
    $('#radio-listDiv3').click(function(){
         $('input:radio[name=radio]:nth(2)').prop('checked',true);
         $('#radio-listDiv3').css({"background":"#dddddd"});
         $('#radio-listDiv1').css({"background":"whitesmoke"});
           $('#radio-listDiv2').css({"background":"whitesmoke"});
           $('#radio-listDiv4').css({"background":"whitesmoke"});
     });
}
function selectRadio4(){
    $('#radio-listDiv4').click(function(){
         $('input:radio[name=radio]:nth(3)').prop('checked',true);
         $('#radio-listDiv4').css({"background":"#dddddd"});
         $('#radio-listDiv1').css({"background":"whitesmoke"});
           $('#radio-listDiv2').css({"background":"whitesmoke"});
           $('#radio-listDiv3').css({"background":"whitesmoke"});
     });
}
