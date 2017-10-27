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
                    
					<?php echo get_post_meta( get_the_ID(), 'content_contacts_page', $single = true ); ?> 
                
                    <div class="map-block">
						<?php $sevastopol = get_post_meta( get_the_ID(), 'address_contact_page', $single = true ); ?> 
						
						<script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
						<div id="sevastopol" style="width:100; height:240px"></div>
						<script type="text/javascript">
							var sevastopolMap, sevastopolPlacemark, sevastopolcoords;
							ymaps.ready(init);
							function init () {
								//Определяем начальные параметры карты
								sevastopolMap = new ymaps.Map('sevastopol', {
										center: [<?php if(!empty($sevastopol)){ ?><?php echo $sevastopol; ?><?php }else{ echo '56.326944, 44.0075'; } ?>], 
										zoom: 17
									});	
								//Определяем элемент управления поиск по карте	
								var SearchControl = new ymaps.control.SearchControl({noPlacemark:true});	
								//Добавляем элементы управления на карту
								 sevastopolMap.controls              
									//.add('zoomControl')                
									.add('typeSelector') 
								sevastopolcoords = [<?php if(!empty($sevastopol)){ ?><?php echo $sevastopol; ?><?php }else{ echo '56.326944, 44.0075'; } ?>];
								//Определяем метку и добавляем ее на карту				
								sevastopolPlacemark = new ymaps.Placemark([<?php if(!empty($sevastopol)){ ?><?php echo $sevastopol; ?><?php }else{ echo '56.326944, 44.0075'; } ?>],{}, {preset: "twirl#redIcon", draggable: true});	
								sevastopolMap.geoObjects.add(sevastopolPlacemark);			
							}
						</script>
                    </div>
                
                </div>
                <div class="col-md-4">
                    <aside class="sidebar">
                        <div class="form-block">
                            <div>
                                <p class="white-title-underline">Форма обратной связи</p>
                                <input type="text" id="name" placeholder="Введите Ваше имя">
                                <input type="text" id="phone" placeholder="Ваш телефон / e-mail">
                                <textarea name="" id="message" placeholder="Текст сообщения"></textarea>
                                <p class="info">*Задайте ваш вопрос.<br>Наши менеджеры сами<br>вам перезвонят.</p>
                                <input type="submit" onclick="SendForm();" value="отправить">
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>  
    </div>
    
    <!-- end main-contacts -->

<script type="text/javascript">
//форма обратной связи
function SendForm() {
	var data = {
		'action': 'SendForm',
		'name' : $('#name').val(),
        'phone' : $('#phone').val(),
		'message' : $('#message').val()
	};
	$.ajax({
		url:'http://' + location.host + '/wp-admin/admin-ajax.php',
		data:data,
		type:'POST',
		success:function(data){
			swal(data.message);
		}
	});
};
</script>

<?php get_footer(); ?>