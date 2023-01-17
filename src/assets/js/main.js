$(document).ready(function () {

    // Add click events to show faq group
    $("#faq div.faq-group").click(function () {
        let __that = $(this);
        __that.find('.inner').slideToggle();
        __that.find('svg').toggleClass('rotate-90');
    });


    $(".open__aside").click(function () {
        $("aside").slideToggle('slow');
    });

    $(".close__aside").click(function () {
        $("aside").slideToggle('fast');
    });
});