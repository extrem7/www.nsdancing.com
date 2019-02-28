<div class="col-lg-3 col-md-12">
    <div class="right-sidebar h-100">
		<?// get_search_form() ?>
        <div class="related">
            <div class="title five-title mb-4">Related articles</div>
			<?
			$related = new WP_Query( [
				'posts_per_page' => - 1,
				'post__not_in'   => [ get_the_ID() ]
			] );
			while ( $related->have_posts() ):
				$related->the_post();
				?>
                <div class="item">
					<? the_post_thumbnail( 'thumbnail' ) ?>
                    <a href="<? the_permalink() ?>"><? the_title() ?></a>
                </div>
			<? endwhile; ?>
        </div>
        <div class="link-content">
            <div class="five-title title mb-4">More About</div>
			<? wp_nav_menu( [
				'menu'       => 'about',
				'container'  => null,
				'items_wrap' => '<ul class="menu-content">%3$s</ul>',
			] ); ?>
        </div>
    </div>
</div>