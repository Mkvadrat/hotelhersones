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
        <?php $panorama_image_a = getImageLink('image_panorama_block_a_main_page'); ?>
    
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
                    <?php $image_our_number_a = getImageLink('image_a_our_number_main_page'); ?>
                    
                    <div class="big-block-number" style="background-image: url( '<?php echo $image_our_number_a ? $image_our_number_a : esc_url( get_template_directory_uri() ) . '/images/number-1.jpg'; ?>' );">
                        <?php echo get_post_meta( get_the_ID(), 'content_a_our_number_main_page', $single = true ); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php $image_our_number_b = getImageLink('image_b_our_number_main_page'); ?>
                    
                    <div class="small-block-number first-small-namber" style="background-image: url( '<?php echo $image_our_number_b ? $image_our_number_b : esc_url( get_template_directory_uri() ) . '/images/number-2.jpg'; ?>' );">
                        <?php echo get_post_meta( get_the_ID(), 'content_b_our_number_main_page', $single = true ); ?>
                    </div>
                    
                    <?php $image_our_number_c = getImageLink('image_c_our_number_main_page'); ?>
                    
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
        <?php $panorama_image_b = getImageLink('image_panorama_block_b_main_page'); ?>
        
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
        <?php $panorama_image_c = getImageLink('image_panorama_block_c_main_page'); ?>
        
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
                    <div class="col-md-6">
                        <?php echo get_post_meta( get_the_ID(), 'image_paradiz_block_main_page', $single = true ); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo get_post_meta( get_the_ID(), 'text_paradiz_block_main_page', $single = true ); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?> 
        <!-- end restoraunt-block -->
        
        <!-- start panorama-block -->
        <?php if(get_post_meta( get_the_ID(), 'enable_panorama_block_d_main_page', $single = true ) == 'yes'){ ?>
        <?php $panorama_image_d = getImageLink('image_panorama_block_d_main_page'); ?>
        
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
        <?php $panorama_image_e = getImageLink('image_panorama_block_e_main_page'); ?>
        
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
        <?php $image_good_services = getImageLink('image_block_good_services_main_page'); ?>
        <div class="container services-block">
            <div class="row">
                <div class="col-md-12">
                    <?php echo get_post_meta( get_the_ID(), 'text_block_good_services_main_page', $single = true ); ?>
                </div>
            </div>
        </div>
        
        <!-- end services-block -->
        
        <!-- start arrival-date-block -->
        
        <?php $panorama_image_d = getImageLink('image_panorama_block_d_main_page'); ?>
        <div class="container-fluid arrival-date-block" style="background-image: url( '<?php echo $image_good_services ? $image_good_services : esc_url( get_template_directory_uri() ) . '/images/arrival-date-bg.jpg'; ?>' )">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo get_post_meta( get_the_ID(), 'booking_form_good_services_main_page', $single = true ); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- end arrival-date-block -->
        
        <!-- start news-block -->
        
        <div class="container news-block">
            <div class="row">
                <div class="col-md-12">
                    <p class="h2-title">Новости отеля</p>
                </div>
                <div class="col-md-4">
                    <div class="block-photo" style="background-image: url(images/news-1.jpg);"></div>
                    <p class="title-news">Крымский военно-исторический фестиваль 2017</p>
                    <p>На Федюхиных высотах под Севастополем с 15 по 16 сентября пройдет Крымский военно-исторический фестиваль.</p>
                    <p><a class="button-white" href="#">Подробнее</a></p>
                </div>
                <div class="col-md-4">
                    <div class="block-photo" style="background-image: url(images/news-2.jpg);"></div>
                    <p class="title-news">Акция! Бесплатное такси на пляж!</p>
                    <p>Бесплатное такси на пляж "Парк Победы" для гостей отеля</p>
                    <p><a class="button-white" href="#">Подробнее</a></p>
                </div>
                <div class="col-md-4">
                    <div class="block-photo" style="background-image: url(images/news-3.jpg);"></div>
                    <p class="title-news">Приглашаем в ресторан "Парадиз"</p>
                    <p>Бокал восхитительного вина от Крымских виноделов в ресторане "Парадиз"</p>
                    <p><a class="button-white" href="#">Подробнее</a></p>
                </div>
            </div>
        </div>
        
        <!-- end news-block -->
        
        <!-- start reviews-block -->
        
        <div class="container-fluid reviews-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="h2-title">отзывы</p>
                        <div class="owl-carousel owl-theme reviews-slider">
                            <div>
                                <div class="autographed">
                                    <img src="images/autographed-1.png" alt="">
                                    <p class="title">Шикарный отель!</p>
                                    <q>Спасибо за прекрасные апартаменты, замечательная атмосфера. Надеюсь приехать сюда вновь! С наступающим Новым годом и Рождеством!</q>
                                    <p class="person"><span>Тимати</span> Рэпер</p>
                                </div>
                            </div>
                            <div>
                                <div class="autographed">
                                    <img src="images/autographed-1.png" alt="">
                                    <p class="title">Шикарный отель!</p>
                                    <q>Спасибо за прекрасные апартаменты, замечательная атмосфера. Надеюсь приехать сюда вновь! С наступающим Новым годом и Рождеством!</q>
                                    <p class="person"><span>Тимати</span> Рэпер</p>
                                </div>
                            </div>
                            <div>
                                <div class="autographed">
                                    <img src="images/autographed-1.png" alt="">
                                    <p class="title">Шикарный отель!</p>
                                    <q>Спасибо за прекрасные апартаменты, замечательная атмосфера. Надеюсь приехать сюда вновь! С наступающим Новым годом и Рождеством!</q>
                                    <p class="person"><span>Тимати</span> Рэпер</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- end reviews-block -->
        
        <!-- start map-block -->
        
        <div class="container map-block">
            <div class="row">
                <div class="col-md-12">
                    <p class="h2-title">Как к нам доехать в Севастополе:</p>
                    <p>бутик-отель "Апартаменты Херсонес" на карте</p>
                    <div class="map-block-wrap">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5ec550252a62cee73bc2e094b425bbb7c49ba525e0c2c90cdb3f7faf9b3e7f01&amp;width=100%25&amp;height=280&amp;lang=ru_UA&amp;scroll=true"></script>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- end map-block -->    
    </div>
    
    <!-- end main-index -->

<?php get_footer(); ?>