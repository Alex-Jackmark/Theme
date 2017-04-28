<?php
/**
 * Index for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php get_header(); ?>
<?php { if ( is_front_page() ) { get_template_part('sections/default'); } } ?>

<?php get_footer(); ?>