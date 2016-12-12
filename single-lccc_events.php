<?php
/**
 * The template for displaying all single posts.
 *
 * @package LCCC Framework
 */

get_header(); ?>

<div class="row page-content">
			<div class="small-12 medium-12 large-12 columns nopadding show-for-small-only">
  <div class="row show-for-small-only sub-mobile-menu-row" style="background:#000;">
 <div class="small-2 columns" style="padding-top: 0.5rem;padding-left: 1.625rem;"> <span data-responsive-toggle="sub-responsive-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
      </span> </div>
    <div class="small-10 columns nopadding"><h3 class="sub-mobile-menu-header" style="color:#ffffff;"><?php single_post_title(); ?> Menu</h3></div>
  </div>
  <div id="sub-responsive-menu" class="show-for-small-only">
    <ul class="vertical menu" data-drilldown data-parent-link="true">

					<?php 	wp_nav_menu(array(
													'container' => false,
													'menu' => __( 'Drill Menu', 'textdomain' ),
													'menu_class' => 'vertical menu',
										'theme_location' => $menuslug,
													'menu_id' => 'sub-mobile-primary-menu',
														//Recommend setting this to false, but if you need a fallback...
													'fallback_cb' => 'lc_drill_menu_fallback',
													'walker' => new lc_drill_menu_walker(),
												));
					?>

    </ul>
  </div>
</div>
	<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
</div>
	<div class="medium-4 large-4 columns hide-for-small-only">
	<div class="small-12 medium-12 large-12 columns sidebar-widget">
		<div class="small-12 medium-12 large-12 columns sidebar-menu-header">
		<h3><?php echo bloginfo('the-title'); ?></h3>
		</div>
	<?php	if ( has_nav_menu( 'left-nav' ) ) : ?>
	<div id="secondary" class="medium-12 columns secondary nopadding">
		<?php if ( has_nav_menu( 'left-nav' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => $menuslug,
					) );
				?>
			</nav><!-- .main-navigation -->
				<?php endif; ?>
		</div>
		<?php endif; ?>
			<?php if ( is_active_sidebar( 'stocker-page-events-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'stocker-page-events-sidebar' ); ?>
				<?php } ?>
	</div>
		
	</div>
		<div class="small-12 medium-8 large-8 columns">		
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'lccc-event' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div>
<div class="medium-4 large-4 columns show-for-small-only">
	<div class="small-12 medium-12 large-12 columns sidebar-widget">
			<?php if ( is_active_sidebar( 'stocker-page-events-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'stocker-page-events-sidebar' ); ?>
				<?php } ?>
	</div>
	</div>
	
</div>
<?php get_footer(); ?>