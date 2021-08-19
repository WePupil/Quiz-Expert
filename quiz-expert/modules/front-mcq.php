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
       ;?> 

<h3><?php echo wp_kses_post( $q_sl.". ".$mcq_question);?></h3><br/>

<div ><?php if($em_type == "Exam"){;?><input type="checkbox" name="chk_<?php echo esc_attr( $q_sl);?>[]" value="A"><?php };?> A. <?php echo wp_kses_post( $mcq_ansa);?></div>
<div ><?php if($em_type == "Exam"){;?><input type="checkbox" name="chk_<?php echo esc_attr( $q_sl);?>[]" value="B"><?php };?> B. <?php echo wp_kses_post( $mcq_ansb);?></div>
<?php if ($mcq_ansc != ""){;?>
<div ><?php if($em_type == "Exam"){ ;?><input type="checkbox" name="chk_<?php echo esc_attr( $q_sl)?>[]" value="C"><?php };?> C. <?php echo wp_kses_post( $mcq_ansc);?></div>
<?php } if ($mcq_ansd != ""){;?>
<div ><?php if($em_type == "Exam"){;?><input type="checkbox" name="chk_<?php echo esc_attr( $q_sl);?>[]" value="D"><?php };?> D. <?php echo wp_kses_post( $mcq_ansd);?></div>
<?php } if ($mcq_anse != ""){;?>
<div ><?php if($em_type == "Exam"){;?><input type="checkbox" name="chk_<?php echo esc_attr( $q_sl);?>[]" value="E"><?php };?> E. <?php echo wp_kses_post( $mcq_anse);?></div>
<?php } if ($mcq_ansf != ""){;?>
<div ><?php if($em_type == "Exam"){;?><input type="checkbox" name="chk_<?php echo esc_attr( $q_sl);?>[]" value="F"><?php };?> F. <?php echo wp_kses_post( $mcq_ansf);?></div>
<?php } if ($mcq_ansg != ""){;?>
<div ><?php if($em_type == "Exam"){;?><input type="checkbox" name="chk_<?php echo esc_attr( $q_sl);?>[]" value="G"><?php };?> G. <?php echo wp_kses_post( $mcq_ansg);?></div>
<?php } if ($mcq_ansh != ""){;?>
<div ><?php if($em_type == "Exam"){;?><input type="checkbox" name="chk_<?php echo esc_attr( $q_sl);?>[]" value="H"><?php };?> H. <?php echo wp_kses_post( $mcq_ansh);?></div>
<?php } if ($mcq_ansi != ""){;?>
<div ><?php if($em_type == "Exam"){;?><input type="checkbox" name="chk_<?php echo esc_attr( $q_sl);?>[]" value="I"><?php };?> I. <?php echo wp_kses_post( $mcq_ansi);?></div>
<?php } if ($mcq_ansj != ""){;?>
<div ><?php if($em_type == "Exam"){;?><input type="checkbox" name="chk_<?php echo esc_attr( $q_sl);?>[]" value="J"><?php };?> J. <?php echo wp_kses_post( $mcq_ansj);?></div>
<?php };?>
<input type="hidden" id="correct_answer<?php echo esc_attr( $q_sl);?>" value="<?php echo esc_attr( $mcq_answer);?>">

<?php if($em_type == "Exam"){;?>
    <div id="answer_div<?php echo esc_attr( $q_sl);?>"></div><hr>
<?php };?>
<?php if($em_type == "Exercise"){;?>
    <div id="answer_div<?php echo esc_attr( $q_sl);?>" style="text-color: #000000; border: #ececa3 ; background: #ececa3" onclick="quexp_show_answer_button(<?php echo esc_attr( $q_sl);?>);">&nbsp;&nbsp;Show Answer</div>
<?php };?>


<?php
}
?>

<br/>