<?php
/**
 * CODE ALMOST IDENTICAL TO PARENT THEME - LINE 27 EXCLUDED TO REMOVE PAGE TITLES. AM 16-02-17 ~~~~~
 Template Name: Full-width Template
 * Pages for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php get_header(); ?>

<div class="spacer"></div>

<div class="container">

	<div class="row">

		<div class="col-md-12">

			<div class="content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
							<?php // Page Title code excluded. AM 16-02-17 ?>
					    
						     <div class="entry">

								<?php the_content(); ?>

						     </div>
					     
					 </div>
					
					 <?php endwhile;?>

				 <?php endif; ?>

			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>