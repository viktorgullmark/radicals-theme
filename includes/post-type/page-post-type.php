<?php

class RCS_Page_Post_Type
{

    public function __construct()
    {
        add_action('save_post', array($this, 'save_page'), 9, 3);
    }

    public function save_page($post_id, $post, $update)
    {
        #region Nonce check
        // Checks save status
        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);
        $is_valid_nonce = (isset($_POST['page_nonce']) && wp_verify_nonce($_POST['page_nonce'])) ? 'true' : 'false';

        // Exits script depending on save status
        if ($is_autosave || $is_revision || !$is_valid_nonce) {
            return;
        }
        #endregion
    }
}

$RCS_Page_Post_Type = new RCS_Page_Post_Type;
