<?php get_header(); ?>
<?php the_post(); ?>



<div class="container">
	<div class="row">
		<div class="col-md-1">
			<div id="post-side" class="text-center">
				<p class="post-side-margin">
					<i class="icon-calendar icon"></i><br />
					<?php echo get_the_date('d/m'); ?><br/ ><small><?php echo get_the_date('Y'); ?></small>
				</p>
				<p>
					<i class="icon-user icon"></i><br />
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo str_replace(" ", "<br />", get_the_author()); ?></a>
				</p>
				<p>
					<i class="icon-comments icon"></i><br />
					<a href="<?php the_permalink(); ?>#disqus_thread" data-disqus-identifier="<?php the_permalink(); ?>">Komentáře</a>
				</p>
				
				<div id="post-side-float">
					<div class="post-side-link">
						<div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="80" data-layout="box_count" data-action="recommend" data-show-faces="true" data-send="false"></div>
					</div>
	
					<div class="post-side-link">
						<div class="g-plusone" data-size="tall" data-annotation="none" data-href="<?php the_permalink(); ?>"></div>
					</div>

					
					<div class="post-side-link">
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-via="svetkytar" data-lang="cs" data-count="none">Tweet</a>
					</div>
					
					<div class="post-side-link">
						<a href="javascript:void(0);" id="post-social-more-link"><i class="icon-plus-sign-alt icon"></i></a>
					</div>
					
					<div id="post-social-more">
						<div class="post-side-link">
							<a href="http://bufferapp.com/add" class="buffer-add-button" data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-count="none" data-via="svetkytar" >Buffer</a>
							<script type="text/javascript" src="http://static.bufferapp.com/js/button.js"></script>
						</div>
						
						<div class="post-side-link">
							<script src="//platform.linkedin.com/in.js" type="text/javascript">
							 lang: cs_CZ
							</script>
							<script type="IN/Share" data-url="<?php the_permalink(); ?>"></script>
						</div>


						<!--<div class="post-side-link">
							<a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_title(); ?> - <?php the_permalink(); ?>" class="btn btn-lg btn-social btn-mail"><span class="icon-envelope"></span></a>
						</div>-->

						<div class="post-side-link">
							<a data-pocket-label="pocket" data-pocket-count="none" class="pocket-btn" data-lang="en"></a>
							<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
						</div>
						
						<div class="post-side-link">
							<div class="kindleWidget" style="display:inline-block;padding:3px;cursor:pointer;font-size:11px;font-family:Arial;white-space:nowrap;line-height:1;"><img style="vertical-align:middle;margin:0;padding:0;border:none;" src="https://d1xnn692s7u6t6.cloudfront.net/black-15.png" /><span style="vertical-align:middle;margin-left:3px;">Kindle</span></div>
						</div>

						<div class="post-side-link">
							<a href="javascript:void(0);" id="post-social-less-link"><i class="icon-minus-sign-alt icon"></i></a>
						</div>
					</div>
					



				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div id="content">
			<h1><?php the_title(); ?></h1>
			
			<?php echo file_get_contents(dirname(__FILE__) . "./reklamy/clanek.html"); ?>
			
			<?php
				the_content();
			?>
			<p><?php
	$categories_list = get_the_category();
	$souvisejciKategorie = array();
	foreach($categories_list as $category) {
		$souvisejciKategorie[] = $category->term_id;
		echo '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "Zobrazit články z kategorie %s" ), $category->name ) ) . '"><span class="badge badge-blue"><i class="icon-book"></i> '.$category->cat_name.'</span></a> ';
	}

	$tag_list = get_the_tags();

	if($tag_list) {
		foreach($tag_list as $tag) {
			echo '<a href="'.get_tag_link( $tag->term_id ).'" title="' . esc_attr( sprintf( __( "Zobrazit články se štítkem %s" ), $tag->name ) ) . '"><span class="badge badge-black"><i class="icon-tag"></i> '.$tag->name.'</span></a> ';
		}
	}
?></p>
			</div>
			
			<h5>Mohlo by vás zajímat</h5>

			<div class="row">
				<?php
				// echo get_the_ID();
				$pouzite = array(get_the_ID());
				$souvisejiciArray = array();
				$souvisejici = get_post_meta( get_the_ID(), 'sk_souvisejici' );
				if(isset($souvisejici[0]) && $souvisejici[0]!="") {
					$souvisejiciArray = explode(",", $souvisejici[0]);	
				}
				$pocet = 0;
				// print_r2($souvisejiciArray);
				?>
				
				<?php
				if(count($souvisejiciArray)>0):
				// Najít vybrané související
				query_posts(array('posts_per_page' => 10, 'post__in' => $souvisejiciArray));
				while(have_posts()) : the_post();
					if(in_array(get_the_ID(),$pouzite)) {continue;}
					if($pocet>=4) {break;}

					$pouzite[] = get_the_ID();

					$pocet++; ?>
					<div class="col-md-3">
						<div class="post-box">
							<div class="post-box-image">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 195, 150); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
								</a>								
							</div>
							
							<div class="post-box-content">
								<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
							</div>
						</div>

							
					</div>
				<?php endwhile;?>
				<?php endif; ?>

				<?php if($pocet<4): ?>
				<?php
				// echo $pocet;
				// Nejnovější z kategorie
				query_posts(array('posts_per_page' => 10, 'category__in' => $souvisejciKategorie));
				while(have_posts()) : the_post();
					if(in_array(get_the_ID(),$pouzite)) {continue;}
					if($pocet>=4) {break;}

					$pouzite[] = get_the_ID();

					$pocet++; ?>
					<div class="col-md-3">
						<div class="post-box">
							<div class="post-box-image">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 195, 150); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
								</a>								
							</div>
							
							<div class="post-box-content">
								<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
							</div>
						</div>

							
					</div>
				<?php endwhile;?>
				<?php endif; ?>
				
				
			</div>
			
			<div class="panel panel-default row-topm">
				<div class="panel-body">
					<div id="disqus_thread"></div>
				</div>
			</div>

		</div>
		
		<div class="col-md-4">
		<?php get_sidebar(); ?>	
		</div>
	</div>
</div>
<?php get_footer(); ?>

<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory');?>/js/fancybox/jquery.fancybox.js?v=2.1.4"></script>
<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory');?>/js/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory');?>/js/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory');?>/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

<script>
$(function(){
	// $('#post-social-more').hide();
	$('#post-social-more-link').click(function(){
		$(this).parent().hide();
		$('#post-social-more').show();
	});

	$('#post-social-less-link').click(function(){
		$('#post-social-more-link').parent().show();
		$('#post-social-more').hide();
	});
});
</script>

<script>
$(function(){
$('a[rel^="lightbox"]').fancybox();

// preload
$('.gallery-item').each(function(){
	(new Image()).src = $(this).data("medium");
});

$('.gallery-item').click(function(){
	// parametry vybraného obrázku
	var selector = $(this).attr("rel").replace("gallery[","").replace("]", "");
	var big = $(this).attr("href");
	var medium = $(this).data("medium");

	// html vybraného obrázku
	var html = "";
	$(this).parent().children('.gallery-item').each(function(){
		if(big==$(this).attr("href")) html+='<a href="'+$(this).attr("href")+'" title="'+$(this).attr("title")+'" rel="lightbox['+selector+']"><img src="'+medium+'" /></a>';
		else html+='<a href="'+$(this).attr("href")+'" title="'+$(this).attr("title")+'" rel="lightbox['+selector+']" style="display:none;">[nahled]</a>';
	});
	$('#'+selector+' .gallery-item').fancybox();
	// $(this).parent().children('.gallery-item')
	$('#gallery-preview-'+selector).html(html);

	// aktivní náhled
	$(this).parent().children('.gallery-item').removeClass("active");
	$(this).addClass("active");
	return false;
});
$('.gallery-wrap').each(function(){
	$(this).children('.gallery-item:first').click();
}); 

// $('.gallery-medium').click(function(){
// 	var index = $(this).data("gallery-index");
// 	var selector = $(this).data("gallery-id");
// 	$('#'+selector).fancybox();
// 	return false;
// });

  var $top1= $('#post-side-float').offset().top;   
  var $mid1 =  Math.floor($(window).height() / 2);
$(window).scroll(function()
{   

		if ($(window).scrollTop()>$top1)   
		{
		 $('#post-side-float').addClass('post-side-floating');
		}
		else
		{
		 $('#post-side-float').removeClass('post-side-floating');

		 }

});
});
</script>

<script type="text/javascript" src="https://d1xnn692s7u6t6.cloudfront.net/widget.js"></script>
<script type="text/javascript">(function k(){window.$SendToKindle&&window.$SendToKindle.Widget?$SendToKindle.Widget.init({"content":"#content"}):setTimeout(k,500);})();</script>