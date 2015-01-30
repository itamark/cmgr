Component.Overlay = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page, options) {
        config.page = page;
        config = App.Utils.extend(options, config);
    };

    var toggleOverlay = function(){
        $('.overlaybackground').toggleClass('open');
    }

    // PRIVATE.................................................................

    var dbug = function(enabled) {};

    // PUBLIC INTERFACE........................................................
    return {
        init: init,
        toggleOverlay:toggleOverlay
    };

}(jQuery);
