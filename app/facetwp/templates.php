<?php

// Register accolades template
/*
add_filter('facetwp_templates', function ($templates) {
    $templates[] = [
      'label'     => 'TemplateOne',
      'name'      => 'templateone',
      "query" => "<?php
      return [
        \"post_type\" => [
          \"templateone\"
        ],
        \"post_status\" => [
          \"publish\"
        ],
        \"orderby\" => [
          \"title\" => \"ASC\"
        ],
        \"posts_per_page\" => \"-1\",
      ];
    ?>",
      "template" => \Roots\view('facetwp.templates.templateone'),
      'modes'     => [
        'display' => 'advanced',
        'query' => 'advanced'
      ],
      "query_obj" => [
          "post_type" => [
            "label" => "Template One",
            "value" => "templateone",
          ],
        ],
    ];

    // Return the templates array
    return $templates;
});
*/
