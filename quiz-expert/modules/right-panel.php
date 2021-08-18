<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */
?>

<div class="embox">
<div class="em-q">Short Code</div><hr>
<code>[quiz_expert id=<?php echo esc_js( $em_id);?>]</code>
</div>
<br/>
<div class="embox">
<div class="em-q">Quiz Settings</div><hr><br/>
Type:
<select id="new_em_type">
        <option value="<?php echo esc_js( $em_type);?>"><?php echo esc_js( $em_type);?></option>
        <option value="Exam">Exam</option>
        <option value="Exercise">Exercise</option>
</select>
<br/><br/>
Time (minutes):
<input type="text" id="new_em_time" value="<?php echo esc_js( $em_time);?>">
<br/>
<a id="savecheck" style="color:green"></a><br/><br/>
<input type="button" class="button button-primary" value="Save Settings" onclick="quexp_save_settings_button(<?php echo esc_js( $em_id);?>);">
</div>
