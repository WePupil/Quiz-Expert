

function quexp_add_mcq_question_button()
{
  var em_id=document.getElementById("new_em_id").value;
  var no=document.getElementById("new_no").value;
  var qname=document.getElementById("new_mcq_qname").value;
  var ansa=document.getElementById("new_ansa").value;
  var ansb=document.getElementById("new_ansb").value;
  var ansc="";
  var ansd=""; 
  var anse="";
  var ansf=""; 
  var ansg="";
  var ansh=""; 
  var ansi="";
  var ansj=""; 
  
  var inputcheck=0;

  if ((ansa != "")&&(ansb != "")){
    inputcheck=2;
  }

  if(document.getElementById("new_ansc")){
    ansc=document.getElementById("new_ansc").value;
    if(ansc != ""){inputcheck++;}
  }
  if(document.getElementById("new_ansd")){
  ansd=document.getElementById("new_ansd").value;
    if(ansd != ""){inputcheck++;}
  }
  if(document.getElementById("new_anse")){
  anse=document.getElementById("new_anse").value;
    if(anse != ""){inputcheck++;}
  }
  if(document.getElementById("new_ansf")){
  ansf=document.getElementById("new_ansf").value;
    if(ansf != ""){inputcheck++;}
  }
  if(document.getElementById("new_ansg")){
  ansg=document.getElementById("new_ansg").value;
    if(ansg != ""){inputcheck++;}
  }
  if(document.getElementById("new_ansh")){
  ansh=document.getElementById("new_ansh").value;
    if(ansh != ""){inputcheck++;}
  }
  if(document.getElementById("new_ansi")){
  ansi=document.getElementById("new_ansi").value;
    if(ansi != ""){inputcheck++;}
  }
  if(document.getElementById("new_ansj")){
  ansj=document.getElementById("new_ansj").value;
    if(ansj != ""){inputcheck++;}
  }

  var checkboxes = document.getElementsByName('new_chk[]');
  var answer = "";
  for (var i=0, n=checkboxes.length;i<n;i++) 
  {
      if (checkboxes[i].checked) 
      {
          answer += ","+checkboxes[i].value;
          
      }
  }
  if (answer) answer = answer.substring(1);

 if(qname.length >= 1 && inputcheck===checkboxes.length && answer!=""){
    jQuery.ajax
    ({
     type:'post',
     url:quexp_mcqajax.ajaxurl,
     data:{
      action:'quexp_add_mcq_question',
      em_id_val:em_id
     },
     success:function(response) {
      if(response!="")
      {
       var q_id=response;
     
 

   jQuery.ajax
 ({
  type:'post',
  url:quexp_mcqajax.ajaxurl,
  data:{
   action:'quexp_add_mcq_question_insert',
   q_id_val:q_id,
   qname_val:qname,
   ansa_val:ansa,
   ansb_val:ansb,
   ansc_val:ansc,
   ansd_val:ansd,
   anse_val:anse,
   ansf_val:ansf,
   ansg_val:ansg,
   ansh_val:ansh,
   ansi_val:ansi,
   ansj_val:ansj,
   answer_val:answer

  },
  success:function(response) {
   if(response!="")
   {
    for (var i=0, n=checkboxes.length;i<n;i++) 
    {

            
            checkboxes[i].checked=false;

    }

    var id= response;
    var row ="<input type='hidden' id='q_type"+q_id+"' value='mcq'><br/><div class='embox' id='q_box"+q_id+"'><div class='em-q'>"+no+". <a id='qname_mcq_val"+id+"' style='color:#393939'>"+qname+"</a>&nbsp;&nbsp;"+
            "<a href='#TB_inline?width=1000&height=550&inlineId=edit_question_popup' title='Edit Question' class='thickbox' onclick='quexp_edit_mcq_question_button("+id+");' style='text-decoration: none;'><span class='page-title-action'>Edit</span></a>"+
            "<a href='#TB_inline?width=600&height=550&inlineId=delete_question_popup' title='Delete Question' class='thickbox' onclick='quexp_delete_question_button("+q_id+");' style='text-decoration: none;'><span class='page-title-action'>Delete</span></a></div>"+
            "<br/><div id='mcq_answer_option"+id+"'><div id='ansa_div"+id+"' class='em-a'></div><div id='ansb_div"+id+"' class='em-a'></div><div id='ansc_div"+id+"' class='em-a'></div><div id='ansd_div"+id+"' class='em-a'></div><div id='anse_div"+id+"' class='em-a'></div><div id='ansf_div"+id+"' class='em-a'></div><div id='ansg_div"+id+"' class='em-a'></div><div id='ansh_div"+id+"' class='em-a'></div><div id='ansi_div"+id+"' class='em-a'></div><div id='ansj_div"+id+"' class='em-a'></div></div>Answer: <a class='row-title' id='answer_mcq_val"+id+"'>"+answer+"</a></div>";

    jQuery("#allcontents").append(row);


    document.getElementById("ansa_div"+id).innerHTML="A. <a id='ansa_val"+id+"' style='color:#393939'>"+ansa+"</a>";
    document.getElementById("ansb_div"+id).innerHTML="B. <a id='ansb_val"+id+"' style='color:#393939'>"+ansb+"</a>";
    
    if(ansc != ""){
        document.getElementById("ansc_div"+id).innerHTML="C. <a id='ansc_val"+id+"' style='color:#393939'>"+ansc+"</a>";
    }
    if(ansd != ""){
        document.getElementById("ansd_div"+id).innerHTML="D. <a id='ansd_val"+id+"' style='color:#393939'>"+ansd+"</a>";
    }
    if(anse != ""){
        document.getElementById("anse_div"+id).innerHTML="E. <a id='anse_val"+id+"' style='color:#393939'>"+anse+"</a>";
    }
    if(ansf != ""){
        document.getElementById("ansf_div"+id).innerHTML="F. <a id='ansf_val"+id+"' style='color:#393939'>"+ansf+"</a>";
    }
    if(ansg != ""){
        document.getElementById("ansg_div"+id).innerHTML="G. <a id='ansg_val"+id+"' style='color:#393939'>"+ansg+"</a>";
    }
    if(ansh != ""){
        document.getElementById("ansh_div"+id).innerHTML="H. <a id='ansh_val"+id+"' style='color:#393939'>"+ansh+"</a>";
    }
    if(ansi != ""){
        document.getElementById("ansi_div"+id).innerHTML="I. <a id='ansi_val"+id+"' style='color:#393939'>"+ansi+"</a>";
    }
    if(ansj != ""){
        document.getElementById("ansj_div"+id).innerHTML="J. <a id='ansj_val"+id+"' style='color:#393939'>"+ansj+"</a>";
    }


    newno=parseFloat(no)+1;
    document.getElementById("new_no").value=newno;
    document.getElementById("inputcheckmcq").innerHTML="";
    document.getElementById("q_box"+q_id).scrollIntoView()
    
    document.getElementById("new_mcq_qname").value="";
    document.getElementById("new_ansa").value="";
    document.getElementById("new_ansb").value="";
    document.getElementById("new_ansc").value="";
    document.getElementById("new_ansd").value="";
    document.getElementById("new_anse").value="";
    document.getElementById("new_ansf").value="";
    document.getElementById("new_ansg").value="";
    document.getElementById("new_ansh").value="";
    document.getElementById("new_ansi").value="";
    document.getElementById("new_ansj").value="";

    

}
}
});
    
   }
}
});
 }
 else if(inputcheck!=checkboxes.length){
  document.getElementById("inputcheckmcq").innerHTML="No field can be blank.";
 } 
 else if(answer === ""){
  document.getElementById("inputcheckmcq").innerHTML="Please Check Correct Answer";
 } 


}

function quexp_edit_mcq_question_button(id)
{
 var qname=document.getElementById("qname_mcq_val"+id).innerHTML;
 var ansa=document.getElementById("ansa_val"+id).innerHTML;
 var ansb=document.getElementById("ansb_val"+id).innerHTML;
 var ansc="";
 var ansd=""; 
 var anse="";
 var ansf=""; 
 var ansg="";
 var ansh=""; 
 var ansi="";
 var ansj=""; 


 if(document.getElementById("ansc_val"+id)){
    var ansc=document.getElementById("ansc_val"+id).innerHTML;}
 if(document.getElementById("ansd_val"+id)){
    var ansd=document.getElementById("ansd_val"+id).innerHTML;}
 if(document.getElementById("anse_val"+id)){
    var anse=document.getElementById("anse_val"+id).innerHTML;}
 if(document.getElementById("ansf_val"+id)){
    var ansf=document.getElementById("ansf_val"+id).innerHTML;}
 if(document.getElementById("ansg_val"+id)){
    var ansg=document.getElementById("ansg_val"+id).innerHTML;}
 if(document.getElementById("ansh_val"+id)){
    var ansh=document.getElementById("ansh_val"+id).innerHTML;}
 if(document.getElementById("ansi_val"+id)){
    var ansi=document.getElementById("ansi_val"+id).innerHTML;}
 if(document.getElementById("ansj_val"+id)){
    var ansj=document.getElementById("ansj_val"+id).innerHTML;}

 var answer=document.getElementById("answer_mcq_val"+id).innerHTML;


 document.getElementById("edit_question_body").innerHTML="<table class='form-table' id='edit_mcq_table' role='presentation'><tbody><tr><th scope='row'><label for='question'>Question</label></th><td><input type='text' class='regular-text' id='qname_mcq_text"+id+"' value='"+qname+"'></td><td></td></tr><tr><th scope='row'><label for='a'>A</label></th><td><input type='text' class='regular-text' id='ansa_text"+id+"' value='"+ansa+"'></td><td><input type='checkbox' name='edit_chk[]' value='A'></td></tr><tr><th scope='row'><label for='b'>B</label></th><td><input type='text' class='regular-text' id='ansb_text"+id+"' value='"+ansb+"'></td><td><input type='checkbox' name='edit_chk[]' value='B'></td></tr><tr><th></th><td><a title='Add Option' onclick='quexp_add_mcq_edit_option_button("+id+");' style='font-size:18px; background:#00CED1; color:white; text-decoration: none;'>&nbsp;&nbsp;<span class='dashicons dashicons-plus' ></span>&nbsp;&nbsp;</a>&nbsp;&nbsp;<a title='Delete Option' onclick='quexp_delete_mcq_edit_option_button("+id+");' style='font-size:18px; background:#FF6347; color:white; text-decoration: none;'>&nbsp;&nbsp;<span class='dashicons dashicons-trash' ></span>&nbsp;&nbsp;</a></td></tr><tr><th></th><td><strong><a id='inputcheckmcqedit' style='color:red'></a></strong></td></tr><tr><th scope='row'></th><td><a><input type='button' class='button button-primary' value='Save' onclick='quexp_save_mcq_question_button("+id+");'></a></td><td></td></tr></table>";

 var table=document.getElementById("edit_mcq_table");
 var table_len=(table.rows.length)-3;

 if (ansj != "" ){
  var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option10'><th scope='row'><label for='j'>J</label></th><td><input type='text' class='regular-text' id='ansj_text"+id+"' value='"+ansj+"'></td><td><input type='checkbox' name='edit_chk[]' value='J'></td></tr>";
}
if (ansi != "" ){
    var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option9'><th scope='row'><label for='i'>I</label></th><td><input type='text' class='regular-text' id='ansi_text"+id+"' value='"+ansi+"'></td><td><input type='checkbox' name='edit_chk[]' value='I'></td></tr>";
}
if (ansh != "" ){
    var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option8'><th scope='row'><label for='h'>H</label></th><td><input type='text' class='regular-text' id='ansh_text"+id+"' value='"+ansh+"'></td><td><input type='checkbox' name='edit_chk[]' value='H'></td></tr>";
}
if (ansg != "" ){
  var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option7'><th scope='row'><label for='g'>G</label></th><td><input type='text' class='regular-text' id='ansg_text"+id+"' value='"+ansg+"'></td><td><input type='checkbox' name='edit_chk[]' value='G'></td></tr>";
}
if (ansf != "" ){
  var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option6'><th scope='row'><label for='f'>F</label></th><td><input type='text' class='regular-text' id='ansf_text"+id+"' value='"+ansf+"'></td><td><input type='checkbox' name='edit_chk[]' value='F'></td></tr>";
}
if (anse != "" ){
    var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option5'><th scope='row'><label for='e'>E</label></th><td><input type='text' class='regular-text' id='anse_text"+id+"' value='"+anse+"'></td><td><input type='checkbox' name='edit_chk[]' value='E'></td></tr>";
}
if (ansd != "" ){
    var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option4'><th scope='row'><label for='d'>D</label></th><td><input type='text' class='regular-text' id='ansd_text"+id+"' value='"+ansd+"'></td><td><input type='checkbox' name='edit_chk[]' value='D'></td></tr>";
}
if (ansc != "" ){
    var row = table.insertRow(table_len).outerHTML="<tr id='edit_mcq_option3'><th scope='row'><label for='c'>C</label></th><td><input type='text' class='regular-text' id='ansc_text"+id+"' value='"+ansc+"'></td><td><input type='checkbox' name='edit_chk[]' value='C'></td></tr>";
}
var checkboxes = document.getElementsByName('edit_chk[]');
var answerarray = answer.split(',');


for (var i=0, n=answerarray.length;i<n;i++) 
{
  for (var j=0, m=checkboxes.length;j<m;j++) 
  {
      if (answerarray[i]===checkboxes[j].value) 
      {
          checkboxes[j].checked=true;
      }
  }
}



}


function quexp_save_mcq_question_button(id)
{

 var qname=document.getElementById("qname_mcq_text"+id).value;
 var ansa=document.getElementById("ansa_text"+id).value;
 var ansb=document.getElementById("ansb_text"+id).value;
 var ansc="";
 var ansd=""; 
 var anse="";
 var ansf=""; 
 var ansg="";
 var ansh=""; 
 var ansi="";
 var ansj=""; 

 var inputcheck=0;

 if ((ansa != "")&&(ansb != "")){
   inputcheck=2;
 }
 
 if(document.getElementById("ansc_text"+id)){
    var ansc=document.getElementById("ansc_text"+id).value;
    if(ansc != ""){inputcheck++;}
 }
 if(document.getElementById("ansd_text"+id)){
    var ansd=document.getElementById("ansd_text"+id).value;
    if(ansd != ""){inputcheck++;}
  }
 if(document.getElementById("anse_text"+id)){
    var anse=document.getElementById("anse_text"+id).value;
    if(anse != ""){inputcheck++;}
  }
 if(document.getElementById("ansf_text"+id)){
    var ansf=document.getElementById("ansf_text"+id).value;
    if(ansf != ""){inputcheck++;}
  }
 if(document.getElementById("ansg_text"+id)){
    var ansg=document.getElementById("ansg_text"+id).value;
    if(ansg != ""){inputcheck++;}
  }
 if(document.getElementById("ansh_text"+id)){
    var ansh=document.getElementById("ansh_text"+id).value;
    if(ansh != ""){inputcheck++;}
  }
 if(document.getElementById("ansi_text"+id)){
    var ansi=document.getElementById("ansi_text"+id).value;
    if(ansi != ""){inputcheck++;}
  }
 if(document.getElementById("ansj_text"+id)){
    var ansj=document.getElementById("ansj_text"+id).value;
    if(ansj != ""){inputcheck++;}
  }

	var checkboxes = document.getElementsByName('edit_chk[]');
  var answer = "";
  for (var i=0, n=checkboxes.length;i<n;i++) 
  {
      if (checkboxes[i].checked) 
      {
          answer += ","+checkboxes[i].value;
      }
  }
  if (answer) answer = answer.substring(1);
  if(qname.length >= 1 && inputcheck===checkboxes.length && answer!=""){
 jQuery.ajax
 ({
  type:'post',
  url:quexp_mcqajax.ajaxurl,
  data:{
   action:'quexp_save_mcq_question',
   mcq_id_val:id,
   qname_val:qname,
   ansa_val:ansa,
   ansb_val:ansb,
   ansc_val:ansc,
   ansd_val:ansd,
   anse_val:anse,
   ansf_val:ansf,
   ansg_val:ansg,
   ansh_val:ansh,
   ansi_val:ansi,
   ansj_val:ansj,
   answer_val:answer
  },
  success:function(response) {
   if(response!="")
   {

    document.getElementById("qname_mcq_val"+id).innerHTML=qname;
    document.getElementById("mcq_answer_option"+id).innerHTML="<div id='ansa_div"+id+"' class='em-a'></div><div id='ansb_div"+id+"' class='em-a'></div><div id='ansc_div"+id+"' class='em-a'></div><div id='ansd_div"+id+"' class='em-a'></div><div id='anse_div"+id+"' class='em-a'></div><div id='ansf_div"+id+"' class='em-a'></div><div id='ansg_div"+id+"' class='em-a'></div><div id='ansh_div"+id+"' class='em-a'></div><div id='ansi_div"+id+"' class='em-a'></div><div id='ansj_div"+id+"' class='em-a'></div>";

    document.getElementById("ansa_div"+id).innerHTML="A. <a id='ansa_val"+id+"' style='color:#393939'>"+ansa+"</a>";
    document.getElementById("ansb_div"+id).innerHTML="B. <a id='ansb_val"+id+"' style='color:#393939'>"+ansb+"</a>";
    
    if(ansc != ""){
        document.getElementById("ansc_div"+id).innerHTML="C. <a id='ansc_val"+id+"' style='color:#393939'>"+ansc+"</a>";
    }
    if(ansd != ""){
        document.getElementById("ansd_div"+id).innerHTML="D. <a id='ansd_val"+id+"' style='color:#393939'>"+ansd+"</a>";
    }
    if(anse != ""){
        document.getElementById("anse_div"+id).innerHTML="E. <a id='anse_val"+id+"' style='color:#393939'>"+anse+"</a>";
    }
    if(ansf != ""){
        document.getElementById("ansf_div"+id).innerHTML="F. <a id='ansf_val"+id+"' style='color:#393939'>"+ansf+"</a>";
    }
    if(ansg != ""){
        document.getElementById("ansg_div"+id).innerHTML="G. <a id='ansg_val"+id+"' style='color:#393939'>"+ansg+"</a>";
    }
    if(ansh != ""){
        document.getElementById("ansh_div"+id).innerHTML="H. <a id='ansh_val"+id+"' style='color:#393939'>"+ansh+"</a>";
    }
    if(ansi != ""){
        document.getElementById("ansi_div"+id).innerHTML="I. <a id='ansi_val"+id+"' style='color:#393939'>"+ansi+"</a>";
    }
    if(ansj != ""){
        document.getElementById("ansj_div"+id).innerHTML="J. <a id='ansj_val"+id+"' style='color:#393939'>"+ansj+"</a>";
    }

    document.getElementById("answer_mcq_val"+id).innerHTML=answer;
    tb_remove();
  }
}
});
 }
 else if(inputcheck!=checkboxes.length){
  document.getElementById("inputcheckmcqedit").innerHTML="No field can be blank.";
 } 
 else if(answer === ""){
  document.getElementById("inputcheckmcqedit").innerHTML="Please Check Correct Answer";
 } 


}
