$(document).ready(function() {

  // Variables
  var $codeSnippets = $('.code-example-body'),
      $nav = $('.navbar'),
      $body = $('body'),
      $window = $(window),
      $popoverLink = $('[data-popover]'),
      navOffsetTop = $nav.offset().top,
      $document = $(document),
      entityMap = {
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': '&quot;',
        "'": '&#39;',
        "/": '&#x2F;'
      }

  function init() {
    $window.on('scroll', onScroll)
    $window.on('resize', resize)
    $popoverLink.on('click', openPopover)
    $document.on('click', closePopover)
    $('a[href^="#"]').on('click', smoothScroll)
    buildSnippets();
  }

  function smoothScroll(e) {
    e.preventDefault();
    $(document).off("scroll");
    var target = this.hash,
        menu = target;
    $target = $(target);
    $('html, body').stop().animate({
        'scrollTop': $target.offset().top-40
    }, 0, 'swing', function () {
        window.location.hash = target;
        $(document).on("scroll", onScroll);
    });
  }

  function openPopover(e) {
    e.preventDefault()
    closePopover();
    var popover = $($(this).data('popover'));
    popover.toggleClass('open')
    e.stopImmediatePropagation();
  }

  function closePopover(e) {
    if($('.popover.open').length > 0) {
      $('.popover').removeClass('open')
    }
  }

  $("#button").click(function() {
    $('html, body').animate({
        scrollTop: $("#elementtoScrollToID").offset().top
    }, 2000);
});

  function resize() {
    $body.removeClass('has-docked-nav')
    navOffsetTop = $nav.offset().top
    onScroll()
  }

  function onScroll() {
    if(navOffsetTop < $window.scrollTop() && !$body.hasClass('has-docked-nav')) {
      $body.addClass('has-docked-nav')
    }
    if(navOffsetTop > $window.scrollTop() && $body.hasClass('has-docked-nav')) {
      $body.removeClass('has-docked-nav')
    }
  }

  function escapeHtml(string) {
    return String(string).replace(/[&<>"'\/]/g, function (s) {
      return entityMap[s];
    });
  }

  function buildSnippets() {
    $codeSnippets.each(function() {
      var newContent = escapeHtml($(this).html())
      $(this).html(newContent)
    })
  }


  init();

});

/*!
 * jQuery Tiny Modal
 * @author: Cedric Ruiz
 * https://github.com/elclanrs/jquery.tiny.modal
 */
(function($) {

  var _defaults = {
    buttons: ['Ok','Cancel'],
    title: 'Alert',
    html: '<p>Alert</p>',
    Ok: $.noop,
    Cancel: $.noop,
    onOpen: $.noop,
    onClose: $.noop,
    clickOutside: true
  };

  $.tinyModal = function(opts) {

    var o = $.extend({}, _defaults, opts),
        $overlay = $('<div class="tinymodal-overlay">').hide(),
        $modal = $('<div class="tinymodal-window">\
          <div class="tinymodal-title">'+ o.title +'<div class="tinymodal-close">&#215;</div></div>\
          <div class="tinymodal-content"></div>\
          <div class="tinymodal-buttons"><div class="inner"></div></div>\
          </div>').hide(),
        $el = $(o.html)
        $children = $el.children();

    $modal.find('.tinymodal-content').append($children);
    
    if (o.buttons.length) {
      $modal.find('.inner').append('<button>'+ o.buttons.join('</button><button>') +'</button>');
    }

    function show() {
      $('body').width($('body').width()).css('overflow', 'hidden');
      $overlay.fadeIn('fast', function() {
        $modal.fadeIn('fast', o.onOpen);
      });
      $modal.css({
        marginLeft: -($modal.width()/2) +'px',
      });
    }

    function hide(callback) {
      $modal.fadeOut('fast', function() {
        $('body').css({ width: 'auto', overflow: 'auto' });
        $overlay.fadeOut('fast');
        if (typeof callback == 'function') callback();
        $el.append($children);
      });
    }

    $modal.find('.tinymodal-buttons button, .tinymodal-close').on('click', function(e) {
      var callback = $(this).text();
      hide(o[callback]);
    });

    $modal.find('.tinymodal-close').click(o.onClose);

    $modal.on('click', function(e){ e.stopPropagation(); });

    if (o.clickOutside) $overlay.on('click', hide);

    $('body').prepend($overlay.append($modal));
    show();
  };

}(jQuery));