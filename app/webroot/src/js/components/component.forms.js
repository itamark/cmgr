Component.Forms = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page, options) {
        console.log('loaded');
        config.page = page;
        config = App.Utils.extend(options, config);
        config.form = config.page.find('form:not(#mc-embedded-subscribe-form)');

$(document).on('submit', 'form:not(#mc-embedded-subscribe-form)', function(e){

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


        

    };

    var loginForm = function(){
         window.location = '/';
    }

    var postItem = function(response){
                // $('textarea').val('');
                console.log(response.new_id);
        // $('.itemscontainer').load('/comments/newitems/'+response[0].Comment.item_id);
                // $('.contentcontainer').load('/items/index'); 
                // $('.items.form').empty().prepend('<div class="alert alert-success" role="alert">Thanks for submitting!</div>');
                window.location = "/items/view/"+response.new_id;
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
