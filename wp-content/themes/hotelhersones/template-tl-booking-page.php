<?php
/*
Template name: Бронирование
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header();
?>

  <!-- start main-contacts -->

  <div class="main-contacts">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
          <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </div>
  <style>
    .socials, .insta-block {
      display: none !important;
    }
  </style>
 

<?php get_footer(); ?>