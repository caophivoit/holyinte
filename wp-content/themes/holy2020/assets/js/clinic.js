$(document).ready(function() {
	$('.title-text').click(function() {
		/* Act on the event */
        $(this).toggleClass ('icon-down')
		$(this).next().slideToggle(800);

	});
	$('.ic-top').click(function() {
		/* Act on the event */
		$('.mb-nav-top').toggleClass('in');
        $('.box-smark-nav').toggleClass('box-show');
	});
	$('.box-smark-nav').click(function() {
		/* Act on the event */
        $('.mb-nav-top').toggleClass('in');
        $('.box-smark-nav').toggleClass('box-show');
	});
    $('.icon-nav-mb').click(function() {
        /* Act on the event */
        $('.nav-category-left-mb').toggleClass('open');
    });
});

$(document).ready(function(){

	$('.tab-banner li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('.tab-banner li').removeClass('current');
		$('.box-tab-banner-time').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

})