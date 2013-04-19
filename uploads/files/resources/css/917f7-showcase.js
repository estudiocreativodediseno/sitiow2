/**
*
* @date 16.01.13
*
* @uses /scripts/libraries/jquery.bxSlider.min.js
* @uses	/scripts/libraries/jquery.actual.min.js
*
*/
$.fn.startShowcase = function(auto, pager, controls, mode, pause, center){
	$showcase = $(this);
	$slides = $showcase.children();
	$showcaseContainer = $showcase.parent();

	if($slides.length > 1){
		$showcase.bxSlider({
			auto: auto,
			pager: pager,
			controls: controls,
			mode: mode,
			speed: 600,
			pause: pause
		});

		//pager align
		if(center){
			$pager = $showcaseContainer.find('.bx-pager');
			var pagerWidth = $pager.outerWidth();
		
			$pager.css({'width': pagerWidth + 'px', 'margin-left': - Math.ceil(pagerWidth/2) + 'px', 'left': '50%'});
		}
	}
}


$.fn.featuredBanner = function(auto, mode, pause){
	$showcase = $(this);
	$slides = $showcase.children();

	if($slides.length > 1){
		$showcase.bxSlider({
			auto: auto,
			pager: false,
			controls: false,
			mode: mode,
			speed: 600,
			pause: pause
		});
	}
}




$().ready(function(){

	/* $Homepage */
	$('#showcase').startShowcase(false, true, true, 'horizontal', 12000, true);
	$('#productos-tendencia').startShowcase(false, true, true, 'horizontal', 8000, false);

	/* $Sección Tendencia */
	$('#inner-gallery').startShowcase(false, true, true, 'horizontal', 8000, true);

	/* $Sección Marcas & Diseñadores */
	$('#inner-showcase').startShowcase(true, false, false, 'fade', 5000, false);
	$('#brands-category').startShowcase(false, true, true, 'horizontal', 600, false);

	$('#gallery-showcase').startShowcase(false, false, true, 'horizontal', 8000, false);


	// $('#brands').startShowcase(false, true, true, 'horizontal', 600, false);
	$('#brands').bxSlider({
			auto: false,
			pager: true,
			controls: true,
			mode: 'horizontal',
			speed: 600,
			pause: false,
			pagerType: 'medium',
			linksPerPage: 5,
			pagerShortSeparator: ' de '
	});


	$('#catalog-showcase').bxSlider({
			auto: false,
			pager: true,
			controls: true,
			mode: 'horizontal',
			speed: 600,
			pause: false,
			pagerType: 'medium',
			linksPerPage: 3,
			pagerShortSeparator: ' de '
	});



	// $pager align
		var $pager = $('.gallery-panel .bx-pager');
		var pagerWidth = $pager.outerWidth();

		var $arrowL = $('.gallery-panel .bx-prev');
		var $arrowR = $('.gallery-panel .bx-next');

		var $container = $('.gallery-panel');
		var $separator = 76;

		var $arrowLDist = $container.outerWidth()/2 - (pagerWidth/2 + $separator) - $arrowL.outerWidth();
		var $arrowLDist = $container.outerWidth()/2 - (pagerWidth/2 + $separator) - $arrowR.outerWidth();

		$arrowL.css({'left': $arrowLDist + 'px'});
		$arrowR.css({'right' : $arrowLDist + 'px'});
		
		// $pager.css({'width' : pagerWidth + 'px', 'margin-left': - Math.ceil(pagerWidth/2) + 'px', 'left': '50%'});
		$pager.css({'margin-left': - Math.ceil(pagerWidth/2) + 'px', 'left': '50%'});




	$('#destacados').featuredBanner(true, 'fade', 5000);
	$('#interiorismo').featuredBanner(true, 'fade', 3000);
	
	$('#recomendacion').featuredBanner(true, 'fade', 3000);
});