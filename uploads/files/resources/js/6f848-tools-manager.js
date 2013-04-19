/**
*
* @date 16.01.13
*
*
*/
$(function(){	
	$.fn.clearInput = function(){
		$(this).focus(function(){
			if($(this).val() == this.defaultValue){ $(this).val('');}
		});
		
		$(this).blur(function(){
			if($(this).val() == ''){ $(this).val(this.defaultValue);}
		});
	}

	$.fn.blankAnchors = function(){
		$("a[href^='http:']:not([href*='" + window.location.host + "'])").attr({'target':'_blank'});
	}


	$.fn.componentSearch = function(){
		$label = $(this).find('label');
		$txt  = $(this).find(':text');

		if($txt.val() !== ''){$label.hide();}

		$(this).on('click', 'label', function(){
			$label.fadeOut(function(){$txt.focus()});
		});


		$txt.blur(function(){
			if($txt.val() == ''){
				$label.show();
			}
		});
	}

});


$().ready(function(){

	// Pin Component
	$('.pin').on('click',  function(e){
		$pin = $(this);
		$overlay = $(this).parent().find('.overlay');
		$close = $overlay.find('.close-overlay');
		// $offsetX = (Math.abs(parseInt($overlay.css('right'))) - $overlay.outerWidth() - $close.outerWidth()) * -1;
		// $posX = $overlay.css('right');
		$speed = 300;

		if($overlay.hasClass('close')){

			$pin.find('span').remove();

			$overlay.animate({'right':'-30px'}, $speed);
			$overlay.removeClass('close').addClass('open');
		}

		$close.on('click', function(e){
			if($overlay.hasClass('open')){
				$overlay.animate({'right' : '-487px'}, $speed);
				$overlay.removeClass('open').addClass('close');

				$pin.append($('<span>'));
			}

			e.preventDefault();
		});

		e.preventDefault();
	});

	$('.component-search').componentSearch();

	$().blankAnchors();
	$('input[type=text]').clearInput();
});