<?php

holy2020_theme_setup();
/**
 * Theme setup
 */
function holy2020_theme_setup() {
	// Theme functions
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );

	// Theme menu location
	register_nav_menu( 'primary_left', __( 'Primary Left' ) );
	register_nav_menu( 'primary_right', __( 'Primary Right' ) );
	register_nav_menu( 'footer_navigation', __( 'Footer Menu' ) );

	// Option page
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( [
			'page_title' => 'Holy Settings',
			'menu_title' => 'Holy Settings',
			'menu_slug'  => 'holy-settings',
			'capability' => 'edit_posts',
			'redirect'   => FALSE,
		] );
	}

	// Image styles
	add_image_size( '540x320', 540, 320 );
	add_image_size( 'news_thumb', 365, 180, TRUE );
	add_image_size( 'news_large', 730, 190, TRUE );
	add_image_size( 'banner', 1920, 800 );

	// Logo
	$defaults = [
		'height'      => 106,
		'width'       => 176,
		'flex-height' => TRUE,
		'flex-width'  => TRUE,
		'header-text' => [ 'site-title', 'site-description' ],
	];
	add_theme_support( 'custom-logo', $defaults );

	// Auto child menu
	new Holy2020AutoChildPageMenu();
}

function holy2020_acf_google_map_api( $api ) {
	$api['key'] = 'AIzaSyCUU1CuFXtmWV_0HUrpxMX2mCSImGd_ZHs';

	return $api;
}

add_filter( 'acf/fields/google_map/api', 'holy2020_acf_google_map_api' );

add_filter( 'jpeg_quality', function ( $arg ) {
	return 100;
} );

add_action( 'wp_enqueue_scripts', 'holy2020_custom_script' );
/**
 * Add theme scripts and styles
 */
function holy2020_custom_script() {
	// wp_enqueue_style( 'Arial', holy2020_path( FALSE ) . 'Arial' );
	wp_enqueue_style( 'holy2020_bootstrap', holy2020_path( FALSE ) . 'assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'holy2020_main', holy2020_path( FALSE ) . 'assets/css/main.css' );
	wp_enqueue_style( 'holy2020_style', holy2020_path( FALSE ) . 'style.css' );

	wp_enqueue_script( 'holy2020_code', holy2020_path( FALSE ) . 'js/code.js', [ 'jquery' ], '1.0.0', FALSE );
	wp_enqueue_script( 'holy2020_popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', [ 'jquery' ], '1.14.7', FALSE );
	wp_enqueue_script( 'holy2020_bootstrap', holy2020_path( FALSE ) . 'assets/js/bootstrap.min.js', [ 'jquery' ], '1.0.0', FALSE );
	wp_enqueue_script( 'holy2020_clinic', holy2020_path( FALSE ) . 'assets/js/clinic.js', [ 'jquery' ], '1.0.0', FALSE );
	wp_enqueue_script( 'holy2020_carousel', holy2020_path( FALSE ) . 'assets/js/Carousel.js', [ 'jquery' ], '1.0.0', FALSE );
	wp_enqueue_script( 'holy2020_theme', holy2020_path( FALSE ) . 'js/theme.js', [ 'jquery' ], '1.0.0', FALSE );


	//  wp_enqueue_script( 'holy2020_waypoints', '//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js', [], '4.0.0', FALSE );
	//  wp_enqueue_script( 'holy2020_bootstrap', pbnc19_path( FALSE ) . 'assets/js/bootstrap.min.js', [ 'jquery' ], '1.0.0', FALSE );
	//  wp_enqueue_script( 'holy2020_intermex', pbnc19_path( FALSE ) . 'assets/js/intermex.js', [ 'jquery' ], '1.0.0', FALSE );
	//  wp_enqueue_script( 'holy2020_counterup', pbnc19_path( FALSE ) . 'assets/js/jquery.counterup.min.js', [ 'jquery' ], '1.0.0', FALSE );
	//  wp_enqueue_script( 'holy2020_code', pbnc19_path( FALSE ) . 'code.js', [ 'jquery' ], '1.0.0', FALSE );
}

function holy2020_field_image_src( $image, $size = '540x320' ) {
	if ( ! $image ) {
		return;
	}
	if ( $size === 'original' ) {
		return $image['url'];
	}

	$url = $image['sizes'][ $size ];
	if ( ! $url || preg_match( '/1x1\.[a-zA-Z]+$/', $url ) ) {
		return $image['url'];
	}

	return $url;
}

function holy2020_field_image( $image = NULL, $alt = '', $size = '540x320', $attr = '' ) {
	if ( ! $image ) {
		return;
	}
	$src = holy2020_field_image_src( $image, $size );

	return '<img src="' . $src . '" alt="' . $alt . '" ' . $attr . '>';
}

/**
 * Get path to template
 *
 * @param boolean $echo
 *
 * @return string
 */
function holy2020_path( $echo = TRUE ) {
	$path = get_template_directory_uri() . '/';
	if ( $echo ) {
		echo $path;
	}

	return $path;
}

/**
 * Get paginate links
 *
 * @param WP_Query $post_query
 */
function holy2020_paginate_links( $post_query ) {
	$total_pages = $post_query->max_num_pages;

	if ( $total_pages > 1 ) {

		$current_page = max( 1, get_query_var( 'paged' ) );

		$links = paginate_links( [
			'base'      => get_pagenum_link( 1 ) . '%_%',
			'format'    => 'page/%#%',
			'current'   => $current_page,
			'total'     => $total_pages,
			'prev_text' => __( '«' ),
			'next_text' => __( '»' ),
			'type'      => 'array',
		] );

		echo '<ul class="pagin-news">';
		foreach ( $links as $link ) {
			$link = preg_match( '/<a/', $link ) ? $link : "<a href='#'>{$link}</a>";
			echo "<li>{$link}</li>";
		}
		echo '</ul>';
	}
}

function holy2020_the_date( $date ) {
	return date( 'd', $date ) . ' tháng ' . date( 'm', $date ) . ' năm ' . date( 'Y', $date );
}

function holy2020_get_page_ids_by_template( $template ) {
	$args    = [
		'post_type'  => 'page',
		'fields'     => 'ids',
		'nopaging'   => TRUE,
		'meta_key'   => '_wp_page_template',
		'meta_value' => $template,
	];
	$postIds = get_posts( $args );

	return $postIds;
}

/**
 * auto_child_page_menu
 *
 * class to add top level page menu items all child pages on the fly
 *
 * @author Ohad Raz <admin@bainternet.info>
 */
class Holy2020AutoChildPageMenu {

	/**
	 * class constructor
	 *
	 * @param array $args
	 *
	 * @return  void
	 * @author Ohad Raz <admin@bainternet.info>
	 */
	function __construct( $args = [] ) {
		add_filter( 'wp_nav_menu_objects', [ $this, 'on_the_fly' ] );
	}

	/**
	 * the magic function that adds the child pages
	 *
	 * @param array $items
	 *
	 * @return array
	 * @author Ohad Raz <admin@bainternet.info>
	 */
	function on_the_fly( $items ) {
		global $post;
		$tmp = [];
		foreach ( $items as $key => $i ) {
			$tmp[] = $i;
			//if not page move on
			if ( $i->object != 'page' ) {
				continue;
			}
			$page = get_post( $i->object_id );
			//if not parent page move on
			if ( ! isset( $page->post_parent ) || $page->post_parent != 0 ) {
				continue;
			}
			$children = get_pages( [ 'child_of' => $i->object_id ] );
			foreach ( (array) $children as $c ) {
				//set parent menu
				$c->menu_item_parent = $i->ID;
				$c->object_id        = $c->ID;
				$c->object           = 'page';
				$c->type             = 'post_type';
				$c->type_label       = 'Page';
				$c->url              = get_permalink( $c->ID );
				$c->title            = $c->post_title;
				$c->target           = '';
				$c->attr_title       = '';
				$c->description      = '';
				$c->classes          = [
					'',
					'menu-item',
					'menu-item-type-post_type',
					'menu-item-object-page',
				];
				if ( $post->ID == $c->ID ) {
					$c->classes[] = 'current-page-item';
				}
				$c->xfn                   = '';
				$c->current               = ( $post->ID == $c->ID ) ? TRUE : FALSE;
				$c->current_item_ancestor = ( $post->ID == $c->post_parent ) ? TRUE : FALSE; //probbably not right
				$c->current_item_parent   = ( $post->ID == $c->post_parent ) ? TRUE : FALSE;
				$tmp[]                    = $c;
			}
		}

		return $tmp;
	}
}