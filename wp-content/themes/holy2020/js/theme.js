(function ($) {
    $(document).ready(function() {
        $('.slice-deal').carousel({
            num: 3,
            maxWidth: 600,
            maxHeight: 258,
            distance: 170,
            scale: 0.6,
            animationTime: 1000,
            showTime: 4000
        });
        $( "#container ul li" ).each(function( index ) {
            var css = $(this).css('z-index');
            if(css == 10000){
                $(this).find(".box-info-service").addClass("open");
            }else{
                $(this).find(".box-info-service").removeClass("open");
            }
        });
    });

    $(window).scroll(function(){
        var sticky = $('.fix-nav'),
            scroll = $(window).scrollTop();
        if (scroll >= 5) sticky.addClass('bg-nav');
        else sticky.removeClass('bg-nav');
    });
    $(".navbar-toggle").click(function(){
        $("body").toggleClass("active");});
}(jQuery));