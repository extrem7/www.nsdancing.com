<?
// silence is golden.
function search_excerpt() {
	$excerpt = get_the_excerpt();
	$keys    = implode( '|', explode( ' ', get_search_query() ) );
	$excerpt = preg_replace( '/(' . $keys . ')/iu', '<strong class="search-highlight">\0</strong>', $excerpt );

	echo '<p>' . $excerpt . '</p>';
}

function search_title() {
	$title = get_the_title();
	$keys  = implode( '|', explode( ' ', get_search_query() ) );
	$title = preg_replace( '/(' . $keys . ')/iu', '<strong class="search-highlight">\0</strong>', $title );

	echo $title;
}

function current_location() {
	if ( isset( $_SERVER['HTTPS'] ) &&
	     ( $_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1 ) ||
	     isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) &&
	     $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ) {
		$protocol = 'https://';
	} else {
		$protocol = 'http://';
	}

	return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

add_filter( 'nav_menu_link_attributes', function ( $atts ) {
	if ( $atts['href'] == current_location() ) {
		unset( $atts['href'] );
	}

	return $atts;
}, 1, 3 );
