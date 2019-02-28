<? /* Template Name: Policy */
get_header(); ?>
    <div class="container">
        <h1 class="title main-title text-center"><? the_title() ?></h1>
        <div class="semi-bold sm-font-size mb-4">Last updated: <? the_modified_date('F d, Y') ?></div>
        <div class="dynamic-content mb-5">
	        <?= apply_filters('the_content', wpautop(get_post_field('post_content', $id), true)); ?>
        </div>
    </div>
<? get_footer() ?>