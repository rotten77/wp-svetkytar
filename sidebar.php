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
	<?php get_template_part('includes/post-sidebar'); ?>
<?php endwhile;?>
</div>

<div class="tab-pane" id="vybrane">
<?php query_posts('meta_key=sk_vybrane&meta_value=1&posts_per_page=4&paged=1'); ?>
<?php while(have_posts()) : the_post(); ?>
	<?php get_template_part('includes/post-sidebar'); ?>
<?php endwhile;?>
</div>

<div class="tab-pane" id="video">
<?php query_posts(array('posts_per_page' => 4, 'category__in' => 9)); ?>
<?php while(have_posts()) : the_post(); ?>
	<?php get_template_part('includes/post-sidebar'); ?>
<?php endwhile;?>
</div>

<div class="tab-pane" id="bleskovky">
<?php query_posts(array('posts_per_page' => 4, 'category__in' => 3)); ?>
<?php while(have_posts()) : the_post(); ?>
	<?php get_template_part('includes/post-sidebar'); ?>
<?php endwhile;?>
</div>
</div>
</div>		
<?php dynamic_sidebar('sk_sidebar'); ?>