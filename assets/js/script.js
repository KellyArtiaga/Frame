var deleteLog = true;

$(document).ready(function() {
    // PapePiling
    $('#pagepiling').pagepiling({
        menu: '#menu, #menu-mobile',
        scrollingSpeed: 400,
        navigation: false,
        easing: 'linear',
        touchSensitivity: 3,
        anchors: ['home', 'nossa-historia', 'cases', 'solucoes', 'design-sessions','grupoframework', 'facaparte',  'contato'],
        //normalScrollElements: '.slider-parceiros-for, slider-parceiros-nav',
    });


    // Close menu mobile
    $('#menu > li > .navbar-link').click(ativaMenu);

	// Timeline Carousel
	var carouselLength = $('.carousel-images .carousel-item').length - 1;
		$('.carousel-images.carousel').carousel({
			interval: false,
			wrap: false
		}).on('slide.bs.carousel', function (e) {
			// First one
			if (e.to == 0) {
				$('.carousel-control-left').addClass('disable');
				$('.carousel-control-right').removeClass('disable');
			} // Last one
			else if (e.to == carouselLength) {
				$('.carousel-control-right').addClass('disable');
				$('.carousel-control-left').removeClass('disable');

			} // The rest
			else {
				$('.carousel-control-left').removeClass('disable');
				$('.carousel-control-right').removeClass('disable');
			}
		});
});
function ativaMenu() {
    document.getElementById('icone-menu').classList.toggle('ativo');
}
