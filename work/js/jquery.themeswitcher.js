$(document).ready(function(){
	
	$('#colorswitcher .red').bind('click',function(e){
		if($(this).attr('class') == 'orange')
		{
			//restore original
			$('#theme').attr('href','css/theme_default.css');
			$('#logo').attr('src','img/logo_default.png');
			$(this).attr('class',$(this).attr('originalcolor'));
				$.cookie("theme", "default");
			return;
		}

		$('#theme').attr('href','css/theme_red.css');
		$('#logo').attr('src','img/logo_red.png');

		$('#colorswitcher .orange').attr('class',$('#colorswitcher .orange').attr('originalcolor'));
		$(this).attr('originalcolor',$(this).attr('class'));
		$(this).attr('class','orange');
			$.cookie("theme", "red");
	});
	
	$('#colorswitcher .green').bind('click',function(e){
		if($(this).attr('class') == 'orange')
		{
			//restore original
			$('#theme').attr('href','css/theme_default.css');
			$('#logo').attr('src','img/logo_default.png');
			$(this).attr('class',$(this).attr('originalcolor'));
				$.cookie("theme", "default");
			return;
		}

		$('#theme').attr('href','css/theme_green.css');
		$('#logo').attr('src','img/logo_green.png');

		$('#colorswitcher .orange').attr('class',$('#colorswitcher .orange').attr('originalcolor'));
		$(this).attr('originalcolor',$(this).attr('class'));
		$(this).attr('class','orange');
			$.cookie("theme", "green");
	});
	
	$('#colorswitcher .blue').bind('click',function(e){
		if($(this).attr('class') == 'orange')
		{
			//restore original
			$('#theme').attr('href','css/theme_default.css');
			$('#logo').attr('src','img/logo_default.png');
			$(this).attr('class',$(this).attr('originalcolor'));
				$.cookie("theme", "default");
			return;
		}
		
		$('#theme').attr('href','css/theme_blue.css');
		$('#logo').attr('src','img/logo_blue.png');

		$('#colorswitcher .orange').attr('class',$('#colorswitcher .orange').attr('originalcolor'));
		$(this).attr('originalcolor',$(this).attr('class'));
		$(this).attr('class','orange');
			$.cookie("theme", "blue");
	});
});