</main>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
				<? wp_nav_menu( [
					'menu'       => 'footer',
					'container'  => null,
					'items_wrap' => '<ul>%3$s</ul>',
				] ); ?>
            </div>
            <div class="col-lg-4">
                <div class="footer-contact">
                    <div class="d-inline-block">
                        <div class="d-flex align-items-center">
							<? the_icon( 'call_g' );
							while ( have_rows( 'phones', 'option' ) ):the_row();
								$phone = get_sub_field( 'phone' );
								?>
                                <a href="<?= phoneLink( $phone ) ?>"><?= $phone ?></a>
							<? endwhile; ?>
                        </div>
                        <div class="d-flex align-items-center mt-3">
							<? the_icon( 'email' );
							$email = get_field( 'email', 'option' );
							?>
                            <a href="mailto:<?= $email ?>"><?= $email ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 align-self-center">
				<? get_search_form() ?>
            </div>
            <div class="col-lg-4 col-md-6 text-center align-self-center">
                <a href="#" data-toggle="modal" data-target="#book-modal" class="button btn-yellow-b btn-sm">Start the
                    first
                    lesson</a>
            </div>
            <div class="col-lg-4">
                <div class="footer-links">
					<? while ( have_rows( 'social', 'option' ) ):the_row(); ?>
                        <a href="<? the_sub_field( 'link' ) ?>"
                           target="_blank"><? the_icon( get_sub_field( 'icon' ) ) ?></a>
					<? endwhile; ?>
                </div>
            </div>
            <div class="col-12 copyright"><? the_field( 'copyright', 'option' ) ?></div>
        </div>
    </div>
</footer>
<? get_template_part( 'views/modal' ) ?>
<? wp_footer() ?>
<? the_field( 'footer_code', 'option' ) ?>
</body>
</html>