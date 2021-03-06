<?php
/**
 * Add enjoyinstagram shortcode window on tinyMCE
 */

if( ! defined( 'ABSPATH' ) ) {
    exit; // exit if call directly
}

wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-widget');
wp_enqueue_script('jquery-ui-position');
wp_enqueue_script('jquery');
global $wp_scripts;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php _e( 'EnjoyInstagram', 'enjoy-instagram-instagram-responsive-images-gallery-and-carousel' ); ?></title>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
        <script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo plugins_url('enjoyinstagramtinymce.js',__FILE__); ?>"></script>
        <base target="_self" />
        <?php wp_print_scripts(); ?>
    </head>

    <body id="link">
        <form name="enjoyinstagram" action="#">
            <table border="0" cellpadding="4" cellspacing="0" style="margin:0 auto;">
                <tr>
                    <td colspan="2"><?php _e( 'Insert Enjoy Plugin for Instagram Shortcode', 'enjoy-instagram-instagram-responsive-images-gallery-and-carousel' ); ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="height:100px;">
                        <input type="radio" name="newshortcode" id="id_shortcode_carousel" value="enjoyinstagram_mb" checked/>
                        <label for="id_shortcode_carousel" ><?php _e( 'Carousel View', 'enjoy-instagram-instagram-responsive-images-gallery-and-carousel' ); ?></label>
                        <br />
                        <input type="radio" name="newshortcode" id="id_shortcode_grid" value="enjoyinstagram_mb_grid"/>
                        <label for="id_shortcode_grid" ><?php _e( 'Grid View', 'enjoy-instagram-instagram-responsive-images-gallery-and-carousel' ); ?></label>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'enjoy-instagram-instagram-responsive-images-gallery-and-carousel'); ?>"
                               onClick="insertenjoyinstagramshortcode();" />
                    </td>
                    <td style="text-align:center;">
                        <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'enjoy-instagram-instagram-responsive-images-gallery-and-carousel'); ?>"
                               onClick="tinyMCEPopup.close();" />
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>