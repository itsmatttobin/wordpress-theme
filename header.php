<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

  <meta charset="<?php bloginfo('charset'); ?>">

  <!-- Always force latest IE rendering engine (even in intranet) -->
  <!--[if IE ]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->

  <?php
    if (is_search())
      echo '<meta name="robots" content="noindex, nofollow" />';
  ?>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <div id="wrapper">

    <header id="header">
      <div class="container">
        <h1><a href="/"><?php bloginfo( 'name' ); ?></a></h1>
        <div class="description"><?php bloginfo( 'description' ); ?></div>

        <nav id="nav">
          <?php wp_nav_menu( array('theme_location' => 'main-menu') ); ?>
        </nav>
      </div>
    </header>

    <div class="container">

