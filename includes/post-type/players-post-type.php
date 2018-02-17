<?php

class RCS_Players_Post_Type
{

    public function __construct()
    {
        add_action('init', array($this, 'create_player'), 1);
        add_action('save_post', array($this, 'save_player'), 9, 3);
    }

    public function create_player()
    {
        register_post_type('rcs_players',
            array(
                'labels' => array(
                    'name' => __('Players'),
                    'singular_name' => __('Player'),
                    'add_new' => __('Create player'),
                    'add_new_item' => __('Create new player'),
                    'edit' => __('Edit'),
                    'edit_item' => __('Edit player'),
                    'new_item' => __('New player'),
                    'view' => __('Show player'),
                    'view_item' => __('Show player'),
                    'search_items' => __('Search player'),
                    'not_found' => __('No players found'),
                    'not_found_in_trash' => __('No players found in trash'),
                    'parent' => __('Parent'),
                ),
                'public' => true,
                'publicly_queryable' => false,
                'has_archive' => false,
                'hierarchical' => true,
                'show_in_nav_menus' => true,
                'menu_icon' => 'dashicons-list-view',
                'rewrite' => array(
                    'slug' => 'players',
                ),
                'show_in_rest' => true,
                'taxonomies' => array('category'),
                'supports' => array('title', 'editor', 'thumbnail', 'author'),
            ));
    }

    public function save_player($post_id, $post, $update)
    {
        #region Nonce check
        // Checks save status
        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);
        $is_valid_nonce = (isset($_POST['rcs_players_nonce']) && wp_verify_nonce($_POST['rcs_players_nonce'])) ? 'true' : 'false';

        // Exits script depending on save status
        if ($is_autosave || $is_revision || !$is_valid_nonce) {
            return;
        }
        #endregion
    }
}

$RCS_Players_Post_Type = new RCS_Players_Post_Type;
