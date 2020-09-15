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

	<!-- start main-standart -->
	
	<div class="main-standart">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
					
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
					
					<?php
						global $nggdb;
						$slider_id = getNextGallery(get_the_ID(), 'gallery_block_action_page');
						$slider_image = $nggdb->get_gallery($slider_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
						if($slider_image){
					?>
					
					<p class="title-italic">Фотогалерея</p>
					
					<ul class="galery">
						<?php
							foreach($slider_image as $image) {
						?>
						<li style="background-image: url( '<?php echo nextgen_esc_url($image->imageURL); ?>' );"><a href="<?php echo nextgen_esc_url($image->imageURL); ?>" data-fancybox="gallery"></a></li>
					<?php
							}
						}
					?>
					</ul>
								
				</div>
				<div class="col-md-4">
				<aside class="sidebar">
					<p class="title-sidebar">Акции</p>
					
					<?php
					// список разделов произвольной таксономии news-list
					
						$args = array(
							'taxonomy'     => 'action-list', // название таксономии
							'orderby'      => 'name',  // сортируем по названиям
							'show_count'   => 0,       // не показываем количество записей
							'pad_counts'   => 0,       // не показываем количество записей у родителей
							'hierarchical' => 1,       // древовидное представление
							'title_li'     => '',      // список без заголовка
							'hide_empty' => 0,
							//'child_of'   => 18,
						);
					?>
					
					<ul class="list-links-gallerys">
						<?php wp_list_categories( $args ); ?>
					</ul>
				
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
	
	<!-- end main-standart -->

<?php get_footer(); ?>
