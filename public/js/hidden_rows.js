/* hide / show rows */
$(".secondRow").hide();
$(".showExtraRow").click(function() {
    $(this).parent().toggleClass('selected');
    $("td#" + $(this).attr("id") + " >  i").toggleClass('open')
    $(".connection_" + $(this).attr("id")).toggle(0);

    var last_visible_element = $(".connection_" + $(this).attr("id") + ":visible:last");
    last_visible_element.css("border-bottom", "2px solid var(--new-blue)");

});