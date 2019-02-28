<? /* Template Name: Waltz & Swing */
$isFoxtrot = (bool) get_field( 'videos' );
get_header(); ?>
    <div class="dance-page-category">
        <div class="container">
            <h1 class="title main-title text-center"><? the_field( 'title' ) ?></h1>
            <div class="row">
                <div class="col-md-6 col-lg-12 col-xl-4">
					<? the_post_thumbnail( 'full', [ 'class' => 'img-fluid' ] ) ?>
                </div>
                <div class="col-lg-6 col-xl-4 order-2 order-xl-0 mt-3 mt-lg-0 dynamic-content">
					<?= apply_filters( 'the_content', wpautop( get_post_field( 'post_content', $id ), true ) ); ?>
                </div>
	            <? $NS->views()->related() ?>
            </div>
			<? if ( $isFoxtrot ): ?>
                <div class="row video-dance">
					<? while ( have_rows( 'videos' ) ):the_row() ?>
                        <div class="col-md-6">
                            <div class="video-iframe">
                                <iframe data-src="<? the_sub_field( 'youtube' ) ?>" allowfullscreen></iframe>
                            </div>
                        </div>
					<? endwhile; ?>
                </div>
			<? endif; ?>
        </div>
    </div>
    <section class="box-text dynamic-content lg-indent">
        <div class="container">
            <div class="row <?= $isFoxtrot ? 'decorative-column mod-7' : '' ?>">
                <div class="col-md-6 <?= $isFoxtrot ? 'col-lg-7' : '' ?>"><? the_field( 'text_left' ) ?></div>
				<? if ( $isFoxtrot ): ?>
                    <div class="line"></div>
				<? endif; ?>
                <div class="col-md-6 <?= $isFoxtrot ? 'col-lg-5' : '' ?> mt-4 mt-md-0"><? the_field( 'text_right' ) ?></div>
            </div>
        </div>
    </section>
<? $NS->views()->recommended() ?>
<? $NS->views()->book() ?>
<? get_footer() ?>