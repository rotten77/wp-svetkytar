<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
<?php the_post(); ?>
				<h1>Články autora: <strong><?php echo get_the_author(); ?></strong></h1>
				
			<?php get_template_part('includes/posts'); ?>
		</div>
		
		<div class="col-md-4">
		<?php get_sidebar(); ?>	
		</div>
	</div>
</div>


<?php get_footer(); ?>