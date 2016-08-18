<?php
/**
 * Template Name: Calender List View
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>
<div class="small-12 medium-12 large-12 columns contentdiv">
			<div class="small-12 medium-12 large-12 columns pagediv">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'eventscalendar' );
					endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
	<div class="small-12 medium-12 large-12 columns">
<ul class="small-block-grid-1 small-block-grid-3 large-block-grid-3">		
						<li><?php do_action( 'lccc_prev_week',$month, $year, $monthString); ?></li>
							<li><div style='display:inline-block;'>&nbsp;</div><div style='text-align:center;'><a href="/list">Today</a></div></li>
						<li><?php do_action( 'lccc_next_week',$month, $year, $monthString); ?></li>
</ul>
<?php
   parse_str($_SERVER['QUERY_STRING']);  
 
   if ($m == ""){
    
    $dateComponents = getdate();
    $month = $dateComponents['mon'];
    $year = $dateComponents['year'];
   } else {
   
     $month = $m;
     $year = $y;
   
   }
$monthString = array();
$dateArray = array();

do_action( 'lccc_list',$month, $year, $monthString); 
if ($displaycount<8){
	$nxtmonth = $month+1;
	if ($nxtmonth == 13){
		$nxtmonth = 1;
		$startyear ++;
	}		
	do_action( 'lccc_add_to_list',$nxtmonth,$year,$dateArray);
	}
?>

</div>
</div>	
<?php 
get_footer();
?>