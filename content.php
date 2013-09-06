<?php get_header(); ?>
<?php $excludePosts = array(); ?>
<div class="container">
	
	<!-- vybrané příspěvky -->
	<div class="row">
	<div class="col-md-8">
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
	</div>
	
	
</div>


<?php get_footer(); ?>