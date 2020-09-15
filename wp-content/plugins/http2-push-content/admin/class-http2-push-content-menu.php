<?php

class Http2_Push_Content_Menu{

    public $plugin_name;
    public $menu;
    
    function __construct($plugin_name , $version){
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        add_action( 'admin_menu', array($this,'plugin_menu') );
        add_action($this->plugin_name.'_promotion', array($this,'promotion'));
    }

    function plugin_menu(){
        
        $this->menu = add_menu_page(
            __( 'HTTP2 Push Content List', 'http2-push-content' ),
            'HTTP2 Push Content',
            'manage_options',
            'http2-push-content',
            array($this, 'menu_option_page'),
            'dashicons-randomize',
            6
        );

        add_action("load-".$this->menu, array($this,"bootstrap_style"));
 
    }

    public function bootstrap_style() {

		wp_enqueue_style( $this->plugin_name."_bootstrap", plugin_dir_url( __FILE__ ) . 'css/bootstrap.css', array(), $this->version, 'all' );

	}

    function menu_option_page(){
        ?>
        <div class="container mt-2">
            <div class="row">
                    <div class="col-12">
                        <div class='bg-dark'>
                        <div class="row">
                            <div class="col-12 col-sm-2 py-2">
                                    <a href="https://www.piwebsolution.com/" target="_blank"><img class="img-fluid ml-2" src="<?php echo plugin_dir_url( __FILE__ ); ?>img/pi-web-solution.svg"></a>
                            </div>
                            <div class="col-12 col-sm-10 d-flex">
                                <?php do_action($this->plugin_name.'_tab'); ?>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-12">
                <div class="bg-light border pl-3 pr-3 pb-3 pt-0">
                    <div class="row">
                        <div class="col">
                        <?php do_action($this->plugin_name.'_tab_content'); ?>
                        </div>
                        <?php do_action($this->plugin_name.'_promotion'); ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <?php
    }

    function promotion(){
        ?>
        <?php if( ! is_plugin_active( 'http2-push-content-pro/http2-push-content-pro.php' )) : ?>
        <div class="col-12 col-sm-12 col-md-4 pt-3"> 

        <div class="text-light text-center mb-3">
            <a href="<?php echo HTTP2_PUSH_CONTENT_BUY_URL; ?>" target="_blank">
            <?php new pisol_promotion('pisol_http2_instalation_date'); ?>
            </a>
        </div>
        <!--<div class="bg-primary p-3 text-light text-center mb-3">
                <h2 class="text-light font-weight-light "><span>OFFER !!! Get Pro Version for FREE</span></h2>
                <div class="inside">
                    Review us on WordPress and you may get PRO version for FREE<br /><br />
                    <a class="btn btn-light" href="https://wordpress.org/support/plugin/http2-push-content/reviews/" target="_blank">Give Rating Now !!</a>
                </div>
            </div>-->

           <div class="bg-dark p-3 text-light text-center mb-3">
                <h2 class="text-light font-weight-light "><span>Get Pro for <br><strong class="h2 font-weight-bold"><?php echo HTTP2_PUSH_CONTENT_PRICE; ?></strong><br> Buy Now !!</span></h2>
                <div class="inside">
                    Pro version offer more advanced page selector conditions<br><br>
                    <ul class="text-left h6 font-weight-light">
                        <li class="border-top py-2">WooCommerce category page</li>
                        <li class="border-top py-2">WooCommerce shop page</li>
                        <li class="border-top py-2">WooCommerce product page</li>
                        <li class="border-top py-2">WooCommerce cart page</li>
                        <li class="border-top py-2">WooCommerce checkout page</li>
                    </ul>
                    <ul class="text-left h6 font-weight-light">
                        <li class="border-top py-2">
                        Create Mobile device specific rule, this works based on the User agent detection
                        </li>
                        <li class="border-top py-2">
                        Create Desktop device specific rule, this works based on the User agent detection
                        </li>
                        <li class="border-top py-2">
                        Single post
                        </li>
                        <li class="border-top py-2">
                        Blog home
                        </li>
                        <li class="border-top py-2">
                        Category
                        </li>
                        <li class="border-top py-2">
                        Tag page
                        </li>
                        <li class="border-top py-2">
                        Search page
                        </li>
                        <li class="border-top py-2">
                        RTL page
                        </li>
                        <li class="border-top py-2">
                        And many more rules to come..
                        </li>
                    </ul>
                    <a class="btn btn-light" href="<?php echo HTTP2_PUSH_CONTENT_BUY_URL; ?>" target="_blank">Click to Buy Now</a>
                </div>
            </div>
        

            
        </div>
        <?php endif; ?>
        <?php
    }

}