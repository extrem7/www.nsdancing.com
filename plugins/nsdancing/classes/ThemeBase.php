<?php

class ThemeBase {
	public function __construct() {
		$this->themeSetup();
		$this->enqueueStyles();
		$this->enqueueScripts();
		$this->customHooks();
		$this->GPSI();
		$this->registerShortcodes();
		//$this->registerWidgets();
		$this->registerNavMenus();
		add_action( 'plugins_loaded', function () {
			$this->ACF();
			// $this->Polylang();
		} );
	}

	private function themeSetup() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'widgets' );
		show_admin_bar( false );
	}

	private function enqueueStyles() {
		add_action( 'wp_print_styles', function () {
			wp_register_style( 'main', path() . 'assets/css/main.css' );
			wp_enqueue_style( 'main' );
		} );
		add_action( 'admin_enqueue_scripts', function () {
			//wp_enqueue_style('admin-styles', get_template_directory_uri() . '/assets/css/admin.css');
		} );
	}

	private function enqueueScripts() {
		add_action( 'wp_enqueue_scripts', function () {
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', path() . 'assets/node_modules/jquery/dist/jquery.min.js' );
			wp_enqueue_script( 'jquery' );
			wp_register_script( 'popper', path() . 'assets/node_modules/popper.js/dist/umd/popper.min.js' );
			wp_enqueue_script( 'popper' );
			wp_register_script( 'bootstrap', path() . 'assets/node_modules/bootstrap/dist/js/bootstrap.min.js' );
			wp_enqueue_script( 'bootstrap' );
			wp_register_script( 'fancybox', path() . 'assets/node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js' );
			wp_enqueue_script( 'fancybox' );
			wp_register_script( 'owl.carousel', path() . '/assets/node_modules/owl.carousel/dist/owl.carousel.min.js' );
			wp_enqueue_script( 'owl.carousel' );
			wp_register_script( 'mask', path() . 'assets/node_modules/jquery.inputmask/dist/jquery.inputmask.bundle.js' );
			wp_enqueue_script( 'mask' );
			wp_register_script( 'main', path() . 'assets/js/main.js' );
			wp_enqueue_script( 'main' );
		} );
	}

	private function customHooks() {
		add_action( 'admin_menu', function () {
			//	remove_menu_page( 'edit-comments.php' );
		} );
		add_filter( 'nav_menu_css_class', function ( $classes, $item ) {
			if ( in_array( 'current-menu-item', $classes ) ) {
				$classes[] = 'active ';
			}

			return $classes;
		}, 10, 2 );
		add_action( 'navigation_markup_template', function ( $content ) {
			$content = str_replace( 'role="navigation"', '', $content );
			$content = preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $content );

			return $content;
		} );
		add_image_size( 'blog', 556, 204, [ 'center', 'center' ] );
		add_image_size( 'gallery', 269, 180, [ 'center', 'center' ] );
		add_image_size( 'gallery-thumbnail', 380, 258, [ 'center', 'center' ] );
		add_filter( 'wp_get_attachment_image_attributes', function ( $attr ) {
			//if ( is_front_page() || is_single() ) {
				$attr['data-src']    = $attr['src'];
				$attr['data-srcset'] = $attr['srcset'];
				$attr['srcset']      = path() . 'assets/img/lazy.png 100w';;
				$attr['src'] = path() . 'assets/img/lazy.png';
			//}

			return $attr;
		} );

		remove_filter( 'term_description', 'wpautop' );
		add_filter( 'wpcf7_form_elements', function ( $content ) {
			// pre($content);
			$content = preg_replace( '/<br \/>/', '', $content );

			return $content;
		} );
		add_filter( 'body_class', function ( $classes ) {
			if ( get_page_template_slug() == 'pages/contacts.php' ) {
				$classes[] = 'contact-page';
			}

			return $classes;
		} );
		add_action( 'template_redirect', function () {
		} );
		add_action( 'wp_head', function () {
			if ( is_archive() ) {
				echo '<meta name="robots" content="noindex,follow" />';
			}
		} );
	}

	private function ACF() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			$main = acf_add_options_page( [
				'page_title' => 'Theme settings',
				'menu_title' => 'Theme settings',
				'menu_slug'  => 'theme-general-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
				'position'   => 2,
				'icon_url'   => 'dashicons-admin-customizer',
			] );
		}
	}

	private function GPSI() {
		add_action( 'after_setup_theme', function () {
			remove_action( 'wp_head', 'wp_print_scripts' );
			remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
			remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
			add_action( 'wp_footer', 'wp_print_scripts', 5 );
			add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
			add_action( 'wp_footer', 'wp_print_head_scripts', 5 );
		} );

		add_action( 'after_setup_theme', function () {
			remove_action( 'wp_head', 'wp_generator' );                // #1
			remove_action( 'wp_head', 'wlwmanifest_link' );            // #2
			remove_action( 'wp_head', 'rsd_link' );                    // #3
			remove_action( 'wp_head', 'wp_shortlink_wp_head' );        // #4
			remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );    // #5
			add_filter( 'the_generator', '__return_false' );            // #6
			add_filter( 'show_admin_bar', '__return_false' );            // #7
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );  // #8
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
		} );

		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	}

	private function Polylang() {
		global $lang;
		$lang = pll_current_language( 'slug' );

		add_action( 'init', function () {
			pll_register_string( '', '' );
		} );
	}

	private function postTypePermalink() {
		add_filter( 'post_type_link', function ( $post_link, $post ) {
			if ( 'car' === $post->post_type && 'publish' === $post->post_status ) {
				$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
			}

			return $post_link;
		}, 10, 2 );
		add_action( 'pre_get_posts', function ( $query ) {
			if ( ! $query->is_main_query() ) {
				return;
			}
			if ( ! isset( $query->query['page'] ) || 2 !== count( $query->query ) ) {
				return;
			}
			if ( empty( $query->query['name'] ) ) {
				return;
			}
			$query->set( 'post_type', array( 'post', 'page', 'car' ) );
		} );
	}

	private function registerShortcodes() {
		add_shortcode( 'conclusion', function () {
			ob_start();
			get_template_part( 'views/conclusion' );

			return ob_get_clean();
		} );
	}

	private function registerWidgets() {
		add_action( 'widgets_init', function () {
			register_sidebar( [
				'name'         => "Правая боковая панель сайта",
				'id'           => 'right-sidebar',
				'description'  => 'Эти виджеты будут показаны в правой колонке сайта',
				'before_title' => '<h1>',
				'after_title'  => '</h1>'
			] );
		} );
	}

	private function registerNavMenus() {
		add_action( 'after_setup_theme', function () {
			register_nav_menus( array( 'header_menu' => 'Меню в шапке', 'footer_menu' => 'Меню в подвале' ) );
		} );

		/*add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
			$atts['itemprop'] = 'url';
			return $atts;
		}, 10, 3);*/
		/*
				if (!file_exists(plugin_dir_path(__FILE__) . '../includes/wp-bootstrap-navwalker.php')) {
					return new WP_Error('wp-bootstrap-navwalker-missing', __('It appears the wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
				} else {
					require_once plugin_dir_path(__FILE__) . '../includes/wp-bootstrap-navwalker.php';
				}
		*/
	}
}