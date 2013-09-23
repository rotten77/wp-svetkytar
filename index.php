<?php get_header(); ?>

<?php
if(is_home()) {
	get_template_part('includes/homepage');
} elseif(have_posts()) {
	get_template_part('includes/posts');	
} elseif(is_404()) {
	get_template_part('includes/404');
}

?>


<?php get_footer(); ?>