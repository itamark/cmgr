var App    = window.App || {};

var Component = window.Component || {};
var Controller = window.Controller || {};

if (typeof console == "undefined") {
    this.console = {log: function() {}};
}
/**
 * General utility functions that can be used in various places
 * througout a project
 * @class Utils
 * @namespace App 
 */
App.Utils = function($) {

    /**
     * helper function to append new properties onto an object
     * @public
     * @param  {Object} options - the new properties that need to be added
     * @param  {Object} config - the object the new props are being added to
     * @return {Object}         - the combined object
     */
    var extend = function(options, config) {
        if (typeof options !== "undefined") {
            for (prop in options) {
                if (options.hasOwnProperty(prop)) {
                    config[prop] = options[prop];
                }
            }
        }
        return config;
    };

    function get_gravatar(email, size) {
 
    var MD5=function(s){function L(k,d){return(k<<d)|(k>>>(32-d))}function K(G,k){var I,d,F,H,x;F=(G&2147483648);H=(k&2147483648);I=(G&1073741824);d=(k&1073741824);x=(G&1073741823)+(k&1073741823);if(I&d){return(x^2147483648^F^H)}if(I|d){if(x&1073741824){return(x^3221225472^F^H)}else{return(x^1073741824^F^H)}}else{return(x^F^H)}}function r(d,F,k){return(d&F)|((~d)&k)}function q(d,F,k){return(d&k)|(F&(~k))}function p(d,F,k){return(d^F^k)}function n(d,F,k){return(F^(d|(~k)))}function u(G,F,aa,Z,k,H,I){G=K(G,K(K(r(F,aa,Z),k),I));return K(L(G,H),F)}function f(G,F,aa,Z,k,H,I){G=K(G,K(K(q(F,aa,Z),k),I));return K(L(G,H),F)}function D(G,F,aa,Z,k,H,I){G=K(G,K(K(p(F,aa,Z),k),I));return K(L(G,H),F)}function t(G,F,aa,Z,k,H,I){G=K(G,K(K(n(F,aa,Z),k),I));return K(L(G,H),F)}function e(G){var Z;var F=G.length;var x=F+8;var k=(x-(x%64))/64;var I=(k+1)*16;var aa=Array(I-1);var d=0;var H=0;while(H<F){Z=(H-(H%4))/4;d=(H%4)*8;aa[Z]=(aa[Z]|(G.charCodeAt(H)<<d));H++}Z=(H-(H%4))/4;d=(H%4)*8;aa[Z]=aa[Z]|(128<<d);aa[I-2]=F<<3;aa[I-1]=F>>>29;return aa}function B(x){var k="",F="",G,d;for(d=0;d<=3;d++){G=(x>>>(d*8))&255;F="0"+G.toString(16);k=k+F.substr(F.length-2,2)}return k}function J(k){k=k.replace(/rn/g,"n");var d="";for(var F=0;F<k.length;F++){var x=k.charCodeAt(F);if(x<128){d+=String.fromCharCode(x)}else{if((x>127)&&(x<2048)){d+=String.fromCharCode((x>>6)|192);d+=String.fromCharCode((x&63)|128)}else{d+=String.fromCharCode((x>>12)|224);d+=String.fromCharCode(((x>>6)&63)|128);d+=String.fromCharCode((x&63)|128)}}}return d}var C=Array();var P,h,E,v,g,Y,X,W,V;var S=7,Q=12,N=17,M=22;var A=5,z=9,y=14,w=20;var o=4,m=11,l=16,j=23;var U=6,T=10,R=15,O=21;s=J(s);C=e(s);Y=1732584193;X=4023233417;W=2562383102;V=271733878;for(P=0;P<C.length;P+=16){h=Y;E=X;v=W;g=V;Y=u(Y,X,W,V,C[P+0],S,3614090360);V=u(V,Y,X,W,C[P+1],Q,3905402710);W=u(W,V,Y,X,C[P+2],N,606105819);X=u(X,W,V,Y,C[P+3],M,3250441966);Y=u(Y,X,W,V,C[P+4],S,4118548399);V=u(V,Y,X,W,C[P+5],Q,1200080426);W=u(W,V,Y,X,C[P+6],N,2821735955);X=u(X,W,V,Y,C[P+7],M,4249261313);Y=u(Y,X,W,V,C[P+8],S,1770035416);V=u(V,Y,X,W,C[P+9],Q,2336552879);W=u(W,V,Y,X,C[P+10],N,4294925233);X=u(X,W,V,Y,C[P+11],M,2304563134);Y=u(Y,X,W,V,C[P+12],S,1804603682);V=u(V,Y,X,W,C[P+13],Q,4254626195);W=u(W,V,Y,X,C[P+14],N,2792965006);X=u(X,W,V,Y,C[P+15],M,1236535329);Y=f(Y,X,W,V,C[P+1],A,4129170786);V=f(V,Y,X,W,C[P+6],z,3225465664);W=f(W,V,Y,X,C[P+11],y,643717713);X=f(X,W,V,Y,C[P+0],w,3921069994);Y=f(Y,X,W,V,C[P+5],A,3593408605);V=f(V,Y,X,W,C[P+10],z,38016083);W=f(W,V,Y,X,C[P+15],y,3634488961);X=f(X,W,V,Y,C[P+4],w,3889429448);Y=f(Y,X,W,V,C[P+9],A,568446438);V=f(V,Y,X,W,C[P+14],z,3275163606);W=f(W,V,Y,X,C[P+3],y,4107603335);X=f(X,W,V,Y,C[P+8],w,1163531501);Y=f(Y,X,W,V,C[P+13],A,2850285829);V=f(V,Y,X,W,C[P+2],z,4243563512);W=f(W,V,Y,X,C[P+7],y,1735328473);X=f(X,W,V,Y,C[P+12],w,2368359562);Y=D(Y,X,W,V,C[P+5],o,4294588738);V=D(V,Y,X,W,C[P+8],m,2272392833);W=D(W,V,Y,X,C[P+11],l,1839030562);X=D(X,W,V,Y,C[P+14],j,4259657740);Y=D(Y,X,W,V,C[P+1],o,2763975236);V=D(V,Y,X,W,C[P+4],m,1272893353);W=D(W,V,Y,X,C[P+7],l,4139469664);X=D(X,W,V,Y,C[P+10],j,3200236656);Y=D(Y,X,W,V,C[P+13],o,681279174);V=D(V,Y,X,W,C[P+0],m,3936430074);W=D(W,V,Y,X,C[P+3],l,3572445317);X=D(X,W,V,Y,C[P+6],j,76029189);Y=D(Y,X,W,V,C[P+9],o,3654602809);V=D(V,Y,X,W,C[P+12],m,3873151461);W=D(W,V,Y,X,C[P+15],l,530742520);X=D(X,W,V,Y,C[P+2],j,3299628645);Y=t(Y,X,W,V,C[P+0],U,4096336452);V=t(V,Y,X,W,C[P+7],T,1126891415);W=t(W,V,Y,X,C[P+14],R,2878612391);X=t(X,W,V,Y,C[P+5],O,4237533241);Y=t(Y,X,W,V,C[P+12],U,1700485571);V=t(V,Y,X,W,C[P+3],T,2399980690);W=t(W,V,Y,X,C[P+10],R,4293915773);X=t(X,W,V,Y,C[P+1],O,2240044497);Y=t(Y,X,W,V,C[P+8],U,1873313359);V=t(V,Y,X,W,C[P+15],T,4264355552);W=t(W,V,Y,X,C[P+6],R,2734768916);X=t(X,W,V,Y,C[P+13],O,1309151649);Y=t(Y,X,W,V,C[P+4],U,4149444226);V=t(V,Y,X,W,C[P+11],T,3174756917);W=t(W,V,Y,X,C[P+2],R,718787259);X=t(X,W,V,Y,C[P+9],O,3951481745);Y=K(Y,h);X=K(X,E);W=K(W,v);V=K(V,g)}var i=B(Y)+B(X)+B(W)+B(V);return i.toLowerCase()};
 
    var size = size || 80;
 
    return 'http://www.gravatar.com/avatar/' + MD5(email) + '.jpg?s=' + size;
}

    var getParameterByName = function(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

    var getHash = function(key) {
        var match = location.hash.match(new RegExp(key+'=([^&]*)'));
        if (match) {
            return match[1];
        } else {
            return false;
        }
    };

    /**
     * returns the RGB from a HEX
     * @public
     * @param  {String} hex - hexadecimal representation of a color
     * @return {Object}     - R, G and B integer values
     */
    var hex2rgb = function(hex) {
        var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
        hex = hex.replace(shorthandRegex, function(m, r, g, b) {
            return r + r + g + g + b + b;
        });

        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        }:null;
    };


    var inViewport = function(el){
  var top = el.offsetTop;
  var left = el.offsetLeft;
  var width = el.offsetWidth;
  var height = el.offsetHeight;

  while(el.offsetParent) {
    el = el.offsetParent;
    top += el.offsetTop;
    left += el.offsetLeft;
  }

  return (
    top < (window.pageYOffset + window.innerHeight) &&
    left < (window.pageXOffset + window.innerWidth) &&
    (top + height) > window.pageYOffset &&
    (left + width) > window.pageXOffset
  );
};

var anyInViewport = function(el) {
  var top = el.offsetTop;
  var left = el.offsetLeft;
  var width = el.offsetWidth;
  var height = el.offsetHeight;

  while(el.offsetParent) {
    el = el.offsetParent;
    top += el.offsetTop;
    left += el.offsetLeft;
  }

  return (
    top < (window.pageYOffset + window.innerHeight) &&
    left < (window.pageXOffset + window.innerWidth) &&
    (top + height) > window.pageYOffset &&
    (left + width) > window.pageXOffset
  );
}

    /**
     * returns a random number
     * @public
     * @params Int min - minimum number
     * @params Int max - maximum number
     * @return Int - returns random interger
     */
    var randInt = function(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    /**
     * Returns the version of IE if on IE or false if not
     * @public
     * @return mixed - returns integer of version or false if not IE
     */
    var isIE = function() {
        var myNav = navigator.userAgent.toLowerCase();
        return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
    }
// get position on page by id
    var getPositionOnPage=function(e){var t=document.getElementById(e);var n={y:0};while(t){n.y+=t.offsetTop;t=t.offsetParent}if(document.documentElement&&(document.documentElement.scrollTop||document.documentElement.scrollLeft)){n.y-=document.documentElement.scrollTop}else if(document.body&&(document.body.scrollTop||document.body.scrollLeft)){n.y-=document.body.scrollTop}else if(window.pageXOffset||window.pageYOffset){n.y-=window.pageYOffset}return n.y}


    return {
        extend: extend,
        hex2rgb: hex2rgb,
        getHash: getHash,
        randInt: randInt,
        isIE: isIE,
        inViewport: inViewport,
        anyInViewport: anyInViewport,
        getParameterByName: getParameterByName,
        getPositionOnPage: getPositionOnPage,
        get_gravatar: get_gravatar
    };

}();

/**
Component.Template = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page, options) {
        config.page = page;
        config = App.Utils.extend(options, config);

    };

    var foobar = function() { };

    // PRIVATE.................................................................

    var dbug = function(enabled) {};

    // PUBLIC INTERFACE........................................................
    return {
        init: init,
        foobar: foobar
    };

}();
*/
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
                        } else if(response == 'unflagged'){
                            $this.html('Unflagged');
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

Component.Forms = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page, options) {
        // console.log('loaded');
        config.page = page;
        config = App.Utils.extend(options, config);
        config.form = config.page.find('form:not(#mc-embedded-subscribe-form)');

$(document).on('submit', 'form.ajaxform', function(e){

     e.preventDefault();
     var $this = $(this);
            $.ajax({
                    type: $this.attr('method'),
                    url: $this.attr('action'),
                    data: $this.serialize(),
                    success: function(response, textStatus, jqXHR) {

                        console.log('success');
                        if($this.attr('class') == 'postForm'){
                            postItem(response);
                        } else {
                            switch ($this.attr('id')) {
                            case 'ItemIndexForm':
                                postItem(response);
                                break;
                            case 'UserLoginForm':
                                loginForm();
                                break;
                            case 'UserAddForm':
                                userReg();
                            case 'CommentViewForm':
                                postComment(response);
                                break;
                        }
                        }
                        
                    },
                    error: function(jqXHR, data, errorThrown) {
                        console.log(jqXHR);
                        switch ($this.attr('id')) {
                            case 'ItemIndexForm':
                                postItem(response);
                                break;
                            case 'UserLoginForm':
                                window.location = '/users/login?pw="false"';
                                break;
                            case 'UserAddForm':
                                userReg();
                            case 'CommentViewForm':
                                postComment(response);
                                break;
                        }
                    }
                });
       
});


        

    };

    var loginForm = function(){
         window.location = '/';
    }

    var userReg = function(){
         window.location = '/';
    }

    var postItem = function(response){
                // $('textarea').val('');
                console.log(response);
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

/* Controller['name'] = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page) {
        config.page = page;
    };

    // PRIVATE.................................................................
    var dbug = function(enabled) {};

    // PUBLIC INTERFACE........................................................
    return {
        init: init
    };

}(); */

 Controller['usersAdmin'] = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page) {
        config.page = page;
    };

    // PRIVATE.................................................................
    var dbug = function(enabled) {};

    // PUBLIC INTERFACE........................................................
    return {
        init: init
    };

}(); 

 Controller['users_add'] = function($) {

    var config = {
        page: ""
    };

    // PUBLIC..................................................................
    var init = function(page) {
        config.page = page;
    };

    // PRIVATE.................................................................
    var dbug = function(enabled) {};

    // PUBLIC INTERFACE........................................................
    return {
        init: init
    };

}(); 

$(function() {


    // setTimeout(function() {
    //     $('body').addClass('animate');
    // }, 200);

    $('html').removeClass('no-js');

  var $page = $('body');
   
   if($page.find('form').length > 0){
    Component.Forms.init($page, {});
   }

   if($page.find('.alert').length > 0){
    $page.find('.alert').hide();
    toast($page.find('.alert').text(), 4000);
   }

   if($page.find('a.comments').length > 0){
    Component.Comments.init($page, {});
   }
   Component.Upvotes.init($page, {});
   Component.Flag.init($page, {});

    // Global Components Init()
     // Component.Overlay.init($page, {});
    
if ($page.attr('data-controller') !== undefined) {
        var page_controller = $page.attr('data-controller');
        if (Controller[page_controller] !== undefined) {
            Controller[page_controller].init($page);

        }
    }

});

    


