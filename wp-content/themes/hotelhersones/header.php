<?php
/*
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo hotelhersones_wp_title('','', true, 'right'); ?></title>
	<meta name="description" content="краткое описание страницы">
	<meta name="keywords" CONTENT="краткое описание страницы">
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> 
	
	<!-- MMENU -->
	<link type="text/css" rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/demo.css" />
	
	<!-- STYLE -->
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/fonts.css">
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/styles.css">
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/media.css">
	
	<!-- HTML5 for IE -->
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
	<!-- OWL-CAROUSEL -->
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.min.js"></script>
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.theme.default.min.css">
	
	<!-- SWEETALERT -->
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/sweetalert.css">
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/sweetalert.min.js"></script>
	
	<!-- FANCYBOX -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js"></script>
	
	<!-- MMENU -->
	<link type="text/css" rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/jquery.mmenu.all.css" />
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mmenu.all.js"></script>
	
	<!-- common js -->
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/common.js"></script>
	
	<!-- reviews js -->
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/reviews.js"></script>
	
	<?php wp_head(); ?>
	
</head>
<body>
	
	<!-- start wrapper for mobile menu -->

	<!-- start mobile header -->

	<div id="page">
		<div class="header-mobile">
			<nav id="menu">
				<ul>
					<li><a href="#">Бронирование</a></li>
					<li><a href="#contact">О нас</a>
						<ul>
							<li class="sub-menu">
								<a href="#">О гостинице</a>
								<ul>
									<li><a href="#">Наша территория</a></li>
									<li><a href="#">Правила проживания в отеле</a></li>
									<li><a href="#">Вакансии отеля</a></li>
									<li><a href="#">Награды</a></li>
								</ul>
							</li>
							<li class="sub-menu">
								<a href="#">О Севастополе</a>
								<ul>
									<li><a href="#">Новости</a></li>
								</ul>
							</li>
							<li class="sub-menu">
								<a href="#">Партнеры</a>
							</li>
						</ul>
					</li>
					<li><a href="#contact">Акции</a>
						<ul>
							<li class="sub-menu">
								<a href="#">Акции отеля</a>
								<ul>
									<li><a href="#">Раннее бронирование</a></li>
									<li><a href="#">Скидки для командировочных</a></li>
									<li><a href="#">Бархатный сезон</a></li>
									<li><a href="#">Школьные каникулы  в Севастополе</a></li>
									<li><a href="#">Сезонные скидки</a></li>
									<li><a href="#">Новый год в отеле «Апартаменты Херсонес» </a></li>
									<li><a href="#">Бесплатный трансфер на пляж</a></li>
								</ul>
							</li>
							<li class="sub-menu">
								<a href="#">Свадебные пакеты</a>
								<ul>
									<li><a href="#">Подарочные сертификаты</a></li>
								</ul>
							</li>
							<li class="sub-menu">
								<a href="#">Акции ресторана «Парадиз»</a>
							</li>
						</ul>
					</li>
					<li><a href="#contact">Номера</a></li>
					<li><a href="#contact">Цены</a>
						<ul>
							<li class="sub-menu">
								<a href="#">Акции и скидки сегодняшнего дня</a>
							</li>
							<li class="sub-menu">
								<a href="#">Программа для командировочных</a>
							</li>
							<li class="sub-menu">
								<a href="#">Раннее бронирование на  весну-лето 2018</a>
							</li>
						</ul>
					</li>
					<li><a href="#contact">Местоположение</a>
						<ul>
							<li class="sub-menu">
								<a href="#">Карта (достопримечательностей) «Рядом с нами»</a>
								<ul>
									<li><a href="#">Пляжи</a></li>
									<li><a href="#">Программа мероприятий музея «Херсонес Таврический»</a></li>
								</ul>
							</li>
							<li class="sub-menu">
								<a href="#">О Севастополе</a>
								<ul>
									<li><a href="#">История Херсонеса</a></li>
								</ul>
							</li>
							<li class="sub-menu">
								<a href="#">Владимирский собор</a>
								<ul>
									<li><a href="#">Венчание</a></li>
									<li><a href="#">Крещение детей во Владимирском соборе Севастополя</a></li>
									<li><a href="#">Светлая Пасха в гостинице «Апартаменты Херсонес»</a></li>
									<li><a href="#">Отпевание</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="#contact">Ресторан</a>
						<ul>
							<li class="sub-menu">
								<a href="#">Меню</a>
								<ul>
									<li><a href="#">Завтраки</a></li>
									<li><a href="#">Полный пансион</a></li>
									<li><a href="#">Меню банкетов и праздников</a></li>
									<li><a href="#">Меню кофе-брейков</a></li>
									<li><a href="#">Карта вин</a></li>
									<li><a href="#">Чайная карта</a></li>
								</ul>
							</li>
							<li class="sub-menu">
								<a href="#">События</a>
								<ul>
									<li><a href="#">Банкеты и корпоративы</a></li>
									<li><a href="#">Свадебные банкеты</a></li>
									<li><a href="#">Обеды тургрупп</a></li>
									<li><a href="#">Юбилеи, Дни рождения у взрослых и детей</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Отзывы</a>
							</li>
						</ul>
					</li>
					<li><a href="#contact">Услуги</a>
						<ul>
							<li class="sub-menu">
								<a href="#">Услуги отеля</a>
								<ul>
									<li><a href="#">Полный пансион</a></li>
									<li><a href="#">Сауна отеля с купелью в коттедже «Усадьба Скульптора»</a></li>
									<li><a href="#">Экскурсии в Севастополе </a></li>
									<li><a href="#">Отдых с детьми</a></li>
									<li><a href="#">Яхтинг в Севастополе</a></li>
									<li><a href="#">Парковка отеля</a></li>
								</ul>
							</li>
							<li class="sub-menu">
								<a href="#">О свадьбе в отеле «Апартаменты Херсонес»</a>
								<ul>
									<li><a href="#">Выездная церемония вручения свидетельства о браке</a></li>
									<li><a href="#">Стилизованные свадьбы</a></li>
									<li><a href="#">Свадебные пакеты</a></li>
									<li><a href="#">Подарочные сертификаты</a></li>
								</ul>
							</li>
							<li class="sub-menu">
								<a href="#">Конференц-сервис</a>
							</li>
						</ul>
					</li>
					<li><a href="#contact">Отзывы</a>
						<ul>
							<li class="sub-menu">
								<a href="#">Звездные гости об отеле</a>
							</li>
							<li class="sub-menu">
								<a href="#">Наши гости</a>
							</li>
							<li class="sub-menu">
								<a href="#">Отзывы о ресторане «Парадиз»</a>
							</li>
						</ul>
					</li>
					<li><a href="#contact">Фото</a>
						<ul>
							<li class="sub-menu">
								<a href="#">Отель</a>
								<ul>
									<li><a href="#">Территория</a></li>
									<li><a href="#">Номера</a></li>
								</ul>
							</li>
							<li class="sub-menu">
								<a href="#">Ресторан</a>
								<ul>
									<li><a href="#">Кафе</a></li>
									<li><a href="#">Летние площадки</a></li>
								</ul>
							</li>
							<li class="sub-menu">
								<a href="#">События</a>
								<ul>
									<li><a href="#">Свадьбы и выездные регистрации</a></li>
									<li><a href="#">Фестиваль невест</a></li>
									<li><a href="#">Наши невесты</a></li>
									<li><a href="#">Фотографии с праздников и мероприятий</a></li>
									<li><a href="#">Семейный отдых в отеле Херсонесе</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="#contact">Контакты</a></li>
				</ul>
			</nav>
		</div>

		<!-- end mobile header -->
	
		<div id="toTop" ><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>
	
		<?php echo getMeta('social_links_main_page');?>
	
		<!-- start header -->
	
		<header class="header-page header-page-main">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- start top-line -->
						<div class="top-line">
							<div class="left-block">
								<div class="logo-block">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
										<img
										src="<?php header_image(); ?>"
										height="<?php echo get_custom_header()->height; ?>"
										width="<?php echo get_custom_header()->width; ?>"
										alt="logotype"
										/>
									</a>
									<p class="weather">погода в севастополе <span><?php echo getTemperature();?> °с</span></p>
								</div>
								<div class="rating-5">
									<?php echo getMeta('raiting_tripadvisor_main_page');?>
								</div>
								<div class="rating-10">
									<?php echo getMeta('raiting_booking_main_page');?>
								</div>
							</div>
							<div class="right-block">
								<a href="<?php echo getMeta('booking_link_main_page');?>" class="button-yellow">Забронировать</a>
								<div class="phones-block">
									<?php echo getMeta('contact_information_main_page');?>
								</div>
							</div>
						</div>
						<!-- end top-line -->
					</div>
					<div class="col-md-12">
						<!-- start bottom-line (menu) -->

						<a id="button-menu-mobile" href="#menu"><span><i class="fa fa-bars" aria-hidden="true"></i></span></a>
						
						<?php
							if (has_nav_menu('header_menu')){
								wp_nav_menu( array(
									'theme_location'  => 'header_menu',
									'menu'            => '',
									'container'       => false,
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => '',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<nav class="menu"><ul>%3$s</ul></nav>',
									'depth'           => 3,
									'walker'          => new header_menu(),
								) );
							}
						?>
						<!-- end bottom-line (menu) -->
					</div>
				</div>
			</div>
		</header>
		
		<!-- end header -->
	
		<!-- start header-slider-block -->
		
		<?php if( is_front_page() ) { ?>
			<div class="header-slider-block">
				<div class="owl-carousel owl-theme header-slider">
					<?php
						global $nggdb;
						$ngg_id = getNextGallery('123', 'slider_main_page');
						$ngg_image = $nggdb->get_gallery($ngg_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
						if($ngg_image){
							
							foreach($ngg_image as $image) {
						?>
							<div>
								<img src="<?php echo $image->imageURL; ?>" alt="<?php echo $image->alttext; ?>">
								<div class="description-block">								
									<?php echo html_entity_decode(esc_attr($image->description), ENT_QUOTES, 'UTF-8'); ?>
								</div>
							</div>
						<?php
							}
						}else{
						?>
							<div>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/header-slider-1.jpg" alt="">
							</div>
						<?php
						}
					?>
				</div>
			</div>
		<?php }else{ ?>
			<!-- start header-banner-block -->
			
			<?php
				if(is_category()){
					$header_image = getImageLinkCategory('category','image_category_all_page');
				?>
					<div class="header-banner-block" style="background-image: url( '<?php echo $header_image ? $header_image : esc_url( get_template_directory_uri() ) . '/images/bg-contacts-header.jpg'; ?>' )" data-speed="2" data-type="background">
				<?php
				}elseif(is_tax('news-list') && !is_single()){
					$header_image = getImageLinkCategory('news-list','image_category_all_page');
				?>
					<div class="header-banner-block" style="background-image: url( '<?php echo $header_image ? $header_image : esc_url( get_template_directory_uri() ) . '/images/bg-contacts-header.jpg'; ?>' )" data-speed="2" data-type="background">
				<?php
				}elseif(is_tax('action-list') && !is_single()){
					$header_image = getImageLinkCategory('action-list','image_category_all_page');
				?>
					<div class="header-banner-block" style="background-image: url( '<?php echo $header_image ? $header_image : esc_url( get_template_directory_uri() ) . '/images/bg-contacts-header.jpg'; ?>' )" data-speed="2" data-type="background">
				<?php
				}elseif(is_single()){
					$header_image = getImageLinkSingle(get_the_ID(),'header_image_all_page');
				?>
					<div class="header-banner-block" style="background-image: url( '<?php echo $header_image ? $header_image : esc_url( get_template_directory_uri() ) . '/images/bg-contacts-header.jpg'; ?>' )" data-speed="2" data-type="background">
				<?php
				}elseif(is_page()){
					$header_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
				?>
					<div class="header-banner-block" style="background-image: url( '<?php echo $header_image ? $header_image[0] : esc_url( get_template_directory_uri() ) . '/images/bg-contacts-header.jpg'; ?>' )" data-speed="2" data-type="background">
				<?php
				}else{
					$header_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
				?>
					<div class="header-banner-block" style="background-image: url( '<?php echo $header_image ? $header_image[0] : esc_url( get_template_directory_uri() ) . '/images/bg-contacts-header.jpg'; ?>' )" data-speed="2" data-type="background">
				<?php 
				}
			?>
			
			<div class="container">
				<div class="row">
				  <div class="col-md-12">
					<div class="title-header-block">
						<?php
							$action_image = getImageLink('action_image_main_page');
							$link_action = getMeta('link_action_main_page');
						?>
						<p class="title"><?php get_title(); ?></p>
						<?php if($action_image){ ?>
							<a href="<?php echo $link_action; ?>"><img class="sale-banner" src="<?php echo $action_image; ?>" alt=""></a>
						<?php } ?>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		
			<!-- end header-banner-block -->
		<?php } ?>
		
		<!-- end header-slider-block -->
	
		<!-- start order-line -->
	
		<?php echo getMeta('booking_form_main_page'); ?>
		<!-- end order-line -->