document.addEventListener(
    "DOMContentLoaded", () => {
        new Mmenu("nav#menu", {
            "extensions": [
				'fx-listitems-slide', 'fx-panels-zoom', 'fx-listitems-slide', 'multiline', 'shadow-page', 'shadow-panels', 'listview-large', 'pagedim-black'
            ]
        }, {
            clone: true
        });
    }
);

function submit(){
    $(".reviews-form").submit();
}

function SendForm() {
	var data = {
		'action': 'SendForm',
		'name' : $('#name').val(),
        'phone' : $('#phone').val(),
		'message' : $('#message').val()
	};
	$.ajax({
		url:'https://' + location.host + '/wp-admin/admin-ajax.php',
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
}

function lightBooking() {
	var data = {
	  'action': 'lightBooking',
	  'name' : $('#name_light_booking').val(),
	  'email' : $('#email_light_booking').val(),
	  'phone' : $('#phone_light_booking').val(),
	  'arrival' : $('#arrival_light_booking').val(),
	  'departure' : $('#departure_light_booking').val(),
	};
	$.ajax({
	  url:'https://' + location.host + '/wp-admin/admin-ajax.php',
	  data:data, // данные
	  type:'POST', // тип запроса
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
			  $( ".agree-booking" ).replaceWith('<input type="submit" class="agree-booking no-active" value="Отправить">');
		  }
		  
		  $.fancybox.close();
	  }
	});
}

function clearFields(){
	$('.reset').val('');
	$('#i-take-form').removeAttr('checked');
	$( ".agree-booking" ).replaceWith('<input type="submit" class="agree-booking no-active" value="Отправить">');
}

function SendMini() {
	var data = {
		'action': 'SendMini',
		'name' : $('#name_callbackform').val(),
		'phone' : $('#phone_callbackform').val()
	};
	$.ajax({
	  url:'https://' + location.host + '/wp-admin/admin-ajax.php',
	  data:data, // данные
	  type:'POST', // тип запроса
	  success:function(data){
		  swal({
			  title: data.message,
			  text: "",
			  timer: 1000,
			  showConfirmButton: false
		  });
		  
		  if(data.status == 200) {
			$('.clear').val('');
			$('#i-take-callbackform').removeAttr('checked');
			$( ".agree-callbackform" ).replaceWith('<input type="submit" class="agree-callbackform no-active" value="Перезвоните мне">');
		  }
	  }
	});
}

var sevastopolMap, sevastopolPlacemark, sevastopolcoords;
							
var inputValue = $('#sevastopol').attr('data-maps') ? $('#sevastopol').attr('data-maps') : 0;

if (inputValue.length > 0) {
    ymaps.ready(init);
    
    var coords = inputValue.trim().split(',');
    coords = coords.map(function (coord) {
        return parseFloat(coord.trim());
    });
    
    function init () {
        var longitude = coords[0],
            latitude  = coords[1];
    
        //Определяем начальные параметры карты
        sevastopolMap = new ymaps.Map('sevastopol', {
                center: [longitude, latitude], 
                zoom: 17
            });	
        //Определяем элемент управления поиск по карте	
        var SearchControl = new ymaps.control.SearchControl({noPlacemark:true});	
        //Добавляем элементы управления на карту
         sevastopolMap.controls              
            //.add('zoomControl')                
            .add('typeSelector') 
        sevastopolcoords = [longitude, latitude];
        //Определяем метку и добавляем ее на карту				
        sevastopolPlacemark = new ymaps.Placemark([longitude, latitude],{}, {preset: "twirl#redIcon", draggable: true});	
        sevastopolMap.geoObjects.add(sevastopolPlacemark);			
    }
}

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

$(document).ready(function () {
	// FancyBox
	$(".fancybox").fancybox();
    
    //phone-mask
    $(".phone-mask").mask("+7(999) 999-9999");

	// owl-carousel
	$('.header-slider').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        items:1,
        mouseDrag:true,
        touchDrag:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:7000,
		smartSpeed: 3000
    });

    $('.reviews-slider').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        items:1,
        mouseDrag:true,
        touchDrag:true,
        dots:true,
        autoplay:false,
        autoplayTimeout:5000
    });

    $('.room-slider').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        navText:false,
        items:1,
        mouseDrag:true,
        touchDrag:true,
        dots:true,
        autoplay:false,
        autoplayTimeout:5000
    });

	//Плавный скролл до блока .div по клику на .scroll
	$("a.scroll").click(function() {
		$.scrollTo($(".div"), 800, {
			offset: -90
		});
	});

    // ПЛАВНЫЙ СКРОЛЛ К ЯКОРЮ
	$("a.scrollto").click(function () {
		var elementClick = $(this).attr("href")
		var destination = $(elementClick).offset().top;
		jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 500);
		return false;
	});

    // Кнопка на верх
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();
		} else {
			$('#toTop').fadeOut();
		}
	});

	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});

    // PARALAX
    $window = $(window);

    $('div[data-type="background"]').each(function(){
        var $bgobj = $(this);
        $(window).scroll(function() {
            var yPos = ($window.scrollTop() / $bgobj.data('speed'));
            var coords = '45% '+ yPos + 'px';
            $bgobj.css({ backgroundPosition: coords });
        });
    });

    if(document.location.href=="https://hotelhersones.ru/") {
        $('.wrap-sale-banner').addClass('banner-main');
    }
    
    $('.back').click(function(){
		parent.history.back();
		return false;
	});
	
    /*************************************************************************other form*****************************************************************/
    $('.check__block *[name="confirm"]').prop( "checked", false );
    $('.button__group *[type="submit"]').attr('disabled', 'disabled');
    
    //Форма оплаты
    $('.check__block *[name="confirm"]').on('change', function () {
        if ($(this).is(':checked')) {
            $('.button__group *[type="submit"]').removeAttr('disabled');
        } else {
            $('.button__group *[type="submit"]').attr('disabled', 'disabled');
        }
    });
    
    //run when the DOM is ready
	$('.close').click(function() {  //use a class, since your ID gets mangled
		$('.booking__banner').addClass('hidden');      //add the class to the clicked element
	});
    
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
    /*************************************************************************other form*****************************************************************/
    
    /*************************************************************************booking form*****************************************************************/
    if($(window).load()){
		$(".reset").val('');
		$(".clear").val('');
		$('#i-take-form').removeAttr('checked');
		$('#i-take-callbackform').removeAttr('checked');
		$(".agree-booking").replaceWith('<input type="submit" class="agree-booking no-active" value="Отправить">');
		$( ".agree-callbackform" ).replaceWith('<input type="submit" class="agree-callbackform no-active" value="Перезвоните мне">');
	}
	
	var checkbox_booking = $("#i-take-form");
	
	checkbox_booking.change(function(event) {
		var checkbox_booking = event.target;
		if (checkbox_booking.checked) {
			$( ".agree-booking" ).replaceWith('<input type="submit" class="agree-booking active" onclick="lightBooking(); return true;" value="Отправить">');
		}else{
			$( ".agree-booking" ).replaceWith('<input type="submit" class="agree-booking no-active" value="Отправить">');
		}
	});
    
    var checkbox_callbackform = $("#i-take-callbackform");
	
	checkbox_callbackform.change(function(event) {
		var checkbox_callbackform = event.target;
		if (checkbox_callbackform.checked) {
			$( ".agree-callbackform" ).replaceWith('<input type="submit" class="agree-callbackform active" onclick="SendMini(); return true;" value="Перезвоните мне">');
		}else{
			$( ".agree-callbackform" ).replaceWith('<input type="submit" class="agree-callbackform no-active" value="Перезвоните мне">');
		}
	});
    
    /*************************************************************************booking form*****************************************************************/
});

 $( "#send_paying" ).click(function() {
    var widget = new cp.CloudPayments();

    var data = { //данные дарителя
        name: $('#name_customer').val(),
        lastName: $('#surname_customer').val(),
        phone: $('#phone_customer').val()
    };

    var amount = parseFloat($('#amount_customer').val());
    var accountId = $('#email_customer').val();

    widget.charge({ // options
        publicId: 'pk_5634480a545e8801fc0acb7786b1f', //id из личного кабинета
        description: 'Оплата номера', //назначение
        amount: amount ? amount : 1, //сумма
        currency: 'RUB', //валюта
        accountId: accountId, //идентификатор плательщика (обязательно для создания подписки)
        email: accountId,
        data: data
    },
    function (options) { // success
        //действие при успешной оплате
        window.location.href = "https://hotelhersones.ru/success/";
    },
    function (reason, options) { // fail
        //действие при неуспешной оплате
        window.location.href = "https://hotelhersones.ru/error-payment/";
    });
    
    $.fancybox.close(); 
});