<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
  /**
   * List of views served by this composer.
   *
   * @var array
   */
  protected static $views = [
    '*',
  ];

  /**
   * Data to be passed to view before rendering.
   *
   * @return array
   */
  public function with()
  {
    return [
      'siteName' => $this->siteName(),
      'primaryMenu' => $this->primaryMenu(),
      'utilityMenu' => $this->utilityMenu(),
      'footerMenu' => $this->footerMenu(),
      'headerBGImage' => $this->headerVideoFileBG(),
      'headerBGVideoFile' => $this->headerVideoFileBG(),
      'headerBGVideoEmbed' => $this->headerVideoEmbeddedBG(),
    ];
  }

  /**
   * Returns the site name.
   *
   * @return string
   */
  public function siteName()
  {
    return get_bloginfo('name', 'display');
  }

  /**
   * Return the menu arguments
   */
  public function primaryMenu()
  {
    $args = array(
      'theme_location'    => 'primary_navigation',
      'menu_class'        => 'navbar-nav',
      'depth'             => 4,
      'walker'            => new \App\wp_bootstrap5_navwalker(),
    );
    return $args;
  }

  /**
   * Return the menu arguments
   */
  public function utilityMenu()
  {
    $args = array(
      'theme_location'    => 'utility_navigation',
      'menu_class'        => 'navbar-nav',
      'depth'             => 4,
      'walker'            => new \App\wp_bootstrap5_navwalker(),
    );
    return $args;
  }

  /**
   * Return the menu arguments
   */
  public function footerMenu()
  {
    $args = [
      'theme_location'    => 'footer_navigation',
      'container'         => '',
      'container_class'   => '',
      'menu_class'        => 'nav flex-column',
      'depth'             => 1,
      'link_after'        => ''
    ];
    return $args;
  }

  /**
   * Return the embedded video for the page
   *
   * @return string
   */
  public function headerVideoEmbeddedBG()
  {
      $return = '';
      if (get_field('header_video')) {
          // get iframe HTML
          $iframe = get_field('header_video');

          // use preg_match to find iframe src
          preg_match('/src="(.+?)"/', $iframe, $matches);
          $src = $matches[1];

          $new_src = add_query_arg(['background' => 1], $src);
          $return = str_replace($src, $new_src, $iframe);
      }

      // Always return
      return $return;
  }

  /**
   * Return the header video file for the page
   *
   * @return string
   */
  public function headerVideoFileBG()
  {
      $return = '';
      if (get_field('header_video_file')) {
          // get iframe HTML
          $mp4URL = get_field('header_video_file');

          $video_element = '<video preload="auto" autoplay="autoplay" loop="loop" muted="true" width="100%" playsinline disableremoteplayback><source src="'.$mp4URL.'" type="video/mp4"></video>';
          $return = $video_element;
      }

      // Always return
      return $return;
  }

}
