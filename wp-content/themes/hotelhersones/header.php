<?php
/*
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<head>
  <title><?php echo hotelhersones_wp_title('', '', true, 'right');?></title>
   
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136506875-1"></script>
  
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'UA-136506875-1');
  </script>  
  
  <?php wp_head(); ?>
  
  <script src="route_panel_control.js" type="text/javascript"></script>

  <!-- start TL head script -->
  <script type="text/javascript">
    (function(w){
      var q=[
        ['setContext', 'TL-INT-hotelhersonesnew', 'ru']
      ];
      var t=w.travelline=(w.travelline||{}),ti=t.integration=(t.integration||{});ti.__cq=ti.__cq?ti.__cq.concat(q):q;
      if (!ti.__loader){ti.__loader=true;var d=w.document,p=d.location.protocol,s=d.createElement('script');s.type='text/javascript';s.async=true;s.src=(p=='https:'?p:'http:')+'//ibe.tlintegration.com/integration/loader.js';(d.getElementsByTagName('head')[0]||d.getElementsByTagName('body')[0]).appendChild(s);}
    })(window);
  </script>
  <!-- end TL head script -->
  <?php
  $page_main_search = parse_url($_SERVER['REQUEST_URI']);
  if (strpos($page_main_search['path'],"/booking-page") !== false) : ?>
    <!-- start TL Booking form script -->
    <script type="text/javascript">
      (function(w){
        var q=[
          ['setContext', 'TL-INT-hotelhersonesnew', 'ru'],
          ['embed', 'booking-form', {container: 'tl-booking-form'}]
        ];
        var t=w.travelline=(w.travelline||{}),ti=t.integration=(t.integration||{});ti.__cq=ti.__cq?ti.__cq.concat(q):q;
        if (!ti.__loader){ti.__loader=true;var d=w.document,p=d.location.protocol,s=d.createElement('script');s.type='text/javascript';s.async=true;s.src=(p=='https:'?p:'http:')+'//ibe.tlintegration.com/integration/loader.js';(d.getElementsByTagName('head')[0]||d.getElementsByTagName('body')[0]).appendChild(s);}
      })(window);
    </script>
    <!-- end TL Booking form script -->
  <?php else : ?>
    <!-- start TL Search form script -->
    <script type="text/javascript">
      (function(w){
        var q=[
          ['setContext', 'TL-INT-hotelhersonesnew', 'ru'],
          ['embed', 'search-form', {container: 'tl-search-form'}]
        ];
        var t=w.travelline=(w.travelline||{}),ti=t.integration=(t.integration||{});ti.__cq=ti.__cq?ti.__cq.concat(q):q;
        if (!ti.__loader){ti.__loader=true;var d=w.document,p=d.location.protocol,s=d.createElement('script');s.type='text/javascript';s.async=true;s.src=(p=='https:'?p:'http:')+'//ibe.tlintegration.com/integration/loader.js';(d.getElementsByTagName('head')[0]||d.getElementsByTagName('body')[0]).appendChild(s);}
      })(window);
    </script>
    <!-- end TL Search form script -->
  <?php endif; ?>
  <link type="text/css" rel="stylesheet"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/css/travelline-style.css?ver=1"/>
</head>
<body>
  
<!-- start wrapper for mobile menu -->

<!-- start mobile header -->
<div id="page">
  <div class="header-mobile">
    <?php
      if (has_nav_menu('mobile_menu')) {
        wp_nav_menu(array(
          'theme_location' => 'mobile_menu',
          'menu' => '',
          'container' => false,
          'container_class' => '',
          'container_id' => '',
          'menu_class' => '',
          'menu_id' => '',
          'echo' => true,
          'fallback_cb' => 'wp_page_menu',
          'before' => '',
          'after' => '',
          'link_before' => '',
          'link_after' => '',
          'items_wrap' => '<nav id="menu"><ul>%3$s</ul></nav>',
          'depth' => 3,
          'walker' => new header_menu(),
        ));
      }
    ?>
  </div>
  <!-- end mobile header -->

  <!-- <div class="sale-block">
    <a href="#">
      <img src="http://hersones.mkvadrat.pw/wp-content/uploads/2017/10/sale-banner.png" alt="">
    </a>
  </div> -->
  <?php
  $action_image = getImageLink(12, 'action_image_main_page');
  $link_action = getMeta('link_action_main_page');
  ?>
  
  <?php if ($action_image) { ?>
    <div class="wrap-sale-banner"></div>
  <?php } ?>

  <div id="toTop"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>

  <?php echo getMeta('social_links_main_page'); ?>

  <!-- start header -->

  <header class="header-page <?php if (is_front_page()) { ?> header-page-main <?php } ?>">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- start top-line -->
          <div class="top-line">
            <div class="left-block">
              <div class="logo-block">
                <a id="button-menu-mobile" href="#menu"><span><i class="fa fa-bars" aria-hidden="true"></i></span></a>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                  <span>Бутик-отель</span>
                  <img
                    src="<?php header_image(); ?>"
                    height="<?php echo get_custom_header()->height; ?>"
                    width="<?php echo get_custom_header()->width; ?>"
                    alt="logotype"
                  />
                </a>
                <p class="weather">погода <span><?php echo getTemperature(); ?> °с</span></p>
              </div>
              <!-- <div class="rating-5">
									<?php echo getMeta('raiting_tripadvisor_main_page'); ?>
								</div>
								<div class="rating-10">
									<?php echo getMeta('raiting_booking_main_page'); ?>
								</div> -->

              <div class="adress">
                <dl>
                  <dd>
                    <address>УЛ. ДРЕВНЯЯ, 34<br>
                      Г. СЕВАСТОПОЛЬ, КРЫМ<br>
                      Работаем 24/7
                    </address>
                  </dd>
                </dl>
              </div>
            </div>

            <div class="right-block">
              <a href="<?php echo getMeta('booking_link_main_page'); ?>" class="button-yellow">Забронировать</a>
              <div class="phones-block">
                <?php echo getMeta('contact_information_main_page'); ?>
              </div>
            </div>
          </div>
          <!-- end top-line -->
        </div>
        <div class="col-md-12">
          <!-- start bottom-line (menu) -->
          <?php
          if (has_nav_menu('header_menu')) {
            wp_nav_menu(array(
              'theme_location' => 'header_menu',
              'menu' => '',
              'container' => false,
              'container_class' => '',
              'container_id' => '',
              'menu_class' => '',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'wp_page_menu',
              'before' => '',
              'after' => '',
              'link_before' => '',
              'link_after' => '',
              'items_wrap' => '<nav class="menu"><ul>%3$s</ul></nav>',
              'depth' => 3,
              'walker' => new header_menu(),
            ));
          }
          ?>
          <!-- end bottom-line (menu) -->
        </div>
      </div>
    </div>
  </header>
  <!-- end header -->
  
  <!-- start header-slider-block -->
  <?php if (is_front_page()) { ?>
    <div class="header-slider-block">
      <div class="owl-carousel owl-theme header-slider">
        <?php
        global $nggdb;
        $ngg_id = getNextGallery('12', 'slider_main_page');
        $ngg_image = $nggdb->get_gallery($ngg_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
        if ($ngg_image) {
          foreach ($ngg_image as $image) {
            ?>
            <div>
              <img src="<?php echo $image->imageURL; ?>" alt="<?php echo $image->alttext; ?>">
              <div class="description-block">
                <?php echo html_entity_decode(esc_attr($image->description), ENT_QUOTES, 'UTF-8'); ?>
              </div>
            </div>
            <?php
          }
        } else {
          ?>
          <div>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/header-slider-1.jpg" alt="">
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  <?php }else{ ?>
  <!-- start header-banner-block -->
  <?php
  if (is_category()){
  $header_image = getImageLinkCategory('category', 'image_category_all_page');
  ?>
  <div class="header-banner-block"
       style="background-image: url( '<?php echo $header_image ? $header_image : esc_url(get_template_directory_uri()) . '/images/bg-contacts-header.jpg'; ?>' )"
       data-speed="2" data-type="background">
    <?php
    }elseif (is_tax('news-list') && !is_single()){
    $header_image = getImageLinkCategory('news-list', 'image_category_all_page');
    ?>
    <div class="header-banner-block"
         style="background-image: url( '<?php echo $header_image ? $header_image : esc_url(get_template_directory_uri()) . '/images/bg-contacts-header.jpg'; ?>' )"
         data-speed="2" data-type="background">
      <?php
      }elseif (is_tax('action-list') && !is_single()){
      $header_image = getImageLinkCategory('action-list', 'image_category_all_page');
      ?>
      <div class="header-banner-block"
           style="background-image: url( '<?php echo $header_image ? $header_image : esc_url(get_template_directory_uri()) . '/images/bg-contacts-header.jpg'; ?>' )"
           data-speed="2" data-type="background">
        <?php
        }elseif (is_single()){
        $header_image = getImageLinkSingle(get_the_ID(), 'header_image_all_page');
        ?>
        <div class="header-banner-block"
             style="background-image: url( '<?php echo $header_image ? $header_image : esc_url(get_template_directory_uri()) . '/images/bg-contacts-header.jpg'; ?>' )"
             data-speed="2" data-type="background">
          <?php
          }elseif (is_page()){
          $header_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
          ?>
          <div class="header-banner-block"
               style="background-image: url( '<?php echo $header_image ? $header_image[0] : esc_url(get_template_directory_uri()) . '/images/bg-contacts-header.jpg'; ?>' )"
               data-speed="2" data-type="background">
            <?php
            }else{
            $header_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
            ?>
            <div class="header-banner-block"
                 style="background-image: url( '<?php echo $header_image ? $header_image[0] : esc_url(get_template_directory_uri()) . '/images/bg-contacts-header.jpg'; ?>' )"
                 data-speed="2" data-type="background">
              <?php
              }
              ?>
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="title-header-block">
                      <?php
                      $action_image = getImageLink(12, 'action_image_main_page');
                      $link_action = getMeta('link_action_main_page');
                      ?>
                      <p class="title"><?php get_title(); ?></p>
                      <?php if ($action_image) { ?>
                        <!-- <a href="<?php echo $link_action; ?>"><img class="sale-banner" src="<?php echo $action_image; ?>" alt=""></a> -->
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end header-banner-block -->
            <?php } ?>
            <!-- end header-slider-block -->
            <!-- start order-line -->
            <?php if (strpos($page_main_search['path'],"/booking-page") !== 0) : ?>
            <div id="block-search">
              <div id="tl-search-form" class="tl-container container"><noindex><a href="http://www.travelline.ru/products/tl-hotel/" rel="nofollow">система онлайн-бронирования</a></noindex></div>
            </div>
            <?php endif;
            if($page_main_search['path'] == "/") : ?>
              <style>
                #tl-search-form {
                  position: absolute;
                  padding: 0 20px;
                  z-index: 9;
                  bottom: 100px;
                  background: #690907;
                  left: 0;
                  right: 0;
                }

                @media(max-width: 1300px) {
                  #tl-search-form {
                    position: relative;
                    bottom: auto;
                    left: auto;
                    right: auto;
                  }
                }
              </style>
            <?php endif; ?>
            <?php //echo getMeta('booking_form_main_page'); ?>

            <!-- end order-line -->