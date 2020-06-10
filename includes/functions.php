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
		"{$wpdb->prefix}cn_addressbooks", 
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

/**
 * Gets all the address
 * @param  array  $args
 * @return array
 */
function wd_cn_get_addresses( $args = [] ) {
	global $wpdb;

    $defaults = [
        'number'  => 20,
        'offset'  => 0,
        'orderby' => 'id',
        'order'   => 'ASC'
    ];

    $args = wp_parse_args( $args, $defaults );

    $sql = $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}cn_addressbooks
            ORDER BY {$args['orderby']} {$args['order']}
            LIMIT %d, %d",
            $args['offset'], $args['number']
    );

    $items = $wpdb->get_results( $sql );

    return $items;
}

/**
 * Returns total number of address
 * @return integer
 */
function wd_cn_get_address_count() {
	global $wpdb;

    return (int) $wpdb->get_var( "SELECT count(id) FROM {$wpdb->prefix}cn_addressbooks" );
}