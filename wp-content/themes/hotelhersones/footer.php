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

    <?php if(get_post_meta( 12, 'enable_summer_booking_main_page', $single = true ) == 'yes'){ ?>
    <div class="booking__banner">
        <div class="container">
            <div class="banner__inner">
                <?php echo get_post_meta( '12', 'summer_booking_main_page', $single = true ); ?>
                <div class="close">x</div>  
            </div>
        </div>
    </div>
    <?php } ?>
    
    <!-- start footer -->
    <footer class="footer">
        <!-- start insta-block -->
        
        <div class="insta-block">
			<?php
				if ( function_exists('dynamic_sidebar') )
					dynamic_sidebar('instagram-sidebar');
			?>

			<?php echo getMeta('instagram_link_main_page');?>
        </div>
        
        <!-- end insta-block -->
   
        <!-- start footer-menu-line -->

        <div class="container-fluid footer-menu-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                           if (has_nav_menu('footer_menu')){
                              wp_nav_menu( array(
                                 'theme_location'  => 'footer_menu',
                                 'menu'            => '',
                                 'container'       => false,
                                 'container_class' => '',
                                 'container_id'    => '',
                                 'menu_class'      => '',
                                 'menu_id'         => '',
                                 'echo'            => true,
                                 'fallback_cb'     => 'wp_page_menu',
                                 'before'          => '',
                                 'after'           => '',
                                 'link_before'     => '',
                                 'link_after'      => '',
                                 'items_wrap'      => '<nav class="menu"><ul>%3$s</ul></nav>',
                                 'depth'           => 3,
                                 'walker'          => new footer_menu(),
                              ) );
                           }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end footer-menu-line -->

        <!-- start footer-contacts-line -->
        <div class="container-fluid footer-contacts-line">
            <div class="container">
                <div class="row">
                     <div class="col-md-6 btn-left">
                        <?php echo getMeta("paying_link_main_page"); ?>
                     </div>
                      <div class="col-md-6">
                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                    </div>
                </div>
                <div class="row">
                    
                   
                 
                    
                     <div class="col-md-4">
                        <?php echo getMeta('contact_information_block_a_main_page'); ?>
                     </div>

                     <div class="col-md-4">
                        <?php echo getMeta('contact_information_block_b_main_page'); ?>
                     </div>

                     <div class="col-md-4">
                        <?php echo getMeta('contact_information_block_c_main_page'); ?>
                     </div>

                     <div class="col-md-12">
                        <?php echo getMeta('user_information_a_main_page'); ?>
                     </div>
                      <div class="col-md-6">
                        <noindex>
                            <ul class="socials socials-mobile">
                                <li><a href="/contacts/#sevastopol"><img src="/wp-content/themes/hotelhersones/images/soc-1.png" alt=""></a></li>
                                <li><a href="mailto:hotel-hersones@mail.ru"><img src="/wp-content/themes/hotelhersones/images/soc-2.png" alt=""></a></li>
                                <li><a href="https://www.facebook.com/profile.php?id=100022987428500"><img src="/wp-content/themes/hotelhersones/images/soc-3.png" alt=""></a></li>
                                <li><a href="https://vk.com/hotelhersones"><img src="/wp-content/themes/hotelhersones/images/soc-4.png" alt=""></a></li>
                                <li><a href="https://ok.ru/group/54570339663899"><img src="/wp-content/themes/hotelhersones/images/soc-5.png" alt=""></a></li>
                                <li><a href="https://www.tripadvisor.ru/Hotel_Review-g295387-d2491608-Reviews-Apartments_Hersones-Sevastopol.html"><img src="/wp-content/themes/hotelhersones/images/soc-7.png" alt=""></a></li>
                                <li><a href="https://www.booking.com/hotel/xc/hersones.ru.html"><img src="/wp-content/themes/hotelhersones/images/soc-8.png" alt=""></a></li>
                                <li><a href="http://tophotels.ru/main/hotel/al38091/rating/"><img src="/wp-content/themes/hotelhersones/images/soc-9.png" alt=""></a></li>
                            </ul>
                        </noindex>
                    </div>
                     <div style="display: none;">
                       <div class="form__block form__callback" id="inline2">
                          <?php echo getMeta('paying_block_main_page'); ?> 
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end footer-contacts-line -->

        <!-- end footer-development-line -->

        <div class="container-fluid footer-development-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">  
                        <?php echo getMeta('user_information_b_main_page'); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo getMeta('user_information_c_main_page'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end footer-development-line -->
        <div class="<?php echo getMeta('popup_block_main_page'); ?>"></div>
    </footer>
    <!-- end footer -->
</div>

<?php wp_footer(); ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(32575725, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/32575725" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>