<?php

/**
 * Insert new address
 * @param  array  $args
 * @return integer|WP_Error
 */
function wd_cn_insert_address( $args = [] ) {
	global $wpdb;

	if ( empty( $args['name'] ) ) {
		return new \WP_Error( 'no-name', __( 'You must provide a name', 'coding-ninja' ) );
	}

	$defaults = [
		'name'       => '',
		'address'    => '',
		'phone'      => '',
		'created_by' => '',
		'created_at' => current_time( 'mysql' ),
	];
	$data = wp_parse_args( $args, $defaults );

	$inserted = $wpdb->insert( 
		"{$wpdb->prefix}cn_addressbook", 
		$data, 
		[
			'%s',
			'%s',
			'%s',
			'%d',
			'%s',
		],
	);

	if ( ! $inserted ) {
		return new \WP_Error( 'failed-to-insert', __( 'Failed to insert data', 'coding-ninja' ) );
	}

	return $wpdb->insert_id;
}