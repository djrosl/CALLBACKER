var rootHost = 'http://callbacker.acrux.tk/';
var callHost = 'http://mos-akvarium.ru/';
$(window).load(function(){

  $.get(rootHost+'window/compose?url='+window.location.hostname, function(html){
    $('body').append(
        '<style>#roslCallbackerWindowWrap {display: none;}</style><div id="roslCallbackerWindowWrap">'+html+'</div>');



    $.get(rootHost+'widget/compose?url='+window.location.hostname+'&force='+force, function(html){
      $('body').append(
        '<style>#roslCallbackerWindowWrap {display: none;}</style><div id="roslCallbackerWidgetWrap">'+html+'</div>');
    });

    var is_showed = false;
    /*setInterval(function(){
      if($('#roslCallbackerWindowWrap:visible').length){
        if(!is_showed){
          acceptStatistics('show');
          is_showed = true;
          console.log('is_showed')
        }
      }
    }, 2000)*/

  });

  $('body').on('click', '.cb_w_close', function(e){
    e.preventDefault();
    $('#roslCallbackerWindowWrap').fadeOut(500);
  });

  var isClicked = false;


  $('body').on('click', '.cb_w_input', function(e){
    e.preventDefault();
    if(!isClicked){
      acceptStatistics('click',window.stats);
      isClicked = true;
    }
  });


  $('body').on('submit', '#roslCallbackerWindowWrap form, #roslCallbackerWidgetWrap form', function(e){
    e.preventDefault();

    var phone = $(this).find('input').val();

    if(!phone){
      alert('Введите свой номер телефона!');
      return false;
    }

    $.post(callHost+'call/process', {phonenumber:phone}, function(data){
        //console.log(data);
        acceptStatistics('call',window.stats);
      });


  });

});

  function acceptStatistics(type, instance){
    instance = typeof instance === 'undefined' ? 'window' : instance;
      var algoritm = instance == 'window' ? parseAlgoritm() : false;
      var instanceNumber = $('[data-'+instance+'-numb]').data(instance+'-numb');
      var data = {
        a:algoritm, 
        w:instanceNumber, 
        t:type, 
        s:window.location.hostname
      };
      isClicked = true;
      $.post(rootHost+instance+'/statistics', data, function(data){
        console.log(data);
      });
  }

  function parseAlgoritm(){
    return parseInt($('script[src*="algoritm"]').attr('src').replace(/^\D+|\.js/g, ''));
  }
