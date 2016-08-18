<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MyLCCC_Theme
 */

?>

	</div><!-- #content -->
</div>
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
											    	<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
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

<?php wp_footer(); ?>
</body>
</html>
