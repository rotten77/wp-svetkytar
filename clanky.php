<?php
/*
Template Name: Clanky
*/
$paginate = get_query_var('paged');
if($paginate<=0) $paginate=1;
query_posts('paged='.$paginate);
?>
<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">

				<h1>Všechny články</h1>
				
			<?php get_template_part('includes/posts'); ?>
		</div>
		
		<div class="col-md-4">
		<?php get_sidebar(); ?>	
		</div>
	</div>
</div>


<?php get_footer(); ?>