/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var EMPTY = '';
var JURL = "http://localhost/malaria_camp/";
var NEXT = 0;
var PREV = -1;
$(document).ready(function(){
   //alert();
   radioChecker();
  
});




function getQuestion(nav, type, ques_id, name){
      var next = "Next";
      var prev = "Prev";
      var me = 'Self';
   
    if(!$('input[name=radio]:checked').val() && nav === prev && PREV === -1){ 
          if(type === me){
            window.location.href = JURL+'php/info/you/'; 
          }else{
            window.location.href = JURL+'php/info/someone/'; 
          } 
    }else if(!$('input[name=radio]:checked').val() && nav === next){
          alert("No answer was checked."); 
    }else{
           navigate(nav, type, ques_id, name); 
    }



    
    
}
function navigate(nav, type, ques_id, name){
    var next = "Next";
    var prev = "Prev";
    var me = "Self";
   
    if(nav === next ){
        NEXT = NEXT +1;
        PREV = PREV + 1;
        $('button.next img').attr('src', JURL+"img/ajax-loader.gif");
        runAjax(type, ques_id, next, name);
        
    }else if(nav === prev && PREV !== -1){
 
        NEXT = NEXT -1;
        PREV = PREV - 1;
        $('button.prev img').attr('src', JURL+"img/ajax-loader_prev.gif");
        runAjax(type, ques_id, prev, name);
    }else if(nav === prev && PREV === -1){
        if(type === me){
            window.location.href = JURL+'php/info/you/'; 
        }else{
            window.location.href = JURL+'php/info/someone/'; 
        }
          
    }
}

function runAjax(type, ques_id, nav, name){
    var koi = "KOI";
    var sabinus = "SABINUS";
    var answer_id = $("input[name=radio]:checked").val();
    $.ajax({
        url: JURL+"config/getQuestions.php",
        type: "GET",
        dataType: "json",
        data: {nav: nav, type: type, question_id: ques_id, answer_id: answer_id},
        success: function(data){
           
            if(isContainKoi(data)){
                   var str = "koiresultisgood4124";
                   var encoded = enc(str); 
                  
                   ajaxResult(data, koi, encoded, name);
            }else if(isContainOvaSabi(data)){
                    var str = "koiresultisgood4124";
                    var encoded = enc(str); 
                    ajaxResult(data, sabinus, encoded, name);
            }else{
               
                  $('html').css({"overflow-x": "hidden"});  
                  $('.questions-holder').css({position:"relative", left:"800px"}).animate({"left":"0px"}, "slow");
                  $('.questions-holder').html(data);
               
                   radioChecker();
            }
            
        },
        error: function(){
                  $('button.next img').attr('src', JURL+"img/right.png");
                $('button.prev img').attr('src', JURL+"img/left_inactive.png");
            alert("Please try again. Someting went wrong");
        }
        
    });
}

function isContainKoi(grade){
    if(grade.indexOf("Koi") > -1)
        return true;
    else
        return false;
    
}

function isContainOvaSabi(grade){
    if(grade.indexOf("Over-Sabi") > -1)
        return true;
    else 
        return false;
}



function ajaxResult(grade, which, code, name){
    var koi = "KOI";
    var sabinus = "SABINUS";
    var url = '';
    var result = '';
    if(which === koi){
        url = JURL+'php/result/koi/process/';
        result = koi;
    }else if(which === sabinus){
        url = JURL+'php/result/sabinus/process/';
        result = sabinus;
    }
    
    $.ajax({
        url: url,
        type: "POST",
        dataType: "json",
        data: {result: code, grade: grade, name:name},
        success: function(data){
            if(data === true){
                navResult(result);
            }else{
                alert("sorry somthing went wonrg");
            }
        }
    });
}

function navResult(result){
    var koi = "KOI";
    var sabinus = "SABINUS";
    if(result === koi){
          window.location.href = JURL+'php/result/koi/';
    }else if(result === sabinus){
        window.location.href = JURL+'php/result/sabinus/';
    }
}

function enc(str) {
    var encoded = "";
    for (i=0; i<str.length;i++) {
        var a = str.charCodeAt(i);
        var b = a ^ 123;    // bitwise XOR with any number, e.g. 123
        encoded = encoded+String.fromCharCode(b);
    }
    return encoded;
}


function radioChecker(){
    $('#radio-listDiv1').click(function(){
           $('input:radio[name=radio]:nth(0)').prop('checked', true);
           $('#radio-listDiv1').css({"background":"#dddddd"});
           $('#radio-listDiv2').css({"background":"whitesmoke"});
           $('#radio-listDiv3').css({"background":"whitesmoke"});
           $('#radio-listDiv4').css({"background":"whitsmoke"});
    });
    $('#radio-listDiv2').click(function(){
         $('input:radio[name=radio]:nth(1)').prop('checked',true);
         $('#radio-listDiv2').css({"background":"#dddddd"});
         $('#radio-listDiv1').css({"background":"whitesmoke"});
           $('#radio-listDiv3').css({"background":"whitesmoke"});
           $('#radio-listDiv4').css({"background":"whitesmoke"});
     });
     $('#radio-listDiv3').click(function(){
         $('input:radio[name=radio]:nth(2)').prop('checked',true);
         $('#radio-listDiv3').css({"background":"#dddddd"});
         $('#radio-listDiv1').css({"background":"whitesmoke"});
           $('#radio-listDiv2').css({"background":"whitesmoke"});
           $('#radio-listDiv4').css({"background":"whitesmoke"});
     });
     $('#radio-listDiv4').click(function(){
         $('input:radio[name=radio]:nth(3)').prop('checked',true);
         $('#radio-listDiv4').css({"background":"#dddddd"});
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
