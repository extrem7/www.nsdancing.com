<? /* Template Name: Ballroom */
get_header(); ?>
    <div class="dance-page-category">
        <div class="container">
            <div class="title main-title text-center">Learn <? the_title() ?></div>
            <div class="row align-items-center decorative-block">
                <div class="col-md-6 col-lg-12 col-xl-4">
					<? the_post_thumbnail( 'full', [ 'class' => 'img-fluid' ] ) ?>
                </div>
                <div class="col-lg-6 col-xl-4 order-2 order-xl-0">
                    <div class="quote quote-relative">
                        <span class="text-center"><?= get_post_field( 'post_content', $id ) ?></span>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 text-center text-xl-right">
                    <ul class="menu-content">
						<?
						$children = get_posts( [
							'post_type'      => 'page',
							'post_parent'    => $post->ID,
							'posts_per_page' => - 1
						] );
						foreach ( $children as $post ):
							?>
                            <li><a href="<? the_permalink() ?>"><? the_title() ?></a></li>
						<? endforeach;
						wp_reset_query() ?>
                    </ul>
                    <div class="mt-3 mt-md-5">
                        <button class="button btn-red book-btn">Book your Lesson</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="box-text dynamic-content">
        <div class="container">
            <h2 class="title second-title text-center mb-4"><? the_field( 'title_popular' ) ?></h2>
            <div class="row decorative-column">
                <div class="col-md-6"><? the_field( 'text_left' ) ?></div>
                <div class="line"></div>
                <div class="col-md-6"><? the_field( 'text_right' ) ?></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title second-title text-center mb-4"><? the_field( 'title' ) ?></h2>
                    <div><? the_field( 'text' ) ?></div>
                </div>
            </div>
        </div>
    </section>
<? $NS->views()->book() ?>
<? get_footer() ?>