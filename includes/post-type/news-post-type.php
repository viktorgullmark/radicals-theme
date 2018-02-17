<?php

class RCS_News_Post_Type{

	public function __construct(){
		add_action( 'init', array($this, 'create_news'), 1 );
		add_action( 'save_post', array($this, 'save_news'), 9 ,3 );
	}

	function create_news(){
		register_post_type( 'rcs_news',
		  array(
			'labels' => array(
				'name' => __( 'News' ),
				'singular_name' => __( 'Newspost' ),
				'add_new' => __( 'Create new' ),
				'add_new_item' => __( 'Create new newspost' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit newspost' ),
				'new_item' => __( 'New newspost' ),
				'view' => __( 'Show newspost' ),
				'view_item' => __( 'Show newspost' ),
				'search_items' => __( 'Search newspost' ),
				'not_found' => __( 'No news found' ),
				'not_found_in_trash' => __( 'No news found in trash' ),
				'parent' => __( 'Parent' ),
            ),
			'public' => true,
			'has_archive' => false,
            'hierarchical' => true,
            'show_in_nav_menus' => true,
			'menu_icon' => 'dashicons-calendar-alt',
			'rewrite' => array(
				'slug' => 'news'
			),
			'show_in_rest' => true,
            'taxonomies' => array('category'),
			'supports' =>array( 'title', 'editor', 'thumbnail','author')
		));
	}


    function save_news($post_id, $post, $update ){
		#region Nonce check
		// Checks save status
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ 'rcs_news_nonce' ] ) && wp_verify_nonce( $_POST[ 'rcs_news_nonce' ])) ? 'true' : 'false';

		// Exits script depending on save status
		if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
			return;
		}
        #endregion
	}
}

$RCS_News_Post_Type = new RCS_News_Post_Type;

