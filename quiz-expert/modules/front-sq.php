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

<h3><?php echo wp_kses_post( $q_sl.". ".$sq_question )?></h3>
<?php if($em_type == "Exam"){ ?><input type="text" class="regular-text" id="answer<?php echo esc_attr( $q_sl) ?>"><?php } ?>

<input type="hidden" id="correct_answer<?php echo esc_attr( $q_sl);?>" value="<?php echo esc_attr( $sq_answer);?>">
<?php if($em_type == "Exam"){ ?>
    <div id="answer_div<?php echo esc_attr( $q_sl);?>"></div><hr>
<?php } ?>
<?php if($em_type == "Exercise"){ ?>
    <div id="answer_div<?php echo esc_attr( $q_sl);?>" style="text-color: #000000; border: #ececa3 ; background: #ececa3" onclick="quexp_show_answer_button(<?php echo esc_attr( $q_sl);?>);">&nbsp;&nbsp; Show Answer</div>
<?php } ?>
<?php
}
?>

<br/>

<style> 
input {
  width: 100%;
}
</style>