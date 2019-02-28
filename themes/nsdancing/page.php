<?
get_header(); ?>
	<div class="container">
		<h1 class="title main-title text-center"><? the_title() ?></h1>
		<div class="dynamic-content mb-5">
			<?= apply_filters('the_content', wpautop(get_post_field('post_content', $id), true)); ?>
		</div>
	</div>
<? get_footer() ?>