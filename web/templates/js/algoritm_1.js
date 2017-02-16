  var isShowed = false;
  setTimeout(function(){
    $('#roslCallbackerWindowWrap').fadeIn(500);
    
    //$('#roslCallbackerWindowWrap').trigger('afterShow');
    window.acceptStatistics('show');

    isShowed = true;
  }, 30000);


  
  window.acceptStatistics = function(type){
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

  window.parseAlgoritm = function(){
    return parseInt($('script[src*="algoritm"]').attr('src').replace(/^\D+|\.js/g, ''));
  }
