/*$('.my-Index').scroll(scrollHandlerOne);

function scrollHandlerOne() {
    if ($('.my-Index').scrollTop() > 20) {
        document.getElementById("nav-blog").style.top = "-120px";
    } else {
        document.getElementById("nav-blog").style.top = "0";
    }
}*/
var position = $('.my-Index').scrollTop();

$('.my-Index').scroll(function() {
    var scroll = $('.my-Index').scrollTop();
    if((scroll > position) && ($('.my-Index').scrollTop() > 0)) {
        document.getElementById("nav-blog").style.top = "-120px";
    }
    if(($('.my-Index').scrollTop() === 0)){
        document.getElementById("nav-blog").style.top = "0";
    }
    if((scroll < position) && ($('.my-Index').scrollTop() > 0)){
        document.getElementById("nav-blog").style.top = "-30px";
    }
    position = scroll;
});