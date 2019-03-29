$(document).ready(function(){
    display_jobs()
});

function display_jobs() {
    $.get("jobs.php", function(data, status) {
        $("#jobs").html(data);
        $("#job_data_table").DataTable({
            scrollY:        '55vh',
            scrollCollapse: true,
            paging:         false}).draw();
    });
}