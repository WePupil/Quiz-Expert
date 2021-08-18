<?php 
/**
 * Jquery ajax data store in mysql
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */
namespace Inc\Base;

//use Inc\Base\DBTableCall;

/**
* 
*/
class QuexpAjaxCall
{
	public function quexp_register() {
		add_action( 'wp_ajax_quexp_add_exam', array( $this, 'quexp_ajax_call_add_exam' ) );
		add_action( 'wp_ajax_quexp_add_mcq_question', array( $this, 'quexp_ajax_call_add_mcq_question' ) );
		add_action( 'wp_ajax_quexp_add_mcq_question_insert', array( $this, 'quexp_ajax_call_add_mcq_question_insert' ) );
		add_action( 'wp_ajax_quexp_save_mcq_question', array( $this, 'quexp_ajax_call_save_mcq_question' ) );

		add_action( 'wp_ajax_quexp_add_tf_question', array( $this, 'quexp_ajax_call_add_tf_question' ) );
		add_action( 'wp_ajax_quexp_add_tf_question_insert', array( $this, 'quexp_ajax_call_add_tf_question_insert' ) );
		add_action( 'wp_ajax_quexp_save_tf_question', array( $this, 'quexp_ajax_call_save_tf_question' ) );

		add_action( 'wp_ajax_quexp_add_sq_question', array( $this, 'quexp_ajax_call_add_sq_question' ) );
		add_action( 'wp_ajax_quexp_add_sq_question_insert', array( $this, 'quexp_ajax_call_add_sq_question_insert' ) );
		add_action( 'wp_ajax_quexp_save_sq_question', array( $this, 'quexp_ajax_call_save_sq_question' ) );

		add_action( 'wp_ajax_quexp_delete_question', array( $this, 'quexp_ajax_call_delete_question' ) );
		add_action( 'wp_ajax_quexp_delete_exam', array( $this, 'quexp_ajax_call_delete_exam' ) );
		add_action( 'wp_ajax_quexp_record_result', array( $this, 'quexp_ajax_call_record_result' ) );
		add_action( 'wp_ajax_quexp_save_settings', array( $this, 'quexp_ajax_call_save_settings' ) );
		
	}
	
	function quexp_ajax_call_add_exam(){
		global $wpdb;
		$ename=sanitize_text_field($_POST['exam_val']);
		$etype=sanitize_text_field($_POST['type_val']);

		$em_exam_post = array(
			'post_title'    => $ename,
			//'post_content'  => "[exam_manager_qp]", //shortcode
			'post_status'   => 'publish',
			"post_type" =>"post"
		);

		$em_post_id = wp_insert_post( $em_exam_post );


		$wpdb->insert($wpdb->prefix ."quexp_quizzes", array(
					"post_id" => $em_post_id,
					"type" => $etype,
				));

		$em_id = $wpdb->insert_id;

		$wpdb->update($wpdb->prefix ."posts", array(
			'post_content'  => "[quiz_expert id=$em_id]",
		),
		array('ID' => $em_post_id));

		echo esc_js($em_id);
		exit();
		wp_die();
	}

	function quexp_ajax_call_add_mcq_question(){
		global $wpdb;
		$em_id=sanitize_text_field($_POST['em_id_val']);

		$wpdb->insert($wpdb->prefix ."quexp_questions", array(
			"quiz_id" => $em_id,
			"type" => "mcq",
		));

		$q_id = $wpdb->insert_id;
		echo esc_js( $q_id);
		exit();
		wp_die();
	}

	function quexp_ajax_call_add_mcq_question_insert(){
		global $wpdb;
		$q_id=sanitize_text_field($_POST['q_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);
		$ansa=sanitize_text_field($_POST['ansa_val']);
		$ansb=sanitize_text_field($_POST['ansb_val']);
		$ansc=sanitize_text_field($_POST['ansc_val']);
		$ansd=sanitize_text_field($_POST['ansd_val']);
		$anse=sanitize_text_field($_POST['anse_val']);
		$ansf=sanitize_text_field($_POST['ansf_val']);
		$ansg=sanitize_text_field($_POST['ansg_val']);
		$ansh=sanitize_text_field($_POST['ansh_val']);
		$ansi=sanitize_text_field($_POST['ansi_val']);
		$ansj=sanitize_text_field($_POST['ansj_val']);
		$answer=sanitize_text_field($_POST['answer_val']);

		$wpdb->insert($wpdb->prefix ."quexp_mcq", array(
					"q_id" => $q_id,
					"question" => $qname,
					"ansa" => $ansa,
					"ansb" => $ansb,
					"ansc" => $ansc,
					"ansd" => $ansd,
					"anse" => $anse,
					"ansf" => $ansf,
					"ansg" => $ansg,
					"ansh" => $ansh,
					"ansi" => $ansi,
					"ansj" => $ansj,
					"answer" => $answer,
				));
		$new_mcq_id = $wpdb->insert_id;
		echo esc_js($new_mcq_id);
		exit();
		wp_die();
	}

	function quexp_ajax_call_save_mcq_question(){
		global $wpdb;
		$mcq_id=sanitize_text_field($_POST['mcq_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);
		$ansa=sanitize_text_field($_POST['ansa_val']);
		$ansb=sanitize_text_field($_POST['ansb_val']);
		$ansc=sanitize_text_field($_POST['ansc_val']);
		$ansd=sanitize_text_field($_POST['ansd_val']);
		$anse=sanitize_text_field($_POST['anse_val']);
		$ansf=sanitize_text_field($_POST['ansf_val']);
		$ansg=sanitize_text_field($_POST['ansg_val']);
		$ansh=sanitize_text_field($_POST['ansh_val']);
		$ansi=sanitize_text_field($_POST['ansi_val']);
		$ansj=sanitize_text_field($_POST['ansj_val']);
		$answer=sanitize_text_field($_POST['answer_val']);


		$wpdb->update($wpdb->prefix ."quexp_mcq", array(
					"question" => $qname,
					"ansa" => $ansa,
					"ansb" => $ansb,
					"ansc" => $ansc,
					"ansd" => $ansd,
					"anse" => $anse,
					"ansf" => $ansf,
					"ansg" => $ansg,
					"ansh" => $ansh,
					"ansi" => $ansi,
					"ansj" => $ansj,
					"answer" => $answer,
				),
			    array('id' => $mcq_id));
		echo esc_js("1");
		exit();
		wp_die();
	}
	function quexp_ajax_call_add_tf_question(){
		global $wpdb;
		$em_id=sanitize_text_field($_POST['em_id_val']);

		$wpdb->insert($wpdb->prefix ."quexp_questions", array(
			"quiz_id" => $em_id,
			"type" => "tf",
		));

		$q_id = $wpdb->insert_id;
		echo esc_js($q_id);
		exit();
		wp_die();
	}

	function quexp_ajax_call_add_tf_question_insert(){
		global $wpdb;
		$q_id=sanitize_text_field($_POST['q_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);
		$answer=sanitize_text_field($_POST['answer_val']);

		$wpdb->insert($wpdb->prefix ."quexp_tf", array(
					"q_id" => $q_id,
					"question" => $qname,
					"answer" => $answer,
				));
		$new_tf_id = $wpdb->insert_id;
		echo esc_js( $new_tf_id);
		exit();
		wp_die();
	}

	function quexp_ajax_call_save_tf_question(){
		global $wpdb;
		$tf_id=sanitize_text_field($_POST['tf_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);

		$answer=sanitize_text_field($_POST['answer_val']);


		$wpdb->update($wpdb->prefix ."quexp_tf", array(
					"question" => $qname,
					"answer" => $answer,
				),
			    array('id' => $tf_id));
		echo esc_js("1");
		exit();
		wp_die();
	}
	
	function quexp_ajax_call_add_sq_question(){
		global $wpdb;
		$em_id=sanitize_text_field($_POST['em_id_val']);

		$wpdb->insert($wpdb->prefix ."quexp_questions", array(
			"quiz_id" => $em_id,
			"type" => "sq",
		));

		$q_id = $wpdb->insert_id;
		echo esc_js($q_id);
		exit();
		wp_die();
	}

	function quexp_ajax_call_add_sq_question_insert(){
		global $wpdb;
		$q_id=sanitize_text_field($_POST['q_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);
		$answer=sanitize_text_field($_POST['answer_val']);

		$wpdb->insert($wpdb->prefix ."quexp_sq", array(
					"q_id" => $q_id,
					"question" => $qname,
					"answer" => $answer,
				));
		$new_sq_id = $wpdb->insert_id;
		echo esc_js( $new_sq_id);
		exit();
		wp_die();
	}

	function quexp_ajax_call_save_sq_question(){
		global $wpdb;
		$sq_id=sanitize_text_field($_POST['sq_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);

		$answer=sanitize_text_field($_POST['answer_val']);


		$wpdb->update($wpdb->prefix ."quexp_sq", array(
					"question" => $qname,
					"answer" => $answer,
				),
			    array('id' => $sq_id));
		echo esc_js("1");
		exit();
		wp_die();
	}

	function quexp_ajax_call_delete_question(){
		global $wpdb;
		$q_id=sanitize_text_field($_POST['q_id_val']);
		$q_type=sanitize_text_field($_POST['q_type_val']);

		$wpdb->delete($wpdb->prefix ."quexp_questions",
		array('q_id' => $q_id));

		if($q_type=="mcq"){
		$wpdb->delete($wpdb->prefix ."quexp_mcq",
				array('q_id' => $q_id));}

		else if($q_type=="tf"){
		$wpdb->delete($wpdb->prefix ."quexp_tf",
				array('q_id' => $q_id));}
				
		else if($q_type=="sq"){
		$wpdb->delete($wpdb->prefix ."quexp_sq",
			    array('q_id' => $q_id));}
		echo esc_js("1");
		exit();
		wp_die();
	}

	function quexp_ajax_call_delete_exam(){
		global $wpdb;
		$em_id=sanitize_text_field($_POST['em_id_val']);
		$wp_post_id=sanitize_text_field($_POST['wp_post_id_val']);

		$wpdb->delete($wpdb->prefix ."posts",
		array('ID' => $wp_post_id));

		$wpdb->delete($wpdb->prefix ."quexp_quizzes",
		array('quiz_id' => $em_id));

		$q_details = $wpdb->get_results(
			$wpdb->prepare("SELECT * from " .$wpdb->prefix ."quexp_questions  WHERE quiz_id=$em_id", ""), ARRAY_A
		);

		foreach ($q_details as $key => $q_value){
				$q_id=$q_value['q_id'];
				$q_type=$q_value['type']; 

		$wpdb->delete($wpdb->prefix ."quexp_questions",
		array('q_id' => $q_id));

		if($q_type=="mcq"){
		$wpdb->delete($wpdb->prefix ."quexp_mcq",
				array('q_id' => $q_id));}

		else if($q_type=="tf"){
		$wpdb->delete($wpdb->prefix ."quexp_tf",
				array('q_id' => $q_id));}
				
		else if($q_type=="sq"){
		$wpdb->delete($wpdb->prefix ."quexp_sq",
				array('q_id' => $q_id));}
		}
		echo esc_js("1");
		exit();
		wp_die();
	}

	function quexp_ajax_call_record_result(){
		global $wpdb;
		$em_id=sanitize_text_field($_POST['em_id_val']);
		$em_user_id=sanitize_text_field($_POST['em_user_id_val']);
		$mark=sanitize_text_field($_POST['mark_val']);

		$result_details = $wpdb->get_results(
			"SELECT * from ".$wpdb->prefix ."quexp_results"."  WHERE  user_id=$em_user_id AND quiz_id=$em_id");
		
		if($wpdb->num_rows>0)
		{
			$wpdb->update($wpdb->prefix ."quexp_results", array(
				'result'  => $mark,
			),
			array('user_id' => $em_user_id, 'quiz_id' => $em_id));

		}else{
			$wpdb->insert($wpdb->prefix ."quexp_results", array(
				"user_id" => $em_user_id,
				"quiz_id" => $em_id,
				"result" => $mark,
			));
		}

		exit();
		wp_die();
	}
	
	function quexp_ajax_call_save_settings(){
		global $wpdb;
		$em_id=sanitize_text_field($_POST['em_id_val']);
		$em_type=sanitize_text_field($_POST['em_type_val']);
		$em_time=sanitize_text_field($_POST['em_time_val']);


		$wpdb->update($wpdb->prefix ."quexp_quizzes", array(
					"type" => $em_type,
					"time" => $em_time,
				),
			    array('quiz_id' => $em_id));
		echo esc_js("1");
		exit();
		wp_die();
	}
	
}