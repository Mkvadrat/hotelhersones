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
    
    <div class="main-rooms">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                    
                    <?php
                        $category = get_queried_object();
                    ?>
                    
					<h1 class="title-page"><?php echo $category->name; ?></h1>
                    
                    <div class="divider"></div>
					
                     <?php echo get_term_meta($category->term_id, 'text_category_action_page', true); ?>
                    
					<div class="divider"></div>
                    
                    <?php
                        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'action-list',
                                    'field'    => 'id',
                                    'terms'    => array( $category->term_id ),
                                ),
                            ),
                            'post_type'   => 'action',
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'post_status'    => 'publish',
                            'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
                            'paged'          => $current_page,
                        );
                        
                        $action_list = get_posts( $args );
                    ?>
                    <?php if($action_list){ ?>

					<ul class="list-two-rooms">
                        <?php foreach($action_list as $action){ ?>
                        <?php
                            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($action->ID), 'full');
                            $descr = wp_trim_words( $action->post_content, 30, '...' );
                            $link = get_permalink($action->ID);
                        ?>
                            <li class="half-block-number bottom" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/images/services-4.jpg'; ?>');">
                                <p class="title"><?php echo $action->post_title; ?></p>
                                <a class="button-transparent" href="<?php echo $link; ?>">Подробнее</a>
                            </li>
                        <?php } ?>
						<?php //wp_reset_postdata(); ?>
                        <?php }else{ ?>
                            <li>В данной категории акций не найдено!</li>
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
					<div class="col-md-12">
						<ul class="bread-crumbs second">
                            <?php foreach ($pagination as $pag){ ?>
                                <li><?php echo $pag; ?></li>
                            <?php } ?>
                        </ul>
					</div>
                    <?php } ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>