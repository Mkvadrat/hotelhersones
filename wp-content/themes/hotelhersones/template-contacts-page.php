<?php
/*
Template name: Contacts page
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header(); 
?>

    <!-- start main-contacts -->
    
    <div class="main-contacts">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
				<script type="application/ld+json">
					{
						"@context": "http://schema.org/",
						"@type": "Organization",
						"name": "Апартаменты Херсонес",
						"url": "http://hersones.mkvadrat.pw",
						"logo": "http://hersones.mkvadrat.pw/wp-content/themes/hotelhersones/images/logo.png",
						"address":
							{
								"@type": "PostalAddress",
								"addressLocality": "АР Крым, г. Севастополь",
								"postalCode": "299045",
								"streetAddress": "ул. Древняя, 34"
							},
						"email": "hotel-hersones@mail.ru",
						"telephone": "+7 978 832 98 40, +7 8692 24 15 87",
						"faxNumber": "+7 8692 23 13 03"
					}
				</script>
                    <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                    
					<?php echo get_post_meta( get_the_ID(), 'content_contacts_page', $single = true ); ?> 
                
                    <div class="map-block">
						<div id="sevastopol" data-maps="<?php echo getMeta('address_contact_page'); ?>" style="width:100; height:280px"></div>
                    </div>
                
                </div>
                <div class="col-md-4">
                    <aside class="sidebar">
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
    
    <!-- end main-contacts -->
                            
<?php get_footer(); ?>