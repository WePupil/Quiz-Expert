<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  ExamManager
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Access the database via SQL
global $wpdb;

$em_details = $wpdb->get_results(
	$wpdb->prepare("SELECT * from " .$wpdb->prefix ."em_exams", ""), ARRAY_A
);

foreach ($em_details as $key => $em_value) {
		$wp_post_id=$q_value['post_id'];

		$wpdb->delete($wpdb->prefix ."posts",
		array('ID' => $wp_post_id));
}

$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."em_exams`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."em_question`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."em_mcq`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."em_sq`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."em_tf`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."em_results`");