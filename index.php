<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MyLCCC_Theme
 */

get_header(); ?>
<div class="small-12 medium-12 large-12 columns contentdiv">
	<div class="small-12 medium-8 large-8 columns nopadding content-container">
					<div id="primary" class="content-area">
								<main id="main" class="site-main" role="main">
												<?php
												// The Query
															$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
													$args = array(
														'post_type' => array('post', 'lccc_announcement' ),
														'paged' => $paged,
														'category__not_in' => '1',
														'posts_per_page' => '12',
														'orderby' => 'date',
															'order' => 'DESC'
														);
														$the_main_query = new WP_Query( $args );
														// The Loop
														if ( $the_main_query->have_posts() ) {
															echo '<div class="row small-up-1 medium-up-2 large-up-3">';
															while ( $the_main_query->have_posts() ) {
																$the_main_query->the_post();
																echo '<div class="column">';
																				echo '<div class="small-12 medium-12 large-12 columns homeblock">';	
																							echo '<div class="small-12 medium-12 large-12 columns homeblock_header">';
																							foreach((get_the_category()) as $category) {
    																									$catslug = $category->slug;
																													$catname = $category->name;
																											echo '<div class="small-12 medium-12 large-12 columns tag '.$catslug.'">';
																																echo '<a href="http://mylccc.dev/blog/category/'.$catslug.'">';
																												echo '<h7>'.$catname.'</h7>';
																											echo '</a>';
																											echo '</div>';
																											}

																						echo '<div class="small-12 medium-12 large-12 columns hbheader_date">';
																											echo '<h6>'.get_the_date('F-d-Y').'</h6>';
																											echo '</div>';	
																						echo '</div>';
																							if ( has_post_thumbnail() ) {
																										echo '<div class="small-12 medium-12 large-12 columns hbimage">';
																												the_post_thumbnail();
																										echo '</div>';
																							}
																							echo '<div class="small-12 medium-12 large-12 columns homeblock_content">';				
																												the_title('<h3>','</h3>');	
																												the_excerpt();
																							echo '</div>';
																							echo '<div class="small-12 medium-12 large-12 columns homeblock_content">';
																										$link = get_permalink();
																										echo '<a href="'.$link.'" class="button radius">Continue reading this story</a>';
																							echo '</div>';
																			echo '</div>';
																echo '</div>';							
															}
															echo '</div>';
												wpbeginner_numeric_posts_nav();
														} else {
															// no posts found
														}
														/* Restore original Post Data */
														wp_reset_postdata();
											 ?>
								</main><!-- #main -->
					</div><!-- #primary -->
	</div>
	<div class="small-12 medium-4 large-4 columns sidebarcontainer">
				<?php get_sidebar(); ?>
	</div>
</div>	
<?php
get_footer();
