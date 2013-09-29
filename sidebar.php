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

<div id="sidebar-float">
<div class="panel panel-primary">
	<div class="panel-heading"><h3 class="panel-title">Facebook</h3></div>
	<div class="panel-body"><div class="fb-like-box" data-href="https://www.facebook.com/svetkytar" data-width="292" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div></div>
</div>
</div>