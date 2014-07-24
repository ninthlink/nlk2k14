//logo animator

jQuery(function($){

	var last_rand_avatar = null,
		last_rand_div = null,
		avatars = [];

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


	console.log(logo_object);

	

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