<?php

namespace WeDevs\Ninja\Admin;

/**
 * Menu handler class
 */
class Menu {
	
	function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
	}

	public function admin_menu() {
		add_menu_page( __( 'Coding Ninja', 'coding-ninja' ), __( 'Coding Ninja', 'coding-ninja' ), 'manage_options', 'coding_ninja', [ $this, 'plugin_page' ], 'dashicons-universal-access-alt' );
	}

	public function plugin_page() {
		echo "PLUGIN PAGE";
	}
}