<?php
/**
 * Deactivate 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */
namespace Inc\Base;

class QuexpDeactivate
{
	public static function quexp_deactivate() {
		flush_rewrite_rules();
		
	}
}