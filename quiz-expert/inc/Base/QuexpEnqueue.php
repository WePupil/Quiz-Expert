<?php 
/**
 *  enqueue Front page
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */
namespace Inc\Base;

use Inc\Base\QuexpBaseController;

/**
* 
*/
class QuexpEnqueue extends QuexpBaseController
{
	public function quexp_register() {
		add_action( 'wp_enqueue_scripts', array( $this, 'quexp_enqueue' ) );
	}
	
	function quexp_enqueue() {
		// enqueue Front page
		wp_register_style('quexp_frontstyle', $this->plugin_url . 'assets/frontstyle.css');
		wp_enqueue_style('quexp_frontstyle');
		
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'quexp_frontscript', $this->plugin_url . 'assets/frontscript.js' );

		wp_localize_script( 'quexp_frontscript', 'frontajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));     
		 
	}
} 