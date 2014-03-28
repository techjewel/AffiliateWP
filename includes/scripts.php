<?php

function affwp_admin_scripts( $hook ) {

	// TODO load conditionally

	wp_enqueue_script( 'affwp-admin', AFFILIATEWP_PLUGIN_URL . 'assets/js/admin.js', array( 'jquery' ), AFFILIATEWP_VERSION );
	wp_localize_script( 'affwp-admin', 'affwp_vars', array(
		'post_id'       => isset( $post->ID ) ? $post->ID : null,
		'affwp_version' => AFFILIATEWP_VERSION,
		'currency_sign' => affwp_currency_filter(''),
		'currency_pos'  => affiliate_wp()->settings->get( 'currency_position', 'before' ),
	));

	wp_enqueue_script( 'jquery-ui-datepicker' );
}
add_action( 'admin_enqueue_scripts', 'affwp_admin_scripts' );

function affwp_admin_styles( $hook ) {

	// TODO load conditionally

	wp_enqueue_style( 'affwp-admin', AFFILIATEWP_PLUGIN_URL . 'assets/css/admin.css', AFFILIATEWP_VERSION );
	wp_enqueue_style( 'dashicons' );
	$ui_style = ( 'classic' == get_user_option( 'admin_color' ) ) ? 'classic' : 'fresh';
	wp_enqueue_style( 'jquery-ui-css', AFFILIATEWP_PLUGIN_URL . 'assets/css/jquery-ui-' . $ui_style . '.min.css' );
}
add_action( 'admin_enqueue_scripts', 'affwp_admin_styles' );