
$(window).scroll(function () {
    var mobileScrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;

    console.log('判断手机',isMobile());
    console.log(mobileScrollTop);
    var topp = $(document).scrollTop();
    if(isMobile()){
        if(mobileScrollTop > 0){
            $('.case-index-box').css('animation-play-state','running');
        }
        if(mobileScrollTop > 642){
            $('.flow-num,.flow-num div').css('animation-play-state','running');
            $('.flow-content').css('animation-play-state','running');
        }

        if(mobileScrollTop > 1248){
            $('.fb-button-path').css('animation-play-state','running');
        }

    }else{
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
    }
})
