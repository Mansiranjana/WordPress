<?php
// Load WordPress
require_once( dirname( __FILE__ ) . '/wp-load.php' );

// Check user capability
if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( 'Insufficient permissions' );
}

// Force delete Yoast indexation marker
delete_option( 'wpseo_indexation_completed' );

// Clear Yoast index tables
global $wpdb;
$wpdb->query( "TRUNCATE TABLE {$wpdb->prefix}yoast_indexable;" );
$wpdb->query( "TRUNCATE TABLE {$wpdb->prefix}yoast_indexable_hierarchy;" );

echo '✅ Yoast indexables reset successfully. Now go to SEO > Tools and click "Start SEO data optimization".';
?>
