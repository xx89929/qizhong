
$(window).scroll(function () {
    var mobileScrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
    var topp = $(document).scrollTop();
    if(topp > 1900){
        $('.flow-num div').css('animation-play-state','running');
        $('.flow-content').css('animation-play-state','running');
    }
})
