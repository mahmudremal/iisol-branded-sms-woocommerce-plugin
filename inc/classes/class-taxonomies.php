<?php
/**
 * Register Custom Taxonomies
 *
 * @package FutureWordPressProjectBrandedSms
 */

namespace FUTUREWORDPRESS_PROJECT_BRANDEDSMS\Inc;

use FUTUREWORDPRESS_PROJECT_BRANDEDSMS\Inc\Traits\Singleton;

class Taxonomies {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'create_genre_taxonomy' ] );
		add_action( 'init', [ $this, 'create_year_taxonomy' ] );

	}

	// Register Taxonomy Genre
	public function create_genre_taxonomy() {

		$labels = [
			'name'              => _x( 'Genres', 'taxonomy general name', 'iisol-branded-sms-woocommerce-plugin' ),
			'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'iisol-branded-sms-woocommerce-plugin' ),
			'search_items'      => __( 'Search Genres', 'iisol-branded-sms-woocommerce-plugin' ),
			'all_items'         => __( 'All Genres', 'iisol-branded-sms-woocommerce-plugin' ),
			'parent_item'       => __( 'Parent Genre', 'iisol-branded-sms-woocommerce-plugin' ),
			'parent_item_colon' => __( 'Parent Genre:', 'iisol-branded-sms-woocommerce-plugin' ),
			'edit_item'         => __( 'Edit Genre', 'iisol-branded-sms-woocommerce-plugin' ),
			'update_item'       => __( 'Update Genre', 'iisol-branded-sms-woocommerce-plugin' ),
			'add_new_item'      => __( 'Add New Genre', 'iisol-branded-sms-woocommerce-plugin' ),
			'new_item_name'     => __( 'New Genre Name', 'iisol-branded-sms-woocommerce-plugin' ),
			'menu_name'         => __( 'Genre', 'iisol-branded-sms-woocommerce-plugin' ),
		];
		$args   = [
			'labels'             => $labels,
			'description'        => __( 'Movie Genre', 'iisol-branded-sms-woocommerce-plugin' ),
			'hierarchical'       => true,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'show_tagcloud'      => true,
			'show_in_quick_edit' => true,
			'show_admin_column'  => true,
			'show_in_rest'       => true,
		];

		register_taxonomy( 'genre', [ 'movies' ], $args );

	}

	// Register Taxonomy Year
	public function create_year_taxonomy() {

		$labels = [
			'name'              => _x( 'Years', 'taxonomy general name', 'iisol-branded-sms-woocommerce-plugin' ),
			'singular_name'     => _x( 'Year', 'taxonomy singular name', 'iisol-branded-sms-woocommerce-plugin' ),
			'search_items'      => __( 'Search Years', 'iisol-branded-sms-woocommerce-plugin' ),
			'all_items'         => __( 'All Years', 'iisol-branded-sms-woocommerce-plugin' ),
			'parent_item'       => __( 'Parent Year', 'iisol-branded-sms-woocommerce-plugin' ),
			'parent_item_colon' => __( 'Parent Year:', 'iisol-branded-sms-woocommerce-plugin' ),
			'edit_item'         => __( 'Edit Year', 'iisol-branded-sms-woocommerce-plugin' ),
			'update_item'       => __( 'Update Year', 'iisol-branded-sms-woocommerce-plugin' ),
			'add_new_item'      => __( 'Add New Year', 'iisol-branded-sms-woocommerce-plugin' ),
			'new_item_name'     => __( 'New Year Name', 'iisol-branded-sms-woocommerce-plugin' ),
			'menu_name'         => __( 'Year', 'iisol-branded-sms-woocommerce-plugin' ),
		];
		$args   = [
			'labels'             => $labels,
			'description'        => __( 'Movie Release Year', 'iisol-branded-sms-woocommerce-plugin' ),
			'hierarchical'       => false,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'show_tagcloud'      => true,
			'show_in_quick_edit' => true,
			'show_admin_column'  => true,
			'show_in_rest'       => true,
		];
		register_taxonomy( 'movie-year', [ 'movies' ], $args );

	}

}
