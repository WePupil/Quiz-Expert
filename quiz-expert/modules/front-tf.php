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

<h3><?php echo esc_attr( $q_sl.". ".$tf_question );?></h3>
<?php if($em_type == "Exam"){ ?><select id="answer<?php echo esc_attr( $q_sl); ?>">
                            <option value="True">True</option>
                            <option value="False">False</option>
                         </select><?php } ?>
<?php if($em_type == "Exercise"){ ?>True <br/> False <?php } ?>

<input type="hidden" id="correct_answer<?php echo esc_attr( $q_sl);?>" value="<?php echo esc_attr( $tf_answer);?>">
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