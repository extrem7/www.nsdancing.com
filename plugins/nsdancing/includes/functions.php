<?php

//cool functions for development

function path() {
	return get_template_directory_uri() . '/';
}

function phoneLink( $phone ) {
	return 'tel:' . preg_replace( '/[^0-9]/', '', $phone );
}

function the_image( $name, $class = '', $post = null, $size = 'full' ) {
	if ( $post == null ) {
		global $post;
	}

	$image = get_field( $name );//image id

	echo wp_get_attachment_image( $image, $size, false, [ 'class' => $class ] );
}

function the_icon( $name ) {
	echo file_get_contents( path() . "assets/img/icons/$name.svg" );
}

function the_checkbox( $field, $print, $post = null ) {
	if ( $post == null ) {
		global $post;
	}
	echo get_field( $field, $post ) ? $print : null;
}

function the_table( $field, $post = null ) {
	if ( $post == null ) {
		global $post;
	}
	$table = get_field( $field, $post );
	if ( $table ) {
		echo '<table>';
		if ( $table['header'] ) {
			echo '<thead>';
			echo '<tr>';
			foreach ( $table['header'] as $th ) {
				echo '<th>';
				echo $th['c'];
				echo '</th>';
			}
			echo '</tr>';
			echo '</thead>';
		}
		echo '<tbody>';
		foreach ( $table['body'] as $tr ) {
			echo '<tr>';
			foreach ( $tr as $td ) {
				echo '<td>';
				echo $td['c'];
				echo '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
}

function the_link( $field, $post = null, $classes = "" ) {
	if ( $post == null ) {
		global $post;
	}
	$link = get_field( $field, $post );
	if ( $link ) {
		echo "<a ";
		echo "href='{$link['url']}'";
		echo "class='$classes'";
		echo "target='{$link['target']}'>";
		echo $link['title'];
		echo "</a>";
	}
}

function repeater_image( $name ) {
	echo 'src="' . get_sub_field( $name )['url'] . '" ';
	echo 'alt="' . get_sub_field( $name )['alt'] . '" ';
}

function pre( $array ) {
	echo "<pre>";
	print_r( $array );
	echo "</pre>";
}

function categoryImage( $termId ) {
	$id    = get_term_meta( $termId, 'thumbnail_id', true );
	$image = wp_prepare_attachment_for_js( $id );

	return $image;
}