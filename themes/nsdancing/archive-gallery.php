<?
global $NS;
get_header(); ?>
    <div class="container">
        <h1 class="title main-title text-center base-indent">Our dance studio gallery</h1>
        <div class="row gallery-archive justify-content-center">
			<?
			$gallery = new WP_Query( [
				'post_type'      => 'gallery',
				'posts_per_page' => - 1
			] );
			if ( $gallery->have_posts() ) {
				while ( $gallery->have_posts() ) {
					$gallery->the_post();
					get_template_part( 'views/gallery' );
				}
			}
			?>
        </div>
    </div>
<? $NS->views()->video() ?>
<? get_footer() ?>