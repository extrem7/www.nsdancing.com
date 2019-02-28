<? /* Template Name: Dances */
get_header(); ?>
    <section class="section-category container">
        <h1 class="title main-title text-center"><? the_field( 'title' ) ?></h1>
		<? $NS->views()->dances() ?>
    </section>
    <section class="box-text dynamic-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6"><? the_field( 'text_left' ) ?></div>
                <div class="col-md-6 mt-2 mt-md-0">
                    <h5 class="title semi-bold"><? the_field( 'text_right' ) ?></h5>
                </div>
            </div>
            <div class="decorative-line"></div>
            <div class="title second-title text-center mb-4"><? the_field( 'why_title' ) ?></div>
            <div class="row decorative-column">
                <div class="col-md-6"><? the_field( 'why_left' ) ?></div>
                <div class="line"></div>
                <div class="col-md-6"><? the_field( 'why_right' ) ?></div>
            </div>
        </div>
    </section>
<? get_footer() ?>