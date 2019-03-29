$(document).ready(function(){
    $('.ui.sidebar').sidebar();
    display_attendees();
    display_sponsors();
    display_total_intake();
});


function display_attendees(){
    $.get("attendee_financials.php", function(data, status) {
        $("#attendees").html(data);
    });
}

function display_sponsors(){
    $.get("sponsor_financials.php", function(data, status) {
        $("#sponsors").html(data);
    });
}


function display_total_intake(){
    $.get("total_intake.php", function(data, status) {
        $("#intake").html(data);
    });
}