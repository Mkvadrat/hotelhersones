<?php
/*
Template name: Restoraunt page
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header(); 
?>

	<!-- start main-paradiz -->
	
	<div class="main-paradiz">
		
		<!-- start welcome-apartments-hersones-block -->
		<?php if(get_post_meta( get_the_ID(), 'enable_primary_block_information_hotels_paradiz_page', $single = true ) == 'yes'){ ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12 welcome-apartments-hersones-block">
					<?php echo get_post_meta( get_the_ID(), 'primary_block_information_hotels_paradiz_page', $single = true ); ?> 
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- end welcome-apartments-hersones-block -->
		
		<!-- start panorama-block -->
		<?php if(get_post_meta( get_the_ID(), 'enable_panorama_block_a_hotels_paradiz_page', $single = true ) == 'yes'){ ?>
		<?php $panorama_image_a = getImageLink('image_panorama_block_a_hotels_paradiz_page'); ?>
		
		<div class="container-fluid panorama-block" style="background-image: url( '<?php echo $panorama_image_a ? $panorama_image_a : esc_url( get_template_directory_uri() ) . '/images/sevastopol-bg.jpg'; ?>' );">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="content-block">
							<?php echo get_post_meta( get_the_ID(), 'content_panorama_block_a_hotels_paradiz_page', $single = true ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- end panorama-block -->
		
		<!-- start galery-block -->
		
		<div class="container galery-block">
			<div class="row">
				<div class="col-md-12">
					<?php echo get_post_meta( get_the_ID(), 'text_interier_hotels_paradiz_page', $single = true ); ?>
					
					<ul class="list-galery">
						<?php
							global $nggdb;
							$gallery_id = getNextGallery(get_the_ID(), 'gallery_interier_hotels_paradiz_page');
							$gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 7, 0);
							if($gallery_image){
								foreach($gallery_image as $image) {
									if(!$image->exclude == 1){
							?>
								<li style="background-image: url( '<?php echo nextgen_esc_url($image->imageURL); ?>' );">
									<a data-fancybox="gallery" href="<?php echo nextgen_esc_url($image->imageURL); ?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
								</li>
							<?php
									}
								}
							}
						?>
					</ul>
					<p>
						<?php echo get_post_meta( get_the_ID(), 'link_gallery_interier_hotels_paradiz_page', $single = true ); ?>
					</p>
				</div>
			</div>
		</div>
		
		<!-- end galery-block -->
		
		<!-- start main-menu -->
		<?php if(get_post_meta( get_the_ID(), 'enable_main_menu_block_hotels_paradiz_page', $single = true ) == 'yes'){ ?>
		<div class="container main-menu">
			<div class="row">
				<div class="col-md-12">
					<?php echo get_post_meta( get_the_ID(), 'text_main_menu_block_hotels_paradiz_page', $single = true ); ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- end main-menu -->
		
		<!-- start panorama-block -->
		<?php if(get_post_meta( get_the_ID(), 'enable_panorama_block_b_hotels_paradiz_page', $single = true ) == 'yes'){ ?>
		<?php $panorama_image_b = getImageLink('image_panorama_block_b_hotels_paradiz_page'); ?>
		
		<div class="container-fluid panorama-block conference-service" style="background-image: url( '<?php echo $panorama_image_b ? $panorama_image_b : esc_url( get_template_directory_uri() ) . '/images/wedding-bg.jpg'; ?>' );">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="content-block">
							<?php echo get_post_meta( get_the_ID(), 'content_panorama_block_b_hotels_paradiz_page', $single = true ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- end panorama-block -->
		
		<!-- start under-panorama-block -->
		<?php if(get_post_meta( get_the_ID(), 'enable_services_block_a_hotels_paradiz_page', $single = true ) == 'yes'){ ?>
		<div class="container-fluid panorama-block wedding-block-description">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php echo get_post_meta( get_the_ID(), 'text_services_block_a_hotels_paradiz_page', $single = true ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- end under-panorama-block -->
		
		<!-- start services-block -->
		<?php if(get_post_meta( get_the_ID(), 'enable_services_block_b_hotels_paradiz_page', $single = true ) == 'yes'){ ?>
		<div class="container services-block">
			<div class="row">
				<div class="col-md-8">
					<?php $services_image_a = getImageLink('image_services_block_b_dot_a_hotels_paradiz_page'); ?>
					<div class="horizontal-services service-part" style="background-image: url( '<?php echo $services_image_a ? $services_image_a : esc_url( get_template_directory_uri() ) . '/images/paradiz-10.jpg'; ?>' );">
						<?php echo get_post_meta( get_the_ID(), 'text_services_block_b_dot_a_hotels_paradiz_page', $single = true ); ?>
					</div>
				</div>
				<div class="col-md-4">
					<?php $services_image_b = getImageLink('image_services_block_b_dot_b_hotels_paradiz_page'); ?>
					<div class="horizontal-services service-part" style="background-image: url( '<?php echo $services_image_b ? $services_image_b : esc_url( get_template_directory_uri() ) . '/images/paradiz-11.jpg'; ?>' );">
						<?php echo get_post_meta( get_the_ID(), 'text_services_block_b_dot_b_hotels_paradiz_page', $single = true ); ?>
					</div>
				</div>
				<div class="col-md-4">
					<?php $services_image_c = getImageLink('image_services_block_b_dot_c_hotels_paradiz_page'); ?>
					<div class="horizontal-small-services service-part" style="background-image: url( '<?php echo $services_image_c ? $services_image_c : esc_url( get_template_directory_uri() ) . '/images/paradiz-12.jpg'; ?>' );">
						<?php echo get_post_meta( get_the_ID(), 'text_services_block_c_dot_b_hotels_paradiz_page', $single = true ); ?>
					</div>
				</div>
				<div class="col-md-8">
					<?php $services_image_d = getImageLink('image_services_block_d_dot_c_hotels_paradiz_page'); ?>
					<div class="horizontal-small-services service-part" style="background-image: url( '<?php echo $services_image_d ? $services_image_d : esc_url( get_template_directory_uri() ) . '/images/paradiz-13.jpg'; ?>' );">
						<?php echo get_post_meta( get_the_ID(), 'text_services_block_c_dot_d_hotels_paradiz_page', $single = true ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- end services-block -->
		
		<!-- start arrival-date-block -->
		
		<?php $booking_form_image = getImageLink('image_block_booking_form_hotels_paradiz_page'); ?>
		<div class="container-fluid arrival-date-block" style="background-image: url( '<?php echo $booking_form_image ? $booking_form_image : esc_url( get_template_directory_uri() ) . '/images/arrival-date-bg.jpg'; ?>' );">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php echo get_post_meta( get_the_ID(), 'booking_form_hotels_paradiz_page', $single = true ); ?>
					</div>
				</div>
			</div>
		</div>
		
		<!-- end arrival-date-block -->
		
		<!-- start news-block -->
		
		<div class="container news-block">
			<div class="row">
				<div class="col-md-12">
					<?php echo get_post_meta( get_the_ID(), 'title_news_block_hotels_paradiz_page', $single = true ); ?>
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
						<?php echo get_post_meta( get_the_ID(), 'title_reviews_block_hotels_paradiz_page', $single = true ); ?>
						
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
                                            
                                            <?php if($image_star){ ?>
                                                <img src="<?php echo $image_star; ?>">
                                            <?php } ?> 
                                            
                                            <?php if($autograph_star){ ?>
                                                <img src="<?php echo $autograph_star; ?>">
                                            <?php } ?>
                                            
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
					<?php echo get_post_meta( get_the_ID(), 'text_sheme_block_hotels_paradiz_page', $single = true ); ?>
					
					<div class="map-block-wrap">
						<?php $sevastopol = getMeta('address_contact_page'); ?> 
						
						<script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
						<div id="sevastopol" style="width:100; height:280px"></div>
						<script type="text/javascript">
							var sevastopolMap, sevastopolPlacemark, sevastopolcoords;
							ymaps.ready(init);
							function init () {
								//Определяем начальные параметры карты
								sevastopolMap = new ymaps.Map('sevastopol', {
										center: [<?php if(!empty($sevastopol)){ ?><?php echo $sevastopol; ?><?php }else{ echo '56.326944, 44.0075'; } ?>], 
										zoom: 17
									});	
								//Определяем элемент управления поиск по карте	
								var SearchControl = new ymaps.control.SearchControl({noPlacemark:true});	
								//Добавляем элементы управления на карту
								 sevastopolMap.controls              
									//.add('zoomControl')                
									.add('typeSelector') 
								sevastopolcoords = [<?php if(!empty($sevastopol)){ ?><?php echo $sevastopol; ?><?php }else{ echo '56.326944, 44.0075'; } ?>];
								//Определяем метку и добавляем ее на карту				
								sevastopolPlacemark = new ymaps.Placemark([<?php if(!empty($sevastopol)){ ?><?php echo $sevastopol; ?><?php }else{ echo '56.326944, 44.0075'; } ?>],{}, {preset: "twirl#redIcon", draggable: true});	
								sevastopolMap.geoObjects.add(sevastopolPlacemark);			
							}
						</script>
                    </div>
				</div>
			</div>
		</div>
		
		<!-- end map-block -->
	</div>
	
	<!-- end main-paradiz -->

<?php get_footer(); ?>