<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php get_template_part('template-parts/head'); ?>
</head>

<body <?php body_class("page-body"); ?>>
<div class="wrapper">

<header class="page-header">
  <div class="container">
    <nav class="main-nav" role="navigation">
        <div class="container-menu-left">
          <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_class' => 'main-nav__list', 'container' => false)); ?>
        </div>

        <a href="<?php echo home_url( '/'); ?>" class="logo">
          <img src="<?php echo get_theme_mod('logo'); ?>" alt="">
        </a>

        <div class="container-menu-right">
          <?php wp_nav_menu(array('theme_location' => 'my-custom-menu',
            'container_class' => 'right-menu')); ?>
        </div>
        <div class="container-mobile-menu">
          <?php wp_nav_menu(array('theme_location' => 'my-mobile-menu',
            'container_class' => 'mobile-menu')); ?>
        </div>
      <div class="hamburger">
        <span class="hamburger__line hamburger__line-top"></span>
        <span class="hamburger__line hamburger__line-middle"></span>
        <span class="hamburger__line hamburger__line-bottom"></span>
      </div>
    </nav>
  </div>



</header>
