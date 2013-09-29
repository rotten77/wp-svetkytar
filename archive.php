<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">

				<h1 class="archive-title"><?php
					if ( is_day() ) :
						echo 'Archiv dne: <strong>'.get_the_date().'</strong>';
						// printf( __( 'Daily Archives: %s', 'twentytwelve' ), '<span>' .  . '</span>'; );
					elseif ( is_month() ) :
						echo 'Archiv měsíce: <strong>'.get_the_date('F Y').'</strong>';
						// printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
					elseif ( is_year() ) :
						echo 'Archiv roku: <strong>'.get_the_date('Y').'</strong>';
						// printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
					else :
						_e( 'Archives', 'twentytwelve' );
					endif;
				?></h1>
				
			<?php get_template_part('includes/posts'); ?>
		</div>
		
		<div class="col-md-4">
		<?php get_sidebar(); ?>	
		</div>
	</div>
</div>


<?php get_footer(); ?>