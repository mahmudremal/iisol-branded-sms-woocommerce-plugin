<?php
/**
 * Register Post Types
 *
 * @package FutureWordPressProjectBrandedSms
 */

namespace FUTUREWORDPRESS_PROJECT_BRANDEDSMS\Inc;

use FUTUREWORDPRESS_PROJECT_BRANDEDSMS\Inc\Traits\Singleton;
 
class PostTypes {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'create_movie_cpt' ], 0 );

	}

	// Register Custom Post Type Movie
	public function create_movie_cpt() {

		$labels = [
			'name'                  => _x( 'Movies', 'Post Type General Name', 'iisol-branded-sms-woocommerce-plugin' ),
			'singular_name'         => _x( 'Movie', 'Post Type Singular Name', 'iisol-branded-sms-woocommerce-plugin' ),
			'menu_name'             => _x( 'Movies', 'Admin Menu text', 'iisol-branded-sms-woocommerce-plugin' ),
			'name_admin_bar'        => _x( 'Movie', 'Add New on Toolbar', 'iisol-branded-sms-woocommerce-plugin' ),
			'archives'              => __( 'Movie Archives', 'iisol-branded-sms-woocommerce-plugin' ),
			'attributes'            => __( 'Movie Attributes', 'iisol-branded-sms-woocommerce-plugin' ),
			'parent_item_colon'     => __( 'Parent Movie:', 'iisol-branded-sms-woocommerce-plugin' ),
			'all_items'             => __( 'All Movies', 'iisol-branded-sms-woocommerce-plugin' ),
			'add_new_item'          => __( 'Add New Movie', 'iisol-branded-sms-woocommerce-plugin' ),
			'add_new'               => __( 'Add New', 'iisol-branded-sms-woocommerce-plugin' ),
			'new_item'              => __( 'New Movie', 'iisol-branded-sms-woocommerce-plugin' ),
			'edit_item'             => __( 'Edit Movie', 'iisol-branded-sms-woocommerce-plugin' ),
			'update_item'           => __( 'Update Movie', 'iisol-branded-sms-woocommerce-plugin' ),
			'view_item'             => __( 'View Movie', 'iisol-branded-sms-woocommerce-plugin' ),
			'view_items'            => __( 'View Movies', 'iisol-branded-sms-woocommerce-plugin' ),
			'search_items'          => __( 'Search Movie', 'iisol-branded-sms-woocommerce-plugin' ),
			'not_found'             => __( 'Not found', 'iisol-branded-sms-woocommerce-plugin' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'iisol-branded-sms-woocommerce-plugin' ),
			'featured_image'        => __( 'Featured Image', 'iisol-branded-sms-woocommerce-plugin' ),
			'set_featured_image'    => __( 'Set featured image', 'iisol-branded-sms-woocommerce-plugin' ),
			'remove_featured_image' => __( 'Remove featured image', 'iisol-branded-sms-woocommerce-plugin' ),
			'use_featured_image'    => __( 'Use as featured image', 'iisol-branded-sms-woocommerce-plugin' ),
			'insert_into_item'      => __( 'Insert into Movie', 'iisol-branded-sms-woocommerce-plugin' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Movie', 'iisol-branded-sms-woocommerce-plugin' ),
			'items_list'            => __( 'Movies list', 'iisol-branded-sms-woocommerce-plugin' ),
			'items_list_navigation' => __( 'Movies list navigation', 'iisol-branded-sms-woocommerce-plugin' ),
			'filter_items_list'     => __( 'Filter Movies list', 'iisol-branded-sms-woocommerce-plugin' ),
		];
		$args   = [
			'label'               => __( 'Movie', 'iisol-branded-sms-woocommerce-plugin' ),
			'description'         => __( 'The movies', 'iisol-branded-sms-woocommerce-plugin' ),
			'labels'              => $labels,
			'menu_icon'           => 'dashicons-video-alt',
			'supports'            => [
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',
				'author',
				'comments',
				'trackbacks',
				'page-attributes',
				'custom-fields',
			],
			'taxonomies'          => [],
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'hierarchical'        => false,
			'exclude_from_search' => false,
			'show_in_rest'        => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		];

		register_post_type( 'movies', $args );

	}


}
