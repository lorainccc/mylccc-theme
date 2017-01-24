<?php
/**
 * Template Name: Day
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
	<div class="row main">
<div class="small-12 medium-12 large-12 columns contentdiv">
	<div class="small-12 medium-12 large-12 columns nopadding">
		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php $myvar = get_query_var('d');
						
		if($myvar != ''){
	$date=strtotime($myvar);
				$event_month=date("F",$date);
				$event_day=date("j",$date);
				$event_year=date("Y",$date);
	}elseif ($m == ""){  
    $dateComponents = getdate();
    $event_month = $dateComponents['month'];
    $myvar_event_month = $dateComponents['mon'];
				$event_year = $dateComponents['year'];
				$event_day = $dateComponents['mday'];
				$myvar = $event_year.'-'.$myvar_event_month.'-'.$event_day;
   } else {
     $event_month = $m;
     $event_year = $y;
     $event_day =$d;
   }
			
			?>	
			<div class="small-12 medium-12 large-12 columns">
				<div class="small-up-1 medium-up-2 large-up-3">
				<div class="column column-block"><a href="calendar/?d=<?php echo $myvar;?>"><--- Back to Calendar</a></div>
				<div class="column column-block show-for-large-up"> &nbsp;</div>
				<div class="column column-block" style="text-align:right;">	
				<a href="week/?d=<?php echo $myvar; ?>">Back To Weekly View</a></div>	
				</div>
			<h1><?php echo $event_month.' '.$event_day.', '.$event_year.' Events'; ?></h1>
			</div>		
				<div class="small-12 medium-12 large-12 columns pagediv">
										<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'calendarday' );
					endwhile; // End of the loop.
						?>
			</div>
			<div class="small-12 medium-12 large-12 columns events-list">	
						<?php 
				$lcccevents = '';
				$stockerevents = '';
				$athleticevents = '';
	
			//Grab posts (endpoints)
  	$domain = 'http://' . $_SERVER['SERVER_NAME'];

	   //?filter[posts_per_page]='.$displaynumber.'
			$lcccevents = new Endpoint( $domain . '/mylccc/wp-json/wp/v2/lccc_events?filter[posts_per_page]=-1' );
			$athleticevents = new Endpoint( $domain . '/athletics/wp-json/wp/v2/lccc_events?per_page=100' );
			$stockerevents = new Endpoint( 'http://sites.lorainccc.edu/stocker/wp-json/wp/v2/lccc_events?filter[posts_per_page]=-1' );
	
		//Create instance
	$multi = new MultiBlog( 1 );
	
		//Add endpoints to instance
	if ( $lcccacademicevents != ''){
		$multi->add_endpoint ( $lcccacademicevents );
	};
	if ( $lcccevents != ''){
		$multi->add_endpoint ( $lcccevents );
	};
	if ( $athleticevents != ''){
		$multi->add_endpoint ( $athleticevents );
	};

	if ( $stockerevents != ''){
		$multi->add_endpoint ( $stockerevents );
	};
	//Fetch Endpoints
	$posts = $multi->get_posts();
	if(empty($posts)){
		echo 'No Posts Found!';
	}
	
usort( $posts, function ( $a, $b) {
return strtotime( $a->event_start_date ) - strtotime( $b->event_start_date );
});
						if($posts !=''){	
					foreach ( $posts as $post ){
									if(strtotime($post->event_start_date) == strtotime($myvar)){
											echo '<div class="small-12 medium-12 large-12 columns">';
											echo '<a href="'.$post->link.'"><h2 class="event-title">'.$post->title->rendered.'</h2></a>';
											echo '<p>'.$post->excerpt->rendered.'</p>';
											if( $post->excerpt->rendered != ''){
												echo '<a class="button" href="'.$post->link.'">Learn More</a>';
											}
											echo '</div>';
											echo	'<div class="column row event-list-row">';
            			echo '<hr>';
           echo '</div>'; 
									}
						}
				}
						?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

</div>

</div>	
<?php
get_footer();
