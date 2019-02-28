<? global $container; ?>
<div class="book-form">
	<? if ( $container ): ?>
    <div class="container">
		<? endif; ?>
        <fieldset class="decorative-border">
            <legend class="title third-title">Book Your First <br> Free Lesson Now</legend>
			<?= do_shortcode( '[contact-form-7 id="53" title="Book" html_class="row"]' ) ?>
        </fieldset>
		<? if ( $container ): ?>
    </div>
<? endif; ?>
</div>