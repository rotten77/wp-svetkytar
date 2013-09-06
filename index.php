<?php get_header(); ?>
<?php $excludePosts = array(); ?>

<?php
if(is_home()) {
	get_template_part('includes/homepage');
} else {
	get_template_part('includes/posts');
}

?>


<?php get_footer(); ?>