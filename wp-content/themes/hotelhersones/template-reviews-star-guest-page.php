<?php
/*
Template name: Reviews star guest page
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header(); 
?>
    
	<!-- start main-reviews -->
	
	<div class="main-reviews">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php echo get_post_meta( get_the_ID(), 'text_block_reviews_star_guest_page', $single = true ); ?>
					
					<?php
						$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$posts_per_page = $GLOBALS['wp_query']->query_vars['posts_per_page'];
						$args = array(
							'post_type'      => 'reviews-stars',
							'posts_per_page' => $posts_per_page,
							'paged'          => $current_page,
							'post_status'    => 'publish',
						);
			
						$reviews_stars = get_posts( $args );
					?>
					<ul class="list-reviews">
					<?php if($reviews_stars){ ?>
					
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
				</div>
				<div class="col-md-4">
					<aside class="sidebar">
						<?php echo get_post_meta( get_the_ID(), 'category_reviews_star_guest_page', $single = true ); ?>
						
						<div class="form-block">
							<div>
								<p class="white-title-underline">Оставьте Ваш отзыв</p>
								<a href="#">оставить отзыв</a>
							</div>
						</div>
						
						<div class="links-block">
							<?php echo get_post_meta( get_the_ID(), 'social_links_block_reviews_star_guest_page', $single = true ); ?>
						</div>
					</aside>
				</div>
				<div class="col-md-12">
					<?php
						$total_posts = get_posts(array(
							'post_type'      => 'reviews-stars',
							'post_status'    => 'publish',
							'posts_per_page' => -1
						));
								
						$pages = ceil(count($total_posts)/$posts_per_page);

						$defaults = array(
							'type' => 'array',
							'prev_next'    => True,
							'prev_text'    => __('Предыдущая страница'),
							'next_text'    => __('Следующая страница'),
							'total'        => $pages,
							
						);
	
						$pagination = paginate_links($defaults);
						
					if($pagination){
					?>

                    <ul class="bread-crumbs">
						<?php foreach ($pagination as $pag){ ?>
	                        <li><?php echo $pag; ?></li>
						<?php } ?>
                    </ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	
	<!-- end main-reviews -->
	 
<?php get_footer(); ?>