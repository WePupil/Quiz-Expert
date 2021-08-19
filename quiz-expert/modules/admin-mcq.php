<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */


$mcq_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_mcq_table(). "  WHERE q_id=$q_id", ""), ARRAY_A
);

foreach ($mcq_details as $key => $mcq_value) {
        $mcq_id=$mcq_value['id'];
        $mcq_question=$mcq_value['question'];
        $mcq_ansa=$mcq_value['ansa'];
        $mcq_ansb=$mcq_value['ansb'];
        $mcq_ansc=$mcq_value['ansc'];
        $mcq_ansd=$mcq_value['ansd'];
        $mcq_anse=$mcq_value['anse'];
        $mcq_ansf=$mcq_value['ansf'];
        $mcq_ansg=$mcq_value['ansg'];
        $mcq_ansh=$mcq_value['ansh'];
        $mcq_ansi=$mcq_value['ansi'];
        $mcq_ansj=$mcq_value['ansj'];
        $mcq_answer=$mcq_value['answer'];
        ?> 
<br/>
<div class="embox" id="q_box<?php echo esc_attr( $q_id);?>">
<div class="em-q"><?php echo wp_kses_post( $q_sl.". ");?><a id="qname_mcq_val<?php echo esc_attr( $mcq_id);?>" style="color:#393939"><?php echo wp_kses_post(( $mcq_question )?></a>&nbsp;&nbsp;
<a href="#TB_inline?width=600&height=550&inlineId=edit_question_popup" title="Edit Question" class="thickbox" onclick="quexp_edit_mcq_question_button(<?php echo esc_attr( $mcq_id); ?>);"  style="text-decoration: none;"><span class="page-title-action">Edit</span></a>
<a href="#TB_inline?width=600&height=550&inlineId=delete_question_popup" title="Delete Question" class="thickbox" onclick="quexp_delete_question_button(<?php echo esc_attr( $q_id); ?>);"  style="text-decoration: none;"><span class="page-title-action">Delete</span></a></div>
<br/><div id="mcq_answer_option<?php echo esc_attr( $mcq_id);?>">

<div class="em-a">A. <a id="ansa_val<?php echo esc_attr( $mcq_id);?>" style="color:#393939"><?php echo wp_kses_post( $mcq_ansa);?></a></div>
<div class="em-a">B. <a id="ansb_val<?php echo esc_attr( $mcq_id);?>" style="color:#393939"><?php echo wp_kses_post( $mcq_ansb);?></a></div>
<?php if ($mcq_ansc != ""){ ?>
<div class="em-a">C. <a id="ansc_val<?php echo esc_attr( $mcq_id);?>" style="color:#393939"><?php echo wp_kses_post( $mcq_ansc);?></a></div>
<?php } if ($mcq_ansd != ""){ ?>
<div class="em-a">D. <a id="ansd_val<?php echo esc_attr( $mcq_id);?>" style="color:#393939"><?php echo wp_kses_post( $mcq_ansd);?></a></div>
<?php } if ($mcq_anse != ""){ ?>
<div class="em-a">E. <a id="anse_val<?php echo esc_attr( $mcq_id);?>" style="color:#393939"><?php echo wp_kses_post( $mcq_anse);?></a></div>
<?php } if ($mcq_ansf != ""){ ?>
<div class="em-a">F. <a id="ansf_val<?php echo esc_attr( $mcq_id);?>" style="color:#393939"><?php echo wp_kses_post( $mcq_ansf);?></a></div>
<?php } if ($mcq_ansg != ""){ ?>
<div class="em-a">G. <a id="ansg_val<?php echo esc_attr( $mcq_id);?>" style="color:#393939"><?php echo wp_kses_post( $mcq_ansg);?></a></div>
<?php } if ($mcq_ansh != ""){ ?>
<div class="em-a">H. <a id="ansh_val<?php echo esc_attr( $mcq_id);?>" style="color:#393939"><?php echo wp_kses_post( $mcq_ansh);?></a></div>
<?php } if ($mcq_ansi != ""){ ?>
<div class="em-a">I. <a id="ansi_val<?php echo esc_attr( $mcq_id);?>" style="color:#393939"><?php echo wp_kses_post( $mcq_ansi);?></a></div>
<?php } if ($mcq_ansj != ""){ ?>
<div class="em-a">J. <a id="ansj_val<?php echo esc_attr( $mcq_id);?>" style="color:#393939"><?php echo wp_kses_post( $mcq_ansj);?></a></div>
<?php } ?>
</div>
<br/>
<div>Answer: <a class="row-title" id="answer_mcq_val<?php echo esc_attr( $mcq_id);?>"><?php echo wp_kses_post( $mcq_answer);?></a></div>


</div>
<?php
}

?>

<style>

</style>