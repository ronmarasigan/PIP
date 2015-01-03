QS = {};
QS.ui = {};
QS.ui.goTop = (function(){
  var handle = null, blocked = false;
    var shown=false;
  function init(cssClass) {
    handle = $(document.createElement("div")).addClass("fk-ui-goTop")
                         .addClass("fk-hidden")
                         .appendTo("body");
    if(cssClass)
      handle.addClass(cssClass);
        handle.html($('#go-top').html());
        var t_checkScrollPos = throttle(checkScrollPos, 100);
    $(window).scroll(t_checkScrollPos);
        handle.click(toTop);
        $('body').bind("onScrolledToView", function(){
                //handle.fadeOut("fast");
                blocked = false;
         });
  }

  function toTop(){
      blocked = true;
        handle.addClass('gtt-flytop');
        shown=false;
    setTimeout(function() {
            $('body').scrollToView({scrollTo:0});
        }, 1);

  }

  function show() {
        if(!shown) {
            handle.removeClass('gtt-flytop');
        handle.fadeIn('medium');
            shown=true;
        }
  }

  function hide() {
      //handle.fadeOut("fast");
  }

  function checkScrollPos() {
    var wh = $(window).height();
    var scrollTop = $(window).scrollTop();
    //we show go to top only when the scrollbar is in middle of page;
    if(this.blocked)
      return; // we are animating, don't toggle
    if( wh < scrollTop)
          show();
    //else
    //      hide();

  }

    function destroy() {
        handle.hide().remove();
        $(window).unbind("scroll",checkScrollPos);
    }

  return {
        init: init,
        show: show,
        hide: hide,
        toTop: toTop,
        getHandle: function() {
                        return handle;
                   },
        destroy: destroy
    };

}());

QS.ui.popup = function(params) {

};

function throttle(fn, delay) {
  var timer = null;
  return function () {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      fn.apply(context, args);
    }, delay);
  };
};