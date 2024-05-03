<?php

namespace App;

// Add custom image sizes
add_image_size('wide-image', 1600, 400, true);
add_image_size('full-width', 1920, 1080, true);
add_image_size('medium-width', 1280, 720, true);
add_image_size('large-square', 1080, 1080, true);

// And then we'll add the custom size to the Gutenberg image dropdown
add_filter('image_size_names_choose', function ($sizes) {
  return array_merge($sizes, [
    'wide-background' => __('Wide Image 1600x400'),
    'header-background' => __('Full Image 1920x1080'),
    'header-background' => __('Medium Image 1280x720'),
    'header-background' => __('Square Image 1080x1080'),
  ]);
});
