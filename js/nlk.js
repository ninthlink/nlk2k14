jQuery(function($) {
	if ( $('#portfolio').size() > 0 ) {
		$('#portfolio .element').each(function() {
			$(this).children('.nectar-love-wrap').remove();
			$(this).find('.work-info a:last').addClass('detaild').siblings().remove();
		});
	}
});