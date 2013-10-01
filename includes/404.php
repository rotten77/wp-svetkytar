<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">

			<h1>Stránka nebyla nalezena</h1>
			<hr />
			
			<div class="well">
			<p class="lead">
				Stránka, kterou hledáte, nebyla nalezena.
			</p>
			<hr />
			
			<p>Zkuste stránku najít pomocí následujícího formuláře:</p>

			<form class="form-inline" role="search">
				<div class="form-group">
					<input type="text" class="form-control" size="40" name="s" placeholder="Hledat...">
				</div>
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
			</form>
			
			<hr />
			
			<p>
				<a href="<?php echo LINK_BASE; ?>clanky" class="btn btn-primary"><i class="icon-arrow-right"></i> Zobrazit všechny články</a>
			</p>
			
			</div>
		</div>
		
		<div class="col-md-4">
		<?php get_sidebar(); ?>	
		</div>
	</div>
</div>


<?php get_footer(); ?>