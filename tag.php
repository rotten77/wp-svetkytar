<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">

				<h1>Štítek: <strong><?php echo single_tag_title( '', false ) ?></strong></h1>
				
			<?php get_template_part('includes/posts'); ?>
		</div>
		
		<div class="col-md-4">
		<?php get_sidebar(); ?>	
		</div>
	</div>
</div>


<?php get_footer(); ?>