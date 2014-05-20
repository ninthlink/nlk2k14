jQuery(function($) {
	$('#mobile-menu').appendTo('#header-outer').parent().scrollUpMenu({
		slideUpPreCallback: function() {
			jQuery('#mobile-menu').hide();
		}
	});

	if ( $('#portfolio').size() > 0 ) {
		$('#portfolio .element').each(function() {
			$(this).children('.nectar-love-wrap').remove();
			// no more DETAILS rollover, just make it all click
			var wurl = $(this).find('.work-info a:last').attr('href');
			$(this).children('.work-item').children('img').siblings().remove();
			$(this).wrapInner('<a />').children('a').attr('href',wurl);
		});
	}
	
	if ( $('body').hasClass('single-portfolio') ) {
		$('.sf-menu li:first, #mobile-menu li:first').addClass('current-menu-item');
	}
});