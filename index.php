<?php get_header(); ?>

<?php
// echo get_the_ID();
if(is_home()) {
	get_template_part('includes/homepage');
} elseif(get_the_ID()==358) {
	get_template_part('clanky');
}elseif(is_404()) {
	get_template_part('includes/404');
}
?>


<?php get_footer(); ?>