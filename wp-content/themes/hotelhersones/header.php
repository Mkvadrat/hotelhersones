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
	
	<?php wp_head(); ?>
	
</head>
<body>
	
	<!-- start wrapper for mobile menu -->

	<!-- start mobile header -->

	<div id="page">
		<div class="header-mobile">
			<div class="header">
			<a href="#menu"><span></span></a>
			Demo
			</div>
			<nav id="menu">
				<ul>
					<li><a href="#">кампании</a></li>
					<li><a href="#contact">брендинг</a></li>
					<li><a href="#contact">фестивали</a></li>
					<li><a href="#contact">кадры</a></li>
					<li><a href="#contact">рейтинги</a></li>
					<li><a href="#contact">статьи</a></li>
					<li><a href="#contact">дежавю</a></li>
					<li><a href="#contact">золото</a></li>
					<li><a href="#contact">топпроект</a></li>
				</ul>
			</nav>
		</div>
	
		<!-- end mobile header -->
	
		<div id="toTop" ><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>
	
		<?php echo getMeta('social_links_main_page');?>
	
		<!-- start header -->
	
		<header class="header-page">
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
				}elseif(is_single() || is_page()){
					$header_image = getImageLinkSingle(get_the_ID(),'header_image_all_page');
				?>
					<div class="header-banner-block" style="background-image: url( '<?php echo $header_image ? $header_image : esc_url( get_template_directory_uri() ) . '/images/bg-contacts-header.jpg'; ?>' )" data-speed="2" data-type="background">
				<?php
				}else{
					$header_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
				?>
					<div class="header-banner-block" <?php var_dump($header_image); ?> style="background-image: url( '<?php echo $header_image ? $header_image[0] : esc_url( get_template_directory_uri() ) . '/images/bg-contacts-header.jpg'; ?>' )" data-speed="2" data-type="background">
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