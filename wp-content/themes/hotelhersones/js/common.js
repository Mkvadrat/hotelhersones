$(document).ready(function() {

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
        autoplayTimeout:5000
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
    $(function() {
        $('nav#menu').mmenu({
            extensions  : [ 'fx-menu-slide', 'shadow-page', 'shadow-panels', 'listview-large', 'pagedim-black' ]
        });
    });

	//Плавный скролл до блока .div по клику на .scroll
	$("a.scroll").click(function() {
		$.scrollTo($(".div"), 800, {
			offset: -90
		});
	});

    // Кнопка на верх
    $(function() {
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
    });

    // PARALAX

    $(document).ready(function(){
        $window = $(window);
        $('div[data-type="background"]').each(function(){
         var $bgobj = $(this);
         $(window).scroll(function() {
            var yPos = ($window.scrollTop() / $bgobj.data('speed')); 
            var coords = '45% '+ yPos + 'px';
            $bgobj.css({ backgroundPosition: coords });
        }); 
     });    
    });

});