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
					<?php echo do_shortcode(get_post_meta( get_the_ID(), 'main_text_albums_page', $single = true )); ?>
				</div>
				<div class="col-md-4">
					<aside class="sidebar">
						<?php echo get_post_meta( get_the_ID(), 'category_albums_page', $single = true ); ?>
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

<!-- end main-gallery -->

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