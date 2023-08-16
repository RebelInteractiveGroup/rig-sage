<?php

namespace App;

// Add custom image sizes
add_image_size('header-background', 1600, 400, true);

// And then we'll add the custom size to the Gutenberg image dropdown
add_filter('image_size_names_choose', function ($sizes) {
    return array_merge($sizes, [
      'header-background' => __('Header Background'),
    ]);
});
