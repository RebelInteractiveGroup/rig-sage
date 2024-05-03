<?php

namespace App;

collect([
  'Templates',
])->each(function ($file) {
  $file = "app/FacetWP/{$file}.php";

  if (!locate_template($file, true, true)) {
    wp_die(
      sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
    );
  }
});
