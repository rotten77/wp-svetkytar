<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">

			<h1><?php echo 'Vyhledávání: <strong>'.get_search_query().'</strong>' ?></h1>
			<?php get_template_part('includes/posts'); ?>
		</div>
		
		<div class="col-md-4">
		<?php get_sidebar(); ?>	
		</div>
	</div>
</div>


<?php get_footer(); ?>