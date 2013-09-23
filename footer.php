<div id="bottom" class="row-topm">
<div class="container">
	<div class="row">
		<div class="col-md-4">dfs</div>
		<div class="col-md-4">dfs</div>
		<div class="col-md-4">
			<?php echo file_get_contents(dirname(__FILE__) . "./reklamy/paticka.html"); ?>
		</div>
	</div>
</div>
<div class="container" id="footer">
	<footer class="row">
		<div class="col-md-6">
			<p>&copy; Svět Kytar</p>
		</div>
		<div class="col-md-6 text-right">
			<p>webdesign: <a href="http://rotten77.cz/">Jan Zatloukal</a></p>
		</div>
	</footer>
</div>
</div>
	<script src="<?php echo bloginfo('stylesheet_directory'); ?>/bootstrap/js/jquery.js"></script>
	<script src="<?php echo bloginfo('stylesheet_directory'); ?>/bootstrap/js/bootstrap.min.js"></script>
<script>
$(function(){
	// $('.ttip').tooltip();
});
</script>
	<?php wp_footer(); ?>


<div class="modal fade" id="socm-facebook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Svět kytar na Facebooku</h4>
			</div>
			
			<div class="modal-body">
				<div class="fb-like-box" data-href="https://www.facebook.com/svetkytar" data-width="500" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Zavřít</button>
				<a href="https://www.facebook.com/svetkytar" target="_blank" class="btn btn-primary"><i class="icon-facebook"></i> Přejít na Facebook</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="socm-twitter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Svět kytar na Twitteru</h4>
			</div>
			
			<div class="modal-body">
<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/svetkytar" data-widget-id="382046226255867904">Tweets by @svetkytar</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Zavřít</button>
				<a href="https://twitter.com/svetkytar" target="_blank" class="btn btn-info"><i class="icon-twitter"></i> Přejít na Twitter</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="socm-google" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Svět kytar na Google+</h4>
			</div>
			
			<div class="modal-body">
				<div class="g-page" data-href="//plus.google.com/109703172770122371790" data-layout="landscape" data-rel="publisher"></div>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Zavřít</button>
				<a href="https://plus.google.com/b/109703172770122371790/109703172770122371790" target="_blank" class="btn btn-primary btn-danger"><i class="icon-google-plus"></i> Přejít na Google+</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="socm-mail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Napište nám</h4>
			</div>
			
			<div class="modal-body">
				<iframe allowtransparency="true" frameborder="0" scrolling="no" width="500" height="140" src="http://miniaplikace.blueboard.cz/mailform.php?id=244938"></iframe>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Zavřít</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



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

<script type="text/javascript">
var disqus_shortname = 'svetkytar'; // required: replace example with your forum shortname

/* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
</script>
	</body>
</html>