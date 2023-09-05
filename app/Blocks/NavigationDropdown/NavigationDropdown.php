<?php

/**
 * Navigation Dropdown Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during backend preview render.
 * @param int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param array $context The context provided to the block by the post or it's parent
 *          block.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'navigation-dropdown-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$links = get_field('links');

$dropdownContent = '';
$dropdownTitle = 'Manage Your Plan';
foreach ($links as $id => $link) {
    $cur = get_permalink() == $link['page']['url'];
    $aria = $cur ? ' aria-current="true"' : '';
    $active = $cur ? ' active' : '';
    $currentTitle = $cur ? $link['page']['title'] : (empty($currentTitle) ? '' : $currentTitle);

    $dropdownContent .= '<li><a class="dropdown-item ' . $active . '" href="' . $link['page']['url'] . '" ' . $aria . '>' . $link['page']['title'] . '</a></li>';
}

?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?> border p-3">
  <div class="dropdown">
    <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown">
    <?php echo !empty($currentTitle) ? $currentTitle :  $dropdownTitle; ?>
    </a>
    <ul class="dropdown-menu">
      <?php echo $dropdownContent; ?>
    </ul>
  </div>
</div>
