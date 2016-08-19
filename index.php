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

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mylccc-theme' ); ?></a>
		<header id="masthead" class="site-header" role="banner">			
		<div class="row show-for-medium-up header-row">
		<div class="medium-8 large-9 columns site-branding">
			<?php
			$url = home_url();
			?>
			<a href="<?php echo esc_url( $url ); ?>">
			<img src="<?php echo get_bloginfo('stylesheet_directory');?>/images/MyLCCC-Logo.png" alt="MyLCCC Logo">
			</a>
			</div><!-- .site-branding -->
					<div class="medium-4 large-3 columns header-social-links show-for-medium-up">
												<div class="row medium-up-5 large-up-5 social-icons-header">
																				<div class="column"><a href="https://twitter.com/lorainccc"><i class="fi-social-twitter"></i></a></div>
																				<div class="column"><a href="https://www.facebook.com/lorainccc"><i class="fi-social-facebook"></i></a></div>
																				<div class="column"><a href="https://www.youtube.com/user/lcccwebvideo"><i class="fi-social-youtube"></i></a></div>
																				<div class="column"><a href="https://www.linkedin.com/company/lorain-county-community-college"><i class="fi-social-linkedin"></i></a></div>
																			<div class="column"><a href="https://www.instagram.com/lorainccc/"><i class="fi-social-instagram"></i></a></div>
																	</div>
					</div>
			</div>
<div class="medium-blue-bg show-for-medium">
    <div class="row main-menu-container">
      <div class="large-12 columns main-navigation-container">
        <nav class="menu-centered"  role="navigation">
									<?php
          wp_nav_menu(array(
											'container' => false,
											'menu' => __( 'MyLccc Primary', 'textdomain' ),
											'menu_class' => 'dropdown menu',
											'theme_location' => 'mylccc-primary',
											'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
											//Recommend setting this to false, but if you need a fallback...
											'fallback_cb' => 'lc_topbar_menu_fallback',
											'walker' => new lc_top_bar_menu_walker,
												));
											?>
        </nav>
      </div>
    </div>
  </div>
  <div class="row show-for-small-only mobile-nav-bar">
    <div class="small-8 columns"> <a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/lccclogo_white.svg" alt="" width="165" height="31.875" /></a> </div>
    <div class="small-2 columns clearfix"> <span data-responsive-toggle="mobile-search" data-hide-for="medium"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/magnifying-glass.svg" height="25" width="25" alt="" class="float-right" data-toggle/></span> </div>
    <div class="small-2 columns"> <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
      </span> </div>
  </div>
  <div id="mobile-search" class="show-for-small-only">
    <div class="row">
      <div class="small-12 columns">
        <form role="search" method="get" class="search-form" action="">
          <label>
            <input type="search" placeholder="Search" name="s" />
          </label>
        </form>
      </div>
    </div>
  </div>
  <div id="responsive-menu" class="show-for-small-only">
    <ul class="vertical menu" data-drilldown data-parent-link="true">

					<?php 	wp_nav_menu(array(
													'container' => false,
													'menu' => __( 'Drill Menu', 'textdomain' ),
													'menu_class' => 'vertical menu',
													'theme_location' => 'mobile-primary',
													'menu_id' => 'mobile-primary-menu',
														//Recommend setting this to false, but if you need a fallback...
													'fallback_cb' => 'lc_drill_menu_fallback',
													'walker' => new lc_drill_menu_walker(),
												));
					?>

    </ul>
  </div>
	</header><!-- #masthead -->
	
		<div class="row main">
				<div id="content" class="site-content">
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
																										echo '<a href="'.$link.'" class="button">Continue reading this story</a>';
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
			</div><!-- #content -->
	</div><!--Closes .row .main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="row footer">
						<div div class="row small-up-1 medium-up-3 large-up-3"  data-equalizer>
										<div class="column" data-equalizer-watch>
													<div class="small-12 medium-12 large-12 columns lccc-footer-branding">
																		<div class="small-12 medium-12 large-12 columns lccc-footer-branding">
																						<a href="http://www.lorainccc.edu/"><img src="<?php echo get_bloginfo('stylesheet_directory');?>/images/LCCC-logo-Reverse.png" alt="LCCC Logo"></a>
																		</div>
															<div class="large-12 columns lccc-footer-address show-for-large-up">
																			<p>1005 N Abbe Rd - Elyria, OH 44035 </p> 
																			<p>1-800-995-LCCC </p>
															</div>
														<div class="small-12 medium-12  columns lccc-footer-address hide-for-large-up">
																			<p>1005 N Abbe Rd</p>
																			<p>Elyria, OH 44035 </p> 
																			<p>1-800-995-LCCC </p>
															</div>
											</div>		
													</div>
										<div class="column" data-equalizer-watch>
													<div class="small-12 medium-12 large-12 columns lccc-footer-menu">
															<?php if ( has_nav_menu( 'mylccc-footer-menu' ) ) : ?>
															<nav id="site-navigation" class="footer-navigation" role="navigation">
																<?php
																	// Primary Footer navigation menu.
																	wp_nav_menu( array(
																		'menu_class'     => 'underline',
																		'theme_location' => 'mylccc-footer-menu',
																	) );
																?>
															</nav><!-- .main-navigation -->
														<?php endif; ?>
													</div>
										</div>
										<div class="column" data-equalizer-watch>
														<div class="small-12 medium-12 large-12 columns">
																	<h3 class="footer-connect">Connect to LCCC </h3>
														</div>
														<div class="small-12 medium-12 large-12 columns">
																		<div class="row small-up-2 medium-up-3 large-up-5 social-icons-footer">
																				<div class="column"><a href="https://twitter.com/lorainccc"><i class="fi-social-twitter"></i></a></div>
																				<div class="column"><a href="https://www.facebook.com/lorainccc"><i class="fi-social-facebook"></i></a></div>
																				<div class="column"><a href="https://www.youtube.com/user/lcccwebvideo"><i class="fi-social-youtube"></i></a></div>
																				<div class="column"><a href="https://www.linkedin.com/company/lorain-county-community-college"><i class="fi-social-linkedin"></i></a></div>
																			<div class="column"><a href="https://www.instagram.com/lorainccc/"><i class="fi-social-instagram"></i></a></div>
																	</div>
														</div>
									 </div>
						</div>
			</div>
	</footer><!-- #colophon -->
	
</div><!-- #page -->				
<?php
get_footer();
