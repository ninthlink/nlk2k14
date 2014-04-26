jQuery(function($) {
	

	if ( $('#portfolio').size() > 0 ) {
		$('#portfolio .element').each(function() {
			$(this).children('.nectar-love-wrap').remove();
			$(this).find('.work-info a:last').addClass('detaild').siblings().remove();
		});
	}


	if ( $('div.post-featured-img-full-width').size() > 0 ) {
		var h = $('div.post-featured-img-full-width').height();
		$('div.post-featured-img-full-width .grad').height(h);
	}
});