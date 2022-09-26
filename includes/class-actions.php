<?php
/**
 * Handle actions.
 *
 * @package umuti\includes
 */

namespace umuti\includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Actions {

	public static $error;
	public static $success;

	public function __construct() {
		add_action( 'admin_action_umuti-widget', array( &$this, 'do_action' ) );
	}

	public function action_import() {
		if ( empty( $_FILES['umuti-csv'] ) ) {
			self::$error = esc_html__( 'You have to upload CSV file.', 'um-user-tags-import' );
			return;
		}
		if ( ! empty( $_FILES['umuti-csv']['error'] ) ) {
			self::$error  = esc_html__( 'Error on file uploading:', 'um-user-tags-import' ) . ' ' . (string) $_FILES['umuti-csv']['error'];
			return;
		}
		if ( 'text/csv' !== $_FILES['umuti-csv']['type'] ) {
			self::$error  = esc_html__( 'Wrong file type.', 'um-user-tags-import' ) . ' ' . esc_html__( 'You have to upload CSV file.', 'um-user-tags-import' );
			return;
		}

		$child_tags  = 0;
		$parent_tags = 0;

		$tags = $this->parse_file( $_FILES['umuti-csv']['tmp_name'] );
		foreach ( $tags as $parent_tag ) {

			// Insert parent tag.
			$term1 = wp_insert_term(
				$parent_tag['title'],
				'um_user_tag',
				array(
					'parent'      => 0,
					'slug'        => isset( $parent_tag['slug'] ) ? $parent_tag['slug'] : '',
					'description' => isset( $parent_tag['description'] ) ? $parent_tag['description'] : '',
				)
			);
			if ( is_wp_error( $term1 ) ) {
				self::$error .= ' ' . $term1->get_error_message();
			} else {
				$parent_tags++;
			}


			// Insert child tags.
			if ( is_array( $term1 ) && is_array( $parent_tag['options'] ) ) {
				foreach ( $parent_tag['options'] as $child_tag ) {
					$term2 = wp_insert_term(
						$child_tag['title'],
						'um_user_tag',
						array(
							'parent'      => $term1['term_id'],
							'slug'        => isset( $child_tag['slug'] ) ? $child_tag['slug'] : '',
							'description' => isset( $child_tag['description'] ) ? $child_tag['description'] : '',
						)
					);
					if ( is_wp_error( $term2 ) ) {
						self::$error .= ' ' . $term1->get_error_message();
					} else {
						$child_tags++;
					}
				}
			}
		}

		self::$success = sprintf( esc_html__( '%1$d parent tags are added. %2$d child tags are added.', 'um-user-tags-import' ), $parent_tags, $child_tags );
	}

	public function do_action() {
		check_admin_referer( 'umuti-widget' );

		if ( ! empty( $_POST['umuti-import'] ) ) {
			$this->action_import();
		}
	}

	public function parse_file( $filepath ){
		$tags    = array();
		$parent  = 'default tag';

		$arr = file( $filepath );
		if ( is_array( $arr ) ) {
			foreach ( $arr as $i => $line ) {
				$tagline = str_getcsv( $line );

				if ( 0 === $i && 'Parent term' === $tagline[0] ) {
					$this->csv_heading = $tagline;
					continue;
				}
				if ( ! empty( $tagline[0] ) ) {
					$parent = esc_html( $tagline[0] );
					if ( ! array_key_exists( $parent, $tags ) ) {
						$tags[ $parent ] = array(
							'title'       => $parent,
							'description' => esc_html( $tagline[1] ),
							'options'     => array(),
						);
					}
				}
				if ( ! empty( $tagline[2] ) && $tagline[2] !== $parent ) {
					$tags[ $parent ]['options'][] = array(
						'slug'  => $tagline[1],
						'title' => $tagline[2],
					);
				}
			}
		}

		return $tags;
	}
}
