<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */
?>

	

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Add MCQ</a></li>
		<li><a href="#tab-2">Add True False</a></li>
		<li><a href="#tab-3">Add Short Question</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">
		<table class="form-table" id="add_mcq_table" role="presentation">
		<tbody>
		<tr><th scope="row"><label for="question">Question</label></th>
		<td><input type="text" class="regular-text" id="new_mcq_qname"></td></tr>
		<tr><th scope="row"><label for="a">A</label></th>
		<td><input type="text" class="regular-text" id="new_ansa"> <input type="checkbox" name="new_chk[]" value="A">Correct</td></tr>
		<tr><th scope="row"><label for="b">B</label></th>
		<td><input type="text" class="regular-text" id="new_ansb"> <input type="checkbox" name="new_chk[]" value="B">Correct</td></tr>
		<tr id="add_mcq_option3"><th scope="row"><label for="c">C</label></th>
		<td><input type="text" class="regular-text" id="new_ansc"> <input type="checkbox" name="new_chk[]" value="C">Correct </td></tr>
		
		<tr id="add_mcq_option4"><th scope="row"><label for="d">D</label></th>
		<td><input type="text" class="regular-text" id="new_ansd"> <input type="checkbox" name="new_chk[]" value="D">Correct</td></tr>
	
		<tr><th></th><td>
		<a title="Add Answer Option" onclick="quexp_add_mcq_option_button();" style="text-decoration: none;"><span class="page-title-action">Add Option</span></a></button>
		<a title="Remove Answer Option" onclick="quexp_delete_mcq_option_button();" style="text-decoration: none;"><span class="page-title-action">Remove Option</span></a></button></td></tr>

		<tr><th></th><td><strong><a id="inputcheckmcq" style="color:red"></a></strong></td></tr>

		<tr><th scope="row"></th>
		<td><input type="button" class="button button-primary" value="Add Question" onclick="quexp_add_mcq_question_button();">
		</td></tr>
		</table>
		</div>

		<div id="tab-2" class="tab-pane">
		<table class="form-table" role="presentation">
		<tbody>
		<tr><th scope="row"><label for="question">Question</label></th>
		<td><input type="text" class="regular-text" id="new_tf_qname"></td></tr>
		<tr><th scope="row"><label for="answer">Answer</label></th>
		<td><select id="new_tf_answer">
                            <option value="True">True</option>
                            <option value="False">False</option>
                         </select></td></tr>
		<tr><th></th>
		<td><strong><a id="inputchecktf" style="color:red"></a></strong></td></tr>
		<tr><th scope="row"></th>
		<td><input type="button" class="button button-primary" value="Add Question" onclick="quexp_add_tf_question_button();"></td></tr>
		</table>
		</div>

		<div id="tab-3" class="tab-pane">
		<table class="form-table" role="presentation">
		<tbody>
		<tr><th scope="row"><label for="question">Question</label></th>
		<td><input type="text" class="regular-text" id="new_sq_qname"></td></tr>
		<tr><th scope="row"><label for="answer">Answer</label></th>
		<td><input type="text" class="regular-text" id="new_sq_answer"></td></tr>
		<tr><th></th>
		<td><strong><a id="inputchecksq" style="color:red"></a></strong></td></tr>
		<tr><th scope="row"></th>
		<td><input type="button" class="button button-primary" value="Add Question" onclick="quexp_add_sq_question_button();"></td></tr>
		</table>
		</div>
	</div>
 