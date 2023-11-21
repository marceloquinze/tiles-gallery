<?php
/*
Plugin Name: Blaze Tiles
Description: Tiles Block for Blaze Theme
Version: 1.0
Author: Marcelo Vieira
Author URI: https://marcelowebdesign.com
*/

if( ! defined( 'ABSPATH' ) ) exit;

class BlazeTiles{
	function __construct(){
		add_action( 'init', array( $this, 'register_block' ));
		add_action( 'init', array( $this, 'pattern' ));
	}

	function register_block(){
		register_block_type( __DIR__ );
	}

	function pattern(){
		register_block_pattern(
			'blaze/cover_stack',
			array(
				'title'       => __( 'Cover + Stack', 'my-plugin' ),
				'description' => _x( 'Two horizontal buttons, the left button is filled in, and the right button is outlined.', 'Block pattern description', 'my-plugin' ),
				'content'     => "<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"backgroundColor\":\"very-dark-gray\",\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background has-very-dark-gray-background-color no-border-radius\">" . esc_html__( 'Button One', 'my-plugin' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"textColor\":\"very-dark-gray\",\"borderRadius\":0,\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-very-dark-gray-color no-border-radius\">" . esc_html__( 'Button Two', 'my-plugin' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
			)
		);
	}
}

$blaze_tiles = new BlazeTiles();
