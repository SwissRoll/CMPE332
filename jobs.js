$(document).ready(function(){
    display_jobs()
});

function display_jobs() {
    $("#jobs").html("<div class=\"ui active inverted dimmer\"><div class=\"ui text loader\">Loading</div></div>");
    $.get("jobs.php", function(data, status) {
        $("#jobs").html(data);
        $("#job_data_table").DataTable({
            scrollY:        '55vh',
            scrollCollapse: true,
            paging:         false}).draw();
    });
}