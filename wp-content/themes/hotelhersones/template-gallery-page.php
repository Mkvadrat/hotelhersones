<?php
/*
Template name: Gallery page
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header(); 
?>

	<!-- start main-gallery-in -->
	
	<div class="main-gallery-in">
		<div class="container">
			<div class="row">
			<div class="col-md-8">
				
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				
				<?php echo get_post_meta( get_the_ID(), 'text_gallery_page', $single = true ); ?>
				
				<div class="divider"></div>
				
				<ul class="list-gallery-photos">
					<?php
						global $nggdb;
						$gallery_id = getNextGallery(get_the_ID(), 'images_gallery_page');
						$gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
						if($gallery_image){
							foreach($gallery_image as $image) {
								if(!$image->exclude == 1){
						?>
							<li class="small-block" style="background-image: url( '<?php echo nextgen_esc_url($image->imageURL); ?>' );">
								<a data-fancybox="gallery" data-caption="<?php echo htmlspecialchars_decode($image->alttext); ?>" href="<?php echo nextgen_esc_url($image->imageURL); ?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
							</li>
						<?php
								}
							}
						}
					?>
				</ul>
				
				<p><a class="button-white back" href="javascript:void(0)">Назад</a></p>
			
			</div>
			<div class="col-md-4">
				<aside class="sidebar">
				<?php echo get_post_meta( get_the_ID(), 'category_gallery_page', $single = true ); ?>
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
	
	<!-- end main-gallery-in -->
		
<?php get_footer(); ?>