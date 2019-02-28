<div class="col-md-6">
    <div class="article-item">
        <div class="text-center">
            <a href="<? the_permalink() ?>" class="title five-title mx-auto"><? the_title() ?></a>
        </div>
        <div class="article-date"><?= get_the_date( 'd F Y' ) ?></div>
        <a href="<? the_permalink() ?>"
           class="article-img d-block"><? the_post_thumbnail( 'blog', [ 'class' => 'img-fluid' ] ) ?></a>
        <div class="article-anons"><? the_excerpt() ?></div>
        <div class="text-right mt-4">
            <a href="<? the_permalink() ?>" class="read">Read More</a>
        </div>
    </div>
</div>