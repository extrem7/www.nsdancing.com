<? /* Template Name: Contacts */
get_header(); ?>
    <div class="container">
        <h1 class="title main-title text-center base-indent"><? the_title() ?></h1>
        <div class="row flex-column-reverse flex-md-row">
            <div class="col-md-6">
                <div class="book-form">
                    <fieldset class="decorative-border">
                        <legend class="title third-title">Any questions?</legend>
						<?= do_shortcode( '[contact-form-7 id="11" title="Home"]' ) ?>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-info">
                    <div>
						<? the_icon( 'call_g' ) ?>
						<? while ( have_rows( 'phones', 'options' ) ):the_row();
							$phone = get_sub_field( 'phone' ) ?>
                            <a href="<?= phoneLink( $phone ) ?>"><?= $phone ?></a>
						<? endwhile; ?>
                    </div>
                    <div>
						<? the_icon( 'whatsapp' ) ?>
                        <a href="<? the_field( 'whatsapp' ) ?>">WhatsApp</a>
                    </div>
                    <div>
						<? the_icon( 'viber' ) ?>
                        <a href="<? the_field( 'viber' ) ?>">Viber</a>
                    </div>
                    <div>
						<? the_icon( 'email' );
						$email = get_field( 'email', 'option' );
						?>
                        <a href="mailto:<?= $email ?>"><?= $email ?></a>
                    </div>
					<? while ( have_rows( 'addresses' ) ):the_row() ?>
                        <div>
							<? the_icon( 'pin' ) ?>
                            <div>
								<? the_sub_field( 'title' ) ?> <br>
                                <a href="<? the_sub_field( 'link' ) ?>" target="_blank">
									<? the_sub_field( 'address' ) ?></a>
                            </div>
                        </div>
					<? endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="box-text">
        <div class="container">
            <div class="title second-title text-center mb-5">Our dance studios on the map</div>
            <div class="row">
				<? while ( have_rows( 'maps' ) ):the_row() ?>
                    <div class="col-md-6 <?= get_row_index() <= 2 ? 'mt-4 mt-md-0' : '' ?>">
                        <div class="map"><? the_sub_field( 'map' ) ?></div>
                    </div>
				<? endwhile; ?>
            </div>
        </div>
    </div>
<? get_footer() ?>