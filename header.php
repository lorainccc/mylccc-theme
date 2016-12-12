<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MyLCCC_Theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
	<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mylccc-theme' ); ?></a>
		<header id="masthead" class="site-header" role="banner">			
		<div class="row show-for-medium-up header-row">
		<div class="medium-8 large-9 columns site-branding">
			<?php
			$url = home_url();
			?>
			<a href="/">
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

<body <?php body_class(); ?>>
			<div class="row main">