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
		
		<div class="container galery-block">
			<div class="row">
				<div class="col-md-12">
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				</div>
			</div>
		</div>

		<div class="container">

			<div class="row">

				<div class="logo-block">

					<div class="col-md-4">
						<?php $image_classic = getImageLinkSingle(get_the_ID(), 'classic_image_number_room_single_page'); ?>

						<img src="<?php echo $image_classic ? $image_classic : esc_url( get_template_directory_uri() ) . '/images/pattern-poseidon-red.png'; ?>" alt="">

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

					

					<?php echo get_post_meta( get_the_ID(), 'virtual_tour_number_room_single_page', $single = true ); ?>

					

					<?php echo get_post_meta( get_the_ID(), 'text_block_reviews_star_guest_page', $single = true ); ?>

					

					<?php

						$reviews_stars = getProductsMeta(get_the_ID(), 'reviews_room_number_room_single_page');

					?>

					

					<?php if($reviews_stars){ ?>

					<p class="title-italic">Отзывы</p>

					

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

					<?php } ?>

					</ul>

										

					<?php

						$prev = mod_get_adjacent_post('prev', array('booking-rooms'));

						$next = mod_get_adjacent_post('next', array('booking-rooms'));

					?>

					

					<ul class="prev-next-room">

						<?php if($next){ ?>

							<li><a href="<?php echo get_permalink($next->ID); ?>">Следующий номер</a></li>

						<?php }else{ ?>

							<li><a href="<?php echo get_permalink(742); ?>">Перейти на страницу номеров</a></li>

						<?php } ?>

						<?php if($prev){ ?>

							<li><a href="<?php echo get_permalink($prev->ID)?>">Предыдущый номер</a></li>

						<?php }else{ ?>

							<li><a href="<?php echo get_permalink(742); ?>">Перейти на страницу номеров</a></li>

						<?php } ?>

					</ul>			

				</div>

				

				<div class="col-md-4">

				<aside class="sidebar">

					<div class="form-block form-block-room">

					  <?php echo get_post_meta( get_the_ID(), 'price__number_room_single_page', $single = true ); ?>

						<!--<input type="text" placeholder="Выбрать дату заезда">

						<input type="text" placeholder="Выбрать дату заезда">

						<input type="submit" value="Забронировать">-->
						<a href="/booking-page/?room-type=<?php echo get_post_meta( get_the_ID(), 'room_type', $single = true ); ?>" class="button-yellow">Забронировать</a>
					</div>

					<p class="title-sidebar">Номера</p>

						<?php

							$args = array(
								'post_type'      => 'booking-rooms',
								'numberposts'	 => '-1',
								'post_status'    => 'publish',
							);

				

							$all_posts = get_posts( $args );

						?>

						<?php if($all_posts){ ?>

						<ul class="list-links-gallerys">

							<?php foreach($all_posts as $posts){ ?>

								<li><a href="<?php echo get_permalink( $posts->ID ); ?>"><?php echo $posts->post_title; ?></a></li>

							<?php } ?>

						</ul>

						<?php } ?>

				</aside>

				</div>

			</div>

		</div>

	</div>

	

	<!-- end main-room -->



<?php get_footer(); ?>

