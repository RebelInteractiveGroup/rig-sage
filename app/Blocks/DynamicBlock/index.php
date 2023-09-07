<?php
/**
 * Plugin Name: Gutenberg Examples Dynamic Block
 * Plugin URI: https://github.com/WordPress/gutenberg-examples
 * Description: Demonstrating how to register new blocks for the Gutenberg editor.
 * Version: 1.1.0
 * Author: Rob Voss <rob.voss@digerati.io>
 *
 * @package rig-sage
 */

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 */
add_action('init', function () {
    register_block_type(
        __DIR__,
        ['render_callback' => function ($attributes, $content, $block_instance) {
            ob_start();

            include plugin_dir_path(__FILE__) . 'template.php';

            return ob_get_clean();
        }],
    );
});


/**
 * This function is called when the block is being rendered on the front end of the
 * site
 *
 * @param array    $attributes The array of attributes for this block.
 * @param string   $content Rendered block output. ie. <InnerBlocks.Content />.
 * @param WP_Block $block_instance The instance of the WP_Block class that represents
 *                 the block being rendered.
 */

