
$(document).ready(function(){
    if(isMobile() == true){
        MobileAnimation();
    }
})


function MobileAnimation(){
    $('.case-index-box').css({'animation-play-state':'running','opacity': 1});
    $('.flow-num,.flow-num div').css({'animation-play-state':'running','opacity': 1});
    $('.flow-content').css({'animation-play-state':'running','opacity': 1});
    $('.fb-button-path').css({'animation-play-state':'running','opacity': 1});
}



$(window).scroll(function () {
    var mobileScrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
    var topp = $(document).scrollTop();
    if(topp > 553){
        $('.case-index-box').css('animation-play-state','running');
    }
    if(topp > 2200){
        $('.flow-num,.flow-num div').css('animation-play-state','running');
        $('.flow-content').css('animation-play-state','running');
    }

    if(topp > 2750){
        $('.fb-button-path').css('animation-play-state','running');
    }

})
