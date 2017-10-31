<?php
/*
Template name: Booking page
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header(); 
?>

	<!-- start main-reservation -->
	
	<div class="main-reservation">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php echo get_post_meta( get_the_ID(), 'content_block_a_booking_page', $single = true ); ?>
					
					<p><a class="button-white" href="#">ОНЛАЙН БРОНИРОВАНИЕ</a><a class="button-white fancybox" href="#easy-reservation">ЛЕГКОЕ БРОНИРОВАНИЕ</a></p>
				
					<?php echo get_post_meta( get_the_ID(), 'content_block_b_booking_page', $single = true ); ?>
					
					<div class="reservation-form">
						<?php echo get_post_meta( get_the_ID(), 'booking_form_booking_page', $single = true ); ?>
					</div>
				
					<?php echo get_post_meta( get_the_ID(), 'content_block_c_booking_page', $single = true ); ?>
				</div>
				<div class="col-md-4">
					<aside class="sidebar">
						<div class="form-block no-textarea">
							<form action="">
							<p class="white-title-underline">Бронирование по телефону</p>
							<input type="text" placeholder="Введите Ваше имя">
							<input type="tel" placeholder="Введите Ваш телефон">
							<p class="info">*Наши менеджеры сами<br>вам перезвонят.</p>
							<input type="submit" value="Перезвоните мне">
							</form>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
	
	<!-- end main-reservation -->

	<!-- start modal-form -->
	
	<div class="hidden">
		<div class="easy-reservation" id="easy-reservation">
			<form class="modal-form" action="">
			<p class="tittle-modal-form">Легкое бронирование offline</p>
			<input type="text" name="" placeholder="Имя*">
			<input type="email" name="" placeholder="E-mail: *">
			<input type="tel" name="" placeholder="Телефон: *">
			<input type="text" name="" placeholder="Дата заезда *">
			<input type="text" name="" placeholder="Дата выезда *">
			<p>Поля отмеченные * обязательны.</p>
			<button>Очистить</button>
			<input type="submit" name="" value="Отправить">
			</form>
		</div>
	</div>
	
	<!-- end modal-form -->

<?php get_footer(); ?>