<?php
	/* Functions */

//// Leverage Vafpress Framework	
	require_once(get_template_directory_uri() . '/includes/vafpress/bootstrap.php');
//// Leverage TGM Plugin Activation
	require_once(get_template_directory_uri() . '/includes/tgm/class-tgm-plugin-activation.php');

//// Install required plugins
	function rm_register_required_plugins() {
		$plugins = array(
			array(
				'name'							 => 'WP-SCSS',
				'slug'							 => 'wp-scss',
				'required'					 => true,
				'version'						 => '1.2.4',
				'force_activation'	 => true,
				'force_deactivation' => false
			),
		);
		$config = array(
			'id'           => 'jungleruler',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		);
	}
	add_action('tgmpa_register', 'rm_register_required_plugins');

//// Enqueue Styles and Scripts
	function rm_enqueue_scripts() {
	//// Add Featherlight
		wp_enqueue_style('featherlight', get_template_directory_uri() . '/includes/featherlight/featherlight.css', null, '1.7.13');
		wp_enqueue_script('featherlight', get_template_directory_uri() . '/includes/featherlight/featherlight.js', array('jquery'), '1.7.13', true);
		// Add Featherlight Gallery
		wp_enqueue_style('featherlight-gallery', get_template_directory_uri() . '/includes/featherlight/featherlight-gallery.css', array('featherlight'), '1.7.13');
		wp_enqueue_script('featherlight-gallery', get_template_directory_uri() . '/includes/featherlight/featherlight-gallery.js', array('jquery', 'featherlight'), '1.7.13', true);
	}
	add_action('wp_enqueue_scripts', 'rm_enqueue_scripts');

?>