<a href="<? the_permalink() ?>" class="col-md-6 col-lg-3 category-item text-center">
    <div class="category-banner">
		<? the_post_thumbnail( 'medium_large', [ 'class' => 'img-fluid' ] ) ?>
    </div>
    <div class="decorative-separator empty-circle"></div>
    <div class="hover-bg">
        <div class="category-name"><? the_title() ?></div>
    </div>
</a>