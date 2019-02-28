<? get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <article class="article">
                    <h1 class="title main-title text-center"><? the_title() ?></h1>
                    <div class="article-date"><?= get_the_date( 'd F Y' ) ?></div>
                    <div class="article-img">
						<? the_post_thumbnail( 'full', [ 'class' => 'img-fluid' ] ) ?>
                    </div>
                    <div class="article-text dynamic-content">
						<?= apply_filters( 'the_content', wpautop( get_post_field( 'post_content', $id ), true ) ); ?>
                    </div>
                    <div class="text-center mt-5">
                        <div class="title four-title mb-4">Shared this artictle:</div>
                        <div class="decorative-separator icon-circle"></div>
                        <div class="link-sh">
							<? $link = get_the_permalink();
							$links   = [
								'facebook'  => "https://www.facebook.com/sharer/sharer.php?u=#$link",
								'google_p'  => "https://plus.google.com/share?url=$link",
								'twiter'    => "https://twitter.com/home?status=$link",
								'in'        => "https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=$link",
								'pinterest' => "https://pinterest.com/pin/create/button/?url=&media=&description=$link"
							];
							foreach ( $links as $icon => $link ):
								?>
                                <a href="<?= $link ?>">
									<? the_icon( $icon ) ?>
                                </a>
							<? endforeach; ?>
                        </div>
                    </div>
                </article>
				<? the_field( 'facebook_comments', 'option' ) ?>
				<? $NS->views()->book( true ) ?>
            </div>
			<? get_sidebar() ?>
        </div>
    </div>
<? get_footer(); ?>