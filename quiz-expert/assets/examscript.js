function quexp_add_exam_button()
{
 var ename=document.getElementById("new_exam").value;
 var etype=document.getElementById("new_type").value;

 if(ename.length >= 1){
   jQuery.ajax
 ({
  type:'post',
  url:quexp_examajax.ajaxurl,
  data:{
   action:'quexp_add_exam',
   exam_val:ename,
   type_val:etype,

  },
  success:function(response) {
   if(response!="")

   {
    document.getElementById("new_exam").value="";
    document.getElementById("new_exam_comment").innerHTML="New Quiz Created";
    window.location.href = "admin.php?page=quiz-expert-edit-quiz&edit="+response;
   }
   
   else{

   } 
}
});
}
}

function quexp_delete_question_button(id)
{
  document.getElementById("delete_question_button").innerHTML="<button onclick='quexp_delete_confirm_question_button("+id+");' style='background:#FF4347;'><h2 style='color:white;'>Confirm Delete</h2></button>";

}

function quexp_delete_confirm_question_button(id)
{
  var q_type=document.getElementById("q_type"+id).value;
   jQuery.ajax
 ({
  type:'post',
  url:quexp_examajax.ajaxurl,
  data:{
   action:'quexp_delete_question',
   q_id_val:id,
   q_type_val:q_type
  },
  success:function(response) {
   if(response!="")
   {
    var row=document.getElementById("q_box"+id);
    row.parentNode.removeChild(row);
    tb_remove();
  }
}
});
}

function quexp_delete_exam_button(id)
{
  document.getElementById("delete_exam_button").innerHTML="<button onclick='quexp_delete_confirm_exam_button("+id+");' style='background:#FF4347;'><h2 style='color:white;'>Confirm Delete</h2></button>";

}

function quexp_delete_confirm_exam_button(id)
{
  var wp_post_id=document.getElementById("wp_post_id"+id).value;
   jQuery.ajax
 ({
  type:'post',
  url:quexp_examajax.ajaxurl,
  data:{
   action:'quexp_delete_exam',
   em_id_val:id,
   wp_post_id_val:wp_post_id,
 
  },
  success:function(response) {
   response=parseFloat(response);
   if(response!="")
   {
    var row=document.getElementById("quiz_row"+id);
    row.parentNode.removeChild(row);
    tb_remove();
  }
}
});
}

function quexp_save_settings_button(id)
{
  var em_type=document.getElementById("new_em_type").value;
  var em_time=document.getElementById("new_em_time").value;
  em_time=parseFloat(em_time);

   jQuery.ajax
 ({
  type:'post',
  url:quexp_examajax.ajaxurl,
  data:{
   action:'quexp_save_settings',
   em_id_val:id,
   em_type_val:em_type,
   em_time_val:em_time
  },
  success:function(response) {
   if(response!="")
   {
    document.getElementById("savecheck").innerHTML="Settings Saved Successfully.";
  }
}
});
}

