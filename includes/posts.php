<?php $postCount=0; $reklama = false; ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">

			<?php if(is_archive()) { ?>
				<h1><?php
					if ( is_day() ) :
						printf( __( 'Archiv: %s', 'twentythirteen' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Archiv: %s', 'twentythirteen' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentythirteen' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Archiv: %s', 'twentythirteen' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentythirteen' ) ) );
					else :
						_e( 'Archiv', 'twentythirteen' );
					endif;
				?></h1>
			<?php } else if(is_category()) { ?>

				<h1><?php echo single_cat_title( '', false ); ?></h1>
				<?php if ( category_description() ) : // Show an optional category description ?>
				<div><?php echo category_description(); ?></div>
				<?php endif; ?>
			<?php } else { ?>

			<?php } ?>
				
		<?php while(have_posts()) : the_post();
			$postCount++;
			$nextClass="";

			if($postCount==3) {
				$nextClass=" row-topm";
				echo '<div class="reklama">ADD</div>';
				$reklama = true;
			}
		?>
		<div class="panel panel-default<?php echo $nextClass; ?>">
			<div class="panel-body">
				<h3 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="media">
					<a class="pull-left" href="<?php the_permalink(); ?>">
						<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 140, 140); ?>" class="media-object" alt="<?php the_title(); ?>" />
					</a>
					<div class="media-body">
						<!-- <h3 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>-->
						<p><?php the_excerpt(); ?></p>
						
					</div>
						
				</div>
			</div>
			
			<div class="panel-footer post-info">
				<?php get_template_part('includes/post-info'); ?>
			</div>
				
		</div>
		<?php endwhile;?>

		<?php
			if(!$reklama) {

				echo '<div class="reklama">ADD</div>';
				$reklama = true;
			}
		?>


	<ul class="pager">
		<li class="previous"><?php next_posts_link( '&larr; Starší články' ); ?></li>
		<li class="next"><?php previous_posts_link( 'Novější články &rarr;' ); ?></li>
	</ul>

		</div>
		
		<div class="col-md-4">
		<?php get_sidebar(); ?>	
		</div>
	</div>
</div>