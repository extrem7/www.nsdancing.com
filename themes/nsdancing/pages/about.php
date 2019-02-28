<? /* Template Name: About */
get_header(); ?>
    <div class="container">
        <h1 class="title main-title text-center"><? the_field( 'title' ) ?></h1>
        <div class="row about-section">
            <div class="col-lg-8 dynamic-content">
				<?= apply_filters( 'the_content', wpautop( get_post_field( 'post_content', $id ), true ) ); ?>
            </div>
            <div class="col-lg-4 text-center text-xl-right">
                <ul class="menu-content">
					<? $menu = get_field( 'menu' );
					foreach ( $menu as $post ):
						?>
                        <li><a href="<? the_permalink() ?>"><? the_title() ?></a></li>
					<? endforeach;
					wp_reset_query(); ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-text-section">
        <div class="container">
            <div class="row dynamic-content">
				<? while ( have_rows( 'teachers' ) ):the_row() ?>
                    <div class="col-lg-6 col-xl-4 <?= get_row_index() == 2 ? 'offset-xl-4 mt-4 mt-lg-0' : '' ?>">
                        <div class="quote quote-relative mx-auto"><span
                                    class="text-center font-italic"><? the_sub_field( 'quote' ) ?></span>
                        </div>
                        <div class="font-italic mt-3 mt-lg-5 <?= get_row_index() == 1 ? 'about-teacher-w' : 'about-teacher-teacher-m' ?>"><? the_sub_field( 'text' ) ?></div>
                    </div>
				<? endwhile; ?>
            </div>
        </div>
    </div>
    <div class="about-quote-section">
        <div class="container">
            <div class="teacher-circle mx-auto">
                <div class="circle">
					<? the_post_thumbnail( 'full' ) ?>
                </div>
            </div>
            <div class="text-center position-relative">
				<? the_icon( 'red-qute' ) ?>
                <div class="text-shadow-title third-title font-italic"><? the_field( 'quote' ) ?>
                </div>
            </div>
        </div>
    </div>
<? get_footer() ?>