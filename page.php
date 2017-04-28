<?php
/*
 * CODE ALMOST IDENTICAL TO PARENT THEME - LINE 30 EXCLUDED TO REMOVE PAGE TITLES. AM 16-02-17 ~~~~~
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */
?>

<?php get_header(); ?>

<div class="spacer"></div>

<div class="container">

	<div class="row">

		<div class="<?php if ( is_active_sidebar( 'rightbar' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?>">

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

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>