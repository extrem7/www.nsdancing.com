<? get_header(); ?>
    <div class="container">
        <h1 class="title main-title text-center base-indent"><?= category_description() ?></h1>
        <div class="row articles">
			<?
			if ( have_posts() ) :
			while ( have_posts() ) {
				the_post();
				get_template_part( 'views/article' );
			}
			?>
        </div>
		<? $NS->pagination();
		endif; ?>
    </div>
<? get_footer() ?>