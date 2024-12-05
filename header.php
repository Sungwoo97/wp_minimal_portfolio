<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Minimal Portfolio</title>
  <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
  <header>
    <h1 class="logo"><a href="">Minimal Portfolio Theme</a></h1>
    <nav>
      <!-- <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="portfolio.html">Portfolio</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul> -->
      <?php
      wp_nav_menu(array('theme_location' => 'header-menu'));
      ?>

    </nav>
  </header>
  <hr>
  <main class="content">