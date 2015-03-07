 Controller['itemsIndex'] = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page) {
        config.page = page;
        // $('body').on('click', '.flag', function(){
        //     alert('hi');
        // });
$('body').on('click', '.flag', function (e){
    e.preventDefault();
    var link = e.target.href;
    flag(e.target);
        // alert(parse[parse.length-1]);
    });

    };

    // PRIVATE.................................................................
    var dbug = function(enabled) {};

    var flag = function(elem){
        $.ajax({
            url: elem.href,
            type: 'post',
            success: function(response){
                console.log(response);
                if(response == 'Flagged'){
                    elem.innerHTML = 'Thanks!';
                }
            },
            error: function(){
                console.log('sorry');
            }

        });
    }

    // PUBLIC INTERFACE........................................................
    return {
        init: init
    };

}(jQuery); 
