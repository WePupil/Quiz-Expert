<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */
?>
<div class="wrap">
            <h1 class="wp-heading-inline">Create New Exam Paper</h1>
			<hr class="wp-header-end">


<table class="form-table" role="presentation">

<tbody><tr>
<th scope="row"><label for="exampaper">Exam Paper Title</label></th>
<td><input type="text" class="regular-text" id="new_exam"></td>
</tr>

<tr>
<th scope="row"><label for="type">Type</label></th>
<td><select id="new_type">
                            <option value="Exam">Exam</option>
                            <option value="Exercise">Exercise</option>
                            </select></td>
</tr>
<tr><th scope="row"></th>
<td><p id="new_exam_comment"></p></td></tr>
<tr><th scope="row"></th>
<td><input type="button" class="button button-primary" value="Add New Quiz" onclick="quexp_add_exam_button();"></td></tr>
</table>
