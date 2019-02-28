<? get_header(); ?>
    <div class="our-methods-page-item">
        <div class="container">
            <h1 class="title main-title text-center"><? the_field( 'second_title' ) ?></h1>
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
					<? if ( get_field( 'photo' ) ): ?>
                        <div class="circlce-img">
							<? the_image( 'photo' ) ?>
                        </div>
					<? endif; ?>
                    <div class="dynamic-content">
						<?= apply_filters( 'the_content', wpautop( get_post_field( 'post_content', $id ), true ) ); ?>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4 text-center text-xl-right">
                    <ul class="menu-content">
						<?
						$methods = get_posts( [
							'post_type'      => 'method',
							'posts_per_page' => - 1,
							'exclude'        => [ get_the_ID() ]
						] );
						foreach ( $methods as $post ):
							?>
                            <li><a href="<? the_permalink() ?>"><? the_title() ?></a></li>
						<? endforeach;
						wp_reset_query() ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<? if ( get_field( 'text_left' ) ): ?>
    <section class="box-text dynamic-content lg-indent">
        <div class="container">
            <div class="row decorative-column mod-7">
                <div class="<?= get_field('text_right')?'col-md-6 col-lg-7':'col-12' ?>"><? the_field( 'text_left' ) ?></div>
				<? if ( get_field( 'text_right' ) ): ?>
                    <div class="line"></div>
                    <div class="col-md-6 col-lg-5"><? the_field( 'text_right' ) ?></div>
				<? endif; ?>
            </div>
        </div>
    </section>
<? endif; ?>
<? $NS->views()->recommended() ?>
<? $NS->views()->book() ?>
<? get_footer(); ?>