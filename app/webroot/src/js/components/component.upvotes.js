Component.Upvotes = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page, options) {
        config.page = page;
        config = App.Utils.extend(options, config);

$(document).on('click', '.upvotearrow', function(e){
     e.preventDefault();
     var $this = $(this);

            $.ajax({
                    type: 'post',
                    url: '/upvotes/vote',
                    data: {item_id : $this.attr('id').split('-')[1]},
                    success: function(response, textStatus, jqXHR) {
console.log(response);
$this.next().next().html(response.count);
$this.toggleClass('upvoted');

                        // console.log('success');
                        // switch ($this.attr('id')) {
                        //     case 'ItemAddForm':
                        //         postItem(response);
                        //         break;
                        //     case 'UserLoginForm':
                        //         loginForm();
                        //         break;
                        //     case 'CommentViewForm':
                        //         postComment(response);
                        //         break;
                        // }
                    },
                    error: function(jqXHR, data, errorThrown) {
                        console.log(data);
                        console.log(jqXHR);
                    }
                });

});


        

    };




    var foobar = function() { };

    // PRIVATE.................................................................

    var dbug = function(enabled) {};

    // PUBLIC INTERFACE........................................................
    return {
        init: init,
        foobar: foobar
    };

}(jQuery);
