<div class="search-item">
    <div class="title five-title"><? search_title() ?></div>
	<? if ( has_excerpt() )
		search_excerpt() ?>
    <div class="text-right">
        <a href="<? the_permalink() ?>" class="link-more mt-4 d-block">Read more</a>
    </div>
</div>