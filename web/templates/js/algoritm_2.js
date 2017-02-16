var pages = readCookie('pages');

var isShowed = false;

if(!pages){
  pages = 0;
}
pages++;
eraseCookie('pages');
createCookie('pages', pages, 30);

if(pages >= 3) {
  setTimeout(function(){
    if(!isShowed){
      $('#roslCallbackerWindowWrap').fadeIn(500);

      isShowed = true;  
    }
  }, 15000);
}

$(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() == $(document).height()) {
      if(!isShowed){
        $('#roslCallbackerWindowWrap').fadeIn(500);
      
        isShowed = true;
      }
   }
});

function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}