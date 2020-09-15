<?php
/*
Template name: Actions page
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
                    
					<?php echo get_field('title_block_main_action_page'); ?>
                    
                    <?php echo get_field('text_block_main_action_page'); ?>
					
					<div class="divider"></div>				
	
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
		
<?php get_footer(); ?>