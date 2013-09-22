<?php get_template_part('includes/social-links'); ?>

<div class="row-topm">
<ul class="nav nav-tabs">
	<li class="active"><a href="#nejnovejsi" data-toggle="tab">Nejnovější</a></li>
	<li><a href="#vybrane" data-toggle="tab">Vybrané</a></li>
	<li><a href="#video" data-toggle="tab">Videa</a></li>
	<li><a href="#bleskovky" data-toggle="tab">Bleskovky</a></li>
</ul>

<div class="tab-content">
<div class="tab-pane active" id="nejnovejsi">
<?php query_posts(array('posts_per_page' => 4, 'category__not_in' => array(3,9))); ?>
<?php while(have_posts()) : the_post(); ?>
	<div class="media">
		<a class="pull-left" href="<?php the_permalink(); ?>">
			<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 64, 64); ?>" class="media-object" alt="<?php the_title(); ?>" />
		</a>
		<div class="media-body">
			<h5 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<!--<p><?php echo short_text(get_the_excerpt()); ?></p>-->
			<p><small><?php echo get_the_date('d. m. Y').", autor: <strong>".get_the_author()."</strong>, kategorie: "; the_category(', ');?></small></p>
		</div>
							
	</div>
<?php endwhile;?>
</div>

<div class="tab-pane" id="vybrane">
<?php query_posts('meta_key=sk_vybrane&meta_value=1&posts_per_page=4&paged=1'); ?>
<?php while(have_posts()) : the_post(); ?>
	<div class="media">
		<a class="pull-left" href="<?php the_permalink(); ?>">
			<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 64, 64); ?>" class="media-object" alt="<?php the_title(); ?>" />
		</a>
		<div class="media-body">
			<h5 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<!--<p><?php echo short_text(get_the_excerpt()); ?></p>-->
			<p><small><?php echo get_the_date('d. m. Y').", autor: <strong>".get_the_author()."</strong>, kategorie: "; the_category(', ');?></small></p>
		</div>
							
	</div>
<?php endwhile;?>
</div>

<div class="tab-pane" id="video">
<?php query_posts(array('posts_per_page' => 4, 'category__in' => 9)); ?>
<?php while(have_posts()) : the_post(); ?>
	<div class="media">
		<a class="pull-left" href="<?php the_permalink(); ?>">
			<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 64, 64); ?>" class="media-object" alt="<?php the_title(); ?>" />
		</a>
		<div class="media-body">
			<h5 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<!--<p><?php echo short_text(get_the_excerpt()); ?></p>-->
			<p><small><?php echo get_the_date('d. m. Y').", autor: <strong>".get_the_author()."</strong>, kategorie: "; the_category(', ');?></small></p>
		</div>
							
	</div>
<?php endwhile;?>
</div>

<div class="tab-pane" id="bleskovky">
<?php query_posts(array('posts_per_page' => 4, 'category__in' => 3)); ?>
<?php while(have_posts()) : the_post(); ?>
	<div class="media">
		<a class="pull-left" href="<?php the_permalink(); ?>">
			<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 64, 64); ?>" class="media-object" alt="<?php the_title(); ?>" />
		</a>
		<div class="media-body">
			<h5 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<!--<p><?php echo short_text(get_the_excerpt()); ?></p>-->
			<p><small><?php echo get_the_date('d. m. Y').", autor: <strong>".get_the_author()."</strong>, kategorie: "; the_category(', ');?></small></p>
		</div>
							
	</div>
<?php endwhile;?>
</div>
</div>
</div>		
<?php dynamic_sidebar('sk_sidebar'); ?>