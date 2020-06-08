<?php

namespace WeDevs\Ninja;

use WeDevs\Ninja\Admin\Menu;
use WeDevs\Ninja\Admin\Addressbook;

/**
 * Admin Class
 */
class Admin {
	
	/**
	 * Admin Constructor
	 */
	function __construct() {
		$this->dispatch_actions();
		new Menu();
	}

	/**
	 * Dispatching all admin relation actions
	 * @return void
	 */
	public function dispatch_actions() {
		$addressbook = new Addressbook();
		add_action( 'admin_init', [ $addressbook, 'form_handler' ] );
	}
}