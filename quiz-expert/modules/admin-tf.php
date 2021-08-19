<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */

$tf_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_tf_table(). "  WHERE q_id=$q_id", ""), ARRAY_A
);

foreach ($tf_details as $key => $tf_value) {
        $tf_id=$tf_value['id'];
        $tf_question=$tf_value['question'];
        $tf_answer=$tf_value['answer'];
        ?> 
<br/>
<div class="embox" id="q_box<?php echo esc_attr( $q_id);?>">
<div class="em-q"><?php echo esc_attr( $q_sl.". "); ?><a id="qname_tf_val<?php echo esc_attr( $tf_id);?>" style="color:#393939"><?php echo wp_kses_post( $tf_question); ?>&nbsp;&nbsp;
<a href="#TB_inline?width=600&height=550&inlineId=edit_question_popup" title="Edit Question" class="thickbox" onclick="quexp_edit_tf_question_button(<?php echo esc_attr( $tf_id); ?>);"  style="text-decoration: none;"><span class="page-title-action">Edit</span></a>
<a href="#TB_inline?width=600&height=550&inlineId=delete_question_popup" title="Delete Question" class="thickbox" onclick="quexp_delete_question_button(<?php echo esc_attr( $q_id); ?>);"  style="text-decoration: none;"><span class="page-title-action">Delete</span></a></div>

<br/>
<div>Answer: <a class="row-title" id="answer_tf_val<?php echo esc_attr( $tf_id);?>"><?php echo wp_kses_post( $tf_answer); ?></a></div>


</div>
<?php
}

?>

<style>

</style>