<? get_header(); ?>
    <div class="container error-page">
        <div class="quote mx-auto">
            <span class="title title-main">404</span>
            <img src="<?= path() ?>assets/img/404error.png" class="img-fluid" alt="404">
        </div>
        <div class="title third-title text-center"><span class="bold">OOPS!</span> Page not found</div>
        <div class="decorative-separator icon-circle mx-auto"></div>
        <div class="text-center">
            <a href="<? bloginfo( 'url' ) ?>" class="button btn-red-b btn-sm">Go to homepage</a>
        </div>
    </div>
<? get_footer(); ?>