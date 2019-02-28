<?
global $NS;
get_header(); ?>
    <section class="section-our-methods container">
        <h1 class="title main-title text-center">Dance programs</h1>
        <div class="row main-category">
			<?
			$gallery = new WP_Query( [
				'post_type'      => 'method',
				'posts_per_page' => - 1
			] );
			if ( $gallery->have_posts() ) {
				while ( $gallery->have_posts() ) {
					$gallery->the_post();
					get_template_part( 'views/method' );
				}
			}
			wp_reset_query();
			?>
        </div>
    </section>
    <section class="box-text dynamic-content decorative-block method-decoration">
        <div class="container">
            <h2 class="title second-title text-center mb-4"><? the_field( 'title' ) ?></h2>
            <div class="row align-items-center flex-column-reverse flex-lg-row">
                <div class="col-md-12 col-lg-5">
                    <div class="quote quote-relative mx-auto">
                        <span class="text-center"><? the_field( 'quote' ) ?></span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-7 order-md-1">
					<?= apply_filters( 'the_content', wpautop( get_post_field( 'post_content', $id ), true ) ); ?>
                </div>
            </div>
        </div>
    </section>
<? get_footer() ?>