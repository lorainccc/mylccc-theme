<?php
/**
 * Template part for displaying posts.
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
<article id="post-<?php the_ID(); ?>">
	<div class="small-12 medium-12 large-12 columns">
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
					if( $eventsubheading != ''){
						?>
						<h4 class="event-sub-heading"><?php echo $eventsubheading;?> </h4>
					<?php
					}
				
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php mylccc_theme_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

	</header><!-- .entry-header -->
</div>
	<div class="small-12 medium-2 large-2 columns">
	<?php
		if ($starteventdate != ''){
		echo '<div class="small-12 medium-12 large-12 columns event-date nopadding">';

   echo '<div class="small-12 medium-12 large-12 columns  calendar">';    
								echo '<div class="event-calendar-icon">';
        echo '</div>';
							echo '<p class="mylccc-month">'.$eventstartmonth.'</p>';
							echo '<p class="mylccc-day">'.$eventstartday.'</p>';
				echo '</div>';			
		
		echo '</div>';	
			}	
		?>
 </div>
	<div class="small-12 medium-10 large-10 columns nopadding event-details">
	<header class="entry-header">
        <?php the_category( ', ' ); 

		if($starteventdate != ''){?>
   <p><?php echo 'Date: '.$eventstartmonthfull.', '.$eventstartday.' '.$eventstartyear; ?></p>
		<?php } 
		if($starteventtime != ''){
		?>
			<p><?php echo 'Time: '.$starttime; ?></p>
		<?php } if( $location != ''){ ?>
          <p><?php echo 'Location: '.$location; ?></p>
								<?php } ?>
	</header><!-- .entry-header -->
	</div>
<?php
if ( has_post_thumbnail() ) {
?>
<div class="small-12 medium-5 large-5 columns">
	<?php the_post_thumbnail(); ?>
</div>
<div class="small-12 medium-7 large-7 columns">
		<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mylccc-theme' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

	</div><!-- .entry-content -->
</div>
<?php }else{ ?>
	<div class="small-12 medium-12 large-12 columns entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mylccc-theme' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div><!-- .entry-content -->
	
<?php }	?>
				<div class="small-12 medium-12 large-12 columns">
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mylccc-theme' ),
				'after'  => '</div>',
			) );
		?>
		</div>

	<div class="small-12 medium-12 large-12 columns">
	<footer class="entry-footer">
		<a class="button" href="/mylccc/lccc_events">Back to All Events</a>
	</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
