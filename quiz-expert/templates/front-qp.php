<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */

global $wpdb;
$em_user_id = get_current_user_id();


$em_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_quizzes_table(). "  WHERE quiz_id=$em_id", ""), ARRAY_A
);

foreach ($em_details as $key => $em_value) {
    $em_type=$em_value['type']; 
    $em_time=$em_value['time']; 
}

?>
<div id="allcontents">
<?php if($em_type == "Exam"  && $em_time > 0){ ?>
<div class="clock" id="clock"></div>
<h2 id="score_div"></h2>
<?php } ?>
<br/>
<?php
$q_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_question_table(). "  WHERE quiz_id=$em_id", ""), ARRAY_A
);
$q_sl=1;

foreach ($q_details as $key => $q_value) {
        $q_id=$q_value['q_id'];
        $q_type=$q_value['type']; 
        ?>
        <input type="hidden" id="q_type<?php echo esc_js( $q_sl); ?>" value="<?php echo esc_js( $q_type); ?>">
        <?php
        if ($q_type == "mcq"){
            require( "$this->plugin_path/modules/front-mcq.php" );
        }
        else if ($q_type == "tf"){
            require( "$this->plugin_path/modules/front-tf.php" );
        }
        else if ($q_type == "sq"){
            require( "$this->plugin_path/modules/front-sq.php" );
        }
$q_sl++;
}
?>
<br/>
<?php if($em_type == "Exam"){ ?>
<div id="submit_answer" style="text-align:center"><a href="#"><input type="button" class="button button-primary" value="Submit Answer" onclick="quexp_submit_answer_button();"></a></div>
<?php } ?>
<input type="hidden" id="sl_no" value="<?php echo esc_js( $q_sl); ?>">
<input type="hidden" id="em_id" value="<?php echo esc_js( $em_id); ?>">
<input type="hidden" id="em_user_id" value="<?php echo esc_js( $em_user_id); ?>">
<input type="hidden" id="em_type" value="<?php echo esc_js( $em_type); ?>">
<input type="hidden" id="em_time" value="<?php echo esc_js( $em_time); ?>">
</div>
