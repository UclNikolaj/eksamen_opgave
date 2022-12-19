// show page loader
$(".load").click(function(){
    $(".loader").addClass("showLoader");
});
// when going back to a page that has a loading function, disable the loading screen
$(window).bind("pageshow", function(event) {
    $(".showLoader").hide();
});

// clicking on the filter toggle icon, toggle the filter navigation
$("#filter_toggle").click(function(){
    $("#sidebar").animate({width:'toggle'}, 150);
});
