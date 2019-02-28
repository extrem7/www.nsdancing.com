<div class="row main-category">
	<?
	$categories = get_posts( [
		'post_type'   => 'page',
		'post_parent' => 143,//Dances we teach
		'orderby'     => 'menu_order',
		'order'       => 'ASC'
	] );
	foreach ( $categories as $post ):?>
		<a href="<? the_permalink() ?>" class="col-md-6 col-lg-3 category-item text-center">
			<? the_image( 'miniature', 'img-fluid' ) ?>
			<div class="decorative-separator empty-circle"></div>
			<div class="hover-bg">
				<div class="category-name"><? the_title() ?></div>
				<span class="link-more">Learn more</span>
			</div>
		</a>
	<? endforeach; wp_reset_query() ?>
</div>