<?php

namespace WeDevs\Ninja;

use WeDevs\Ninja\Admin\Menu;

/**
 * Admin Class
 */
class Admin {
	
	function __construct() {
		new Menu();
	}
}