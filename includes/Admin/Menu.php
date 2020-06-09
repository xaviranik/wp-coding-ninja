<?php

namespace WeDevs\Ninja\Admin;

use WeDevs\Ninja\Admin\Addressbook;

/**
 * Menu handler class
 */
class Menu {

	public $addressbook;
	
	function __construct( $addressbook ) {
		$this->addressbook = $addressbook;
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
	}

	public function admin_menu() {
		$parent_slug = 'coding_ninja';
		$capability = 'manage_options';
		add_menu_page( __( 'Coding Ninja', 'coding-ninja' ), __( 'Coding Ninja', 'coding-ninja' ), $capability, $parent_slug, [ $this, 'addressbook_page' ], 'dashicons-universal-access-alt' );
		add_submenu_page( $parent_slug, __( 'Address Book', 'coding-ninja' ), __( 'Address Book', 'coding-ninja' ), $capability, $parent_slug, [ $this, 'addressbook_page' ] );
		add_submenu_page( $parent_slug, __( 'Settings', 'coding-ninja' ), __( 'Settings', 'coding-ninja' ), $capability, 'coding_ninja_settings', [ $this, 'settings_page' ] );
	}

	public function settings_page() {
		echo "SETTINGS PAGE";
	}

	public function addressbook_page() {
		$this->addressbook->plugin_page();
	}
}