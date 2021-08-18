<?php 
/**
 * shortcode initialize
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */
namespace Inc\Base;

use Inc\Base\QuexpBaseController;

/**
* 
*/
class QuexpShortCode extends QuexpBaseController
{
	public function quexp_register() {
		add_shortcode( 'quiz_expert', array( $this, 'quexp_exam_manager_qp_sc' ) );
	}
	
	function quexp_exam_manager_qp_sc($atts, $content = null)
	{
		$a = shortcode_atts(array(
			'id' => '',
		), $atts);
		$em_id=$a['id'];
		require_once( "$this->plugin_path/templates/front-qp.php" );
		return;
	}
}

