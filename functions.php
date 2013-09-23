<?php
add_theme_support('post-thumbnails');
add_theme_support('menus');

function new_excerpt_more($more) {return ' &hellip;';}
add_filter('excerpt_more', 'new_excerpt_more');

function reklamy_obsah($content) {
	$content = str_replace("<p>&nbsp;</p>", "", $content);

	if(preg_match("/\[reklama\]/", $content)) {
		$content = str_replace("<p>[reklama]</p>", "[reklama]", $content);
		$content = str_replace("[reklama]", '<div class="reklama">ADD</div>', $content);
	} else {
		$content.='<div class="reklama">ADD</div>';
	}
	return $content;
}
add_filter('the_content', reklamy_obsah);

add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
function my_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<div class="video-container">' . $html . '</div>';
}


	function print_r2($array) {
		echo '<pre style="margin:1em;padding:1em;background:#e5e5e5;border:3px dotted #c00;">';
		print_r($array);
		echo '</pre>';
	}

	function short_text($long_text,$limit_chars=512) {
		if(isset($long_text) && $long_text!='') {
			$limit=$limit_chars;
			$text=trim(strip_tags($long_text));
			if(strlen($text) <= $limit) {
				$long_text = $text;
			} else {
				$text = substr($text, 0, $limit+1); $pos = strrpos($text, " ");
				$long_text = substr($text, 0, ($pos ? $pos : -1)) . " &hellip;";
			}
			
		return trim($long_text);
		
		} else {
			return null;
		}
	}

// Náhledy pro Carousel
function sk_thumb($id, $width = 760, $height = 420)
{

	$src_array = image_downsize($id, 'full');
	$src_path = $src_array[0];
	preg_match_all("/(.*)wp-content(.*)/", $src_path, $matches);

	$originalFileArr =  explode(".", $matches[2][0]);

	$originalFile = dirname(__FILE__) . "/../..".$matches[2][0];
	$carouselFile = dirname(__FILE__) . "/../..".$originalFileArr[0]."-".$width."x".$height.".".$originalFileArr[1];

	if(is_file($carouselFile)) {
		return bloginfo('url')."/wp-content".$originalFileArr[0]."-".$width."x".$height.".".$originalFileArr[1];
	} else {
		include_once dirname(__FILE__) . "/lib/phpThumb/ThumbLib.inc.php";
		$thumb = PhpThumbFactory::create($originalFile);

		$thumb->adaptiveResize($width, $height);
		$thumb->save($carouselFile);
		return bloginfo('url')."/wp-content".$originalFileArr[0]."-".$width."x".$height.".".$originalFileArr[1];
	}
}


function sk_widget_sidebar() {

	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sk_sidebar',
		'before_widget' => '<div class="panel panel-default row-topm">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
		'after_title' => '</h3></div><div class="panel-body">',
	) );
}
add_action('widgets_init', 'sk_widget_sidebar');
?>
