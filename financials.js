$(document).ready(function(){
    $('.ui.sidebar').sidebar();
    $('.ui.accordion').accordion({
        exclusive: false
      });
    $('.ui.dropdown').dropdown();
    display_attendees("student");
    display_attendees("professional");
    display_sponsors("sponsor");
    display_attendee_cost("student");
    display_attendee_cost("professional");
    display_sponsor_cost("sponsor");
    display_totals();
    display_total_cost();
});

function display_attendees(attendee_type){
    $.post("display_attendee_financial.php", {type: attendee_type}, function(data, status) {
        $("#" + attendee_type).html(data);
        $("#" + attendee_type +"_data_table").DataTable({
        scrollY:        '55vh',
        scrollCollapse: true,
        paging:         false}).draw();
    });
}

function display_sponsors(attendee_type){
    $.post("display_sponsors.php", function(data, status) {
        $("#" + attendee_type).html(data);
        $("#" + attendee_type +"_data_table").DataTable({
        scrollY:        '55vh',
        scrollCollapse: true,
        paging:         false}).draw();
    });
}

function display_attendee_cost(attendee_type){
    $.post("display_attendee_cost.php", {type: attendee_type}, function(data, status) {
        $("#" + attendee_type + "_total").html(data);
    });
}

function display_sponsor_cost(attendee_type){
    $.post("display_sponsor_cost.php", function(data, status) {
        $("#" + attendee_type + "_total").html(data);
    });
}

function display_totals(){
    $.post("display_total_source.php", function(data, status) {
        $("#" + "total").html(data);
        $("#" + "total" +"_data_table").DataTable({
        scrollY:        '55vh',
        scrollCollapse: true,
        paging:         false}).draw();
    });
}

function display_total_cost(){
    $.post("display_total_cost.php", function(data, status) {
        $("#" + "total" + "_total").html(data);
    });
}