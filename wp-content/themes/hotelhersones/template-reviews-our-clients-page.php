<?php
/*
Template name: Reviews our clients page
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header(); 
?>
    
	<!-- start main-reviews-2 -->
	
	<div class="main-reviews-2">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php echo get_post_meta( get_the_ID(), 'text_block_reviews_our_clients_page', $single = true ); ?>
					<?php 
					
						define( 'DEFAULT_COMMENTS_PER_PAGE', $GLOBALS['wp_query']->query_vars['comments_per_page']);
					
						$page = (get_query_var('page')) ? get_query_var('page') : 1;
					
						$limit = DEFAULT_COMMENTS_PER_PAGE;
					
						$offset = ($page * $limit) - $limit;
					
						$param = array(
							'status'	=> 'approve',
							'offset'	=> $offset,
							'post_parent ' => '554,561',
							'number'	=> $limit
						);
					
						$total_comments = get_comments(array(
							'orderby' => 'comment_date',
							'order'   => 'ASC',
							'status'  => 'approve',
							'parent'  => 0
					
						));
					
						$pages = ceil(count($total_comments)/DEFAULT_COMMENTS_PER_PAGE);
					
						$comments = get_comments( $param );
					
						$args = array(
							'base'         => @add_query_arg('page','%#%'),
							'format'       => '?page=%#%',
							'total'        => $pages,
							'current'      => $page,
							'show_all'     => false,
							'mid_size'     => 4,
							'prev_next'    => true,
							'prev_text'    => __('Предыдущая страница'),
							'next_text'    => __('Следующая страница'),
							//'type'         => 'comment'
							'type' => 'array'
						);
						
						if($comments){
					?>
					<ul class="list-reviews-2">
					<?php
						foreach($comments as $comment){
							global $cnum;
					
							// определяем первый номер, если включено разделение на страницы
					
							$per_page = $limit;
					
							if( $per_page && !isset($cnum) ){
								$com_page = $page;
								if($com_page>1)
									$cnum = ($com_page-1)*(int)$per_page;
							}
							// считаем
							$cnum = isset($cnum) ? $cnum+1 : 1;
					?>
						<li>
							<p class="autor"><?php echo get_comment_author($comment->comment_ID); ?></p>
							<p><?php echo $comment->comment_content; ?></p>
							<p class="autor"><time><?php comment_date( 'd.m.y', $comment->comment_ID ); ?></time></p>
						</li>		
					<?php } ?>
					
					
					<?php } ?>
					</ul>
					<?php //echo paginate_links( $args ); ?>
					<?php $pagination = paginate_links($args);
						
					if($pagination){
					?>
					<div class="col-md-12">
						<ul class="bread-crumbs">
							<?php foreach ($pagination as $pag){ ?>
								<li><?php echo $pag; ?></li>
							<?php } ?>
						</ul>
					</div>
					<?php } ?>
				</div>
				<div class="col-md-4">
					<aside class="sidebar">
						<?php echo get_post_meta( get_the_ID(), 'category_reviews_our_clients_page', $single = true ); ?>
						
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
							<?php echo get_post_meta( get_the_ID(), 'social_links_block_reviews_our_clients_page', $single = true ); ?>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
	
	<!-- end main-reviews-2 -->
	
<script language="javascript">
    function submit(){
        $(".reviews-form").submit();
    }
</script>
 
<?php get_footer(); ?>