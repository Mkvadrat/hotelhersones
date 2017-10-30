<?php
/*
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header();
?>

	<!-- start main-room -->
	
	<div class="main-room">
		<div class="container">
			<div class="row">
				<div class="logo-block">
					<div class="col-md-4">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/pattern-poseidon-red.png" alt="">
					</div>
					<div class="col-md-8">
						<?php echo get_post_meta( get_the_ID(), 'short_description_number_room_single_page', $single = true ); ?> 
					</div>
				</div>
				<div class="col-md-12">
					
					<?php
						global $nggdb;
						$gallery_number_id = getNextGallery(get_the_ID(), 'main_gallery_number_room_single_page');
						$gallery_number_image = $nggdb->get_gallery($gallery_number_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
						if($gallery_number_image){
					?>
					
					<div class="owl-carousel room-slider">
						<?php foreach($gallery_number_image as $image) { ?>
							<div><img src="<?php echo nextgen_esc_url($image->imageURL); ?>" alt=""></div>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				
				<div class="col-md-8">
					<?php echo get_post_meta( get_the_ID(), 'facilities_number_room_single_page', $single = true ); ?> 
					
					<?php echo get_post_meta( get_the_ID(), 'full_description_number_room_single_page', $single = true ); ?> 
				
					<?php echo get_post_meta( get_the_ID(), 'title_second_gallery_number_room_single_page', $single = true ); ?> 
					
					<?php
						global $nggdb;
						$gallery_apartaments_id = getNextGallery(get_the_ID(), 'second_gallery_number_room_single_page');
						$gallery_apartaments_image = $nggdb->get_gallery($gallery_apartaments_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
						if($gallery_apartaments_image){
					?>
					
					<ul class="galery">
						<?php foreach($gallery_apartaments_image as $image) { ?>
						<li><a href="<?php echo nextgen_esc_url($image->imageURL); ?>" data-fancybox="gallery"><img src="<?php echo nextgen_esc_url($image->imageURL); ?>" alt=""></a></li>
						<?php } ?>
					</ul>
					<?php } ?>
					
					<p class="title-italic">Виртуальный тур</p>
					
					<ul class="virtual-tour">
						<li><a href="#"><img src="images/virtual-tour-1.png" alt=""></a></li>
						<li><a href="#"><img src="images/virtual-tour-2.png" alt=""></a></li>
						<li><a href="#"><img src="images/virtual-tour-3.png" alt=""></a></li>
						<li><a href="#"><img src="images/virtual-tour-4.png" alt=""></a></li>
					</ul>
					
					<p class="title-italic">Отзывы</p>
					
					<?php echo get_post_meta( get_the_ID(), 'text_block_reviews_star_guest_page', $single = true ); ?>
					
					<?php
						$args = array(
							'post_type'      => 'reviews-stars',
							'post_status'    => 'publish',
							'numberposts'    => 2,
						);
			
						$reviews_stars = get_posts( $args );
					?>
					
					<?php if($reviews_stars){ ?>
						<ul class="list-reviews">
						<?php foreach($reviews_stars as $star){ ?>
						<?php
							$image_star = getImageLinkSingle( $star->ID, 'images_star_block_reviews_star_guest_single_page' );
							$autograph_star = getImageLinkSingle( $star->ID, 'autograph_star_block_reviews_star_guest_single_page' );
							$popup_image = getImageLinkSingle( $star->ID, 'images_star_fancy_block_reviews_star_guest_single_page' );
							$text = get_post_meta( $star->ID, 'text_block_reviews_star_guest_single_page', $single = true );
							$name = get_post_meta( $star->ID, 'name_star_block_reviews_star_guest_single_page', $single = true );
							$status = get_post_meta( $star->ID, 'status_star_block_reviews_star_guest_single_page', $single = true );
							$date = get_the_date( 'd.m.y', $star->ID );
						?>
						<li>
							<div class="photo-block">
								<a class="autor-autographed" style="background-image: url( <?php echo $image_star; ?> );"></a>
								<img src="<?php echo $autograph_star; ?>" alt="">
							</div>
							<div class="description-block">
								<p class="title">
									<?php echo $star->post_title; ?>
									
									<?php if($popup_image){?>
										<a class="fancybox" href="<?php echo $popup_image; ?>">Фото отзыва</a>
									<?php } ?>
								</p>
								<?php echo $text; ?>
								<p class="autor"><?php echo $name; ?> <span><?php echo $status; ?></span><time><?php echo $date; ?></time></p>
							</div>
						</li>
						<?php } ?>
						<?php wp_reset_postdata(); ?>
					<?php }else{ ?>
						<li>Отзывов не найдено!</li>
					<?php } ?>
						</ul>
					
					
					<ul class="prev-next-room">
					<li><a href="#">Предыдущий номер</a></li>
					<li><a href="#">Следующий номер</a></li>
					</ul>
				</div>
				
				<div class="col-md-4">
				<aside class="sidebar">
				<div class="form-block form-block-room">
				<form action="">
				<p class="title-price-room-form"><span>цена</span>от 4000р.<span>/ сутки</span></p>
				<input type="text" placeholder="Выбрать дату заезда">
				<input type="text" placeholder="Выбрать дату заезда">
				<input type="submit" value="Найти номер">
				</form>
				</div>
				<p class="title-sidebar">Номера</p>
					<ul class="list-links-gallerys">
						<li><a href="#">ХЕРСОНЕС</a></li>
						<li><a href="#">МОРСКОЙ</a></li>
						<li><a href="#">АТЛАНТИДА</a></li>
						<li><a href="#">УСАДЬБА СКУЛЬПТОРА</a></li>
						<li><a href="#">АРГО</a></li>
						<li><a href="#">ЦВЕТОЧНЫЙ</a></li>
						<li><a href="#">ДИОНИС</a></li>
						<li><a href="#">АРТЕМИДА</a></li>
						<li><a href="#">СПАРТА</a></li>
						<li><a href="#">ВОСТОЧНЫЙ</a></li>
						<li><a href="#">АФРОДИТА</a></li>
						<li><a href="#">ТЕАТР</a></li>
						<li><a href="#">ДИОГЕН</a></li>
						<li><a href="#">РИМСКИЙ ФОРУМ</a></li>
					</ul>
				</aside>
				</div>
			</div>
		</div>
	</div>
	
	<!-- end main-room -->

<?php get_footer(); ?>
