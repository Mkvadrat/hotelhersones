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
        
    <!-- start footer -->
    
    <footer class="footer">
    
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
                    <div class="col-md-4">
                        <?php echo getMeta('contact_information_block_a_main_page');?>
                    </div>
                    <div class="col-md-4">
                        <?php echo getMeta('contact_information_block_b_main_page');?>
                    </div>
                    <div class="col-md-4">
                        <?php echo getMeta('contact_information_block_c_main_page');?>
                    </div>
                    <div class="col-md-12">
                        <?php echo getMeta('user_information_a_main_page');?>
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
                        <?php echo getMeta('user_information_b_main_page');?>
                    </div>
                    <div class="col-md-6">
                        <?php echo getMeta('user_information_c_main_page');?>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- end footer-development-line -->
    
    </footer>
    
    <!-- end footer -->
</div>
    
<?php wp_footer(); ?>

</body>
</html>