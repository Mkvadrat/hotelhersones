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
						<?php $sevastopol = get_post_meta( get_the_ID(), 'address_contact_page', $single = true ); ?> 

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

<script type="text/javascript">
$(document).ready(function() {
	if($(window).load()){
		$(".reset").val('');
		$('#i-take-form').removeAttr('checked');
		$(".agree-button").replaceWith('<input type="submit" class="agree-button no-active" value="Отправить">');
	}
	
	var checkbox_booking = $("#i-take-form");
	
	checkbox_booking.change(function(event) {
		var checkbox_booking = event.target;
		if (checkbox_booking.checked) {
			$( ".agree-button" ).replaceWith('<input type="submit" class="agree-button active" onclick="SendForm(); return true;" value="Отправить">');
		}else{
			$( ".agree-button" ).replaceWith('<input type="submit" class="agree-button no-active" value="Отправить">');
		}
	});
});
</script>

<script type="text/javascript">
ymaps.ready(function () {
    var myMap = new ymaps.Map('route', {
        center: [44.607695, 33.495107],
        zoom: 17,
        // Добавим панель маршрутизации.
        controls: ['routePanelControl']
    });

    var control = myMap.controls.get('routePanelControl');

    // Зададим состояние панели для построения машрутов.
    control.routePanel.state.set({
        // Тип маршрутизации.
        type: 'masstransit',
        // Выключим возможность задавать пункт отправления в поле ввода.
        fromEnabled: false,
        // Адрес или координаты пункта отправления.
        from: 'Крым, г. Севастополь, ул. Древняя, 34',
        // Включим возможность задавать пункт назначения в поле ввода.
        toEnabled: true
        // Адрес или координаты пункта назначения.
        //to: 'Петербург'
    });

    // Зададим опции панели для построения машрутов.
    control.routePanel.options.set({
        // Запрещаем показ кнопки, позволяющей менять местами начальную и конечную точки маршрута.
        allowSwitch: false,
        // Включим определение адреса по координатам клика.
        // Адрес будет автоматически подставляться в поле ввода на панели, а также в подпись метки маршрута.
        reverseGeocoding: true,
        // Зададим виды маршрутизации, которые будут доступны пользователям для выбора.
        types: { masstransit: true, pedestrian: true, taxi: true }
    });

    // Создаем кнопку, с помощью которой пользователи смогут менять местами начальную и конечную точки маршрута.
    var switchPointsButton = new ymaps.control.Button({
        data: {content: "Поменять местами", title: "Поменять точки местами"},
        options: {selectOnClick: false, maxWidth: 160}
    });
    // Объявляем обработчик для кнопки.
    switchPointsButton.events.add('click', function () {
        // Меняет местами начальную и конечную точки маршрута.
        control.routePanel.switchPoints();
    });
    myMap.controls.add(switchPointsButton);
});
</script>
                            
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
			swal({
				title: data.message,
				text: "",
				timer: 1000,
				showConfirmButton: false
			});
			
			if(data.status == 200) {
				$('.reset').val('');
				$('#i-take-form').removeAttr('checked');
				$( ".agree-button" ).replaceWith('<input type="submit" class="agree-button no-active" value="Отправить">');
			}
		}
	});
};
</script>

<?php get_footer(); ?>