jQuery(function($) {
	

	if ( $('#portfolio').size() > 0 ) {
		$('#portfolio .element').each(function() {
			$(this).children('.nectar-love-wrap').remove();
			$(this).find('.work-info a:last').addClass('detaild').siblings().remove();
		});
	}


	if ( $('div.post-featured-img-full-width').size() > 0 ) {
		$('div.post-featured-img-full-width').each( function(){
			var h = $(this).height();
			$(this).find('.grad').height(h);
		});
	}
});