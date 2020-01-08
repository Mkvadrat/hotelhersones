<?php
/*
Template name: Album page
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header(); 
?>

	<!-- start main-gallery -->
	
	<div class="main-gallery">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
					
					<?php echo do_shortcode(get_post_meta( get_the_ID(), 'main_text_albums_page', $single = true )); ?>
				</div>
				<div class="col-md-4">
					<aside class="sidebar">
						<?php echo get_post_meta( get_the_ID(), 'category_albums_page', $single = true ); ?>
						
						<div class="form-block">
							<div>
								<p class="white-title-underline">Форма обратной связи</p>
								<input type="text" class="reset" id="name" placeholder="Введите Ваше имя">
								<input type="text" class="reset" id="phone" placeholder="Ваш телефон / e-mail">
								<textarea name="" class="reset" id="message" placeholder="Текст сообщения"></textarea>
								<p class="info">*Задайте ваш вопрос.<br>Наши менеджеры сами<br>вам перезвонят.</p>
								
								<div class="agree">
									<input id="i-take-form" type="checkbox">
									<label for="i-take-form">Я принимаю условия соглашения на обработку персональных</label>
								</div>
								
								<input type="submit" class="agree-button no-active" value="Отправить">
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>

<!-- end main-gallery -->
	
<?php get_footer(); ?>