<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$error   = class_exists( 'umuti\includes\Actions' ) ? \umuti\includes\Actions::$error : '';
$success = class_exists( 'umuti\includes\Actions' ) ? \umuti\includes\Actions::$success : '';
?>

<form action="" method="post" enctype="multipart/form-data" class="umuti-form">
	<input type="hidden" name="action" value="umuti-widget">
	<?php wp_nonce_field( 'umuti-widget' ); ?>

	<?php if ( $error ) : ?>
	<div class="umuti-notice umuti-notice-error">
		<?php echo esc_html( $error ); ?>
		<a href="<?php echo esc_url( '/wp-admin/edit-tags.php?taxonomy=um_user_tag' ); ?>"><?php esc_html_e( 'View User Tags', 'um-user-tags-import' ); ?></a>
	</div>
	<?php endif; ?>

	<?php if ( $success ) : ?>
	<div class="umuti-notice umuti-notice-success">
		<?php echo esc_html( $success ); ?>
		<a href="<?php echo esc_url( '/wp-admin/edit-tags.php?taxonomy=um_user_tag' ); ?>"><?php esc_html_e( 'View User Tags', 'um-user-tags-import' ); ?></a>
	</div>
	<?php endif; ?>

	<p><?php esc_html_e( 'Import User Tags from the CSV file.', 'um-user-tags-import' ); ?></p>

	<div class="umuti-field">
		<label for="umuti-csv"><?php esc_html_e( 'Source CSV file', 'um-user-tags-import' ); ?></label>
		<input id="umuti-csv" name="umuti-csv" type="file" required="required"/>
	</div>

	<p class="submit">
		<input type="submit" class="button button-primary" id="umuti-import" name="umuti-import" value="<?php esc_attr_e( 'Import', 'um-user-tags-import' ); ?>">
	</p>
</form>
