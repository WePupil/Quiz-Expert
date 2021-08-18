<?php
/**
 * creating database
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */
namespace Inc\Base;

class QuexpActivate
{
	public static function quexp_activate() {
	// create database table
	global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    $sql = "	CREATE TABLE `".$wpdb->prefix."quexp_quizzes` (
		`em_id` int(20) NOT NULL AUTO_INCREMENT,
		`post_id` int(20) NOT NULL,
		`type` varchar(255) DEFAULT NULL,
		`time` int(11) NOT NULL DEFAULT '0',
		`total_takers` int(11) DEFAULT NULL,
		PRIMARY KEY (`em_id`)
	   ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	dbDelta($sql);
	
	$sql2 = "	CREATE TABLE `".$wpdb->prefix."quexp_questions` (
			`q_id` int(20) NOT NULL AUTO_INCREMENT,
			`em_id` int(20) NOT NULL,
			`type` text,
			`slno` int(20) DEFAULT NULL,
			PRIMARY KEY (`q_id`)
	   ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	dbDelta($sql2);

	$sql3 = "	CREATE TABLE `".$wpdb->prefix."quexp_mcq` (
			`id` int(20) NOT NULL AUTO_INCREMENT,
			`q_id` int(20) NOT NULL,
			`question` text NOT NULL,
			`ansa` text NOT NULL,
			`ansb` text NOT NULL,
			`ansc` text,
			`ansd` text,
			`anse` text,
			`ansf` text,
			`ansg` text,
			`ansh` text,
			`ansi` text,
			`ansj` text,
			`answer` char(11) NOT NULL,
			`explaination` text,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
 
	 dbDelta($sql3);

	 $sql4 = "	CREATE TABLE `".$wpdb->prefix."quexp_tf` (
			`id` int(20) NOT NULL AUTO_INCREMENT,
			`q_id` int(20) NOT NULL,
			`question` text NOT NULL,
			`answer` char(11) NOT NULL,
			`explaination` text,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
 
	 dbDelta($sql4);

	 $sql5 = "	CREATE TABLE `".$wpdb->prefix."quexp_sq` (
			`id` int(20) NOT NULL AUTO_INCREMENT,
			`q_id` int(20) NOT NULL,
			`question` text NOT NULL,
			`answer` char(11) NOT NULL,
			`explaination` text,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
 
	 dbDelta($sql5);

	 $sql6 = "	CREATE TABLE `".$wpdb->prefix."quexp_results` (
			`id` int(20) NOT NULL AUTO_INCREMENT,
			`user_id` int(20) NOT NULL,
			`em_id` int(20) NOT NULL,
			`result` int(5) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
 
	 dbDelta($sql6);

	 flush_rewrite_rules();

	}




}