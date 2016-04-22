$(document).ready(function(){

	if($(window).width()>930)
	{	
		$width=$(window).width()-300;
		$(".right").css("width",$width);
	}


	$(window).resize(function(){

		$windowWidth=$(window).width();

		if($windowWidth>930)
		{	
			$width=$(window).width()-300;
			$(".right").css("width",$width);
		}

	});

	 $("#message_more").autoIMG(); 

});