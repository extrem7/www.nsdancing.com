<?php

require_once "classes/ThemeBase.php";

class NS extends ThemeBase {
	public function __construct() {
		parent::__construct();
		add_action( 'init', function () {
			//$this->registerTaxonomies();
			$this->registerPostTypes();
		} );
		add_action( 'plugins_loaded', function () {

		} );
		$this->testimonials();
		//add_action('wp_ajax_action', [$this, 'method']);
		//add_action('wp_ajax_nopriv_action', [$this, 'method']);
	}

	public function views() {
		return new class {
			public function video() {
				get_template_part( 'views/video' );
			}

			public function recommended() {
				get_template_part( 'views/recommended' );
			}

			public function dances() {
				get_template_part( 'views/dances' );
			}

			public function related() {
				get_template_part( 'views/related' );
			}

			public function book( $single = false ) {
				global $container;
				$container = ! $single;
				get_template_part( 'views/book' );
			}
		};
	}

	public function quote( $echo = true ) {
		$icon = file_get_contents( path() . 'assets/img/icons/quote.svg' );
		if ( $echo ) {
			echo $icon;
		} else {
			return $icon;
		}
	}

	public function pagination( $comments = false ) {
		$prev = file_get_contents( path() . 'assets/img/icons/arrow_mn.svg' );
		$next = file_get_contents( path() . 'assets/img/icons/arrow_mn.svg' );
		echo '<nav class="navigation pagination mb-5">';
		if ( $comments ) {
			echo get_the_comments_pagination( [
				'base'         => add_query_arg( 'page', '%#%' ),
				'total'        => ceil( get_comments_number() / 5 ),
				'current'      => get_query_var( 'page' ) ? get_query_var( 'page' ) : 1,
				'add_fragment' => null,
				'prev_text'    => $prev,
				'next_text'    => $next,
			] );
		} else {
			the_posts_pagination( [
				'show_all'  => false,
				'end_size'  => 2,
				'mid_size'  => 2,
				'prev_next' => true,
				'prev_text' => $prev,
				'next_text' => $next,
			] );
		}
		echo '</nav>';
	}

	private function registerPostTypes() {
		register_post_type( 'gallery',
			[
				'label'         => null,
				'labels'        => [
					'name'               => 'Gallery',
					'singular_name'      => 'Gallery',
					'add_new'            => 'Add gallery',
					'add_new_item'       => 'New gallery',
					'edit_item'          => 'Edit gallery',
					'new_item'           => '',
					'view_item'          => 'View gallery',
					'search_items'       => 'Search gallery',
					'not_found'          => 'Not found',
					'not_found_in_trash' => 'Not found',
					'menu_name'          => 'Gallery',
				],
				'public'        => true,
				'menu_position' => 5,
				'menu_icon'     => 'dashicons-format-gallery',
				'supports'      => [ 'title', 'custom-fields', 'thumbnail' ],
				'has_archive'   => false,
				'rewrite'       => [ 'slug' => get_post_field( 'post_name', 88 ) ],
			] );
		register_post_type( 'method',
			[
				'label'         => null,
				'labels'        => [
					'name'               => 'Methods',
					'singular_name'      => 'Methods',
					'add_new'            => 'Add method',
					'add_new_item'       => 'New method',
					'edit_item'          => 'Edit method',
					'new_item'           => '',
					'view_item'          => 'View method',
					'search_items'       => 'Search method',
					'not_found'          => 'Not found',
					'not_found_in_trash' => 'Not found',
					'menu_name'          => 'Methods',
				],
				'public'        => true,
				'menu_position' => 6,
				'menu_icon'     => 'dashicons-smiley',
				'supports'      => [ 'title', 'editor', 'custom-fields', 'thumbnail' ],
				'has_archive'   => false,
				'rewrite'       => [ 'slug' => get_post_field( 'post_name', 259 ) ],
			] );
	}

	private function registerTaxonomies() {
		register_taxonomy( 'gallery_cat',
			[ 'post' ],
			[
				'label'       => '',
				'labels'      => [
					'name'              => 'Категории фото',
					'singular_name'     => 'Категории фото',
					'search_items'      => 'Искать Категорию фото',
					'all_items'         => 'Новая Категория фото',
					'view_item '        => 'Смотреть Категорию фото',
					'parent_item'       => 'Родитель Категории фото',
					'parent_item_colon' => 'Родитель Категории фото:',
					'edit_item'         => 'Редактировать Категорию фото',
					'update_item'       => 'Обновить Категорию фото',
					'add_new_item'      => 'Добавить новую Категорию фото',
					'new_item_name'     => 'Категории фото',
					'menu_name'         => 'Категории фото'
				],
				'public'      => true,
				'meta_box_cb' => false,
			] );
	}

	private function testimonials() {
		add_action( 'comment_post', function ( $comment_id ) {
			update_field( 'city', $_POST['city'], get_comment( $comment_id ) );
		} );
		add_filter( 'comment_post_redirect', function () {
			return $_SERVER["HTTP_REFERER"];
		} );
	}

}