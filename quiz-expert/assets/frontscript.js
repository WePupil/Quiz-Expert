var stop={};

function quexp_submit_answer_button()
{
  var em_id=document.getElementById("em_id").value;
  var em_user_id=document.getElementById("em_user_id").value;
  var sl=document.getElementById("sl_no").value;
  sl=parseFloat(sl);
  var mark=0;

  for (var j=1;j<sl;j++) 
  {
    var q_type=document.getElementById("q_type"+j).value;
    var correct_answer=document.getElementById("correct_answer"+j).value;

    if(q_type==="mcq"){
    var checkboxes = document.getElementsByName("chk_"+j+"[]");
    var answer = "";
    for (var i=0, n=checkboxes.length;i<n;i++) 
    {
        if (checkboxes[i].checked) 
        {
            answer += ","+checkboxes[i].value;
        }
    }
    if (answer) answer = answer.substring(1);
  }

     else{
      var answer=document.getElementById("answer"+j).value;
     }

   
    if(correct_answer.toUpperCase() === answer.toUpperCase()){
      document.getElementById("answer_div"+j).innerHTML="&nbsp;&nbsp;Answer:&nbsp;&nbsp;"+correct_answer;
      document.getElementById("answer_div"+j).style.border  = "solid #ececa3";
      document.getElementById("answer_div"+j).style.background = "#ececa3";
      document.getElementById("answer_div"+j).style.color = "#000000";
      mark++;
    }
    else{
      document.getElementById("answer_div"+j).innerHTML="&nbsp;&nbsp;Answer:&nbsp;&nbsp;"+correct_answer;
      document.getElementById("answer_div"+j).style.border = "solid #FF4347";
      document.getElementById("answer_div"+j).style.background = "#FF4347";
      document.getElementById("answer_div"+j).style.color = "#FFFFFF";
    }

  }
  document.getElementById("score_div").innerHTML="&nbsp;&nbsp;You got&nbsp;"+mark+"&nbsp;out of&nbsp;"+(sl-1);
  document.getElementById("score_div").style.border  = "solid #ececa3";
  document.getElementById("score_div").style.background = "#ececa3";
  document.getElementById("score_div").style.color = "#000000";
  document.getElementById("submit_answer").innerHTML="";
  stop=0;

  jQuery.ajax
 ({
  type:'post',
  url:quexp_frontajax.ajaxurl,
  data:{
   action:'quexp_record_result',
   em_id_val:em_id,
   mark_val:mark,
   em_user_id_val:em_user_id,
  },
  success:function(response) {

}
});
}

function quexp_startTimer(duration) {
  var timer = duration, minutes, seconds;
  var timerint= setInterval(function () {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);

      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      
      document.getElementById("clock").innerHTML="<h3>"+minutes+" : "+seconds+"<h3>";
  
      
      if (--timer < 0) {
        em_submit_answer_button();
        clearInterval(timerint);
        document.getElementById("clock").innerHTML="<h3>00 : 00<h3><h4>Time up</h4>";
        document.getElementById("clock").style.color = "#ff0000";
      }
      if (stop === 0) {
        clearInterval(timerint);
      }
  }, 1000);
}

jQuery(function ($) {
  var em_time = parseFloat(document.getElementById("em_time").value);
  var em_type = document.getElementById("em_type").value;
  em_time=60* em_time;
  if(em_type === "Exam" && em_time > 0){
    quexp_startTimer(em_time);}
});


function quexp_show_answer_button(id){
  var correct_answer=document.getElementById("correct_answer"+id).value;
  document.getElementById("answer_div"+id).innerHTML="&nbsp;&nbsp;Answer:&nbsp;&nbsp;"+correct_answer;
}