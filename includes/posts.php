		<hr />
		
		<?php $postCount=0; $reklama = false; ?>
		<?php while(have_posts()) : the_post();
			$postCount++;
			$nextClass="";

			if($postCount==3) {
				$nextClass=" row-topm";
				echo file_get_contents(dirname(__FILE__) . "./../reklamy/clanek.html");
				$reklama = true;
			}
		?>
		<div class="panel panel-default<?php echo $nextClass; ?>">
			<div class="panel-body">
				<h3 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="media">
					<?php if(get_post_thumbnail_id()): ?>
					<a class="pull-left" href="<?php the_permalink(); ?>">
						<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 140, 140); ?>" class="media-object" alt="<?php the_title(); ?>" />
					</a>
					<?php endif; ?>
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
				echo file_get_contents(dirname(__FILE__) . "./../reklamy/clanek.html");
				$reklama = true;
			}
		?>


	<ul class="pager">
		<li class="previous"><?php next_posts_link( '&larr; Starší články' ); ?></li>
		<li class="next"><?php previous_posts_link( 'Novější články &rarr;' ); ?></li>
	</ul>