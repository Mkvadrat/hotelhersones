<?php
/*
Template name: Restoraunt page
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header(); 
?>

	<!-- start main-paradiz -->
	
	<div class="main-paradiz">
		
		<!-- start welcome-apartments-hersones-block -->
		<?php if(get_post_meta( get_the_ID(), 'enable_primary_block_information_hotels_paradiz_page', $single = true ) == 'yes'){ ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12 welcome-apartments-hersones-block">
					<?php echo get_post_meta( get_the_ID(), 'primary_block_information_hotels_paradiz_page', $single = true ); ?> 
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- end welcome-apartments-hersones-block -->
		
		<!-- start panorama-block -->
		<?php if(get_post_meta( get_the_ID(), 'enable_panorama_block_a_hotels_paradiz_page', $single = true ) == 'yes'){ ?>
		<?php $panorama_image_a = getImageLink('image_panorama_block_a_hotels_paradiz_page'); ?>
		
		<div class="container-fluid panorama-block" style="background-image: url( '<?php echo $panorama_image_a ? $panorama_image_a : esc_url( get_template_directory_uri() ) . '/images/sevastopol-bg.jpg'; ?>' );">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="content-block">
							<?php echo get_post_meta( get_the_ID(), 'content_panorama_block_a_hotels_paradiz_page', $single = true ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- end panorama-block -->
		
		<!-- start galery-block -->
		
		<div class="container galery-block">
			<div class="row">
				<div class="col-md-12">
					<?php echo get_post_meta( get_the_ID(), 'text_interier_hotels_paradiz_page', $single = true ); ?>
					
					<ul class="list-galery">
						<?php
							global $nggdb;
							$gallery_id = getNextGallery(get_the_ID(), 'gallery_interier_hotels_paradiz_page');
							$gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 7, 0);
							if($gallery_image){
								foreach($gallery_image as $image) {
									if(!$image->exclude == 1){
							?>
								<li style="background-image: url( '<?php echo nextgen_esc_url($image->imageURL); ?>' );">
									<a data-fancybox="gallery" href="<?php echo nextgen_esc_url($image->imageURL); ?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
								</li>
							<?php
									}
								}
							}
						?>
					</ul>
					<p>
						<?php echo get_post_meta( get_the_ID(), 'link_gallery_interier_hotels_paradiz_page', $single = true ); ?>
					</p>
				</div>
			</div>
		</div>
		
		<!-- end galery-block -->
		
		<!-- start main-menu -->
		
		<div class="container main-menu">
			<div class="row">
				<div class="col-md-12">
					<p class="h2-title">ОСНОВНОЕ МЕНЮ</p>
					<p class="paragraph-italic">«Парадиз» предлагает своим посетителям разнообразие великолепных блюд из средиземноморской и крымско-татарской кухонь с акцентом на мясные и рыбные блюда, а также различные морепродукты.</p>
				</div>
				<div class="col-md-6">
					<img src="images/paradiz-8.jpg" alt="">
				</div>
				<div class="col-md-6">
					<p class="paragraph-italic pad-right text-left text-indent">Рыба, подаваемая в ресторане, всегда свежая, а овощи и фрукты выращены под ласковым солнцем Крыма. <br>Повара ресторана готовят с любовью каждое блюдо, а потому их вкус никого не оставит равнодушным.</p>
				</div>
				<div class="col-md-6">
					<p class="paragraph-italic pad-left text-left text-indent">Различные салаты, закуски, первые блюда, пасты, ризотто – меню способно удовлетворить запросы самого изысканного гурмана. Вы можете ужинать каждый вечер в ресторане и каждый раз пробовать что-то новое.</p>
				</div>
				<div class="col-md-6">
					<img src="images/paradiz-9.jpg" alt="">
				</div>
				<div class="col-md-12">
					<p class="paragraph-italic">Перед ассортиментом аппетитных десертов — великолепных сладостей, которые просто тают во рту, невозможно устоять. А в баре ресторана гостям предлагают только самые лучшие алкогольные и безалкогольные коктейли, утонченные вина, элитный алкоголь и пиво на любой вкус. С раннего вечера и до поздней ночи здесь предлагается широкий выбор свежевыжатых соков, а также вкуснейший кофе Bristot.</p>
					<p class="button-block"><a href="#" class="button-white">посмотреть меню</a></p>
				</div>
			</div>
		</div>
		
		<!-- end main-menu -->
		
		<!-- start panorama-block -->
		
		<div class="container-fluid panorama-block conference-service" style="background-image: url(images/wedding-bg.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="content-block">
							<p class="white-title-first">Свадьба в Апартаменты херсонес</p>
							<p class="white-paragraph-first">всю заботу о мероприятии мы возьмем на себя</p>
							<p><a href="#" class="button-transparent">Подробнее</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- end panorama-block -->
		
		<!-- start under-panorama-block -->
		
		<div class="container-fluid panorama-block wedding-block-description">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="paragraph-italic">Для организации незабываемой свадьбы не подойдет любое место, ведь это особенный день в жизни каждого человека. Подходящее для торжества место невесты выбирают так же тщательно, как и свадебное платье. Ведь и от самой свадьбы, и от места ее проведения должны остаться только самые лучшие воспоминания. Именно поэтому ресторан «Парадиз» — наилучшее место для проведения здесь роскошной свадьбы.</p>
					</div>
					<div class="col-md-6">
						<img src="images/paradiz-10.png" alt="">
					</div>
					<div class="col-md-6">
						<p class="paragraph-italic text-left text-indent">Мы организуем для Вас не просто свадьбу, а самое сказочное свадебное торжество, которое навсегда запомнится и Вам, и всем Вашим гостям. С помощью тематических украшений, аккуратной сервировки и безупречного обслуживания мы создадим особенную праздничную атмосферу, а изысканные блюда из меню, составленного по вашему вкусу, понравятся даже самым требовательным из гостей.</p>
						<p class="paragraph-italic text-left text-indent">Мы учтем все Ваши пожелания, ведь организация Вашей свадьбы – для нас не просто работа, а забота о Вас и вашем удовольствии. Сделайте свою свадьбу такой, о которой Вы мечтали всю жизнь, и так часто видели в фильмах. Ресторан «Парадиз» и самый роскошный банкетный зал в Севастополе с нетерпением ждет именно Вас.</p>
					</div>
					<div class="col-md-12">
						<p class="button-block">
						<a href="#" class="button-white">Заказать свадебный банкет</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<!-- end under-panorama-block -->
		
		<!-- start services-block -->
		
		<div class="container services-block">
			<div class="row">
				<div class="col-md-8">
					<div class="horizontal-services service-part" style="background-image: url(images/paradiz-10.jpg);">
						<a href="#">
						<p class="title-service">БАНКЕТЫ, ЮБИЛЕИ<br>И КОРПОРАТИВЫ</p>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="horizontal-services service-part" style="background-image: url(images/paradiz-11.jpg);">
						<a href="#">
						<p class="title-service">Акции</p>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="horizontal-small-services service-part" style="background-image: url(images/paradiz-12.jpg);">
						<a href="#">
						<p class="title-service">детские <br>праздники</p>
						</a>
					</div>
				</div>
				<div class="col-md-8">
					<div class="horizontal-small-services service-part" style="background-image: url(images/paradiz-13.jpg);">
						<a href="#">
						<p class="title-service">обслуживание конференций</p>
						</a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- end services-block -->
		
		<!-- start arrival-date-block -->
		
		<div class="container-fluid arrival-date-block" style="    background-image: url(images/arrival-date-bg.jpg);}">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<input type="text" placeholder="дата заезда">
						<input type="text" placeholder="дата выезда">
						<a class="button-transparent" href="#">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- end arrival-date-block -->
		
		<!-- start news-block -->
		
		<div class="container news-block">
			<div class="row">
				<div class="col-md-12">
					<p class="h2-title">Новости отеля</p>
				</div>
				<div class="col-md-4">
					<div class="block-photo" style="background-image: url(images/news-1.jpg);"></div>
					<p class="title-news">Крымский военно-исторический фестиваль 2017</p>
					<p>На Федюхиных высотах под Севастополем с 15 по 16 сентября пройдет Крымский военно-исторический фестиваль.</p>
					<p><a class="button-white" href="#">Подробнее</a></p>
				</div>
				<div class="col-md-4">
					<div class="block-photo" style="background-image: url(images/news-2.jpg);"></div>
					<p class="title-news">Акция! Бесплатное такси на пляж!</p>
					<p>Бесплатное такси на пляж "Парк Победы" для гостей отеля</p>
					<p><a class="button-white" href="#">Подробнее</a></p>
				</div>
				<div class="col-md-4">
					<div class="block-photo" style="background-image: url(images/news-3.jpg);"></div>
					<p class="title-news">Приглашаем в ресторан "Парадиз"</p>
					<p>Бокал восхитительного вина от Крымских виноделов в ресторане "Парадиз"</p>
					<p><a class="button-white" href="#">Подробнее</a></p>
				</div>
			</div>
		</div>
		
		<!-- end news-block -->
		
		<!-- start reviews-block -->
		
		<div class="container-fluid reviews-block">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="h2-title">отзывы</p>
						<div class="owl-carousel owl-theme reviews-slider">
							<div>
								<div class="autographed">
								<img src="images/autographed-1.png" alt="">
								<p class="title">Шикарный отель!</p>
								<q>Спасибо за прекрасные апартаменты, замечательная атмосфера. Надеюсь приехать сюда вновь! С наступающим Новым годом и Рождеством!</q>
								<p class="person"><span>Тимати</span> Рэпер</p>
								</div>
								</div>
							<div>
								<div class="autographed">
								<img src="images/autographed-1.png" alt="">
								<p class="title">Шикарный отель!</p>
								<q>Спасибо за прекрасные апартаменты, замечательная атмосфера. Надеюсь приехать сюда вновь! С наступающим Новым годом и Рождеством!</q>
								<p class="person"><span>Тимати</span> Рэпер</p>
								</div>
							</div>
							<div>
							<div class="autographed">
								<img src="images/autographed-1.png" alt="">
								<p class="title">Шикарный отель!</p>
								<q>Спасибо за прекрасные апартаменты, замечательная атмосфера. Надеюсь приехать сюда вновь! С наступающим Новым годом и Рождеством!</q>
								<p class="person"><span>Тимати</span> Рэпер</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- end reviews-block -->
		
		<!-- start map-block -->
		
		<div class="container map-block">
			<div class="row">
				<div class="col-md-12">
					<p class="h2-title">Как к нам доехать в Севастополе:</p>
					<p>бутик-отель "Апартаменты Херсонес" на карте</p>
					<div class="map-block-wrap">
						<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5ec550252a62cee73bc2e094b425bbb7c49ba525e0c2c90cdb3f7faf9b3e7f01&amp;width=100%25&amp;height=280&amp;lang=ru_UA&amp;scroll=true"></script>
					</div>
				</div>
			</div>
		</div>
		
		<!-- end map-block -->
	</div>
	
	<!-- end main-paradiz -->

<?php get_footer(); ?>