<?php
require_once( dirname( __FILE__ ) . '/wp-load.php' );
 
$args = [
    'post_type'      => 'post',
    'post_status'    => 'any',
    'posts_per_page' => -1,
    'fields'         => 'ids',
];
 
$query = new WP_Query($args);
 
if ( $query->have_posts() ) {
    foreach ( $query->posts as $post_id ) {
        $aioseo_desc = get_post_meta($post_id, '_aioseo_description', true);
 
        if ( !empty($aioseo_desc) ) {
            update_post_meta($post_id, '_yoast_wpseo_metadesc', $aioseo_desc);
 
            // Trigger Yoast to update internal index
            if ( function_exists('wpseo_replace_vars') && class_exists('WPSEO_Meta') ) {
                do_action( 'wpseo_save_meta', $post_id );
            }
        }
    }
 
    echo 'Metadata migration completed and Yoast meta updated.';
} else {
    echo 'No posts found.';
}
?>
