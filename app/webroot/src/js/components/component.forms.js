Component.Forms = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page, options) {
        config.page = page;
        config = App.Utils.extend(options, config);
        config.form = config.page.find('form');

$(document).on('submit', 'form', function(e){
     e.preventDefault();
     var $this = $(this);
            $.ajax({
                    type: $this.attr('method'),
                    url: $this.attr('action'),
                    data: $this.serialize(),
                    success: function(response, textStatus, jqXHR) {

                        console.log('success');
                        switch ($this.attr('id')) {
                            case 'ItemIndexForm':
                                postItem(response);
                                break;
                            case 'UserLoginForm':
                                loginForm();
                                break;
                            case 'CommentViewForm':
                                postComment(response);
                                break;
                        }
                    },
                    error: function(jqXHR, data, errorThrown) {
                        console.log(jqXHR);
                    }
                });
       
});

// config.form.each(function () {
//     var $this = $(this);
//     var $parent = $this.parent();

//      $this.submit(function(e){
//             e.preventDefault();
//             $.ajax({
//                     type: $this.attr('method'),
//                     url: $this.attr('action'),
//                     data: $this.serialize(),
//                     success: function(response, textStatus, jqXHR) {
//                         console.log('success');
//                         switch ($this.attr('id')) {
//                             case 'ItemIndexForm':
//                                 postItem(response);
//                                 break;
//                             case 'UserLoginForm':
//                                 loginForm();
//                                 break;
//                             case 'CommentViewForm':
//                                 postComment(response);
//                                 break;
//                         }
//                     },
//                     error: function(jqXHR, data, errorThrown) {
//                         console.log(jqXHR);
//                     }
//                 });
//         });
// });
        

    };

    var loginForm = function(){
         window.location = '/';
    }

    var postItem = function(response){
 $('textarea').val('');
        $('.itemscontainer').load('/comments/newitems/'+response[0].Comment.item_id);
   }

    var postComment = function(response){
        $('textarea').val('');
        $('#commentsview').load('/items/view_comments/'+response.Comment.item_id);  
    }


    var foobar = function() { };

    // PRIVATE.................................................................

    var dbug = function(enabled) {};

    // PUBLIC INTERFACE........................................................
    return {
        init: init,
        foobar: foobar
    };

}(jQuery);
