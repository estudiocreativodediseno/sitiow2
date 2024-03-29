jQuery.fn.not_exists = function(){return jQuery(this).length==0;}
jQuery.fn.jqcollapse = function(o){

	var o = jQuery.extend({
		slide: true,
		speed: 300,
		easing: ''
	},o);

	$(this).each(function(){

		var e = $(this).attr('id');

		$('#'+e+' li > ul').each(function(i){
			var parent_li = $(this).parent('li');
			var sub_ul = $(this).remove();

			if (parent_li.children('a').not_exists()){
				parent_li.wrapInner('<a/>');
			}

			parent_li.find('a').addClass('jqcNode').click(function(e){
				if(o.slide==true){
					if($(this).attr("rel") != "true"){
						sub_ul.slideToggle(o.speed, o.easing);
					}
				}else{
					sub_ul.toggle();
				}

				$(this).toggleClass('open-node');
				if($(this).attr("rel") != "true")
					e.preventDefault();
				
			});

			parent_li.append(sub_ul);
		});
		
		$('#'+e+' ul').hide();
	});
};