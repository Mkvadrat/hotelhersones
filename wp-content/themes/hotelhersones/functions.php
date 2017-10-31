<?php
/*
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

//Подключаем необходимые библиотеки стили и скрипты
require($_SERVER['DOCUMENT_ROOT'] . '/wp-libraries/phpQuery/phpQuery.php');

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************НАСТРОЙКИ ТЕМЫ*****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Регистрируем название сайта
function hotelhersones_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ug' ), max( $paged, $page ) );
	}

	if ( is_404() ) {
        $title = '404';
    }

	return $title;
}
add_filter( 'wp_title', 'hotelhersones_wp_title', 10, 2 );

//Регистрируем меню
if(function_exists('register_nav_menus')){
	register_nav_menus(
		array(
		  'header_menu' => 'Меню в шапке',
		  'footer_menu' => 'Меню в подвале',
		  'mobile_menu' => 'Меню для мобильных устройств',
		)
	);
}

//Изображение в шапке сайта
$args = array(
  'width'         => 305,
  'height'        => 59,
  'default-image' => get_template_directory_uri() . '/images/logo.png',
  'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

//Добавление в тему миниатюры записи и страницы
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

//Виджет для инстаграма
function register_instagram_widgets(){
	register_sidebar( array(
		'name' => "Виджет для инстаграма",
		'id' => 'instagram-sidebar',
		'description' => 'Эти виджеты будут показаны в подвале сайта',
	) );
}
add_action( 'widgets_init', 'register_instagram_widgets' );

//Вывод id категории
function getCurrentCatID(){
	global $wp_query;
	if(is_category()){
		$cat_ID = get_query_var('cat');
	}
	return $cat_ID;
}

//Вывод id новостей
function getCurrentNewsID(){
	global $wpdb;
	global $wp_query;
	if(is_taxonomy('news-list')){
		$slug = get_query_var('news-list');
		$cat_ID = $wpdb->get_var( $wpdb->prepare("SELECT term_id FROM $wpdb->terms WHERE slug = %s" , $slug));
	}else{
		$cat_ID = 0;
	}
	
	return $cat_ID;
}

//Вывод id акций
function getCurrentActionID(){
	global $wpdb;
	global $wp_query;
	if(is_taxonomy('action-list')){
		$slug = get_query_var('action-list');
		$cat_ID = $wpdb->get_var( $wpdb->prepare("SELECT term_id FROM $wpdb->terms WHERE slug = %s" , $slug));
	}else{
		$cat_ID = 0;
	}
	
	return $cat_ID;
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************МЕНЮ САЙТА*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
// Добавляем свой класс для пунктов меню:
class header_menu extends Walker_Nav_Menu {

	// Добавляем классы к вложенным ul
	function start_lvl( &$output, $depth ) {
		// Глубина вложенных ul
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'',
			( $display_depth % 2  ? '' : '' ),
			( $display_depth >=2 ? '' : '' ),
			''
			);
		$class_names = implode( ' ', $classes );
	
		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	// Добавляем классы к вложенным li
	function start_el( &$output, $item, $depth, $args ) {
		global $wpdb;
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
	
		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'has-sub' : '' ),
			( $depth >=2 ? '' : '' ),
			( $depth % 2 ? '' : '' ),
			'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
	
		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
		$mycurrent = ( $item->current == 1 ) ? ' active' : '';
	
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
	
		$output .= $indent . '<li class="sub-menu">';
	
		// Добавляем атрибуты и классы к элементу a (ссылки)
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
		$attributes .= ' class="menu-link ' . ( $depth == 0 ? 'parent' : '' ) . ( $depth == 1 ? 'child' : '' ) . ( $depth >= 2 ? 'sub-child' : '' ) . '"';
		
		if($depth == 0){
			$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);
			
			$link  =  $item->url;
			$title = apply_filters( 'the_title', $item->title, $item->ID );
					
			if(!empty($has_children)){
				$item_output = '<a class="drop-link" href="'. $link .'">' . $title .' </a>';
			}else{
				$item_output = '<a href="'. $link .'">' . $title .'</a>';
			}
		}else if($depth == 1){
			$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);
			
			$link  =  $item->url;
			$title = apply_filters( 'the_title', $item->title, $item->ID );
					
			if(!empty($has_children)){
				$item_output = '<a href="'. $link .'">' . $title .' </a>';
			}else{
				$item_output = '<a href="'. $link .'">' . $title .'</a>';
			}

		}else if($depth >= 2){
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
		}
	
		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// Добавляем свой класс для пунктов меню:
class footer_menu extends Walker_Nav_Menu {

	// Добавляем классы к вложенным ul
	function start_lvl( &$output, $depth ) {
		// Глубина вложенных ul
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'',
			( $display_depth % 2  ? '' : '' ),
			( $display_depth >=2 ? '' : '' ),
			''
			);
		$class_names = implode( ' ', $classes );
	
		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	// Добавляем классы к вложенным li
	function start_el( &$output, $item, $depth, $args ) {
		global $wpdb;
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
	
		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'has-sub' : '' ),
			( $depth >=2 ? '' : '' ),
			( $depth % 2 ? '' : '' ),
			'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
	
		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
		$mycurrent = ( $item->current == 1 ) ? ' active' : '';
	
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
	
		$output .= $indent . '<li class="sub-menu">';
	
		// Добавляем атрибуты и классы к элементу a (ссылки)
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
		$attributes .= ' class="menu-link ' . ( $depth == 0 ? 'parent' : '' ) . ( $depth == 1 ? 'child' : '' ) . ( $depth >= 2 ? 'sub-child' : '' ) . '"';
		
		if($depth == 0){
			$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);
			
			$link  =  $item->url;
			$title = apply_filters( 'the_title', $item->title, $item->ID );
					
			if(!empty($has_children)){
				$item_output = '<a class="drop-link" href="'. $link .'">' . $title .' </a>';
			}else{
				$item_output = '<a href="'. $link .'">' . $title .'</a>';
			}
		}else if($depth == 1){
			$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);
			
			$link  =  $item->url;
			$title = apply_filters( 'the_title', $item->title, $item->ID );
					
			if(!empty($has_children)){
				$item_output = '<a href="'. $link .'">' . $title .' </a>';
			}else{
				$item_output = '<a href="'. $link .'">' . $title .'</a>';
			}

		}else if($depth >= 2){
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
		}
	
		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************ТЕМПЕРАТУРА********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Функция для вывода температуры 
function getTemperature(){
	$link_temp = file_get_contents('http://www.realmeteo.ru/sevastopol/1/current');
	
	$document = phpQuery::newDocument($link_temp);
  
	$temp = $document->find('td.meteodata');
	
	$temp_explode = explode('°C', $temp);
	
	$r_temp_trim = trim($temp_explode[0], "</span>");
	
	if(!empty($r_temp_trim)){
		echo $r_temp_trim;
	}else{
		echo 0;
	}
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************РАБОТА С METAПОЛЯМИ*******************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод данных из произвольных полей для всех страниц сайта
function getMeta($meta_key){
	global $wpdb;
	
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1", $meta_key) );
	
	return $value;
}

//Получить данные из произвольных полей для таксономии
function getDataCategory($taxonomy, $meta_key){
	global $wpdb;
	
	$term = get_queried_object();
	
	$cat_id = $term->term_id;
	
	$cat_data = get_option($taxonomy . '_' . $cat_id . '_' . $meta_key);
			
	return $cat_data;
}

function getNextGallery($post_id, $meta_key){
	global $wpdb;
	
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta AS pm JOIN $wpdb->posts AS p ON (pm.post_id = p.ID) AND (pm.post_id = %s) AND meta_key = %s ORDER BY pm.post_id DESC LIMIT 1", $post_id, $meta_key) );
	
	$unserialize_value = unserialize($value);
	
	return $unserialize_value;	
}

//Получить урл изображения из произвольных полей
function getImageLink($meta_key){
	global $wpdb;
		
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1" , $meta_key));
	
	$link = $wpdb->get_var( $wpdb->prepare("SELECT guid FROM $wpdb->postmeta JOIN $wpdb->posts ON %s = ID AND meta_key = %d ORDER BY meta_id DESC LIMIT 1", $value, $meta_key));
			
	return $link;
}

//Получить урл изображения из произвольных полей для таксономии рубрики
function getImageLinkCategory($taxonomy, $meta_key){
	global $wpdb;
	
	$term = get_queried_object();
	
	$cat_id = $term->term_id;
	
	$cat_data = get_option($taxonomy . '_' . $cat_id . '_' . $meta_key);
		
	$link = $wpdb->get_var( $wpdb->prepare("SELECT guid FROM $wpdb->posts WHERE ID = %s", $cat_data));
	
	return $link;
}

//Получить урл изображения из произвольных полей для таксономии single
function getImageLinkSingle($post_id, $meta_key){
	global $wpdb;
	
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s AND post_id = %d" , $meta_key, $post_id));
	
	$link = $wpdb->get_var( $wpdb->prepare("SELECT guid FROM $wpdb->posts WHERE ID = %s", $value));
	
	return $link;
}

//Вывод связанных данных для single.php
function getProductsMeta($post_id, $meta_key){
	global $wpdb;
	
	$value = array();

	$serialized_object = $wpdb->get_results( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = %s AND meta_key = %s", $post_id, $meta_key) );
	
	$unserialized_object = unserialize($serialized_object[0]->meta_value);
	
	if($unserialized_object){
		foreach($unserialized_object as $post_id){
			$value[] = get_post( $post_id );
		}
	}
	
	return $value;
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
**************************************************************************ЗАГОЛОВОК************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/

function get_title($display = true) {
    global $wp_locale;
 
    $m        = get_query_var( 'm' );
    $year     = get_query_var( 'year' );
    $monthnum = get_query_var( 'monthnum' );
    $day      = get_query_var( 'day' );
    $search   = get_query_var( 's' );
    $title    = '';
 
    $t_sep = '%WP_TITLE_SEP%'; // Temporary separator, for accurate flipping, if necessary
 
    // If there is a post
    if ( is_single() || ( is_home() && ! is_front_page() ) || ( is_page() && ! is_front_page() ) ) {
        $title = single_post_title( '', false );
    }
 
    // If there's a post type archive
    if ( is_post_type_archive() ) {
        $post_type = get_query_var( 'post_type' );
        if ( is_array( $post_type ) ) {
            $post_type = reset( $post_type );
        }
        $post_type_object = get_post_type_object( $post_type );
        if ( ! $post_type_object->has_archive ) {
            $title = post_type_archive_title( '', false );
        }
    }
 
    // If there's a category or tag
    if ( is_category() || is_tag() ) {
        $title = single_term_title( '', false );
    }
 
    // If there's a taxonomy
    if ( is_tax() ) {
        $term = get_queried_object();
        if ( $term ) {
            $title = single_term_title( $t_sep, false );
        }
    }
 
    // If there's an author
    if ( is_author() && ! is_post_type_archive() ) {
        $author = get_queried_object();
        if ( $author ) {
            $title = $author->display_name;
        }
    }
 
    // Post type archives with has_archive should override terms.
    if ( is_post_type_archive() && $post_type_object->has_archive ) {
        $title = post_type_archive_title( '', false );
    }
 
    // If there's a month
    if ( is_archive() && ! empty( $m ) ) {
        $my_year  = substr( $m, 0, 4 );
        $my_month = $wp_locale->get_month( substr( $m, 4, 2 ) );
        $my_day   = intval( substr( $m, 6, 2 ) );
        $title    = $my_year . ( $my_month ? $t_sep . $my_month : '' ) . ( $my_day ? $t_sep . $my_day : '' );
    }
 
    // If there's a year
    if ( is_archive() && ! empty( $year ) ) {
        $title = $year;
        if ( ! empty( $monthnum ) ) {
            $title .= $t_sep . $wp_locale->get_month( $monthnum );
        }
        if ( ! empty( $day ) ) {
            $title .= $t_sep . zeroise( $day, 2 );
        }
    }
 
    // If it's a search
    if ( is_search() ) {
        /* translators: 1: separator, 2: search phrase */
        $title = sprintf( __( 'Search Results %1$s %2$s' ), $t_sep, strip_tags( $search ) );
    }
 
    // If it's a 404 page
    if ( is_404() ) {
        $title = __( 'Page not found' );
    }
 
    $prefix = '';
    if ( ! empty( $title ) ) {
        $prefix = " $sep ";
    }
 
    $title_array = apply_filters( 'wp_title_parts', explode( $t_sep, $title ) );
 
    // Determines position of the separator and direction of the breadcrumb
    if ( 'right' == $seplocation ) { // sep on right, so reverse the order
        $title_array = array_reverse( $title_array );
        $title       = implode( " $sep ", $title_array ) . $prefix;
    } else {
        $title = $prefix . implode( " $sep ", $title_array );
    }
 
    $title = apply_filters( '', $title, $sep, $seplocation );
 
    // Send it out
    if ( $display ) {
        echo $title;
    } else {
        return $title;
    }
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
********************************************************************ФОРМЫ ОБРАТНОЙ СВЯЗИ*******************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Форма обратной связи для страницы контакты
function SendForm(){

	$form_adress = get_option('admin_email');
	
	$site_url = $_SERVER['SERVER_NAME'];

	$alert = array(
		'status' => 0,
		'message' => ''
	);

	if (isset($_POST['name'])) {$name = $_POST['name']; if ($name == '') {unset($name);}}
	if (isset($_POST['phone'])) {$phone = $_POST['phone']; if ($phone == '') {unset($phone);}}
	if (isset($_POST['message'])) {$message = $_POST['message']; if ($message == '') {unset($message);}}

	if (isset($name) && isset($phone) && isset($message)){

		$address = $form_adress;

		$headers  = "Content-type: text/html; charset=UTF-8 \r\n";
		$headers .= "From: $site_url\r\n";
		$headers .= "Bcc: birthday-archive@example.com\r\n";
		
		//$mes = "Имя: $name \nEmail: $email \nСообщение: $comment";
		
		$mes = '<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>ZURBemails</title>
		<style>
		img {
		max-width: 100%;
		}
		.collapse {
		margin:0;
		padding:0;
		}
		body {
		-webkit-font-smoothing:antialiased;
		-webkit-text-size-adjust:none;
		width: 100%!important;
		height: 100%;
		}

		a { color: #2BA6CB;}

		.btn {
		text-decoration:none;
		color: #FFF;
		background-color: #666;
		padding:10px 16px;
		font-weight:bold;
		margin-right:10px;
		text-align:center;
		cursor:pointer;
		display: inline-block;
		}

		p.callout {
		padding:15px;
		background-color:#ECF8FF;
		margin-bottom: 15px;
		}
		.callout a {
		font-weight:bold;
		color: #2BA6CB;
		}

		table.social {
		background-color: #ebebeb;

		}
		.social .soc-btn {
		padding: 3px 7px;
		font-size:12px;
		margin-bottom:10px;
		text-decoration:none;
		color: #FFF;font-weight:bold;
		display:block;
		text-align:center;
		}
		a.fb { background-color: #3B5998!important; }
		a.tw { background-color: #1daced!important; }
		a.gp { background-color: #DB4A39!important; }
		a.ms { background-color: #000!important; }

		.sidebar .soc-btn {
		display:block;
		width:100%;
		}

		table.head-wrap { width: 100%;}

		.header.container table td.logo { padding: 15px; }
		.header.container table td.label { padding: 15px; padding-left:0px;}

		table.body-wrap { width: 100%;}

		table.footer-wrap { width: 100%;	clear:both!important;
		}
		.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
		.footer-wrap .container td.content p {
		font-size:10px;
		font-weight: bold;

		}

		h1,h2,h3,h4,h5,h6 {
		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
		}
		h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

		h1 { font-weight:200; font-size: 44px;}
		h2 { font-weight:200; font-size: 37px;}
		h3 { font-weight:500; font-size: 27px;}
		h4 { font-weight:500; font-size: 23px;}
		h5 { font-weight:900; font-size: 17px;}
		h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#ffffff;}

		.collapse { margin:0!important;}

		p, ul {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		margin-bottom: 10px;
		font-weight: normal;
		font-size:14px;
		line-height:1.6;
		}
		p.lead { font-size:17px; }
		p.last { margin-bottom:0px;}

		ul li {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		margin-left:5px;
		list-style-position: inside;
		}

		ul.sidebar {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		background:#ebebeb;
		display:block;
		list-style-type: none;
		}
		ul.sidebar li { display: block; margin:0;}
		ul.sidebar li a {
		text-decoration:none;
		color: #666;
		padding:10px 16px;
		margin-right:10px;
		cursor:pointer;
		border-bottom: 1px solid #777777;
		border-top: 1px solid #FFFFFF;
		display:block;
		margin:0;
		}
		ul.sidebar li a.last { border-bottom-width:0px;}
		ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}

		.container {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		display:block!important;
		max-width:600px!important;
		margin:0 auto!important;
		clear:both!important;
		}

		.content {
		padding:15px;
		max-width:600px;
		margin:0 auto;
		display:block;
		}

		.content table { width: 100%; }

		.column {
		width: 300px;
		float:left;
		}
		.column tr td { padding: 15px; }
		.column-wrap {
		padding:0!important;
		margin:0 auto;
		max-width:600px!important;
		}
		.column table { width:100%;}
		.social .column {
		width: 280px;
		min-width: 279px;
		float:left;
		}


		.clear { display: block; clear: both; }

		@media only screen and (max-width: 600px) {

		a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

		div[class="column"] { width: auto!important; float:none!important;}

		table.social div[class="column"] {
		width:auto!important;
		}

		}
		</style>

		</head>

		<body bgcolor="#FFFFFF">

		<!-- HEADER -->
		<table class="head-wrap" bgcolor="#003576">
		<tr>
		<td></td>
		<td class="header container" >

		<div class="content">
		<table>
		<tr>

		<td align="left"><h6 class="collapse" style="font-weight: 900; font-size: 14px; text-transform: uppercase; color: #ffffff;">Гостиница в Севастополе - апартаменты Херсонес</td>
		<td align="right"><h6 class="collapse" style="font-weight: 900; font-size: 14px; text-transform: uppercase; color: #ffffff;">Обратная связь</h6></td>
		</tr>
		</table>
		</div>

		</td>
		<td></td>
		</tr>
		</table>

		<table class="body-wrap">
		<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

		<div class="content">
		<table>
		<tr>
		<td>
		<!--<h3>Тема сообщения</h3>-->

		<p>'.$message.'</p>
		<!-- Callout Panel -->
		<!-- social & contact -->
		<table class="social" width="100%">
		<tr>
		<td>
		<table align="left" class="column">
		<tr>
		<td>

		<h5 class="">Контактная информация:</h5>
		<br/>
		<p>Имя: <strong>'.$name.'</strong></p>
		<p>Телефон/e-mail: <strong>'.$phone.'</strong></p>
		</td>
		</tr>
		</table>

		<span class="clear"></span>

		</td>
		</tr>
		</table>

		</td>
		</tr>
		</table>
		</div>

		</td>
		<td></td>
		</tr>
		</table>

		<table class="footer-wrap">
		<tr>
		<td></td>
		<td class="container"></td>
		<td></td>
		</tr>
		</table>

		</body>
		</html>';

		$send = mail($address, $email, $mes, $headers);

		if ($send == 'true'){
			$alert = array(
				'status' => 200,
				'message' => 'Ваше сообщение отправлено'
			);
		}else{
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено!'
			);
		}
	}

	if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['message'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		
		if ($name == '' || $phone == '' || $message == '') {
			unset($name);
			unset($phone);
			unset($message);
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено! Заполните все поля!'
			);
		}
	}

	echo wp_send_json($alert);

	wp_die();
}
add_action('wp_ajax_SendForm', 'SendForm');
add_action('wp_ajax_nopriv_SendForm', 'SendForm');

//Форма легкого бронирования
function lightBooking(){

	$form_adress = get_option('admin_email');
	
	$site_url = $_SERVER['SERVER_NAME'];

	$alert = array(
		'status' => 0,
		'message' => ''
	);

	if (isset($_POST['name'])) {$name = $_POST['name']; if ($name == '') {unset($name);}}
	if (isset($_POST['email'])) {$email = $_POST['email']; if ($email == '') {unset($email);}}
	if (isset($_POST['phone'])) {$phone = $_POST['phone']; if ($phone == '') {unset($phone);}}
	if (isset($_POST['arrival'])) {$arrival = $_POST['arrival']; if ($arrival == '') {unset($arrival);}}
	if (isset($_POST['departure'])) {$departure = $_POST['departure']; if ($departure == '') {unset($departure);}}

	if (isset($name) && isset($email) && isset($phone) && isset($arrival) && isset($departure)){

		$address = $form_adress;

		$headers  = "Content-type: text/html; charset=UTF-8 \r\n";
		$headers .= "From: $site_url\r\n";
		$headers .= "Bcc: birthday-archive@example.com\r\n";
		
		//$mes = "Имя: $name \nEmail: $email \nСтрана: $country \nСообщение: $comment \nТелефон: $phone \nПодписка на новости: $subscribe";
		
		$mes = '<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta name="viewport" content="width=device-width" />
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>ZURBemails</title>
			<style>
			img {
			max-width: 100%;
			}
			.collapse {
			margin:0;
			padding:0;
			}
			body {
			-webkit-font-smoothing:antialiased;
			-webkit-text-size-adjust:none;
			width: 100%!important;
			height: 100%;
			}
	
			a { color: #2BA6CB;}
	
			.btn {
			text-decoration:none;
			color: #FFF;
			background-color: #666;
			padding:10px 16px;
			font-weight:bold;
			margin-right:10px;
			text-align:center;
			cursor:pointer;
			display: inline-block;
			}
	
			p.callout {
			padding:15px;
			background-color:#ECF8FF;
			margin-bottom: 15px;
			}
			.callout a {
			font-weight:bold;
			color: #2BA6CB;
			}
	
			table.social {
			background-color: #ebebeb;
	
			}
			.social .soc-btn {
			padding: 3px 7px;
			font-size:12px;
			margin-bottom:10px;
			text-decoration:none;
			color: #FFF;font-weight:bold;
			display:block;
			text-align:center;
			}
			a.fb { background-color: #3B5998!important; }
			a.tw { background-color: #1daced!important; }
			a.gp { background-color: #DB4A39!important; }
			a.ms { background-color: #000!important; }
	
			.sidebar .soc-btn {
			display:block;
			width:100%;
			}
	
			table.head-wrap { width: 100%;}
	
			.header.container table td.logo { padding: 15px; }
			.header.container table td.label { padding: 15px; padding-left:0px;}
	
			table.body-wrap { width: 100%;}
	
			table.footer-wrap { width: 100%;	clear:both!important;
			}
			.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
			.footer-wrap .container td.content p {
			font-size:10px;
			font-weight: bold;
	
			}
	
			h1,h2,h3,h4,h5,h6 {
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
			}
			h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }
	
			h1 { font-weight:200; font-size: 44px;}
			h2 { font-weight:200; font-size: 37px;}
			h3 { font-weight:500; font-size: 27px;}
			h4 { font-weight:500; font-size: 23px;}
			h5 { font-weight:900; font-size: 17px;}
			h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#ffffff;}
	
			.collapse { margin:0!important;}
	
			p, ul {
			font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
			margin-bottom: 10px;
			font-weight: normal;
			font-size:14px;
			line-height:1.6;
			}
			p.lead { font-size:17px; }
			p.last { margin-bottom:0px;}
	
			ul li {
			font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
			margin-left:5px;
			list-style-position: inside;
			}
	
			ul.sidebar {
			font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
			background:#ebebeb;
			display:block;
			list-style-type: none;
			}
			ul.sidebar li { display: block; margin:0;}
			ul.sidebar li a {
			text-decoration:none;
			color: #666;
			padding:10px 16px;
			margin-right:10px;
			cursor:pointer;
			border-bottom: 1px solid #777777;
			border-top: 1px solid #FFFFFF;
			display:block;
			margin:0;
			}
			ul.sidebar li a.last { border-bottom-width:0px;}
			ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}
	
			.container {
			font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
			display:block!important;
			max-width:600px!important;
			margin:0 auto!important;
			clear:both!important;
			}
	
			.content {
			padding:15px;
			max-width:600px;
			margin:0 auto;
			display:block;
			}
	
			.content table { width: 100%; }
	
			.column {
			width: 300px;
			float:left;
			}
			.column tr td { padding: 15px; }
			.column-wrap {
			padding:0!important;
			margin:0 auto;
			max-width:600px!important;
			}
			.column table { width:100%;}
			.social .column {
			width: 280px;
			min-width: 279px;
			float:left;
			}
	
	
			.clear { display: block; clear: both; }
	
			@media only screen and (max-width: 600px) {
	
			a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}
	
			div[class="column"] { width: auto!important; float:none!important;}
	
			table.social div[class="column"] {
			width:auto!important;
			}
	
			}
			</style>
	
			</head>
	
			<body bgcolor="#FFFFFF">
	
			<!-- HEADER -->
			<table class="head-wrap" bgcolor="#003576">
			<tr>
			<td></td>
			<td class="header container" >
	
			<div class="content">
			<table>
			<tr>
	
			<td align="left"><h6 class="collapse" style="font-weight: 900; font-size: 14px; text-transform: uppercase; color: #ffffff;">Гостиница в Севастополе - апартаменты Херсонес</td>
			<td align="right"><h6 class="collapse" style="font-weight: 900; font-size: 14px; text-transform: uppercase; color: #ffffff;">Обратная связь</h6></td>
			</tr>
			</table>
			</div>
	
			</td>
			<td></td>
			</tr>
			</table>
	
			<table class="body-wrap">
			<tr>
			<td></td>
			<td class="container" bgcolor="#FFFFFF">
	
			<div class="content">
			<table>
			<tr>
			<td>
			<h3>Сообщение от '.$name.'</h3>
			<p><strong>Дата заезда:</strong> '.$arrival.'</p>
			<p><strong>Дата выезда:</strong> '.$departure.'</p>
			<!-- Callout Panel -->
			<!-- social & contact -->
			<table class="social" width="100%">
			<tr>
			<td>
			<table align="left" class="column">
			<tr>
			<td>
	
			<h5 class="">Контактная информация:</h5>
			<br/>
			<p>Имя: <strong>'.$name.'</strong></p>
			<p>Email: <strong>'.$email.'</strong></p>
			<p>Телефон: <strong>'.$phone.'</strong></p>
			</td>
			</tr>
			</table>
	
			<span class="clear"></span>
	
			</td>
			</tr>
			</table>
	
			</td>
			</tr>
			</table>
			</div>
	
			</td>
			<td></td>
			</tr>
			</table>
	
			<table class="footer-wrap">
			<tr>
			<td></td>
			<td class="container"></td>
			<td></td>
			</tr>
			</table>
	
			</body>
			</html>';
		
		$send = mail($address, $email, $mes, $headers);

		if ($send == 'true'){
			$alert = array(
				'status' => 200,
				'message' => 'Ваше сообщение отправлено'
			);
		}else{
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено!'
			);
		}
	}
	
	if (isset($name) && isset($email) && isset($phone) && isset($arrival) && isset($departure)){
	}
	
	if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['arrival']) && isset($_POST['departure'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$arrival = $_POST['arrival'];
		$departure = $_POST['departure'];
		
		if(!is_email($email)) {
			$alert = array(
				'status' => 1,
				'message' => 'Email введен не верно, проверте внимательно поле!'
			);
		}

		if ($name == '' || $email == '' || $phone == '' || $arrival == '' || $departure == '') {
			unset($name);
			unset($email);
			unset($phone);
			unset($arrival);
			unset($departure);
			
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено! Заполните все поля!'
			);
		}
	}

	echo wp_send_json($alert);

	wp_die();
}
add_action('wp_ajax_lightBooking', 'lightBooking');
add_action('wp_ajax_nopriv_lightBooking', 'lightBooking');

//Форма обратной связи
function SendMini(){

	$form_adress = get_option('admin_email');
	
	$site_url = $_SERVER['SERVER_NAME'];

	$alert = array(
		'status' => 0,
		'message' => ''
	);

	if (isset($_POST['name'])) {$name = $_POST['name']; if ($name == '') {unset($name);}}
	if (isset($_POST['phone'])) {$phone = $_POST['phone']; if ($phone == '') {unset($phone);}}

	if (isset($name) && isset($phone)){

		$address = $form_adress;

		$headers  = "Content-type: text/html; charset=UTF-8 \r\n";
		$headers .= "From: $site_url\r\n";
		$headers .= "Bcc: birthday-archive@example.com\r\n";
		
		//$mes = "Имя: $name \nEmail: $email \nСтрана: $country \nСообщение: $comment \nТелефон: $phone \nПодписка на новости: $subscribe";
		
		$mes = '<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta name="viewport" content="width=device-width" />
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>ZURBemails</title>
			<style>
			img {
			max-width: 100%;
			}
			.collapse {
			margin:0;
			padding:0;
			}
			body {
			-webkit-font-smoothing:antialiased;
			-webkit-text-size-adjust:none;
			width: 100%!important;
			height: 100%;
			}
	
			a { color: #2BA6CB;}
	
			.btn {
			text-decoration:none;
			color: #FFF;
			background-color: #666;
			padding:10px 16px;
			font-weight:bold;
			margin-right:10px;
			text-align:center;
			cursor:pointer;
			display: inline-block;
			}
	
			p.callout {
			padding:15px;
			background-color:#ECF8FF;
			margin-bottom: 15px;
			}
			.callout a {
			font-weight:bold;
			color: #2BA6CB;
			}
	
			table.social {
			background-color: #ebebeb;
	
			}
			.social .soc-btn {
			padding: 3px 7px;
			font-size:12px;
			margin-bottom:10px;
			text-decoration:none;
			color: #FFF;font-weight:bold;
			display:block;
			text-align:center;
			}
			a.fb { background-color: #3B5998!important; }
			a.tw { background-color: #1daced!important; }
			a.gp { background-color: #DB4A39!important; }
			a.ms { background-color: #000!important; }
	
			.sidebar .soc-btn {
			display:block;
			width:100%;
			}
	
			table.head-wrap { width: 100%;}
	
			.header.container table td.logo { padding: 15px; }
			.header.container table td.label { padding: 15px; padding-left:0px;}
	
			table.body-wrap { width: 100%;}
	
			table.footer-wrap { width: 100%;	clear:both!important;
			}
			.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
			.footer-wrap .container td.content p {
			font-size:10px;
			font-weight: bold;
	
			}
	
			h1,h2,h3,h4,h5,h6 {
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
			}
			h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }
	
			h1 { font-weight:200; font-size: 44px;}
			h2 { font-weight:200; font-size: 37px;}
			h3 { font-weight:500; font-size: 27px;}
			h4 { font-weight:500; font-size: 23px;}
			h5 { font-weight:900; font-size: 17px;}
			h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#ffffff;}
	
			.collapse { margin:0!important;}
	
			p, ul {
			font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
			margin-bottom: 10px;
			font-weight: normal;
			font-size:14px;
			line-height:1.6;
			}
			p.lead { font-size:17px; }
			p.last { margin-bottom:0px;}
	
			ul li {
			font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
			margin-left:5px;
			list-style-position: inside;
			}
	
			ul.sidebar {
			font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
			background:#ebebeb;
			display:block;
			list-style-type: none;
			}
			ul.sidebar li { display: block; margin:0;}
			ul.sidebar li a {
			text-decoration:none;
			color: #666;
			padding:10px 16px;
			margin-right:10px;
			cursor:pointer;
			border-bottom: 1px solid #777777;
			border-top: 1px solid #FFFFFF;
			display:block;
			margin:0;
			}
			ul.sidebar li a.last { border-bottom-width:0px;}
			ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}
	
			.container {
			font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
			display:block!important;
			max-width:600px!important;
			margin:0 auto!important;
			clear:both!important;
			}
	
			.content {
			padding:15px;
			max-width:600px;
			margin:0 auto;
			display:block;
			}
	
			.content table { width: 100%; }
	
			.column {
			width: 300px;
			float:left;
			}
			.column tr td { padding: 15px; }
			.column-wrap {
			padding:0!important;
			margin:0 auto;
			max-width:600px!important;
			}
			.column table { width:100%;}
			.social .column {
			width: 280px;
			min-width: 279px;
			float:left;
			}
	
	
			.clear { display: block; clear: both; }
	
			@media only screen and (max-width: 600px) {
	
			a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}
	
			div[class="column"] { width: auto!important; float:none!important;}
	
			table.social div[class="column"] {
			width:auto!important;
			}
	
			}
			</style>
	
			</head>
	
			<body bgcolor="#FFFFFF">
	
			<!-- HEADER -->
			<table class="head-wrap" bgcolor="#003576">
			<tr>
			<td></td>
			<td class="header container" >
	
			<div class="content">
			<table>
			<tr>
	
			<td align="left"><h6 class="collapse" style="font-weight: 900; font-size: 14px; text-transform: uppercase; color: #ffffff;">Гостиница в Севастополе - апартаменты Херсонес</td>
			<td align="right"><h6 class="collapse" style="font-weight: 900; font-size: 14px; text-transform: uppercase; color: #ffffff;">Обратная связь</h6></td>
			</tr>
			</table>
			</div>
	
			</td>
			<td></td>
			</tr>
			</table>
	
			<table class="body-wrap">
			<tr>
			<td></td>
			<td class="container" bgcolor="#FFFFFF">
	
			<div class="content">
			<table>
			<tr>
			<td>
			<h3>Сообщение от '.$name.'</h3>
			<!-- Callout Panel -->
			<!-- social & contact -->
			<table class="social" width="100%">
			<tr>
			<td>
			<table align="left" class="column">
			<tr>
			<td>
	
			<h5 class="">Контактная информация:</h5>
			<br/>
			<p>Имя: <strong>'.$name.'</strong></p>
			<p>Телефон: <strong>'.$phone.'</strong></p>
			</td>
			</tr>
			</table>
	
			<span class="clear"></span>
	
			</td>
			</tr>
			</table>
	
			</td>
			</tr>
			</table>
			</div>
	
			</td>
			<td></td>
			</tr>
			</table>
	
			<table class="footer-wrap">
			<tr>
			<td></td>
			<td class="container"></td>
			<td></td>
			</tr>
			</table>
	
			</body>
			</html>';
		
		$send = mail($address, $phone, $mes, $headers);

		if ($send == 'true'){
			$alert = array(
				'status' => 200,
				'message' => 'Ваше сообщение отправлено'
			);
		}else{
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено!'
			);
		}
	}
	
	if (isset($_POST['name']) && isset($_POST['phone'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];

		if ($name == '' || $phone == '') {
			unset($name);
			unset($phone);
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено! Заполните все поля!'
			);
		}
	}

	echo wp_send_json($alert);

	wp_die();
}
add_action('wp_ajax_SendMini', 'SendMini');
add_action('wp_ajax_nopriv_SendMini', 'SendMini');

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
**********************************************************************"РАЗДЕЛ НОВОСТИ"*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела новости
function register_post_type_news() {
	$labels = array(
	 'name' => 'Новости',
	 'singular_name' => 'Новости',
	 'add_new' => 'Добавить новость',
	 'add_new_item' => 'Добавить новую новость',
	 'edit_item' => 'Редактировать новость',
	 'new_item' => 'Новая новость',
	 'all_items' => 'Все новости',
	 'view_item' => 'Просмотр новостей на сайте',
	 'search_items' => 'Искать новость',
	 'not_found' => 'Новость не найден.',
	 'not_found_in_trash' => 'В корзине нет статьи.',
	 'menu_name' => 'Новости'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => false,
		 'menu_icon' => 'dashicons-id-alt', // иконка в меню
		 'menu_position' => 20,
		 'supports' =>  array('title','editor', 'thumbnail'),
	 );
 	register_post_type('news', $args);
}
add_action( 'init', 'register_post_type_news' );

function true_post_type_news( $news ) {
	global $post, $post_ID;

	$news['news'] = array(
			0 => '',
			1 => sprintf( 'Новости обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			2 => 'Новость обновлёна.',
			3 => 'Новость удалёна.',
			4 => 'Новость обновлена.',
			5 => isset($_GET['revision']) ? sprintf( 'Статья восстановлена из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( 'Новость опубликована на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			7 => 'Новость сохранена.',
			8 => sprintf( 'Отправлена на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( 'Запланирована на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $news;
}
add_filter( 'post_updated_messages', 'true_post_type_news' );
	
//Категории для пользовательских записей "Новости"
function create_taxonomies_news()
{
    // Cats Categories
    register_taxonomy('news-list',array('news'),array(
        'hierarchical' => true,
        'label' => 'Рубрики',
        'singular_name' => 'Рубрика',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'news-list' )
    ));
}
add_action( 'init', 'create_taxonomies_news', 0 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
**********************************************************************"РАЗДЕЛ АКЦИИ"*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела акции
function register_post_type_action() {
	$labels = array(
	 'name' => 'Акции',
	 'singular_name' => 'Акции',
	 'add_new' => 'Добавить акцию',
	 'add_new_item' => 'Добавить новую акцию',
	 'edit_item' => 'Редактировать акцию',
	 'new_item' => 'Новая акция',
	 'all_items' => 'Все акции',
	 'view_item' => 'Просмотр акций на сайте',
	 'search_items' => 'Искать акцию',
	 'not_found' => 'Акции не найден.',
	 'not_found_in_trash' => 'В корзине нет акций.',
	 'menu_name' => 'Акции'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => false,
		 'menu_icon' => 'dashicons-lightbulb', // иконка в меню
		 'menu_position' => 20,
		 'supports' =>  array('title','editor', 'thumbnail'),
	 );
 	register_post_type('action', $args);
}
add_action( 'init', 'register_post_type_action' );

function true_post_type_action( $action ) {
	global $post, $post_ID;

	$action['action'] = array(
			0 => '',
			1 => sprintf( 'Акции обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			2 => 'Акция обновлёна.',
			3 => 'Акция удалёна.',
			4 => 'Акция обновлена.',
			5 => isset($_GET['revision']) ? sprintf( 'Статья восстановлена из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( 'Акция опубликована на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			7 => 'Акция сохранена.',
			8 => sprintf( 'Отправлена на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( 'Запланирована на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $action;
}
add_filter( 'post_updated_messages', 'true_post_type_action' );
	
//Категории для пользовательских записей "Акции"
function create_taxonomies_action()
{
    // Cats Categories
    register_taxonomy('action-list',array('action'),array(
        'hierarchical' => true,
        'label' => 'Рубрики',
        'singular_name' => 'Рубрика',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'action-list' )
    ));
}
add_action( 'init', 'create_taxonomies_action', 0 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
******************************************************************"РАЗДЕЛ ОТЗЫВЫ ЗВЕЗДНЫХ ГОСТЕЙ"**********************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела отзывы звездных гостей
function register_post_type_reviews_stars() {
	$labels = array(
	 'name' => 'Отзывы',
	 'singular_name' => 'Отзывы',
	 'add_new' => 'Добавить отзыв',
	 'add_new_item' => 'Добавить новый отзыв',
	 'edit_item' => 'Редактировать отзыв',
	 'new_item' => 'Новый отзыв',
	 'all_items' => 'Все отзывы',
	 'view_item' => 'Просмотр отзывы на сайте',
	 'search_items' => 'Искать отзыв',
	 'not_found' => 'Отзыв не найден.',
	 'not_found_in_trash' => 'В корзине нет отзывов.',
	 'menu_name' => 'Отзывы'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => true,
		 'show_ui' => true,
		 'has_archive' => false,
		 'menu_icon' => 'dashicons-thumbs-up', // иконка в меню
		 'menu_position' => 20,
		 'supports' =>  array('title','editor', 'thumbnail'),
		 'publicly_queryable'  => false,
		 'query_var'           => false
	 );
 	register_post_type('reviews-stars', $args);
}
add_action( 'init', 'register_post_type_reviews_stars' );

function true_post_type_reviews_stars( $reviews_stars ) {
	global $post, $post_ID;

	$reviews_stars['reviews_stars'] = array(
			0 => '',
			1 => sprintf( 'Отзывы обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			2 => 'Отзыв обновлён.',
			3 => 'Отзыв удалён.',
			4 => 'Отзыв обновлен.',
			5 => isset($_GET['revision']) ? sprintf( 'Отзыв восстановлен из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( 'Отзыв опубликован на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			7 => 'Отзыв сохранен.',
			8 => sprintf( 'Отправлена на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( 'Запланирована на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $reviews_stars;
}
add_filter( 'post_updated_messages', 'true_post_type_reviews_stars' );

//Добавление редиректа на 404
function redirect_cpt_singular_posts() {
	if ( is_singular('reviews_stars') ) {
	  global $wp_query;
	  $wp_query->set_404();
	}
}
add_action( 'template_redirect', 'redirect_cpt_singular_posts' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*************************************************************************"РАЗДЕЛ НОМЕРА"*******************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела номера для бронирования
function register_post_type_booking_rooms() {
	$labels = array(
	 'name' => 'Номера для бронирования',
	 'singular_name' => 'Номера для бронирования',
	 'add_new' => 'Добавить номер',
	 'add_new_item' => 'Добавить новый номер',
	 'edit_item' => 'Редактировать номер',
	 'new_item' => 'Новый номер',
	 'all_items' => 'Все номера',
	 'view_item' => 'Просмотр номера на сайте',
	 'search_items' => 'Искать номер',
	 'not_found' => 'Номера не найден.',
	 'not_found_in_trash' => 'В корзине нет номеров.',
	 'menu_name' => 'Номера для бронирования'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => false,
		 'menu_icon' => 'dashicons-building', // иконка в меню
		 'menu_position' => 20,
		 'supports' =>  array('title','editor', 'thumbnail'),
	 );
 	register_post_type('booking-rooms', $args);
}
add_action( 'init', 'register_post_type_booking_rooms' );

function true_post_type_booking_rooms( $booking_rooms ) {
	global $post, $post_ID;

	$booking_rooms['booking_rooms'] = array(
			0 => '',
			1 => sprintf( 'Номера обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			2 => 'Номер обновлён.',
			3 => 'Номер удалён.',
			4 => 'Номер обновлен.',
			5 => isset($_GET['revision']) ? sprintf( 'Номер восстановлен из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( 'Номер опубликован на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			7 => 'Номер сохранен.',
			8 => sprintf( 'Отправлена на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( 'Запланирована на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $booking_rooms;
}
add_filter( 'post_updated_messages', 'true_post_type_booking_rooms' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
************************************************************ПЕРЕИМЕНОВАВАНИЕ ЗАПИСЕЙ В УСЛУГИ**************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function change_post_menu_label() {
    global $menu, $submenu;
    $menu[5][0] = 'Услуги';
    $submenu['edit.php'][5][0] = 'Услуги';
    $submenu['edit.php'][10][0] = 'Добавить услугу';
    $submenu['edit.php'][16][0] = 'Новостные метки';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Услуги';
    $labels->singular_name = 'Услуги';
    $labels->add_new = 'Добавить услугу';
    $labels->add_new_item = 'Добавить услугу';
    $labels->edit_item = 'Редактировать услугу';
    $labels->new_item = 'Добавить услугу';
    $labels->view_item = 'Посмотреть услугу';
    $labels->search_items = 'Найти услугу';
    $labels->not_found = 'Не найдено';
    $labels->not_found_in_trash = 'Корзина пуста';
}
add_action( 'init', 'change_post_object_label' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE CATEGORY_TYPE SLUG*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление  из url таксономии
function true_remove_slug_from_category_news( $url, $term, $taxonomy ){

	$taxonomia_name = 'news-list';
	$taxonomia_slug = 'news-list';

	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;

	$url = str_replace('/' . $taxonomia_slug, '', $url);

	return $url;
}
add_filter( 'term_link', 'true_remove_slug_from_category_news', 10, 3 );

//Перенаправление url в случае удаления news-list
function parse_request_url_category_news( $query ){

	$taxonomia_name = 'news-list';

	if( $query['attachment'] ) :
		$condition = true;
		$main_url = $query['attachment'];
	else:
		$condition = false;
		$main_url = $query['name'];
	endif;

	$termin = get_term_by('slug', $main_url, $taxonomia_name);

	if ( isset( $main_url ) && $termin && !is_wp_error( $termin )):

		if( $condition ) {
			unset( $query['attachment'] );
			$parent = $termin->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $taxonomia_name);
				$main_url = $parent_term->slug . '/' . $main_url;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}

		switch( $taxonomia_name ):
			case 'category':{
				$query['category_name'] = $main_url;
				break;
			}
			case 'post_tag':{
				$query['tag'] = $main_url;
				break;
			}
			default:{
				$query[$taxonomia_name] = $main_url;
				break;
			}
		endswitch;

	endif;

	return $query;

}
add_filter('request', 'parse_request_url_category_news', 1, 1 );

//Удаление  из url таксономии
function true_remove_slug_from_category_action( $url, $term, $taxonomy ){

	$taxonomia_name = 'action-list';
	$taxonomia_slug = 'action-list';

	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;

	$url = str_replace('/' . $taxonomia_slug, '', $url);

	return $url;
}
add_filter( 'term_link', 'true_remove_slug_from_category_action', 10, 3 );

//Перенаправление url в случае удаления action-list
function parse_request_url_category_action( $query ){

	$taxonomia_name = 'action-list';

	if( $query['attachment'] ) :
		$condition = true;
		$main_url = $query['attachment'];
	else:
		$condition = false;
		$main_url = $query['name'];
	endif;

	$termin = get_term_by('slug', $main_url, $taxonomia_name);

	if ( isset( $main_url ) && $termin && !is_wp_error( $termin )):

		if( $condition ) {
			unset( $query['attachment'] );
			$parent = $termin->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $taxonomia_name);
				$main_url = $parent_term->slug . '/' . $main_url;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}

		switch( $taxonomia_name ):
			case 'category':{
				$query['category_name'] = $main_url;
				break;
			}
			case 'post_tag':{
				$query['tag'] = $main_url;
				break;
			}
			default:{
				$query[$taxonomia_name] = $main_url;
				break;
			}
		endswitch;

	endif;

	return $query;

}
add_filter('request', 'parse_request_url_category_action', 1, 1 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE POST_TYPE SLUG*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление sluga из url таксономии 
function remove_slug_from_post( $post_link, $post, $leavename ) {
	if ( 'booking-rooms' != $post->post_type && 'news' != $post->post_type && 'action' != $post->post_type || 'publish' != $post->post_status ) {
		return $post_link;
	}
		$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
	return $post_link;
}
add_filter( 'post_type_link', 'remove_slug_from_post', 10, 3 );

function parse_request_url_post( $query ) {
	if ( ! $query->is_main_query() )
		return;

	if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
		return;
	}

	if ( ! empty( $query->query['name'] ) ) {
		$query->set( 'post_type', array( 'post', 'booking-rooms', 'news', 'action', 'page' ) );
	}
}
add_action( 'pre_get_posts', 'parse_request_url_post' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************КОММЕНТАРИИ*************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Ajax функция добавления комментариев
function true_add_ajax_comment(){
	global $wpdb;
	$comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;

	$post = get_post($comment_post_ID);

	if ( empty($post->comment_status) ) {
		do_action('comment_id_not_found', $comment_post_ID);
		exit;
	}

	$status = get_post_status($post);

	$status_obj = get_post_status_object($status);

	/*
	 * различные проверки комментария
	 */
	if ( !comments_open($comment_post_ID) ) {
		do_action('comment_closed', $comment_post_ID);
		wp_die( __('Sorry, comments are closed for this item.') );
	} elseif ( 'trash' == $status ) {
		do_action('comment_on_trash', $comment_post_ID);
		exit;
	} elseif ( !$status_obj->public && !$status_obj->private ) {
		do_action('comment_on_draft', $comment_post_ID);
		exit;
	} elseif ( post_password_required($comment_post_ID) ) {
		do_action('comment_on_password_protected', $comment_post_ID);
		exit;
	} else {
		do_action('pre_comment_on_post', $comment_post_ID);
	}

	$comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
	$comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
	$comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;

	/*
	 * проверяем, залогинен ли пользователь
	 */
	$error_comment = array();

	$user = wp_get_current_user();
	if ( $user->exists() ) {
		if ( empty( $user->display_name ) )
			$user->display_name=$user->user_login;
		$comment_author       = $wpdb->escape($user->display_name);
		$comment_author_email = $wpdb->escape($user->user_email);
		$user_ID = get_current_user_id();
		if ( current_user_can('unfiltered_html') ) {
			if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
				kses_remove_filters(); // start with a clean slate
				kses_init_filters(); // set up the filters
			}
		}
	} else {
		if ( get_option('comment_registration') || 'private' == $status )
			$error_comment['error'] = wp_die( 'Ошибка: Вы должны зарегистрироваться или войти, чтобы оставлять комментарии.' );
	}

	$comment_type = '';

	/*
	 * проверяем, заполнил ли пользователь все необходимые поля
 	 */
	if ( '' == trim($comment_author) ||  '<p><br></p>' == $comment_author ){
		$error_comment['error'] = wp_die( 'Ошибка: Вы не ввели имя.' );
	}
	
	if ( get_option('require_name_email') && !$user->exists() ) {
		if ( 6 > strlen($comment_author_email) || '' == $comment_author_email ){
			$error_comment['error'] = wp_die( 'Ошибка: заполните необходимые поля (Имя, Email).' );
		}elseif ( !is_email($comment_author_email)){
			$error_comment['error'] = wp_die( 'Ошибка: введенный вами email некорректный.' );
		}
	}

	if ( '' == trim($comment_content) ||  '<p><br></p>' == $comment_content ){
		$error_comment['error'] = wp_die( 'Ошибка: Вы забыли про комментарий.' );
	}

	wp_json_encode($error_comment);

	/*
	 * добавляем новый коммент и сразу же обращаемся к нему
	 */
	$comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;
	$commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');
	$comment_id = wp_new_comment( $commentdata );
	$comment = get_comment($comment_id);

	die();
}
add_action('wp_ajax_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_{значение параметра action}
add_action('wp_ajax_nopriv_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_nopriv_{значение параметра action}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************ССЫЛКИ НА СЛЕДУЮЩУЮ ИЛИ ПРЕДЫДУЩУЮ СТАТЬЮ*********************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function mod_get_adjacent_post($direction = 'prev', $post_types = 'post') {
    global $post, $wpdb;

    if(empty($post)) return NULL;
    if(!$post_types) return NULL;

    if(is_array($post_types)){
        $txt = '';
        for($i = 0; $i <= count($post_types) - 1; $i++){
            $txt .= "'".$post_types[$i]."'";
            if($i != count($post_types) - 1) $txt .= ', ';
        }
        $post_types = $txt;
    }

    $current_post_date = $post->post_date;

    $join = '';
    $in_same_cat = FALSE;
    $excluded_categories = '';
    $adjacent = $direction == 'prev' ? 'previous' : 'next';
    $op = $direction == 'prev' ? '<' : '>';
    $order = $direction == 'prev' ? 'DESC' : 'ASC';

    $join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
    $where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type IN({$post_types}) AND p.post_status = 'publish'", $current_post_date), $in_same_cat, $excluded_categories );
    $sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

    $query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";
    $query_key = 'adjacent_post_' . md5($query);
    $result = wp_cache_get($query_key, 'counts');
    if ( false !== $result )
        return $result;

    $result = $wpdb->get_row("SELECT p.* FROM $wpdb->posts AS p $join $where $sort");
    if ( null === $result )
        $result = '';

    wp_cache_set($query_key, $result, 'counts');
    return $result;
}
