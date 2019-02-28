<div class="col-md-6 col-xl-4 text-center text-xl-right">
	<ul class="menu-content">
		<?
		$brothers = get_posts( [
			'post_type'   => 'page',
			'post_parent' => $post->post_parent,
			'exclude'     => $post->ID
		] );
		foreach ( $brothers as $post ):
			?>
			<li><a href="<? the_permalink() ?>"><? the_title() ?></a></li>
		<? endforeach;
		wp_reset_query() ?>
	</ul>
	<div class="mt-3 mt-md-5">
		<button class="button btn-red book-btn">Book your Lesson</button>
	</div>
</div>