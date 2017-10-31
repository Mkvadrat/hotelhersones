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
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<p class="title-page">Выбор варианта бронирования</p>
					<p class="paragraph-bigger">При бронировании на нашем сайте Вы всегда получаете самые низкие цены.</p>
					<div class="divider"></div>
					
					<p class="title-italic">Ваш сказочный отдых начнется прямо сейчас!</p>
					
					<p><a class="button-white scrollto" href="#reservation-form">ОНЛАЙН БРОНИРОВАНИЕ</a><a class="button-white fancybox" href="#easy-reservation">ЛЕГКОЕ БРОНИРОВАНИЕ</a></p>
					
					<p><a href="#">Договор с физлицами</a></p>
					<p class="text-indent">С помощью приведенной ниже формы вы можете забронировать наши номера в режиме онлайн и получить гарантированную бронь. Для оплаты вы можете использовать кредитную карту, электронные деньги, безналичный расчет либо <strong>оплатить заказ на месте.</strong></p>
					
					<div id="reservation-form" class="reservation-form"><img class="image-width-full" src="/wp-content/themes/hotelhersones/images/reservation-photo.jpg" alt=""></div>
					
					<p class="title-italic-small">Заявки на бронирование номеров в отеле принимаются</p>
					
					<ul>
					<li>по телефону,</li>
					<li>по факсу,</li>
					<li>через форму бронирования on-line,</li>
					<li>по электронной почте;</li>
					<li>от имени гостя, компании (предприятия, организации и т.д.),</li>
					<li>через турагентство (туроператорскую фирму).</li>
					</ul>
					
					<p class="title-italic-small">Условия бронирования</p>
					
					<p class="text-indent">Услуга бронирования в отеле "Апартаменты Херсонес" - бесплатная. Факт бронирования подтверждает закрепление того или иного номера за гостем. Предварительное бронирование не является гарантированным бронированием. Бронирование считается гарантированным только при получении предоплаты в размере 100% стоимости первых суток проживания в течение 3 банковских дней со дня бронирования.</p>
					<p class="text-indent">При аннуляции гарантированного бронирования менее чем за 3 суток до даты предполагаемого заезда предоплата в размере стоимости 1 суток проживания гостю не возвращается.</p>
					
					<p class="title-italic-small">Форма предоплаты</p>
					
					<ol>
					<li><span>Наличными или кредитной картой в кассе отеля.</span></li>
					<li><span>Предоплата через банк.</span></li>
					<li><span>Анкета на списание средств с кредитной карты.</span></li>
					</ol>
					
					<p class="paragraph-italic-left-border">При поступлении оплаты бронь автоматически становится гарантированной</p>
					
					<p><a href="#">Агентский договор в формате Microsoft Word</a><br>
					<a href="#">Типовой договор о предоставлении гостиничных услуг для ФИЗЛИЦ в формате Microsoft Word</a></p>
					
					<p class="paragraph-italic-left-border">Оплачивая счет соглашаюсь с условиями договора</p>
				
				</div>
				<div class="col-md-4">
					<aside class="sidebar">
						<div class="form-block no-textarea">
							<form action="">
							<p class="white-title-underline">Бронирование по телефону</p>
							<input type="text" placeholder="Введите Ваше имя">
							<input type="tel" placeholder="Введите Ваш телефон">
							<p class="info">*Наши менеджеры сами<br>вам перезвонят.</p>
							<input type="submit" value="Перезвоните мне">
							</form>
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
			<form class="modal-form" action="">
			<p class="tittle-modal-form">Легкое бронирование offline</p>
			<input type="text" name="" placeholder="Имя*">
			<input type="email" name="" placeholder="E-mail: *">
			<input type="tel" name="" placeholder="Телефон: *">
			<input type="text" name="" placeholder="Дата заезда *">
			<input type="text" name="" placeholder="Дата выезда *">
			<p>Поля отмеченные * обязательны.</p>
			<div class="agree">
				<input id="agree" type="checkbox" name=""  value="">
				<label for="agree">Я принимаю условия соглашения на обработку персональных</label>
			</div>
			<button>Очистить</button>
			<input type="submit" name="" value="Отправить">
			</form>
		</div>
	</div>
	
	<!-- end modal-form -->

<?php get_footer(); ?>