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
					
					<ul class="list-reviews">
						<li>
							<div class="photo-block">
								<img src="images/autographed-1.png" alt="">
							</div>
							<div class="description-block">
								<p class="title">Шикарный отель!<a href="#">Фото отзыва</a></p>
								<p>Спасибо за прекрасные апартаменты, замечательная атмосфера. Надеюсь приехать сюда вновь! С наступающим Новым годом и Рождеством!</p>
							<p class="autor">Тимати <span>Рэпер</span><time>28.04.2017</time></p>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-md-4">
					<aside class="sidebar">
						<?php echo get_post_meta( get_the_ID(), 'category_reviews_star_guest_page', $single = true ); ?>
						
						<div class="form-block">
							<form class="reviews-form" id="commentform">
								<p class="white-title-underline">Оставьте Ваш отзыв</p>
								<input type="text" name="author" id="author" placeholder="Введите Ваше имя">
								<input type="text" name="email" id="email" placeholder="Введите Вашу почту">
								<textarea name="comment" id="comment" placeholder="Отзыв"></textarea>
								<?php echo comment_id_fields(); ?> 
							</form>
							<div class="respond"></div>
							<input type="submit" onclick="submit();" value="оставить отзыв">
						</div>
						
						<div class="links-block">
							<?php echo get_post_meta( get_the_ID(), 'social_links_block_reviews_star_guest_page', $single = true ); ?>
						</div>
					</aside>
				</div>
				<div class="col-md-12">
					<ul class="bread-crumbs">
						<li><a href="#">Предыдущая страница</a></li>
						<li><a href="#">1</a></li>
						<li><span>...</span></li>
						<li><a href="#">3</a></li>
						<li><a class="active" href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><span>...</span></li>
						<li><a href="#">10</a></li>
						<li><a href="#">Следующая страница</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<!-- end main-reviews -->
	
<script language="javascript">
    function submit(){
        $(".reviews-form").submit();
    }
</script>
 
<?php get_footer(); ?>