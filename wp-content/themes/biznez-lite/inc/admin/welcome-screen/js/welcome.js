jQuery(document).ready(function() {
	
	/* Tabs in welcome page */
	function biznez_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".biznez-lite-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}
	
	var biznez_actions_anchor = location.hash;
	
	if( (typeof biznez_actions_anchor !== 'undefined') && (biznez_actions_anchor != '') ) {
		biznez_welcome_page_tabs('a[href="'+ biznez_actions_anchor +'"]');
	}
	
    jQuery(".biznez-lite-nav-tabs a").click(function(event) {
        event.preventDefault();
		biznez_welcome_page_tabs(this);
    });

});