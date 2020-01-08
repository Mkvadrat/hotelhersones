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
                    <div class="col-md-12">
                        <noindex><ul class="socials socials-mobile">
                            <li><a href="/contacts/#sevastopol"><img src="/wp-content/themes/hotelhersones/images/soc-1.png" alt=""></a></li>
                            <li><a href="mailto:hotel-hersones@mail.ru"><img src="/wp-content/themes/hotelhersones/images/soc-2.png" alt=""></a></li>
                            <li><a href="https://www.facebook.com/profile.php?id=100022987428500"><img src="/wp-content/themes/hotelhersones/images/soc-3.png" alt=""></a></li>
                            <li><a href="https://vk.com/hotelhersones"><img src="/wp-content/themes/hotelhersones/images/soc-4.png" alt=""></a></li>
                            <li><a href="https://ok.ru/group/54570339663899"><img src="/wp-content/themes/hotelhersones/images/soc-5.png" alt=""></a></li>
                            <li><a href="https://www.tripadvisor.ru/Hotel_Review-g295387-d2491608-Reviews-Apartments_Hersones-Sevastopol.html"><img src="/wp-content/themes/hotelhersones/images/soc-7.png" alt=""></a></li>
                            <li><a href="https://www.booking.com/hotel/xc/hersones.ru.html"><img src="/wp-content/themes/hotelhersones/images/soc-8.png" alt=""></a></li>
                            <li><a href="http://tophotels.ru/main/hotel/al38091/rating/"><img src="/wp-content/themes/hotelhersones/images/soc-9.png" alt=""></a></li>
                        </ul></noindex>
                        
                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                    </div>

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

    </footer>
    <!-- end footer -->
</div>

<?php wp_footer(); ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
(w[c] = w[c] || []).push(function() {
try {
w.yaCounter32575725 = new Ya.Metrika({id:32575725,
webvisor:true,
clickmap:true,
trackLinks:true,
accurateTrackBounce:true,
trackHash:true});
} catch(e) { }
});

var n = d.getElementsByTagName("script")[0],
s = d.createElement("script"),
f = function () { n.parentNode.insertBefore(s, n); };
s.type = "text/javascript";
s.async = true;
s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

if (w.opera == "[object Opera]") {
d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/32575725" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

	  <!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '2BvWZxxYSW';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->

</body>
</html>