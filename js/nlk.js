jQuery(function($) {
	

	if ( $('#portfolio').size() > 0 ) {
		$('#portfolio .element').each(function() {
			$(this).children('.nectar-love-wrap').remove();
			$(this).find('.work-info a:last').addClass('detaild').siblings().remove();
		});
	}

	$('.std-blog-fullwidth article').each( function(){
		var offset = $(this).offset(),
			id = $(this).attr('id');
		$('#goto-butts').append('<a linkedId="'+id+'" offset="'+offset.top+'">'+id+'</a>');
	});
	
	$('#goto-butts a').click(function(){
		var t = $(this).attr('offset'),
			h = $('#header-outer').height();
		$('#goto-butts a').removeClass('active');
		$(this).addClass('active');
		$('html, body').animate({
			scrollTop: t - h,
		},750);
	});
});