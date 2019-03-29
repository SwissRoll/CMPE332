$(document).ready(function(){
    $('.ui.sidebar').sidebar();
    $('.ui.accordion').accordion({
        exclusive: false
      });
    $('.ui.dropdown').dropdown();

    $("#type_dropdown").dropdown('setting', 'onChange', function(){
        get_sponsors();
    });

    
    display_attendees("student");
    display_attendees("sponsor");
    display_attendees("professional");

    $("#submit_button").click(function () {
		$.post("add_attendee.php",
			{
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                sponsor: $("#sponsor_dropdown").find(":selected").text(),
                type:  $("#type_dropdown").find(":selected").text()
            }, function (data,status) {
                $("#response_content").text(data)
                $('.ui.mini.modal').modal({
                    closable  : false,
                    onApprove : function() {
                        display_attendees("student");
                        display_attendees("sponsor");
                        display_attendees("professional");
                    }
                  })
                  .modal('show');
            });
        });
});

function display_attendees(attendee_type){
    $.post("display_attendees.php", {type: attendee_type}, function(data, status) {
        $("#" + attendee_type +"_column").html(data);
        $("#" + attendee_type +"_data_table").DataTable({
        scrollY:        '55vh',
        scrollCollapse: true,
        paging:         false}).draw();
    });
}


function get_sponsors() {
    if ($("#type_dropdown").find(":selected").text() == "sponsor") {
        $.get("sponsor_list.php", function(data,status) {
            $("#sponsor_selection").html(data);
        });
        $('.ui.dropdown').dropdown("refresh");
    } else {
        $("#sponsor_selection").html("<label>Sponsor Company</label><select class=\"ui disabled dropdown\" id=\"sponsor_dropdown\"><option value=\"\">Select Sponsor</option></select>");
        $('.ui.dropdown').dropdown("refresh");
    }
}