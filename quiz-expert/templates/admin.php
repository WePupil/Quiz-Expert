<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.3.6
 * @package QuizExpert
 */
?>
<?php add_thickbox(); ?>
<?php
global $wpdb;
$all_quiz = $wpdb->get_results(
        $wpdb->prepare(
                "SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_quizzes_table(). " ORDER by quiz_id DESC", ""
        ), ARRAY_A
);
?>
			<div class="wrap">
            <h1 class="wp-heading-inline">Quiz Expert</h1>
            <a href="admin.php?page=quiz-expert-add-new" class="page-title-action">Add New Quiz</a>
			<hr class="wp-header-end">
            <br/><br/>
             <table class="wp-list-table widefat fixed striped table-view-list posts">
                    <thead>
                        <tr>
                            <th class="column-author">Sl No</th>
                            <th>Title</th>
							<th>Type</th>
                            <th>ShortCode</th>
                            <th>Action</th>
 
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (count($all_quiz) > 0) {
                            $i = 1;
                            foreach ($all_quiz as $key => $value) {
								$wp_post_id= $value['post_id'];
								$em_type=$value['type'];

								$post_details = $wpdb->get_results(
										$wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_posts_table(). "  WHERE ID=$wp_post_id", ""), ARRAY_A
									);
									foreach ($post_details as $key => $post_value) {
											$post_title=$post_value['post_title'];}

                                ?>
                                <input type="hidden" id="wp_post_id<?php echo esc_attr( $value['quiz_id']); ?>" value="<?php echo esc_attr( $wp_post_id); ?>">
                                <tr id="quiz_row<?php echo esc_attr( $value['quiz_id']); ?>">
                                    <td class="column-author"><?php echo esc_attr( $i++); ?></td>
                                    <td><a href="admin.php?page=quiz-expert-edit-quiz&edit=<?php echo esc_attr( $value['quiz_id']); ?>" class="row-title"><?php echo esc_attr( $post_title); ?></a></td>
									<td><?php echo esc_attr( $em_type); ?></td>
                                    <td>[quiz_expert id=<?php echo esc_attr( $value['quiz_id']); ?>]</td>
                                    <td>
                                        <a class="button" href="admin.php?page=quiz-expert-edit-quiz&edit=<?php echo esc_attr( $value['quiz_id']); ?>">Edit</a>
                                        <a href="#TB_inline?width=600&height=550&inlineId=delete_exam_popup" title="Delete Question" class="thickbox" onclick="quexp_delete_exam_button(<?php echo esc_attr( $value['quiz_id']); ?>);"  style="text-decoration: none;"><span class="button">Delete</span></a></div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
<div id="delete_exam_popup" style="display:none;">
<br/><br/><br/><br/><br/><br/>
<h1  style="text-align:center;">Do you permenently delete the quiz?</h1>
<div id="delete_exam_button" style="text-align:center;"></div>
</div>