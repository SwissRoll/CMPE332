$(document).ready(function(){
    get_days();
    get_sessions();
    get_display();
    get_locations() 
    $('.ui.sidebar').sidebar();
    $('.ui.dropdown').dropdown();
    $('.ui.selection.dropdown').dropdown();

    
    $("#display_days").dropdown('setting', 'onChange', function(){
        display_schedule();
    });

    $("#submit_button").click(function () {
		$.post("change_schedule.php",
			{
                name: $("#sessions").find(":selected").text(),
                startTime: $("#start_time").find(":selected").text(),
                endTime: $("#end_time").find(":selected").text(),
                day:  $("#days").find(":selected").text(),
                location:  $("#locations").find(":selected").text()
            }, function (data,status) {
                console.log("success");
            });
        });

});

function display_schedule() {
    $("#schedule_output").html("<div class=\"ui active inverted dimmer\"><div class=\"ui text loader\">Loading</div></div>");
    $.post("schedule.php", {
        day: $("#display_days").dropdown('get value')
    },
    function(data, status) {
        $("#schedule_output").html(data);
    });
}

function get_days() {
    $.get("days.php", function(data, status) {
        $("#days").html(data);
    });
}

function get_locations() {
    $.get("locations.php", function(data, status) {
        $("#locations").html(data);
    });
}

function get_display() {
    $.get("display_days.php", function(data, status) {
        $("#display_days_content").html(data);
    });
}

function get_sessions() {
    $.get("sessions.php", function(data, status) {
        $("#sessions").html(data);
    });
}