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
				
				<?php if (have_posts()): while (have_posts()): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
				
				<p class="title-italic">Фотогалерея</p>
				
				<ul class="galery">
				<li><a href="images/standart-4.jpg" data-fancybox="gallery"><img src="images/standart-4.jpg" alt=""></a></li>
				<li><a href="images/standart-5.jpg" data-fancybox="gallery"><img src="images/standart-5.jpg" alt=""></a></li>
				<li><a href="images/standart-6.jpg" data-fancybox="gallery"><img src="images/standart-6.jpg" alt=""></a></li>
				<li><a href="images/standart-7.jpg" data-fancybox="gallery"><img src="images/standart-7.jpg" alt=""></a></li>
				<li><a href="images/standart-8.jpg" data-fancybox="gallery"><img src="images/standart-8.jpg" alt=""></a></li>
				<li><a href="images/standart-9.jpg" data-fancybox="gallery"><img src="images/standart-9.jpg" alt=""></a></li>
				<li><a href="images/standart-10.jpg" data-fancybox="gallery"><img src="images/standart-10.jpg" alt=""></a></li>
				<li><a href="images/standart-11.jpg" data-fancybox="gallery"><img src="images/standart-11.jpg" alt=""></a></li>
				</ul>
				
			</div>
			<div class="col-md-4">
			<aside class="sidebar">
				<?php
					var_dump(wp_get_object_terms(get_the_ID(), 'news-list'));
					echo getDataCategory('news-list','title_category_news_page');
				?>
				
				<?php
				// список разделов произвольной таксономии news-list
				
					$args = array(
						'taxonomy'     => 'news-list', // название таксономии
						'orderby'      => 'name',  // сортируем по названиям
						'show_count'   => 0,       // не показываем количество записей
						'pad_counts'   => 0,       // не показываем количество записей у родителей
						'hierarchical' => 1,       // древовидное представление
						'title_li'     => '',      // список без заголовка
						'hide_empty' => 0,
						'child_of'   => 17,
					);
				?>
				
				<ul class="list-links-gallerys">
					<?php wp_list_categories( $args ); ?>
				</ul>
			
				<div class="form-block">
					<div>
						<p class="white-title-underline">Форма обратной связи</p>
						<input type="text" id="name" placeholder="Введите Ваше имя">
						<input type="text" id="phone" placeholder="Ваш телефон / e-mail">
						<textarea name="" id="message" placeholder="Текст сообщения"></textarea>
						<p class="info">*Задайте ваш вопрос.<br>Наши менеджеры сами<br>вам перезвонят.</p>
						<input type="submit" onclick="SendForm();" value="отправить">
					</div>
				</div>
			</aside>
			</div>
		</div>
	</div>
</div>

<!-- end main-standart -->

<script type="text/javascript">
//форма обратной связи
function SendForm() {
	var data = {
		'action': 'SendForm',
		'name' : $('#name').val(),
        'phone' : $('#phone').val(),
		'message' : $('#message').val()
	};
	$.ajax({
		url:'http://' + location.host + '/wp-admin/admin-ajax.php',
		data:data,
		type:'POST',
		success:function(data){
			swal(data.message);
		}
	});
};
</script>

<?php get_footer(); ?>
