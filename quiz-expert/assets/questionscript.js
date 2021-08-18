
function quexp_add_tf_question_button()
{
  var em_id=document.getElementById("new_em_id").value;
  var no=document.getElementById("new_no").value;
  var qname=document.getElementById("new_tf_qname").value;
  var answer=document.getElementById("new_tf_answer").value;

 if(qname.length >= 1 && answer.length >=1){
    jQuery.ajax
    ({
     type:'post',
     url:quexp_questionajax.ajaxurl,
     data:{
      action:'quexp_add_tf_question',
      em_id_val:em_id 
     },
     success:function(response) {
      if(response!="")
      {
       var q_id=response;
     
      jQuery.ajax
    ({
      type:'post',
      url:quexp_questionajax.ajaxurl,
      data:{
      action:'quexp_add_tf_question_insert',
      q_id_val:q_id,
      qname_val:qname,
      answer_val:answer

      },
      success:function(response) {
      if(response!="")
      {
        var id= response;
        var row ="<input type='hidden' id='q_type"+q_id+"' value='tf'><br/><div class='embox' id='q_box"+q_id+"'><div class='em-q'>"+no+". <a id='qname_tf_val"+id+"' style='color:#393939'>"+qname+"</a>&nbsp;&nbsp;"+
        "<a href='#TB_inline?width=1000&height=550&inlineId=edit_question_popup' title='Edit Question' class='thickbox' onclick='quexp_edit_tf_question_button("+id+");' style='text-decoration: none;'><span class='page-title-action'>Edit</span></a>"+
        "<a href='#TB_inline?width=600&height=550&inlineId=delete_question_popup' title='Delete Question' class='thickbox' onclick='quexp_delete_question_button("+q_id+");' style='text-decoration: none;'><span class='page-title-action'>Delete</span></a></div>"+
        "<br/>Answer: <a class='row-title' id='answer_tf_val"+id+"'>"+answer+"</a></div>";
        jQuery("#allcontents").append(row);

        newno=parseFloat(no)+1;
        document.getElementById("new_no").value=newno;
        document.getElementById("q_box"+q_id).scrollIntoView()
        document.getElementById("new_tf_qname").value="";
        document.getElementById("new_tf_answer").value="";
    }} });   } }
});
 }
 else{
  document.getElementById("inputchecktf").innerHTML="No field can be blank.";
 } 
}

function quexp_edit_tf_question_button(id)
{
 var qname=document.getElementById("qname_tf_val"+id).innerHTML;
 var answer=document.getElementById("answer_tf_val"+id).innerHTML;

 document.getElementById("edit_question_body").innerHTML="<table class='form-table' id='edit_tf_table' role='presentation'><tbody><tr><th scope='row'><label for='question'>Question</label></th><td><input type='text' class='regular-text' id='qname_tf_text"+id+"' value='"+qname+"'></td><td></td></tr><tr>	<tr><th scope='row'><label for='answer'>Answer</label></th><td><select id='answer_tf_text"+id+"'><option value='"+answer+"'>"+answer+"</option><option value='True'>True</option><option value='False'>False</option></select></td></tr><th></th><td><strong><a id='inputchecktfedit' style='color:red'></a></strong></td></tr><tr><th scope='row'></th><td><a><input type='button' class='button button-primary' value='Save' onclick='quexp_save_tf_question_button("+id+");'></a></td><td></td></tr></table>";

}


function quexp_save_tf_question_button(id)
{

 var qname=document.getElementById("qname_tf_text"+id).value;
 var answer=document.getElementById("answer_tf_text"+id).value;

  if(qname.length >= 1 && answer.length >=1){
 jQuery.ajax
 ({
  type:'post',
  url:quexp_questionajax.ajaxurl,
  data:{
   action:'quexp_save_tf_question',
   tf_id_val:id,
   qname_val:qname,
   answer_val:answer
  },
  success:function(response) {
   if(response!="")
   {
    document.getElementById("qname_tf_val"+id).innerHTML=qname;
    document.getElementById("answer_tf_val"+id).innerHTML=answer;
    tb_remove();
  }
}
});
 }
 else {
  document.getElementById("inputchecktfedit").innerHTML="No field can be blank.";
 } }


function quexp_add_sq_question_button()
{
  var em_id=document.getElementById("new_em_id").value;
  var no=document.getElementById("new_no").value;
  var qname=document.getElementById("new_sq_qname").value;
  var answer=document.getElementById("new_sq_answer").value;

 if(qname.length >= 1 && answer.length >=1){
    jQuery.ajax
    ({
     type:'post',
     url:quexp_questionajax.ajaxurl,
     data:{
      action:'quexp_add_sq_question',
      em_id_val:em_id 
     },
     success:function(response) {
      if(response!="")
      {
       var q_id=response;
     
      jQuery.ajax
    ({
      type:'post',
      url:quexp_questionajax.ajaxurl,
      data:{
      action:'quexp_add_sq_question_insert',
      q_id_val:q_id,
      qname_val:qname,
      answer_val:answer

      },
      success:function(response) {
      if(response!="")
      {
        var id= response;
        var row ="<input type='hidden' id='q_type"+q_id+"' value='sq'><br/><div class='embox' id='q_box"+q_id+"'><div class='em-q'>"+no+". <a id='qname_sq_val"+id+"' style='color:#393939'>"+qname+"</a>&nbsp;&nbsp;"+
        "<a href='#TB_inline?width=1000&height=550&inlineId=edit_question_popup' title='Edit Question' class='thickbox' onclick='quexp_edit_sq_question_button("+id+");' style='text-decoration: none;'><span class='page-title-action'>Edit</span></a>"+
        "<a href='#TB_inline?width=600&height=550&inlineId=delete_question_popup' title='Delete Question' class='thickbox' onclick='quexp_delete_question_button("+q_id+");' style='text-decoration: none;'><span class='page-title-action'>Delete</span></a></div>"+
        "<br/>Answer: <a class='row-title' id='answer_sq_val"+id+"'>"+answer+"</a></div>";
        jQuery("#allcontents").append(row);

        newno=parseFloat(no)+1;
        document.getElementById("new_no").value=newno;
        document.getElementById("q_box"+q_id).scrollIntoView()
        document.getElementById("new_sq_qname").value="";
        document.getElementById("new_sq_answer").value="";
    }} });   } }
});
 }
 else{
  document.getElementById("inputchecksq").innerHTML="No field can be blank.";
 } 
}

function quexp_edit_sq_question_button(id)
{
 var qname=document.getElementById("qname_sq_val"+id).innerHTML;
 var answer=document.getElementById("answer_sq_val"+id).innerHTML;

 document.getElementById("edit_question_body").innerHTML="<table class='form-table' id='edit_sq_table' role='presentation'><tbody><tr><th scope='row'><label for='question'>Question</label></th><td><input type='text' class='regular-text' id='qname_sq_text"+id+"' value='"+qname+"'></td><td></td></tr><tr>	<tr><th scope='row'><label for='answer'>Answer</label></th><td><input type='text' class='regular-text' id='answer_sq_text"+id+"' value='"+answer+"'></td></tr><th></th><td><strong><a id='inputchecksqedit' style='color:red'></a></strong></td></tr><tr><th scope='row'></th><td><a><input type='button' class='button button-primary' value='Save' onclick='quexp_save_sq_question_button("+id+");'></a></td><td></td></tr></table>";

}


function quexp_save_sq_question_button(id)
{

 var qname=document.getElementById("qname_sq_text"+id).value;
 var answer=document.getElementById("answer_sq_text"+id).value;

  if(qname.length >= 1 && answer.length >=1){
 jQuery.ajax
 ({
  type:'post',
  url:quexp_questionajax.ajaxurl,
  data:{
   action:'quexp_save_sq_question',
   sq_id_val:id,
   qname_val:qname,
   answer_val:answer
  },
  success:function(response) {
   if(response!="")
   {
    document.getElementById("qname_sq_val"+id).innerHTML=qname;
    document.getElementById("answer_sq_val"+id).innerHTML=answer;
    tb_remove();
  }
}
});
 }
 else {
  document.getElementById("inputchecksqedit").innerHTML="No field can be blank.";
 } }
