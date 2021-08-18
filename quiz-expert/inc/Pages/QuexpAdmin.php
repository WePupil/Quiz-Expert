<?php 
/**
 * Pages in admin
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */
namespace Inc\Pages;

use Inc\Api\QuexpSettingsApi;
use Inc\Base\QuexpBaseController;
use Inc\Api\Callbacks\QuexpAdminCallbacks;

/**
* 
*/
class QuexpAdmin extends QuexpBaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public $subpages = array();

	public function quexp_register() 
	{
		$this->settings = new QuexpSettingsApi();
		$this->callbacks = new QuexpAdminCallbacks();

		$this->setPages();
		$this->setSubpages();



		$this->settings->addPages( $this->pages )->withSubPage( 'All Quizzes' )->addSubPages( $this->subpages )->quexp_register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'Quiz Expert', 
				'menu_title' => 'Quiz Expert', 
				'capability' => 'manage_options', 
				'menu_slug' => 'quiz-expert', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-welcome-learn-more', 
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'quiz-expert', 
				'page_title' => 'Add New', 
				'menu_title' => 'Add New', 
				'capability' => 'manage_options', 
				'menu_slug' => 'quiz-expert-add-new', 
				'callback' => array( $this->callbacks, 'adminAddNew' )
			),
			array(
				'parent_slug' => 'em-add-new', 
				'page_title' => 'Edit Quiz', 
				'menu_title' => 'Edit Quiz', 
				'capability' => 'manage_options', 
				'menu_slug' => 'quiz-expert-edit-quiz', 
				'callback' => array( $this->callbacks, 'adminEdit' )
			),

		);
	}

	
}