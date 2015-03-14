
Component.Flag = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page, options) {
        config.page = page;
        config = App.Utils.extend(options, config);
        
 $(document).on("click",".flag",function(e) {
    e.preventDefault();
    $this = $(this);
        console.log($this.attr('href'));
        $.ajax({
                    type: 'post',
                    url: $this.attr('href'),
                    success: function(response, textStatus, jqXHR) {

                        if(response == 'flagged'){
                            $this.html('Flagged!')
                        }
                        
                    },
                    error: function(jqXHR, data, errorThrown) {
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
