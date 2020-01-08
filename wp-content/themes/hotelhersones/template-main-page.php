<?php
/*
Template name: Main page
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/
get_header();
?>
<!-- start main-index -->
<div class="main-index">
<!-- start welcome-apartments-hersones-block -->
<?php if(get_post_meta( get_the_ID(), 'enable_primary_block_information_main_page', $single = true ) == 'yes'){ ?>
<div class="container">
<div class="row">
<div class="col-md-12 welcome-apartments-hersones-block">
<?php echo get_post_meta( get_the_ID(), 'primary_block_information_main_page', $single = true ); ?>
</div>
</div>
</div>
<?php } ?>
<!-- end welcome-apartments-hersones-block -->
<!-- start panorama-block -->
<?php if(get_post_meta( get_the_ID(), 'enable_panorama_block_a_main_page', $single = true ) == 'yes'){ ?>
<?php $panorama_image_a = getImageLink(get_the_ID(), 'image_panorama_block_a_main_page'); ?>
<div class="container-fluid panorama-block" style="background-image: url( '<?php echo $panorama_image_a ? $panorama_image_a : esc_url( get_template_directory_uri() ) . '/images/sevastopol-bg.jpg'; ?>' );">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="content-block">
<?php echo get_post_meta( get_the_ID(), 'content_panorama_block_a_main_page', $single = true ); ?>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<!-- end panorama-block -->
<!-- start our-rooms-block -->
<?php if(get_post_meta( get_the_ID(), 'enable_our_number_block_main_page', $single = true ) == 'yes'){ ?>
<div class="container our-rooms-block">
<div class="row">
<div class="col-md-12">
<?php echo get_post_meta( get_the_ID(), 'text_block_our_number_main_page', $single = true ); ?>
</div>
<div class="col-md-6">
<?php $image_our_number_a = getImageLink(get_the_ID(), 'image_a_our_number_main_page'); ?>
<div class="big-block-number" style="background-image: url( '<?php echo $image_our_number_a ? $image_our_number_a : esc_url( get_template_directory_uri() ) . '/images/number-1.jpg'; ?>' );">
<?php echo get_post_meta( get_the_ID(), 'content_a_our_number_main_page', $single = true ); ?>
</div>
</div>
<div class="col-md-6">
<?php $image_our_number_b = getImageLink(get_the_ID(), 'image_b_our_number_main_page'); ?>
<div class="small-block-number first-small-namber" style="background-image: url( '<?php echo $image_our_number_b ? $image_our_number_b : esc_url( get_template_directory_uri() ) . '/images/number-2.jpg'; ?>' );">
<?php echo get_post_meta( get_the_ID(), 'content_b_our_number_main_page', $single = true ); ?>
</div>
<?php $image_our_number_c = getImageLink(get_the_ID(), 'image_c_our_number_main_page'); ?>
<div class="small-block-number second-small-namber" style="background-image: url( '<?php echo $image_our_number_c ? $image_our_number_c : esc_url( get_template_directory_uri() ) . '/images/number-3.jpg'; ?>' );">
<?php echo get_post_meta( get_the_ID(), 'content_c_our_number_main_page', $single = true ); ?>
</div>
</div>
<div class="col-md-12">
<?php echo get_post_meta( get_the_ID(), 'link_our_number_main_page', $single = true ); ?>
</div>
</div>
</div>
<?php } ?>
<!-- start our-rooms-block -->
<!-- start panorama-block -->
<?php if(get_post_meta( get_the_ID(), 'enable_panorama_block_b_main_page', $single = true ) == 'yes'){ ?>
<?php $panorama_image_b = getImageLink(get_the_ID(), 'image_panorama_block_b_main_page'); ?>
<div class="container-fluid panorama-block" style="background-image: url( '<?php echo $panorama_image_b ? $panorama_image_b : esc_url( get_template_directory_uri() ) . '/images/new-year-bg.jpg'; ?>' );">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="content-block">
<?php echo get_post_meta( get_the_ID(), 'content_panorama_block_b_main_page', $single = true ); ?>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<!-- end panorama-block -->
<!-- start services-block -->
<?php if(get_post_meta( get_the_ID(), 'enable_our_services_block_main_page', $single = true ) == 'yes'){ ?>
<div class="container services-block">
<div class="row">
<?php echo get_post_meta( get_the_ID(), 'text_our_services_block_main_page', $single = true ); ?>
</div>
</div>
<?php } ?>
<!-- end services-block -->
<!-- start panorama-block -->
<?php if(get_post_meta( get_the_ID(), 'enable_panorama_block_c_main_page', $single = true ) == 'yes'){ ?>
<?php $panorama_image_c = getImageLink(get_the_ID(), 'image_panorama_block_c_main_page'); ?>
<div class="container-fluid panorama-block conference-service" style="background-image: url( '<?php echo $panorama_image_c ? $panorama_image_c : esc_url( get_template_directory_uri() ) . '/images/conference-service-bg.jpg'; ?>' );">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="content-block">
<?php echo get_post_meta( get_the_ID(), 'content_panorama_block_c_main_page', $single = true ); ?>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<!-- end panorama-block -->
<!-- start restoraunt-block -->
<?php if(get_post_meta( get_the_ID(), 'enable_paradiz_block_main_page', $single = true ) == 'yes'){ ?>
<div class="container restoraunt-block">
<div class="row">
<div class="col-md-12">
<?php echo get_post_meta( get_the_ID(), 'title_paradiz_block_main_page', $single = true ); ?>
</div>
<div class="col-md-6">
<?php echo get_post_meta( get_the_ID(), 'image_paradiz_block_main_page', $single = true ); ?>
</div>
<div class="col-md-6">
<?php echo get_post_meta( get_the_ID(), 'text_paradiz_block_main_page', $single = true ); ?>
</div>
</div>
</div>
<?php } ?>
<!-- end restoraunt-block -->
<!-- start panorama-block -->
<?php if(get_post_meta( get_the_ID(), 'enable_panorama_block_d_main_page', $single = true ) == 'yes'){ ?>
<?php $panorama_image_d = getImageLink(get_the_ID(), 'image_panorama_block_d_main_page'); ?>
<div class="container-fluid panorama-block" style="background-image: url( '<?php echo $panorama_image_d ? $panorama_image_d : esc_url( get_template_directory_uri() ) . '/images/wedding-bg.jpg'; ?>' );">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="content-block">
<?php echo get_post_meta( get_the_ID(), 'content_panorama_block_d_main_page', $single = true ); ?>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<!-- end panorama-block -->
<!-- start why-choose-block -->
<?php if(get_post_meta( get_the_ID(), 'enable_boutique_hotel_block_main_page', $single = true ) == 'yes'){ ?>
<div class="container why-choose-title-block">
<div class="row">
<div class="col-md-12">
<?php echo get_post_meta( get_the_ID(), 'title_boutique_hotel_block_main_page', $single = true ); ?>
</div>
</div>
</div>
<div class="container-fluid why-choose-list-block">
<div class="container">
<div class="row">
<div class="col-md-12">
<?php echo get_post_meta( get_the_ID(), 'text_boutique_hotel_block_main_page', $single = true ); ?>
</div>
</div>
</div>
</div>
<?php } ?>
<!-- end why-choose-block -->
<!-- start galery-block -->
<div class="container galery-block">
<div class="row">
<div class="col-md-12">
<?php echo do_shortcode(get_post_meta( get_the_ID(), 'last_images_main_page', $single = true )); ?>
</div>
</div>
</div>
<!-- end galery-block -->
<!-- start panorama-block -->
<?php if(get_post_meta( get_the_ID(), 'enable_panorama_block_e_main_page', $single = true ) == 'yes'){ ?>
<?php $panorama_image_e = getImageLink(get_the_ID(), 'image_panorama_block_e_main_page'); ?>
<div class="container-fluid panorama-block" style="background-image: url( '<?php echo $panorama_image_e ? $panorama_image_e : esc_url( get_template_directory_uri() ) . '/images/territory-bg.jpg'; ?>' );">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="content-block">
<?php echo get_post_meta( get_the_ID(), 'content_panorama_block_e_main_page', $single = true ); ?>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<!-- end panorama-block -->
<!-- start services-block -->
<?php if(get_post_meta( get_the_ID(), 'enable_good_services_block_main_page', $single = true ) == 'yes'){ ?>
<?php $image_good_services = getImageLink(get_the_ID(), 'image_block_good_services_main_page'); ?>
<div class="container services-block">
<div class="row">
<div class="col-md-12">
<?php echo get_post_meta( get_the_ID(), 'text_block_good_services_main_page', $single = true ); ?>
</div>
</div>
</div>
<?php } ?>
<!-- end services-block -->
<!-- start arrival-date-block -->
<?php $booking_form_image = getImageLink(get_the_ID(), 'image_block_good_services_main_page'); ?>
<div class="container-fluid arrival-date-block" style="background-image: url( '<?php echo $booking_form_image ? $booking_form_image : esc_url( get_template_directory_uri() ) . '/images/arrival-date-bg.jpg'; ?>' )">
<div class="container">
<div class="row">
<div class="col-md-12">
<?php echo get_post_meta( get_the_ID(), 'booking_form_good_services_main_page', $single = true ); ?>
</div>
</div>
</div>
</div>
<!-- end arrival-date-block -->
<!-- start news-block -->
<div class="container news-block">
<div class="row">
<div class="col-md-12">
<?php echo get_post_meta( get_the_ID(), 'title_news_block_main_page', $single = true ); ?>
</div>
<?php
$args = array(
'numberposts' => 3,
'post_type'   => 'news',
'orderby'     => 'date',
'order'       => 'DESC',
'post_status' => 'publish',
);
$news_list = get_posts( $args );
?>
<?php if($news_list){ ?>
<?php foreach($news_list as $news){ ?>
<?php
$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($news->ID), 'full');
$descr = wp_trim_words( $news->post_content, 30, '...' );
$link = get_permalink($news->ID);
?>
<div class="col-md-4">
<div class="block-photo" style="background-image: url( '<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/images/news-1.jpg'; ?>');"></div>
<p class="title-news"><?php echo $news->post_title; ?></p>
<p><?php echo $descr; ?></p>
<p><a class="button-white" href="<?php echo $link; ?>">Подробнее</a></p>
</div>
<?php } ?>
<?php wp_reset_postdata(); ?>
<?php } ?>
</div>
</div>
<!-- end news-block -->
<!-- start reviews-block -->
<div class="container-fluid reviews-block">
<div class="container">
<div class="row">
<div class="col-md-12">
<?php echo get_post_meta( get_the_ID(), 'title_reviews_block_main_page', $single = true ); ?>
<?php
$args = array(
'post_type'   => 'reviews-stars',
'numberposts' => 3,
'post_status' => 'publish',
'orderby'     => 'date',
'order'       => 'DESC',
);
$reviews_stars = get_posts( $args );
?>
<?php if($reviews_stars){ ?>
<div class="owl-carousel owl-theme reviews-slider">
<?php foreach($reviews_stars as $star){ ?>
<?php
$image_star = getImageLinkSingle( $star->ID, 'images_star_block_reviews_star_guest_single_page' );
$autograph_star = getImageLinkSingle( $star->ID, 'autograph_star_block_reviews_star_guest_single_page' );
$text = get_post_meta( $star->ID, 'text_block_reviews_star_guest_single_page', $single = true );
$name = get_post_meta( $star->ID, 'name_star_block_reviews_star_guest_single_page', $single = true );
$status = get_post_meta( $star->ID, 'status_star_block_reviews_star_guest_single_page', $single = true );
?>
<div>
<div class="autographed">
<div class="photo-block">
<?php if($image_star){ ?>
<img src="<?php echo $image_star; ?>">
<?php } ?>
<?php if($autograph_star){ ?>
<img src="<?php echo $autograph_star; ?>">
<?php } ?>
</div>
<p class="title"><?php echo $star->post_title; ?></p>
<?php echo $text; ?>
<p class="person"><span><?php echo $name; ?></span> <?php echo $status; ?></p>
</div>
</div>
<?php } ?>
<?php wp_reset_postdata(); ?>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
<!-- end reviews-block -->
<!-- start map-block -->
<div class="container map-block">
<div class="row">
<div class="col-md-12">
<?php echo get_post_meta( get_the_ID(), 'text_sheme_block_main_page', $single = true ); ?>

<div id="sevastopol" data-maps="<?php echo getMeta('address_contact_page'); ?>" style="width:100; height:280px"></div>
</div>
</div>
</div>
<!-- end map-block -->
</div>
<!-- end main-index -->
<?php get_footer(); ?>