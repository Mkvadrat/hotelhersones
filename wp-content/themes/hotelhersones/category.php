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
<!-- start main-services -->
<div class="main-services">
<div class="container">
<div class="row">
<div class="col-md-8">
<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
<?php
echo getDataCategory('category','text_category_service_page');
?>
<?php
$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
'tax_query' => array(
array(
'taxonomy' => 'category',
'terms' => getCurrentCatID()
)
),
'post_type'   => 'post',
'orderby'     => 'date',
'order'       => 'DESC',
'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
'paged'          => $current_page,
);
$service_list = get_posts( $args );
?>
<ul class="list-gallerys">
<?php if($service_list){ ?>
<?php foreach($service_list as $service){ ?>
<?php
$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($service->ID), 'full');
$descr = wp_trim_words( $service->post_content, 30, '...' );
$link = get_permalink($service->ID);
?>
<li>
<div class="photo-block">
<?php if(!empty($image_url)){ ?>
<img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($service->ID), '_wp_attachment_image_alt', true ); ?>">
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/services-4.jpg">
<?php } ?>
</div>
<div class="description-block">
<h2 class="title-italic"><?php echo $service->post_title; ?></h2>
<p><?php echo $descr; ?></p>
<a href="<?php echo $link; ?>" class="button-white">подробнее</a>
</div>
</li>
<?php } ?>
<?php wp_reset_postdata(); ?>
<?php }else{ ?>
<li>В данной категории услуг не найдено!</li>
<?php } ?>
</ul>
<?php
$defaults = array(
'type' => 'array',
'prev_next'    => True,
'prev_text'    => __('Предыдущая страница'),
'next_text'    => __('Следующая страница'),
);
$pagination = paginate_links($defaults);
if($pagination){
?>
<ul class="bread-crumbs">
<?php foreach ($pagination as $pag){ ?>
<li><?php echo $pag; ?></li>
<?php } ?>
</ul>
<?php } ?>
</div>
<div class="col-md-4">
<aside class="sidebar">
<?php
//echo getDataCategory('news-list','title_category_news_page');
?>
<p class="title-sidebar">Услуги </p>
<?php
// список разделов произвольной таксономии action-list
/*$args = array(
'taxonomy'     => 'category', // название таксономии
'orderby'      => 'name',  // сортируем по названиям
'show_count'   => 0,       // не показываем количество записей
'pad_counts'   => 0,       // не показываем количество записей у родителей
'hierarchical' => 1,       // древовидное представление
'title_li'     => '',      // список без заголовка
'hide_empty' => 0,
'child_of'   => 1,
);*/
?>
<ul class="list-links-gallerys">
<?php //wp_list_categories( $args ); ?>
<?php echo getDataCategory('category', 'sidebar_category_services_page'); ?>
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
<!-- end main-services -->

<?php get_footer(); ?>