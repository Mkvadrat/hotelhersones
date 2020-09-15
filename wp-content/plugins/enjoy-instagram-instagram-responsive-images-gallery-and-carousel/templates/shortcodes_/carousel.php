<?php
/**
 * Carousel shortcode template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<script>
  jQuery(function () {
    jQuery(document.body)
      .on('click touchend', '#swipebox-slider .current img', function (e) {
        jQuery('#swipebox-next').click();
        return false;
      })
      .on('click touchend', '#swipebox-slider .current', function (e) {
        jQuery('#swipebox-close').trigger('click');
      });
  });
  jQuery(function ($) {
    $(".swipebox").swipebox({
      hideBarsDelay: 0
    });
  });
  jQuery(document).ready(function () {
    jQuery("#owl-<?php echo $i; ?>").owlCarousel({
      lazyLoad: true,
      items: <?php echo $items_num ?>,
      itemsDesktop: [1199,<?php echo $items_num ?>],
      itemsDesktopSmall: [980,<?php echo $items_num ?>],
      itemsTablet: [768,<?php echo $items_num ?>],
      itemsMobile: [479,<?php echo $items_num ?>],
      stopOnHover: true,
      autoPlay: true,
      navigation: <?php echo $nav ?>,
     afterAction: callback_height
    });

    function callback_height() {
      let it = jQuery("#owl-<?php echo $i; ?>").find('.owl-item a');
      it.css('height', it.first().outerWidth());
    }

    jQuery("#owl-<?php echo $i; ?>").fadeIn();
  });
</script>


<?php if( $template_carousel == 'showcase'):
   			wp_enqueue_style( 'showcase_carousel' );  ?>
			<style>
			.owl-carousel {opacity:1!important}
			.fa-heart {font-size:24px; }
			</style>
<?php endif; ?>

<?php if( $template_carousel == 'polaroid'):
			wp_enqueue_style( 'polaroid_carousel' );  ?>
   			<style>
			.owl-carousel {opacity:1!important}
			.owl-carousel .owl-item {
			  padding: 20px 20px 20px 20px!important;
			}
			.fa-heart {font-size:24px; color: }
			</style>
<?php endif; ?>

<div id="owl-<?php echo $i ?>" class="owl-example owl-carousel enjoy-instagram-carousel" style="display:none;">
	<?php foreach ( $result as $entry ) :

		$url = $entry['images']['standard_resolution']['url'];
	    if($entry['type'] === 'video') {
	        $url .= '&swipeboxvideo=1';
        }

		$link_style = "style=\"background-image: url('{$entry['images']['thumbnail']['url']}'); background-size: cover; display: block; opacity: 1;\"";

		?>
        
        <?php if( $template_carousel == 'polaroid'): ?> 
            
            
           
                         
                         
                <?php endif; ?>    
                
        <div class="box <?php echo $entry['type'] === 'video' ? 'ei-media-type-video' : 'ei-media-type-image' ?>">
            <a title="<?php echo $entry['caption']['text'] ?>" rel="gallery_swypebox" class="<?php echo $entry['type'] === 'video' ? 'swipebox swipebox_video' : 'swipebox' ?>"
               href="<?php echo $url ?>" <?php echo $link_style ?>>
                <img alt="<?php echo $entry['caption']['text'] ?>"
                     src="<?php echo $entry['images']['thumbnail']['url'] ?>">
            </a>
       <!--<div class="iscwp-meta">
							<div class="iscwp-meta-inner-wrap">
																	<div class="iscwp-likes-num">
									<i class="fa fa-heart faa-pulse animated" aria-hidden="true"></i> <span><?php /*?><?php echo $entry['likes']; ?><?php */?></span>
									</div>
																									
				 								 			</div>
		</div>-->
	
    
		<?php if( $template_carousel == 'showcase'): ?>
				
                <div class="bottom-polaroid">
                <div class="enjoy-instagram-heart-wrapper">
								 <i class="far fa-heart"></i>
                                
                            </div>
                         
                         <div class="enjoy-instagram-like-wrapper">
								
                                <span id="likes_count"><?php echo $entry['likes']; ?></span>
                            	
                                
                            </div>
                             <div style=" clear:both"></div>
                         <div class="enjoy-instagram-text-wrapper">
                         
                            <span><?php echo mb_strimwidth($entry['caption']['text'], 0, 100, '...'); ?></span>
                            </div>
                         </div>
                          <?php endif; ?> 
                
          
         </div> 
       	<?php endforeach; ?>
                          
</div>
<script type="text/javascript">
;( function( $ ) {

	$( '.swipebox' ).swipebox();

} )( jQuery );
</script>