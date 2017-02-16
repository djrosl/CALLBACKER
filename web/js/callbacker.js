/*jQuery(function($) {

  var _oldShow = $.fn.fadeIn;

  $.fn.fadeIn = function(speed, oldCallback) {
    return $(this).each(function() {
      var obj         = $(this),
          newCallback = function() {
            if ($.isFunction(oldCallback)) {
              oldCallback.apply(obj);
            }
            obj.trigger('afterShow');
          };

      // you can trigger a before show if you want
      obj.trigger('beforeShow');

      // now use the old function to show the element passing the new callback
      _oldShow.apply(obj, [speed, newCallback]);
    });
  }
});


*/

var rootHost = 'http://localhost:8080/';
$(window).load(function(){

  $.get(rootHost+'window/compose?url='+window.location.hostname, function(html){
    $('body').append(
        '<style>#roslCallbackerWindowWrap {display: none;}</style><div id="roslCallbackerWindowWrap">'+html+'</div>');

    var is_showed = false;
    setInterval(function(){
      if($('#roslCallbackerWindowWrap:visible').length){
        if(!is_showed){
          acceptStatistics('show');
          is_showed = true;
          console.log('is_showed')
        }
      }
    }, 2000)

  });

  $('body').on('click', '.cb_close', function(e){
    e.preventDefault();
    $('#roslCallbackerWindowWrap').fadeOut(500);
  });

  var isClicked = false;


  $('body').on('click', '.cb_input', function(e){
    e.preventDefault();
    if(!isClicked){
      //acceptStatistics('click');
      isClicked = true;
    }
  });
});

  function acceptStatistics(type){
    if(isShowed){
      var algoritm = parseAlgoritm();
      var windowNumber = $('[data-window-numb]').data('window-numb');
      var data = {
        a:algoritm, 
        w:windowNumber, 
        t:type, 
        s:window.location.hostname
      };
      isClicked = true;
      $.post(rootHost+'window/statistics', data, function(data){
        console.log(data);
      });
    }
  }

  function parseAlgoritm(){
    return parseInt($('script[src*="algoritm"]').attr('src').replace(/^\D+|\.js/g, ''));
  }
