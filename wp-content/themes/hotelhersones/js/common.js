$(document).ready(function(){
	// FancyBox
	$(".fancybox").fancybox();

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
    })

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
    })

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
    })

    // MMENU
	$('nav#menu').mmenu({
		extensions  : [ 'fx-listitems-slide', 'fx-panels-zoom', 'fx-listitems-slide', 'multiline', 'shadow-page', 'shadow-panels', 'listview-large', 'pagedim-black' ]
	});

    $('.mm-navbar .mm-title').text('Меню');

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
	
    //run when the DOM is ready
	$('.close').click(function() {  //use a class, since your ID gets mangled
		$('.booking__banner').addClass('hidden');      //add the class to the clicked element
	});
});