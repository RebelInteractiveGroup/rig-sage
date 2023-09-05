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
function rig_sage_dynamic_block_block_init()
{
    register_block_type(
        __DIR__,
        ['render_callback' => 'rig_sage_dynamic_block_render_callback'],
    );
}
add_action('init', 'rig_sage_dynamic_block_block_init');


/**
 * This function is called when the block is being rendered on the front end of the
 * site
 *
 * @param array    $attributes The array of attributes for this block.
 * @param string   $content Rendered block output. ie. <InnerBlocks.Content />.
 * @param WP_Block $block_instance The instance of the WP_Block class that represents
 *                 the block being rendered.
 */
function rig_sage_dynamic_block_render_callback($attributes, $content, $block_instance)
{
    ob_start();

    /**
     * Keeping the markup to be returned in a separate file is sometimes better,
     * especially if there is very complicated markup.
     * All of passed parameters are still accessible in the file.
     */

    include plugin_dir_path(__FILE__) . 'DynamicBlock/template.php';

    return ob_get_clean();
}
