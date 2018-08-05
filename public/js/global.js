

$(window).scroll(function () {
    // var mobileScrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
    var topp = $(document).scrollTop();
    if(topp > 2500){
        $('.fb-button-path').css('animation-play-state','running');
    }
})
