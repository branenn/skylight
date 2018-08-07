<?php
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function b_clpr_terms_list( $args = array() ) {

	$defaults = array(
		'taxonomy' => 'category',
		'exclude' => array(),
		'menu' => false,
		'count' => false,
		'top_link' => false,
		'class' => 'terms',
	);

	$options = wp_parse_args( (array) $args, $defaults );
	$options = apply_filters( 'clpr_terms_list_args', $options );

	$terms = get_terms( $options['taxonomy'], array( 'hide_empty' => 0, 'child_of' => 0, 'pad_counts' => 0, 'app_pad_counts' => 1 ) );

	$navigation = '';
	$list = '';
	$groups = array();

	if ( empty( $terms ) || ! is_array( $terms ) ) {
		return html( 'p', __( 'Sorry, but no terms were found.', APP_TD ) );
	}

	// unset child terms
	foreach ( $terms as $key => $value ) {
		if ( $value->parent != 0 ) {
			unset( $terms[ $key ] );
		}
	}

	foreach ( $terms as $term ) {
		echo 'OOOOOOOO: ' . $term->name . '<br>';
		echo 'LINK: ' . html_link( get_term_link( $term, $options['taxonomy'] ), $name );
		$attachment_id = clpr_get_store_meta( $term->term_id, 'clpr_store_image_id', true );
		$image_url = wp_get_attachment_image($attachment_id);
		echo 'image url: ' . $image_url;
		$letter = mb_strtoupper( mb_substr( $term->name, 0, 1 ) );
		if ( is_numeric( $letter ) ) {
			$letter = '#';
		}

		if ( ! empty( $letter ) ) {
			$groups[ $letter ][] = $term;
		}
	}

	if ( empty( $groups ) ) {
		return;
	}
	/*
	foreach ( $groups as $kljuc => $vrednost ) {
		echo 'Kljuc: ' . $kljuc . ' => Vrednost: ' . $vrednost . '<br>';
		foreach ($vrednost as $aa =>$bb){
		//	echo 'aaaa: ' . $aa . ' => bbbb b: ' . $bb . '<br>';
			//echo 'SSSSSSS: ' . $groups['name '].$bb . '<br>';
			echo 'BB: ' . $aa . '<br>';
		}
		
	}
print_r($groups);

*/

	foreach ( $groups as $letter => $terms ) {
		
		$old_list = $list;
		$old_navigation = $navigation;
		$letter_items = false;

		//$letter = apply_filters( 'the_title', $letter );
		
		$letter_id = ( preg_match( '/\p{L}/', $letter ) ) ? $letter : substr( md5( $letter ), 0, 5 ); // hash special chars
		$navigation .= html_link( '#' . $options['class'] . '-' . $letter_id, $letter );
		$top_link = ( $options['top_link'] ) ? html_link( '#top', __( 'Top', APP_TD ) . ' &uarr;' ) : '';

		$list .= '<h2 class="' . $options['class'] . '" id="' . $options['class'] . '-' . $letter_id . '">' . $letter . $top_link . '</h2>';
		$list .= '<ul class="' . $options['class'] . '">';

		foreach ( $terms as $term ) {
			if ( in_array( $term->term_id, $options['exclude'] ) ) {
				continue;
			}

			$letter_items = true;
			$name = apply_filters( 'the_title', $term->name );
			$link = html_link( get_term_link( $term, $options['taxonomy'] ), $name );
			$count = ( $options['count'] ) ? ' (' . intval( $term->count ) . ')' : '';

			$list .= html( 'li', $link . $count );
		}

		$list .= '</ul>';

		if ( ! $letter_items ) {
			$list = $old_list;
			$navigation = $old_navigation;
		}
	}

	$navigation = html( 'div class="grouplinks"', $navigation );

	if ( $options['menu'] ) {
		//$list = $navigation . $list;
		$list = $list;
	}

	return $list;
}


function b_clpr_stores_list() {
	$hidden_stores = clpr_hidden_stores();
	$args = array(
		'taxonomy' => APP_TAX_STORE,
		'exclude' => $hidden_stores,
		'class' => 'stores',
	);

	return b_clpr_terms_list( $args );
}
































