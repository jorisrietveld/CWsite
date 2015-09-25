(function ( $ ) {
 
    $.fn.slidemenu = function() {
		$(this).find('li').click(function(e){
			$(this).find('a').trigger('click');
		});
        $(this).find('li').hover(function(e)
		{
			$('#menublock_selected').stop(true,false).animate({
				'left': $(this).position().left,
				'width': $(this).width()+30
			},500);
		},function(e){
			$('#menublock_selected').stop(true,false).animate({
				'left': $(this).parent().width()
			},500);
		});
    };
 
}( jQuery ));