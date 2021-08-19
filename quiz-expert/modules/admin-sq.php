<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */

$sq_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_sq_table(). "  WHERE q_id=$q_id", ""), ARRAY_A
);

foreach ($sq_details as $key => $sq_value) {
        $sq_id=$sq_value['id'];
        $sq_question=$sq_value['question'];
        $sq_answer=$sq_value['answer'];
        ?> 
<br/>
<div class="embox" id="q_box<?php echo esc_attr( $q_id); ?>">
<div class="em-q"><?php echo esc_attr( $q_sl.". "); ?><a id="qname_sq_val<?php echo esc_attr( $sq_id); ?>" style="color:#393939"><?php echo wp_kses_post( $sq_question );?></a>&nbsp;&nbsp;
<a href="#TB_inline?width=600&height=550&inlineId=edit_question_popup" title="Edit Question" class="thickbox" onclick="quexp_edit_sq_question_button(<?php echo esc_attr( $sq_id); ?>);"  style="text-decoration: none;"><span class="page-title-action">Edit</span></a>
<a href="#TB_inline?width=600&height=550&inlineId=delete_question_popup" title="Delete Question" class="thickbox" onclick="quexp_delete_question_button(<?php echo esc_attr( $q_id); ?>);"  style="text-decoration: none;"><span class="page-title-action">Delete</span></a></div>

<br/>
<div>Answer: <a class="row-title" id="answer_sq_val<?php echo esc_attr( $sq_id); ?>"><?php echo wp_kses_post( $sq_answer); ?></a></div>


</div>
<?php
}

?>

<style>

</style>