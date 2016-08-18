<?php
/**
 * Template part for displaying emailer posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MyLCCC_Theme
 */

 /* Query for emailer posts */

	$emailer_date = esc_attr( get_post_meta( $post->ID, 'lc_emailer_post_date', true ) );

	$date = strtotime($emailer_date);

	$args = array(
		'post_type' 					=> 'lccc_announcement',
		'post_status' 			=> 'publish',
		'posts_per_page' => -1,
		'year'											=> date("Y", $date),
		'month'										=> date("m", $date),
		'day'												=> date("j", $date),
		'category_name' 	=> 'campus-wide,faculty-staff',
	);

	$emailer_query = new WP_Query( $args );

	/* The emailer loop */
	if ( $emailer_query->have_posts() ) {
		while ( $emailer_query->have_posts() ){
			$emailer_query->the_post(); 

?>
			
	<div class="row">
 	<div class="large-12 medium-12 small-12 columns">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><?php the_title(); ?></h2>
				<p>Start Date: <?php echo event_meta_box_get_meta( 'event_meta_box_event_start_date_and_time_' ); ?></p>
				<h3>Description:</h3>
				<?php the_content(); ?>
			</article>
		</div>
 </div>

<?php

		}
	}
 wp_reset_postdata();
?>

