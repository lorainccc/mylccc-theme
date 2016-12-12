<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MyLCCC_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" >
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="small-12 medium-12 large-12 columns entry-content nopadding">
		<?php
		if ( has_post_thumbnail() ) {
			echo '<div class="small-12 medium-4 large-4 columns">';
    the_post_thumbnail();
			echo '</div>';
			echo '<div class="small-12 medium-8 large-8 columns">';
			?>
			<div class="small-12 medium-12 large-12 columns nopadding event-details">
						<header class="entry-header">
													<?php the_category( ', ' ); ?>
													<p><?php echo 'Date: '.$eventstartmonthfull.', '.$eventstartday.' '.$eventstartyear; ?></p>
													<p><?php echo 'Time: '.$starttime; ?></p>
													<?php if( $location != ''){ ?>
															<p><?php echo 'Location: '.$location; ?></p>
													<?php } ?>
						</header><!-- .entry-header -->
		</div>
		<?php
						echo '<div class="small-12 medium-12 large-12 columns">';
									the_content();
						echo '</div>';
			echo '</div>';
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mylccc-theme' ),
				'after'  => '</div>',
			) );
}else{
			?>
		<div class="small-12 medium-12 large-12 columns nopadding event-details">
						<header class="entry-header">
													<?php the_category( ', ' ); ?>
													<p><?php echo 'Date: '.$eventstartmonthfull.', '.$eventstartday.' '.$eventstartyear; ?></p>
													<p><?php echo 'Time: '.$starttime; ?></p>
													<?php if( $location != ''){ ?>
															<p><?php echo 'Location: '.$location; ?></p>
													<?php } ?>
						</header><!-- .entry-header -->
		</div>
		<?php
						echo '<div class="small-12 medium-12 large-12 columns">';
									the_content();
						echo '</div>';
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mylccc-theme' ),
				'after'  => '</div>',
			) );	
			
		}
		
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'mylccc-theme' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
	<div class="column row">
    <hr>
  </div>
</article><!-- #post-## -->
