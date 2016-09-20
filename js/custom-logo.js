//logo animator

jQuery(function($){

	var last_rand_avatar = null,
		last_rand_div = null,
		avatars = [],
		bd = $('body'); 

	function get_rand( obj, last_rand, start ) {
		start = typeof start !== 'undefined' ? start : 0;
		var rand = Math.floor( Math.random() * obj.length + start);
		if ( rand != last_rand ) {
			return rand;
		}
		else {
			get_rand( obj, last_rand, start);
		}
	}

	function get_rand_prop(obj) {
		var result;
		var count = 0;
		for (var prop in obj)
			if (Math.random() < 1/++count)
				result = prop;
		return result;
	}


	// console.log(logo_object);

	//put the wordmark on a random face
	$('#wordmark')
    	.detach()
    	.appendTo('#l'+Math.ceil(Math.random() * 5))
    	.css('opacity','1');
    //orient the 3d box around cursor
	bd.mousemove(function(e){
		var perspectX = e.pageX / bd.width();
		var perspectY = e.pageY / bd.height();
		$('#nlk-logo-avatars')[0].style.transform = 'translateZ( -2100px ) translateX('+(-.5+perspectX)*300+'px) translateY('+(-80 + 300*(-.5+perspectY))+'px) rotateX(-'+(36 + perspectY*11)+'deg) rotateY(' + (-45 + (.21 * (-180 + (perspectX * 360)))) + 'deg)';
	});
	

	$('#nlk-logo-avatars div.l').hover(function(){
		var r = get_rand_prop( logo_object ),
			new_obj = logo_object[r];
		$(this).append( new_obj.avatar ).find("img").stop().fadeIn(250);
		delete new_obj;
		last_rand_avatar = r;
		delete r;
	}, function(){
		$(this).delay(500).find("img").stop().fadeOut(500, function(){
			$(this).remove();
		});
	});

	function rotate_avatars() {
		var the_divs = $('#nlk-logo-avatars div.l');
		var the_div = get_rand( the_divs, last_rand_div, 1 );
		if ( !$('#nlk-logo-avatars div#l' + the_div + ' img').length ) {
			var r = get_rand_prop( logo_object ),
				new_obj = logo_object[r];
			$('#nlk-logo-avatars div#l' + the_div).append( new_obj.avatar ).find("img").fadeIn(500).delay(1000).fadeOut(750, function(){
				$(this).remove();
			});
			delete new_obj;
			last_rand_div = the_div;
			delete the_div;
			last_rand_avatar = r;
			delete r;
		}
		window.setTimeout(function(){
			rotate_avatars();
		}, 4000);
	}

	rotate_avatars();
});
