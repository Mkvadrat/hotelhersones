<?php
/*
Template name: Rooms page
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header(); 
?>

<!-- start main-rooms -->

<div class="main-rooms">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<?php echo get_post_meta( get_the_ID(), 'main_content_numbers_page', $single = true ); ?>
				
				<?php echo get_post_meta( get_the_ID(), 'vip_numbers_rooms_page', $single = true ); ?>
				
				<div class="divider"></div>
				
				<?php echo get_post_meta( get_the_ID(), 'two_numbers_and_appartaments_rooms_page', $single = true ); ?>
				
				<div class="divider"></div>
				
				<?php echo get_post_meta( get_the_ID(), 'one_numbers_rooms_page', $single = true ); ?>
			</div>
		</div>
	</div>
</div>

<!-- end main-rooms -->

	
<?php get_footer(); ?>