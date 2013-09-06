<!DOCTYPE html>
<html lang="cs">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('title');?></title>
		<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php // wp_enqueue_script("jquery"); ?>
		<?php wp_head(); ?>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-4"><a href="<?php bloginfo('url');?>/"><img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/svet-kytar.png" alt="Svět kytar"></a></div>
		<div class="col-md-8">REKLAMA</div>
	</div>
</div>

<div class="container">
	<nav class="navbar navbar-inverse" role="navigation">

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<span class="sr-only">Zobrazit navigaci</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand hidden-md hidden-lg" href="<?php bloginfo('url');?>/">Svět kytar</a>
</div>
	
		
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a class="hidden-sm hidden-xs" href="<?php bloginfo('url');?>/"><span class="glyphicon glyphicon-home"></span></a></li>
				<?php
					$menuObject = wp_get_nav_menu_items('hlavni-menu');
					// print_r2($menuObject);
					$menu = array();
					foreach($menuObject as $menuItem) {
						$menu[$menuItem->ID] = array(
							'title' => $menuItem->title,
							'url' => $menuItem->url,
							'parent' => $menuItem->menu_item_parent,
							'active' => ("http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] == $menuItem->url ? true : false)
							);

					}

					foreach($menu as $mid=>$item) {
						if($item['parent']>0) {
							$menu[$item['parent']]['children'][$mid] = $item;
							unset($menu[$mid]);
						}
					}

					foreach($menu as $item) {
						$class = array();
						$children = false;

						if($item['active']) $class[] = "active";
						if(isset($item['children'])) {
							$children = true;
							$class[] = "dropdown";
						}

						echo '<li'.(count($class)>0 ? ' class="'.implode(" ", $class).'"' : '').'>';

							if($children) {
								echo '<a href="'.$item['url'].'" class="dropdown-toggle" data-toggle="dropdown">'.$item['title'].' <b class="caret"></b></a>';

								echo '<ul class="dropdown-menu">';
									foreach($item['children'] as $child) {
										echo '<li><a href="'.$child['url'].'">'.$child['title'].'</a></li>';
									}
								echo '</ul>';
							} else {
								echo '<a href="'.$item['url'].'">'.$item['title'].'</a>';
							}


						echo '</li>';
					}

				?>
			</ul>

			<form class="navbar-form navbar-right" role="search">
				<div class="form-group">
					<input type="text" class="form-control" name="s" placeholder="Hledat...">
				</div>
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
			</form>
		</div>
	</nav>
</div>

