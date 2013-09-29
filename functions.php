<?php
add_theme_support('post-thumbnails');
add_theme_support('menus');
define('LINK_BASE', '/svetkytar/');

function new_excerpt_more($more) {return ' &hellip;';}
add_filter('excerpt_more', 'new_excerpt_more');


function bootstrap_images($content) {
	/**
	 * Úprava HTML obrázků
	 */
	// $content = preg_replace('/<div([^>]*)id="attachment_[0-9]+"([^>]*)>(.+)<\/div>/', "$3", $content);
	// $content = str_replace("<div id=\"attachment", "NAHRAD", $content);
	$poradi = 0;

	$return = "";
	foreach(explode("\n", $content) as $line) {

		$lineWork = str_replace("<p>", "", $line);
		$lineWork = str_replace("</p>", "", $lineWork);
		$lineWork = trim($lineWork);

		$lineUpdate = "";

		// řádek s obrázkem
		if(preg_match_all('/^<img[^>]+\>$/i', $lineWork, $matches)) {

			if(is_array($matches[0]) && count($matches[0])==1) {

				$src = "";
				$title = "";
				$alt = "";

				if(preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $matches[0][0], $imgAttr)) {
					$src = $imgAttr[1][0];
				}
				if(preg_match_all('/< *img[^>]*title *= *["\']?([^"\']*)/i', $matches[0][0], $imgAttr)) {
					$title = $imgAttr[1][0];
				}
				if(preg_match_all('/< *img[^>]*alt *= *["\']?([^"\']*)/i', $matches[0][0], $imgAttr)) {
					$alt = $imgAttr[1][0];
				}

				if($src!="") {
					if($alt=="" && $title!="") $alt=$title;
					if($title=="" && $alt!="") $title = $alt;
					$poradi++;
					$lineUpdate='<p class="text-center"><img src="'.$src.'" class="img-responsive" rel="lightbox[img-'.$poradi.']" alt="'.$alt.'" title="'.$title.'" /></p>';


				}
			}
		}

		// obrázek s odkazem
		if(preg_match_all('/^<a.*><img[^>]+\><\/a>$/i', $lineWork, $matches)) {
			if(is_array($matches[0]) && count($matches[0])==1) {

				$src = "";
				$title = "";
				$alt = "";
				$href="";
				// echo $lineWork."\n\n";

				if(preg_match_all('/< *a[^>]*href *= *["\']?([^"\']*)/i', $matches[0][0], $attr)) {
					$href = $attr[1][0];

					// echo $href."\n\n";;
				}

				if(preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $matches[0][0], $attr)) {
					$src = $attr[1][0];
					// print_r($attr);
				}
				if(preg_match_all('/< *a[^>]*title *= *["\']?([^"\']*)/i', $matches[0][0], $attr)) {
					$title = $attr[1][0];
					// print_r($attr);
				}
				if(preg_match_all('/< *img[^>]*alt *= *["\']?([^"\']*)/i', $matches[0][0], $attr)) {
					$alt = $attr[1][0];
					// print_r($attr);
				}

				if($src!="" && $href!="") {
					if($alt=="" && $title!="") $alt=$title;
					if($title=="" && $alt!="") $title = $alt;

					$poradi++;
					$lineUpdate='<p class="text-center"><a href="'.$href.'" title="'.$title.'" rel="lightbox[img-'.$poradi.']"><img src="'.$src.'" class="img-responsive" alt="'.$alt.'" title="'.$title.'" /></a></p>';
				}
			}
			// print_r($matches);
			// exit;
		}

	
		$return.=($return=="" ? "" : "\n").($lineUpdate!="" ? $lineUpdate : $line);	
	}
	return $return;
}

function reklamy_obsah($content) {

	// odstranění prázdných odstavců
	$content = str_replace("<p>&nbsp;</p>", "", $content);

	// doplnění reklam
	$reklama_clanek = file_get_contents(dirname(__FILE__) . "./reklamy/clanek.html");

	if(preg_match("/\[reklama\]/", $content)) {
		$content = str_replace("<p>[reklama]</p>", "[reklama]", $content);
		$content = str_replace("[reklama]", $reklama_clanek, $content);
	} else {
		$content.= $reklama_clanek;
	}
	$content = bootstrap_images($content);

	return $content;
}

add_filter('the_content', 'reklamy_obsah');


function sk_caption_shortcode($current_html, $attr, $content) {
	// New-style shortcode with the caption inside the shortcode with the link and image tags.
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	}

	// if ( $output != '' )
	// 	return $output;

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr, 'caption'));

	// if ( 1 > (int) $width || empty($caption) )
	// 	return $content;

	// if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	// return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . (10 + (int) $width) . 'px">'
	return bootstrap_images($content) . "\n" . '<p class="image-caption">' . $caption . '</p>';
}
add_filter('img_caption_shortcode', 'sk_caption_shortcode', 10, 3);


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
function sk_thumb($id, $width = 760, $height = 420, $adaptive=true)
{

	$src_array = image_downsize($id, 'full');
	$src_path = $src_array[0];
	preg_match_all("/(.*)wp-content(.*)/", $src_path, $matches);

	$originalFileArr =  explode(".", $matches[2][0]);

	$originalFile = dirname(__FILE__) . "/../..".$matches[2][0];
	$carouselFile = dirname(__FILE__) . "/../..".$originalFileArr[0]."-".$width."x".$height.($adaptive ? "-a" : "-r").".".$originalFileArr[1];

	if(is_file($carouselFile)) {
		return LINK_BASE."wp-content".$originalFileArr[0]."-".$width."x".$height.($adaptive ? "-a" : "-r").".".$originalFileArr[1];
	} else {
		include_once dirname(__FILE__) . "/lib/phpThumb/ThumbLib.inc.php";
		$thumb = PhpThumbFactory::create($originalFile);

		if($adaptive) $thumb->adaptiveResize($width, $height);
		else $thumb->resize($width, $height);
		$thumb->save($carouselFile);
		return LINK_BASE."wp-content".$originalFileArr[0]."-".$width."x".$height.($adaptive ? "-a" : "-r").".".$originalFileArr[1];
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

/**
 * Úprava HTML galerií
 */

function sk_gallery($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr, 'gallery'));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
		$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
		$icontag = 'dt';

	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "";
	$size_class = sanitize_html_class( $size );
	
	// $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$output = '<div id="'.$selector.'" class="gallery-wrap">';
	$i = 0;
	$firstImage = '';
	foreach ( $attachments as $id => $attachment ) {

		/*if ( ! empty( $attr['link'] ) && 'file' === $attr['link'] )
			$image_output = wp_get_attachment_link( $id, $size, false, false );
		elseif ( ! empty( $attr['link'] ) && 'none' === $attr['link'] )
			$image_output = wp_get_attachment_image( $id, $size, false );
		else
			$image_output = wp_get_attachment_link( $id, $size, true, false );*/

		$image_meta  = wp_get_attachment_image_src( $id );
		//wp_get_attachment_metadata()


		if ( $captiontag && trim($attachment->post_excerpt) ) {
			/*$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</div>";*/
		}

		$imageName = "";

		$otocit = false;
		if (isset($image_meta['height'], $image_meta['width'])) $otocit = ($image_meta['height'] > $image_meta['width']) ? true : false;

		// if($i==6) $output.='</div><div class="row">';

		// $output .= '<div class="col-md-2">';
		$output .= '<a class="gallery-item" title="'.$imageName.'" href="'.($otocit ? sk_thumb($id, 768, 1024, false) : sk_thumb($id, 1024, 768, false)).'" data-medium="'.sk_thumb($id, 653, 653, false).'" rel="gallery[' . $selector . ']"><img src="'.sk_thumb($id, 64, 64).'" alt="'.$imageName.'" class="img-responsive" /></a>';
		// $output .= "</div>";

		// if($i==6) $i=0;

			$i++;
			$first = false;

		if($firstImage=="") {
			 $firstImage='LOADING...';
			// $firstImage.='<a class="gallery-medium" data-gallery-index="0" data-gallery-id="'.$selector.'" href="'.($otocit ? sk_thumb($id, 768, 1024, false) : sk_thumb($id, 1024, 768, false)).'" title="'.$imageName.'"><img src="'.sk_thumb($id, 653, 653, false).'" alt="'.$imageName.'" class="img-responsive" /></a>';
			// $firstImage.='</div>';
		}

	}

	$output .= '<div class="clearfix"></div><p class="text-center" id="gallery-preview-'.$selector.'">'.$firstImage.'</p><div class="clearfix"></div></div>';

	return $output;
}
add_shortcode('gallery', 'sk_gallery');
?>
