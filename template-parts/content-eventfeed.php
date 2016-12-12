<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MyLCCC_Theme
 */

?>
<?php
$today = getdate();
				$currentDay = $today['mday'];
				$month = $today['mon'];
				$year = $today['year'];
				$firsteventdate ='';
    $nexteventdate ='';
				$todaysevents = '';
				$temp = strLen($currentDay);            
				$twoDay = '';
	   $nextTwoDay = '';
    if ($temp < 2){
							$twoDay = '0' . $currentDay;
				}else{
							$twoDay = $currentDay;
				}
				$twomonth = '';
    $tempmonth = strLen($month);
    if ($tempmonth < 2){
							$twomonth = '0' . $month;
				}else{
							$twomonth = $month;
				}
			 $nextDay = $currentDay + 1;
				if ($temp < 2){
							$nextTwoDay = '0' . $currentDay;
				}else{
							$nextTwoDay = $currentDay;
				}
		$starteventdate = 
			event_meta_box_get_meta('event_start_date');
		$starteventtime = event_meta_box_get_meta('event_start_time');  
		$endeventdate = event_meta_box_get_meta('event_end_date');
		$endtime = event_meta_box_get_meta('event_end_time');
		

										$starttimevar=strtotime($starteventtime);
										$starttime=	date("h:i a",$starttimevar);
										$starteventtimehours = date("G",$starttimevar);
										$starteventtimeminutes = date("i",$starttimevar);
		
          $startdate=strtotime($starteventdate);
										$eventstartdate=date("Y-m-d",$startdate);
										$eventstartmonth=date("M",$startdate);
                                        $eventstartmonthfull=date("F",$startdate);
										$eventstartday =date("j",$startdate);
                                        $eventstartyear =date("Y",$startdate);
										
										$endeventtimevar=strtotime($endtime);
										$endeventtime = date("h:i a",$endeventtimevar);
										$endeventtimehours = date("G",$endeventtimevar);
										$endeventtimeminutes = date("i",$endeventtimevar);
		
										$enddate=strtotime($endeventdate);
										$endeventdate = date("Y-m-d",$enddate);
		
										
		$duration = '';
		if($endeventtimehours == 0){
			$endeventtimehours =24;
		}
		$durationhours =	$endeventtimehours - $starteventtimehours;
		if($durationhours > 0){
				if($durationhours == 24){
				$duration .= '1 day';
				}else{
				$duration .= $durationhours.'hrs'; 
				}
		}
		$durationminutes = $endeventtimeminutes - $starteventtimeminutes;
		if($durationminutes > 0){
			$duration .= $durationminutes.'mins';
		}
$location = event_meta_box_get_meta('event_meta_box_event_location');  
$cost = event_meta_box_get_meta('event_meta_box_ticket_price_s_');
	$eventsubheading = event_meta_box_get_meta('event_meta_box_sub_heading');

?>
<article class="small-12 medium-12 large-12 columns" id="post-<?php the_ID(); ?>" >
	<header class="entry-header">
		<a href="<?php echo $post->link; ?>"><?php echo $post->title->rendered; ?></a>
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
						echo ' <p>' . $post->content->rendered . '</p>' ;
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
						echo '<div class="small-12 medium-12 large-12 columns nopadding">';
									the_content();
						echo '</div>';
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
