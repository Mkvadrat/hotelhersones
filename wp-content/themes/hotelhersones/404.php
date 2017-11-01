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

<div class="main-404">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="title-page">404</p>
				<p class="paragraph-bigger text-indent">Ошибка 404 - Данная страница не найдена.</p>
				<p><a class="button-white" href="<?php echo esc_url( home_url( '/' ) ); ?>">На главную</a></p>
			</div>
		</div>
	</div>
</div>

<!-- end main-standart -->

<?php get_footer(); ?>