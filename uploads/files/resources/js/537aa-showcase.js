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

$.fn.pagerAlign = function(xPos){
	var $container = $(this);
	var $pager = $container.find('.bx-pager');
	var pagerWidth = $pager.outerWidth();

	var $arrowL =  $container.find('.bx-prev');
	var $arrowR =  $container.find('.bx-next');

	var $separator = typeof xPos === 'undefined' ? 76 : xPos;

	var $arrowLDist = $container.outerWidth()/2 - (pagerWidth/2 + $separator) - $arrowL.outerWidth();
	var $arrowLDist = $container.outerWidth()/2 - (pagerWidth/2 + $separator) - $arrowR.outerWidth();

	$arrowL.css({'left': $arrowLDist + 'px'});
	$arrowR.css({'right' : $arrowLDist + 'px'});
	
	$pager.css({'margin-left': - Math.ceil(pagerWidth/2) + 'px', 'left': '50%'});
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

	$('#destacados').featuredBanner(true, 'fade', 5000);
	$('#interiorismo').featuredBanner(true, 'fade', 3000);
	
	$('#recomendacion').featuredBanner(true, 'fade', 3000);


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
	$('.gallery-panel').pagerAlign();
	$('.brand-catalog').pagerAlign(18);
	$('.catalog, .mini-catalog').pagerAlign(8);

	// Clone pager
	// $pager = $('.catalog').find('.bx-pager').clone(true);
	// $next = $('.catalog').find('.bx-next').clone(true);
	// $prev = $('.catalog').find('.bx-prev').clone(true);

	// $buildPager = $('<div></div>',{'class':'buildPager wireframe'});

	// $pager.appendTo($buildPager);
	// $next.appendTo($buildPager);
	// $prev.appendTo($buildPager);

	// $('.gallery-panel').append($buildPager);
});