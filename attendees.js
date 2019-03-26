$(document).ready(function(){
    $('.ui.sidebar').sidebar();
    $('.ui.accordion').accordion({
        exclusive: false
      });
    $('.ui.dropdown').dropdown();
    display_attendees("student");
    display_attendees("sponsor");
    display_attendees("professional");
});

function display_attendees(attendee_type){
    $.post("display_attendees.php", {type: attendee_type}, function(data, status) {
        $("#" + attendee_type).html(data);
        $("#" + attendee_type +"_data_table").DataTable({
        scrollY:        '55vh',
        scrollCollapse: true,
        paging:         false}).draw();
    });
}
