<?php 
/**
 * db table function
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */
namespace Inc\Base;

/**
* 
*/
class QuexpDBTableCall
{

	public function quexp_posts_table(){
		global $wpdb;
		return $wpdb->prefix ."posts";
	}

    public function quexp_quizzes_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_quizzes";
	}
	public function quexp_question_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_questions";
	}
	public function quexp_mcq_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_mcq";
	}
	public function quexp_tf_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_tf";
	}
	public function quexp_sq_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_sq";
	}
	public function quexp_result_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_results";
	}
}