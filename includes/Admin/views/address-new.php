<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e( 'New Address Book',  'coding-ninja' ); ?></h1>

    <?php var_dump($this->errors) ?>

	<form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e( 'Name', 'coding-ninja' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="" placeholder="John Doe">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="address"><?php _e( 'Address', 'coding-ninja' ); ?></label>
                    </th>
                    <td>
                        <textarea class="regular-text" name="address" id="address" placeholder="221B Baker St, London"></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="phone"><?php _e( 'Phone', 'coding-ninja' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone" id="phone" class="regular-text" value="" placeholder="+111 1111 1111">
                    </td>
                </tr>
            </tbody>
        </table>

        <?php wp_nonce_field( 'new_address' ); ?>
        <?php submit_button( __( 'Add Address', 'coding-ninja' ), 'primary', 'submit_address' ); ?>
    </form>
</div>