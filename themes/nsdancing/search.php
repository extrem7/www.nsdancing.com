<? get_header(); ?>
<div class="container">
    <h1 class="title main-title text-center">Search results</h1>
    <div class="dynamic-content mb-5 mt-4">
		<?
		if ( have_posts() ) :
			while ( have_posts() ) {
				the_post();
				get_template_part( 'views/search' );
			}
			$NS->pagination();
		endif;
		?>
    </div>
</div>
<? get_footer(); ?>
