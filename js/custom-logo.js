//logo animator

jQuery(function($){
	console.log( logo_object );

	var avatars = [];
	$.each( logo_object, function( index, value ){
		avatars[ index ] = value.avatar;
	});	

	console.log( avatars );

	$('#nlk-logo-avatars div.l').hover(function(){
		var r = Math.floor( Math.random() * avatars.length + 1);
		$(this).append( avatars[r] ).find("img").stop().fadeIn(250);
		delete r;
	}, function(){
		$(this).delay(500).find("img").stop().fadeOut(500, function(){
			$(this).remove();
		});
	});

	function rotate_avatars() {
		var the_div = Math.floor( Math.random() * 5 + 1); // random # from 1 to 5
		$('#nlk-logo-avatars div#l' + the_div)
		var r = Math.floor( Math.random() * avatars.length + 1);
		$('#nlk-logo-avatars div#l' + the_div).append( avatars[r] ).find("img").stop().fadeIn(500).delay(1000).fadeOut(750, function(){
			$(this).remove();
		});
		delete r;
		window.setTimeout(function(){
			rotate_avatars();
		}, 5000);
	}

	rotate_avatars();
});