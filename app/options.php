<?php

namespace App;

/**
 * Theme Options Section
 */
add_action('acf/init', function () {
  // Check function exists.
  if (function_exists('acf_add_options_page')) {
    // Add parent.
    $parent = acf_add_options_page(array(
      'page_title'  => __('Theme Settings'),
      'menu_title'  => __('Theme Settings'),
      'redirect'    => false,
    ));

    // Add sub page.
    $child = acf_add_options_page(array(
      'page_title'  => __('Other Settings'),
      'menu_title'  => __('Other Settings'),
      'parent_slug' => $parent['menu_slug'],
    ));
  }
});
