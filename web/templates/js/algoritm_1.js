  var isShowed = false;
  setTimeout(function(){
    if(!isShowed){
      $('#roslCallbackerWindowWrap').fadeIn(500);
      
      //$('#roslCallbackerWindowWrap').trigger('afterShow');
      window.stats = 'window'
      window.acceptStatistics('show',window.stats);

      isShowed = true;
    }
  }, 30000);