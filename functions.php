<?php

// 변수 등록
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT . '/images');

if (! function_exists('minimal_script')) {
  function minimal_script()
  {
    //script를 등록
    wp_register_script('bootstrap',  THEMEROOT . '/js/bootstrap.min.js', true, false, true);
    //script 로드
    wp_enqueue_script('bootstrap');
    //css 로드
    wp_enqueue_style('common-css', THEMEROOT . '/css/common.css');
    wp_enqueue_style('bootstrap-grid', THEMEROOT . '/css/bootstrap-grid.min.css');
    wp_enqueue_style('default', THEMEROOT . '/css/default.css');
    wp_enqueue_style('responsive', THEMEROOT . '/css/responsive.css');
  }
  add_action('wp_enqueue_scripts', 'minimal_script');
}

function register_my_menu()
{
  register_nav_menus(
    array(
      'header-menu' => __('Header Menu')
    )
  );
}
add_action('init', 'register_my_menu');

add_theme_support('post-thumbnails');

if (!function_exists('minimal_pagination')) {
  function minimal_pagination()
  {
    $args = array(
      'prev_next' => false,
      'type' => 'array',
    );
    $pagination = paginate_links($args);
    // print_r($pagination);
    if (is_array($pagination) && count($pagination) > 0) {
      echo '<p class="pagenation shadow">';
      foreach ($pagination as $page) {
        // echo $page;
        if (strpos($page, 'current')) {
          echo '<span class="secondary-btn active">' . $page . '</span>';
        } else {
          echo '<span class="secondary-btn">' . $page . '</span>';
        }
      }
      echo '</p>';
    }
  }
}
