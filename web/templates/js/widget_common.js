(function(){

  window.acceptStatistics('show', 'widget');

  $('#roslCallbackerWidgetWrap').css('display', 'block')

  if($('.common').length) {
    $('.cb_button').click(function(e){
      e.preventDefault();
      if($('.cb_wrap').hasClass('init')){
        $('.cb_wrap').removeClass('init');
        isShowed = true;
        window.acceptStatistics('click', 'widget');
        console.log('widget stats')
      } else {
        $('.cb_wrap').addClass('init')
        $('.cb_thanks').removeClass('init')
      }
    });
    $('.thanks_close, .thanks_button').click(function(){
      $('.cb_thanks').addClass('init');
    })
    $('.cb_close').click(function(){
      $('.cb_wrap').addClass('init');
    })
  }


  if($('.widget-4').length){
    var time = 20,
        display = $('#time');

    $('.cb_button').click(function(e){
      //e.preventDefault();
      window.acceptStatistics('click', 'widget');
      console.log('widget stats')
      $('.cb_wrap').addClass('hidden');
      isShowed = true;
      startTimer(time, display, function(){
        $('.loader').fadeOut(200);
        $('.cb_wrap').removeClass('hidden');
      });
      $('.loader').fadeIn(500);
    });
  }


  $('body').on('click', '.openWindow', function(e){
    e.preventDefault();
      $('#roslCallbackerWindowWrap').fadeIn(500);
      window.acceptStatistics('click', 'widget');
      isShowed = true;
      is_showed = true;
      window.stats = 'widget';
  });



})($)


function startTimer(duration, display, callback) {
    var timer = duration, minutes, seconds;
    window.timerId = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            stopTimer()
            if(callback){
              callback();
            }
            //timer = duration;
        }
    }, 1000);
}

function stopTimer() {
  clearInterval(window.timerId);
}