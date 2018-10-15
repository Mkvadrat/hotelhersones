<?php
/*
Template name: Booking page
Theme Name: Hotelhersones
Theme URI: http://hotelhersones.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://hotelhersones.ru/
Version: 1.0
*/

get_header(); 
?>

	<!-- start main-reservation -->
	
	<div class="main-reservation">

		<!-- OtelMS -->
		<script>
			var is_safari = navigator.userAgent.indexOf("Safari") > -1; // safari detection
			if (is_safari) {
				if (!jQuery.cookie("apartmentshersones_fixed")) {
					jQuery.cookie("apartmentshersones_fixed", "fixed", { expires: 365, path: "/" }); // 1 year
					if (document.body.clientWidth > 767) {  window.location.replace("//apartmentshersones-book.otelms.com/_safari_fix.html");}
			   else { window.location.replace("//apartmentshersones-book-m.otelms.com/_safari_fix.html");}
				}
			}
		</script>
		
		<script type="text/javascript">// <![CDATA[
			var myEventMethod = window.addEventListener ? "addEventListener" : "attachEvent"; 
			var myEventListener = window[myEventMethod]; 
			var myEventMessage = myEventMethod == "attachEvent" ? "onmessage" : "message"; 
			myEventListener(myEventMessage, function(e) { 
				if (e.data === parseInt(e.data)) 
					{ document.getElementById("my-iframe-id").height = e.data + "px"; console.log(e.data); 
				} 
				}, false); 
			function getParameterByName(name) { 
				name = name.replace(/[\[]/, "\[").replace(/[\]]/, "\]"); 
				var regex = new RegExp("[\?"+"\u0026"+"]" + name + "=([^"+"\u0026"+"#]*)"), 
				results = regex.exec(location.search); 
				return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " ")); 
			} 
			// ]]>
			document.addEventListener("DOMContentLoaded", function(event) {
			var url;
			if (document.body.clientWidth > 767) {
				url = "//apartmentshersones-book.otelms.com/bookit/step1/?inline=true" + "\u0026" 
				+  "datein=" + getParameterByName("datein") + "\u0026" 
				+ "dateout=" + getParameterByName("dateout") + "\u0026" 
				+ "lang=" + getParameterByName("lang");
				}
			else {
				url = "//apartmentshersones-book-m.otelms.com/bookit/step1/?inline=true" + "\u0026" 
				+ "datein=" + getParameterByName("datein") + "\u0026" 
				+ "dateout=" + getParameterByName("dateout") + "\u0026" 
				+ "lang=" + getParameterByName("lang");
				};
			document.getElementById("my-iframe-id").src = url;
				});
			// ]]>
		</script>
		<!-- end of OtelMS -->

		<div class="container">
			<div class="row">
				<div class="col-md-8">

					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
					
					<?php echo get_post_meta( get_the_ID(), 'content_block_a_booking_page', $single = true ); ?>
					
					<p><a class="button-white scrollto" href="#reservation-form">ОНЛАЙН БРОНИРОВАНИЕ</a><a class="button-white fancybox" href="#easy-reservation">ЛЕГКОЕ БРОНИРОВАНИЕ</a></p>
				
					<?php echo get_post_meta( get_the_ID(), 'content_block_b_booking_page', $single = true ); ?>
					
					<div class="reservation-form" id="reservation-form">
						<?php echo get_post_meta( get_the_ID(), 'booking_form_booking_page', $single = true ); ?>
					</div>

					<?php echo get_post_meta( get_the_ID(), 'content_block_c_booking_page', $single = true ); ?>
				</div>
				<div class="col-md-4">
					<aside class="sidebar">
						<div class="form-block no-textarea">
							<div>
								<p class="white-title-underline">Бронирование по телефону</p>
								<input type="text" class="clear" id="name_callbackform" placeholder="Введите Ваше имя">
								<input type="text" class="clear" id="phone_callbackform" placeholder="Введите Ваш телефон">
								<p class="info">*Наши менеджеры сами<br>вам перезвонят.</p>
								<div class="agree">
									<input id="i-take-callbackform" type="checkbox">
									<label for="i-take-callbackform">Я принимаю условия соглашения на обработку персональных</label>
								</div>
	
								<input type="submit" class="agree-callbackform no-active" value="Перезвоните мне">
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
	
	<!-- end main-reservation -->

	<!-- start modal-form -->
	
	<div class="hidden">
		<div class="easy-reservation" id="easy-reservation">
			<div class="modal-form">
				<p class="tittle-modal-form">Легкое бронирование offline</p>
				<input type="text" class="reset" id="name_light_booking" placeholder="Имя*">
				<input type="email" class="reset" id="email_light_booking" placeholder="E-mail: *">
				<input type="tel" class="reset phone-mask" id="phone_light_booking" placeholder="Телефон: *">
				<input type="text" class="reset" id="arrival_light_booking" placeholder="Дата заезда *">
				<input type="text" class="reset" id="departure_light_booking" placeholder="Дата выезда *">
				<p>Поля отмеченные * обязательны.</p>
				<div class="agree">
					<input id="i-take-form" type="checkbox">
					<label for="i-take-form">Я принимаю условия соглашения на обработку персональных</label>
				</div>
				<button onclick="clearFields();">Очистить</button>
				
				<input type="submit" class="agree-booking no-active" value="Отправить">
			</div>
		</div>
	</div>
	
	<!-- end modal-form -->

<script type="text/javascript">
$(document).ready(function() {
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
});
</script>

<script type="text/javascript">
$(document).ready(function() {
	var checkbox_callbackform = $("#i-take-callbackform");
	
	checkbox_callbackform.change(function(event) {
		var checkbox_callbackform = event.target;
		if (checkbox_callbackform.checked) {
			$( ".agree-callbackform" ).replaceWith('<input type="submit" class="agree-callbackform active" onclick="SendMini(); return true;" value="Перезвоните мне">');
		}else{
			$( ".agree-callbackform" ).replaceWith('<input type="submit" class="agree-callbackform no-active" value="Перезвоните мне">');
		}
	});
});
</script>
	
<script type="text/javascript">
//форма обратной связи
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
	  url:'http://' + location.host + '/wp-admin/admin-ajax.php',
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
};

function clearFields(){
	$('.reset').val('');
	$('#i-take-form').removeAttr('checked');
	$( ".agree-booking" ).replaceWith('<input type="submit" class="agree-booking no-active" value="Отправить">');
}
</script>

<script type="text/javascript">
//форма обратной связи
function SendMini() {
	var data = {
		'action': 'SendMini',
		'name' : $('#name_callbackform').val(),
		'phone' : $('#phone_callbackform').val()
	};
	$.ajax({
	  url:'http://' + location.host + '/wp-admin/admin-ajax.php',
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
};
</script>

<script type="text/javascript">
$(document).ready(function() {
	$(".phone-mask").mask("+7(999) 999-9999");
});
</script>

<?php get_footer(); ?>