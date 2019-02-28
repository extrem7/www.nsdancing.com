<!doctype html>
<html lang="en">
<head>
	<? the_field( 'header_code', 'option' ) ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<? wp_head() ?>
    <title><?= wp_get_document_title() ?></title>
</head>
<body <? body_class() ?>>
<header class="header">
    <div class="container d-flex justify-content-between">
		<? if ( is_front_page() ): ?>
            <div class="d-flex align-items-center"><img src="<?= path() ?>assets/img/logo.svg" alt="logo" class="logo">
            </div>
		<? else: ?>
            <a href="<? bloginfo( 'url' ) ?>" class="d-flex align-items-center">
                <img src="<?= path() ?>assets/img/logo.svg" alt="logo" class="logo"></a>
		<? endif; ?>
        <nav class="menu-container">
			<? wp_nav_menu( [
				'menu'       => 'header',
				'container'  => null,
				'items_wrap' => '<ul class="menu">%3$s</ul>',
			] ); ?>
        </nav>
        <div class="phone-box">
            <a href="tel:9496003401">
				<? the_icon( 'call' ) ?>
                (949) <span>600 3401</span></a>
        </div>
        <button class="mobile-btn" id="mobile-menu"><span></span><span></span><span></span></button>
    </div>
</header>
<? if ( ! is_front_page() ): ?>
    <nav aria-label="breadcrumb" class="nav-breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
				<? bcn_display() ?>
            </ol>
        </div>
    </nav>
<? endif; ?>
<main class="content">
