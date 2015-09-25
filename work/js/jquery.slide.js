(function ( $ ) {
 
    $.fn.slide = function(options) {
		var settings = $.extend({
			interval: 6500,
			animationduration: 950
		},options);
		
		var c = 0;//current slide
		var t = $(this);
		
		//set positions
		$(t).find('ul').find('li').each(function(){
			$(this).css('top','0px');
			$(this).css('left',(c * $(t).width()) + 'px');
			c++;
		});
		$(t).find('ul').css('width',c * $(t).find('ul').find('li').width());
		c = 0;
		
		setInterval(function(){
			if(c +1 == $(t).find('ul').find('li').length)
			{
				c = 0;
			} else c++;
			$(t).find('ul').animate({
				left: '-'+(c * $(t).find('ul').find('li').width())+'px'
			},settings.animationduration);
		},settings.interval);
    };
 
}( jQuery ));