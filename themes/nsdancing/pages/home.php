<? /* Template Name: Home */
get_header(); ?>
    <div class="banner d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12"></div>
                <div class="col-xl-6 col-lg-6 col-md-12 d-flex justify-content-end">
                    <div class="form-title">
                        <span>Book</span><span>Your</span><span>First</span><span>Free</span><span>Lesson</span><span>Now</span>
                        <div class="mob-title">Book Your First <br> Free Lesson Now</div>
                    </div>
                    <button class="button btn-red" id="show-form" data-toggle="modal" data-target="#book-modal">Book</button>
                    <div class="decorative-border left">
                        <div class="decorative-circle top"></div>
                        <div class="decorative-circle bottom"></div>
						<?= do_shortcode( '[contact-form-7 id="11" title="Home"]' ) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-category container">
        <h1 class="title main-title text-center">Orange County Dance Сlasses</h1>
		<? $NS->views()->dances() ?>
    </section>
    <div class="section-about container">
        <div class="row align-items-center">
            <div class="col-md-12 col-xl-6 text-center">
                <div class="video-iframe">
                    <iframe data-src="<? the_field( 'youtube_link' ) ?>" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="quote mx-auto">
					<? $NS->quote() ?>
                    <div><? the_field( 'youtube_quote' ) ?></div>
                </div>
            </div>
        </div>
    </div>
    <section class="about-teacher">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-4">
                    <div class="quote">
						<? $NS->quote() ?>
                        <div><? the_field( 'about_quote' ) ?></div>
                    </div>
                    <div class="decorative-separator icon-circle"></div>
                    <div class="title-red text-center"><? the_field( 'about_with_love' ) ?></div>
                </div>
                <div class="col-md-12 col-xl-4">
					<? the_image( 'about_image', 'teacher-img img-fluid' ) ?>
                </div>
                <div class="col-md-12 col-xl-4">
                    <h2 class="title second-title text-shadow-title text-center"><? the_field( 'about_title' ) ?></h2>
                    <div class="about-teacher-info"><? the_field( 'about_text' ) ?>
                        <div class="text-center">
                            <a href="<? the_permalink( 237 ) ?>" class="button btn-red-b btn-sm">More about us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="learn" data-style="background-image: url('<?= path() ?>assets/css/../img/decorative-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-8">
                    <h2 class="title second-title text-center"><? the_field( 'learn_title' ) ?></h2>
                    <h4><? the_field( 'learn_subtitle' ) ?></h4>
                    <div class="row list-marker">
						<? while ( have_rows( 'learn_blocks' ) ):the_row() ?>
                            <div class="col-md-6">
                                <div class="marker-item"><? the_sub_field( 'text' ) ?></div>
                            </div>
						<? endwhile; ?>
                    </div>
                </div>
                <div class="d-none d-xl-block col-xl-4 img-block position-relative">
					<?
					$images = get_field( 'learn_images' );
					foreach ( $images as $image ):
						?>
                        <div class="quote">
                            <img data-src="<?= $image['url'] ?>" src="<?= path() ?>assets/img/lazy.png"
                                 alt="<?= $image['alt'] ?>">
                        </div>
					<? endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-section">
        <div class="container">
            <h2 class="second-title text-shadow-title text-center"><? the_field( 'testimonials_title' ) ?></h2>
            <div class="owl-carousel owl-theme owl-testimonials">
				<?
				$comments = new WP_Comment_Query( [
					'comment__in' => get_field( 'testimonials' )
				] );
				foreach ( $comments->get_comments() as $comment ):
					$city = get_field( 'city', $comment );
					?>
                    <div class="item">
                        <div class="testimonial-avatar mx-auto"
                             data-style="background-image: url('<? the_field( 'photo', $comment ) ?>')"></div>
                        <div class="testimonial-name"><?= $comment->comment_author ?></div>
						<? if ( $city ): ?>
                            <div class="testimonial-city"><?= $city ?></div>
						<? endif; ?>
                        <div class="testimonial-description">"<? the_field( 'excerpt', $comment ) ?>"</div>
                        <a href="<?= get_comment_link( $comment->comment_ID ) ?>" class="testimonial-readMore">Read
                            more</a>
                    </div>
				<? endforeach; ?>
            </div>
        </div>
    </section>
    <section class="box-text">
        <div class="container">
            <h2 class="title second-title text-center mb-4"><? the_field( 'popular_title' ) ?></h2>
            <div class="row dynamic-content decorative-column">
                <div class="col-md-6"><? the_field( 'popular_left' ) ?></div>
                <div class="line"></div>
                <div class="col-md-6"><? the_field( 'popular_right' ) ?></div>
            </div>
        </div>
    </section>
    <section class="last-articles">
        <div class="container">
            <h2 class="title second-title text-center"><? the_field( 'blog_title' ) ?></h2>
            <div class="row">
				<?
				$posts = get_field( 'blog_items' );
				$posts = array_chunk( $posts, 2 );
				$i     = 0;
				foreach ( $posts as $row ):
					?>
                    <div class="col-md-4">
						<? foreach ( $row as $post ): ?>
                            <div class="article-home-item">
								<? if ( $i !== 2 )
									the_post_thumbnail( 'medium_large', [ 'class' => 'img-fluid' ] ) ?>
                                <div class="title"><? the_title() ?></div>
                                <div><? if ( has_excerpt() )
										the_excerpt() ?></div>
                                <div class="text-right"><a href="<? the_permalink() ?>">More on our blog</a></div>
                            </div>
							<? $i ++; endforeach; ?>
                    </div>
				<? endforeach; ?>
            </div>
        </div>
    </section>
<? get_footer() ?>