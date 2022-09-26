<?php
/**
 * Plugin Name: Ultimate Member - User Tags - Import from CSV
 * Description: Importing widget for the User Tags extension
 * Version:     1.0.0
 * Author:      Ultimate Member support
 * Author URI:  https://ultimatemember.com/support/
 * Text Domain: um-user-tags-import
 * UM version:  2.5.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// The Ultimate Member plugin is required.
if ( ! function_exists( 'UM' ) ) {
	return;
}

// Add dashboard widget.
if ( is_admin() ) {
	require_once wp_normalize_path( __DIR__ . '/includes/class-widget.php' );
	new umuti\includes\Widget();
}

// Handle actions.
if ( is_admin() && isset( $_POST['action'] ) ) {
	require_once wp_normalize_path( __DIR__ . '/includes/class-actions.php' );
	new umuti\includes\Actions();
}