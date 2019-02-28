<? get_header(); ?>
    <div class="container">
        <h1 class="title main-title text-center base-indent"><? the_title() ?></h1>
        <div class="single-gallery row">
			<?
			$gallery = get_field( 'gallery' );
			foreach ( $gallery as $image ):
				?>
                <div class="col-md-4 col-lg-3 col-6">
                    <a data-fancybox="gallery" href="<?= $image['url'] ?>" class="single-gallery-item">
                        <img src="<?= $image['sizes']['gallery'] ?>" class="img-fluid" alt="<?= $image['alt'] ?>">
						<? the_icon( 'zoom' ) ?>
                    </a>
                </div>
			<? endforeach; ?>
        </div>
    </div>
<? $NS->views()->video() ?>
<? get_footer(); ?>