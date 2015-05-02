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

// show only first and last comment of multi-comment threads
$('.commentsview').each(function(){
    var comments = $(this).find('.row').length;

    if(comments > 2){
        var morecomments = comments-2;
        $(this).find('.row').hide();
        $(this).find('.row:first-child, .row:last-child').show();
        $(this).find('.row:first-child').after('<div class="morecomments row">show '+morecomments+' more comments</div>');
    }
});

$(document).on('click', '.morecomments', function(e){
    console.log($(e.target));
    $(e.target).siblings().show();
    $(e.target).hide();
});
    // if($('.commentsview .row').length > 2){
    //     console.log('hi');
    //     $('.commentsview .row').hide();
    //     $('.commentsview .row:first-child, .commentsview .row:last-child').show();
    //     $('.commentsview').each(){
    //         var morecomments = 
    //     }
    //     $('.commentsview .row').append('<div class="showmore">'++'<div>');

    // }
    

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
