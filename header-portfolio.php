<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Minimal Portfolio</title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="portfolio">
    <h1 class="logo"><a href="">Minimal Portfolio Theme</a></h1>
    <nav>
      <!-- <ul>
               <li><a href="index.html">Home</a></li>
               <li><a href="portfolio.html">Portfolio</a></li>
               <li><a href="about.html">About</a></li>
               <li><a href="contact.html">Contact</a></li>
           </ul> -->
      <?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
    </nav>
    <hr>
    <ul class="portfolio_links">
      <?php
      $currentURI = $_SERVER['REQUEST_URI'];
      $urlArr = explode('/', $currentURI);
      $urlArrLast = $urlArr[count($urlArr) - 2];
      $catNameOrg = str_replace('minimal-portfolio', '', $urlArrLast);
      $catName = str_replace('-', '', $catNameOrg);

      ?>
      <li><a href="<?php bloginfo('url') ?>/category/minimal-portfolio/" class="secondary-btn <?php echo $catName === '' ?  'active' : '' ?>">All</a></li>

      <!-- <li><a href="" class="secondary-btn">Print</a></li>
           <li><a href="" class="secondary-btn">Web</a></li>
           <li><a href="" class="secondary-btn">Mobile</a></li> -->

      <?php
      $categories = get_categories(array(
        'orderby' => 'name',
        'order'   => 'ASC',
        'child_of' => 11,
        'hide_empty' => false,
      ));

      foreach ($categories as $category) {
        $category->name === $catName ? $activeClass = "active" : $activeClass = '';
        $category_link = sprintf(
          '<a href="%1$s" alt="%2$s" class="secondary-btn '  . $activeClass . '">%3$s</a>',
          esc_url(get_category_link($category->term_id)),
          esc_attr(sprintf(__('View all posts in %s', 'ezweb'), $category->name)),
          esc_html($category->name)
        );

        echo '<li>' .  $category_link  . '</li> ';
      }
      ?>
    </ul>
  </header>
  <hr>
  <main class="content">