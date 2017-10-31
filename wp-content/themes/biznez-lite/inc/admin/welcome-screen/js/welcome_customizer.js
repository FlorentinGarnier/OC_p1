jQuery(document).ready(function() {
    var biznez_aboutpage = biznezLiteWelcomeScreenCustomizerObject.aboutpage;
    var biznez_nr_actions_required = biznezLiteWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof biznez_aboutpage !== 'undefined') && (typeof biznez_nr_actions_required !== 'undefined') && (biznez_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + biznez_aboutpage + '"><span class="biznez-lite-actions-count">' + biznez_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".biznez-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section biznez-upsells">');
    }
    if (typeof biznez_aboutpage !== 'undefined') {
        jQuery('.biznez-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + biznez_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', biznezLiteWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".biznez-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});