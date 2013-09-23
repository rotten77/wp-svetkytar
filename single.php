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
					<a href="<?php echo get_author_posts_url(); ?>"><?php echo str_replace(" ", "<br />", get_the_author()); ?></a>
				</p>
				
				<div id="post-side-float">
					<div class="post-side-link">
						<div class="fb-like" data-href="http://www.svetkytar.cz/" data-width="80" data-layout="box_count" data-action="recommend" data-show-faces="true" data-send="false"></div>
					</div>
	
					<div class="post-side-link">
					<div class="g-plusone" data-size="tall" data-href="http://localhost/svetkytar/ehx-pan-pedal-jako-prepinac-snimacu"></div>
					</div>

					
					<div class="post-side-link">
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://localhost/svetkytar/ehx-pan-pedal-jako-prepinac-snimacu" data-count="vertical" data-text="TITLE" data-via="svetkytar" data-lang="cs">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					</div>
					
					<div class="post-side-link">
						<a href="javascript:void(0);" id="post-social-more-link"><i class="icon-plus-sign-alt icon"></i></a>
					</div>
					
					<div id="post-social-more">
						<div class="post-side-link">
							<a href="http://bufferapp.com/add" class="buffer-add-button" data-url="http:&#x2F;&#x2F;localhost&#x2F;svetkytar&#x2F;ehx-pan-pedal-jako-prepinac-snimacu" data-count="vertical" data-via="svetkytar" >Buffer</a><script type="text/javascript" src="http://static.bufferapp.com/js/button.js"></script>
						</div>
						
						<div class="post-side-link">
							<script src="//platform.linkedin.com/in.js" type="text/javascript">lang: cs_CZ</script>
							<script type="IN/Share" data-url="http://localhost/svetkytar/ehx-pan-pedal-jako-prepinac-snimacu" data-counter="top"></script>
						</div>


						<div class="post-side-link">
							<a href="#" class="btn btn-lg btn-social btn-mail"><span class="icon-envelope"></span></a>
						</div>

						<div class="post-side-link">
							<a href="javascript:void(0);" id="post-social-less-link"><i class="icon-minus-sign-alt icon"></i></a>
						</div>
					</div>
					



				</div>
			</div>
		</div>
		<div class="col-md-7">
			<h1><?php the_title(); ?></h1>
			
			<?php
				the_content();
			?>
			
			<h5>Mohlo by vás zajímat</h5>
			
			<p style="color:#c00;font-weight:bold;">SK_RELATED nebo vybrat z kategorií (+ označené jako SK_Vybrane) - pokud nebude počet, tak ještě nejnovější z ktagorií (exclude ID);</p>

			<div class="row">
				<?php query_posts(array('posts_per_page' => 4, 'category__not_in' => array(3,9))); ?>
				<?php while(have_posts()) : the_post(); ?>
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
			</div>

		</div>
		
		<div class="col-md-4">
		<?php get_sidebar(); ?>	
		</div>
	</div>
</div>
<?php get_footer(); ?>

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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/cs_CZ/all.js#xfbml=1&appId=283665458354693";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Umístěte tuto značku na místo, kde se má widget tlačítko +1 zobrazit. -->


<!-- Umístěte tuto značku za poslední značku tlačítko +1. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'cs'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>