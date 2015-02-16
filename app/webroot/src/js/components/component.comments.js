Component.Comments = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page, options) {
        config.page = page;
        config = App.Utils.extend(options, config);
 // Component.Forms.init(page, {});
        // $('a.comments').click(function(e){
        //     e.preventDefault();
        //     Component.Overlay.toggleOverlay();
        //     $('#commentcontainer').load($(this).attr('href'), function(){
               
        //     });
        // });

        // $('.overlaybackground').click(function(e){
        //     if(e.target.className == 'overlaybackground open'){
        //          e.preventDefault();
        //         Component.Overlay.toggleOverlay();
        //     document.getElementById('commentcontainer').innerHTML = '';
        // }
        // });



    };

    var expandComments = function(id){

    }

    // PRIVATE.................................................................

    var dbug = function(enabled) {};

    // PUBLIC INTERFACE........................................................
    return {
        init: init
    };

}(jQuery);
