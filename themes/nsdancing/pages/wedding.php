<? /* Template Name: Wedding */
get_header(); ?>
    <div class="dance-page-category">
        <div class="container">
            <h1 class="title main-title text-center"><? the_field( 'title' ) ?></h1>
            <div class="row">
                <div class="col-md-6 col-lg-12 col-xl-4">
					<? the_post_thumbnail( 'full', [ 'class' => 'img-fluid' ] ) ?>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5 order-2 order-xl-0 mt-3 mt-lg-0 dynamic-content">
					<?= apply_filters( 'the_content', wpautop( get_post_field( 'post_content', $id ), true ) ); ?>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="box-text p-3 dynamic-content"><? the_field( 'most_popular' )//todo ?></div>
                </div>
            </div>
        </div>
    </div>
    <section class="box-text dynamic-content wedding-dance lg-indent">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12"><? the_field( 'first_row' ) ?></div>
                <div class="col-12 mt-5"><? the_field( 'second_row' ) ?></div>
            </div>
            <div class="row decorative-column mod-7 mt-5">
                <div class="col-md-6 col-lg-7"><? the_field( 'text_left' ) ?></div>
                <div class="line"></div>
                <div class="col-md-6 col-lg-5"><? the_field( 'text_right' ) ?></div>
            </div>
        </div>
    </section>
<? $NS->views()->recommended() ?>
<? $NS->views()->book() ?>
<? get_footer() ?>