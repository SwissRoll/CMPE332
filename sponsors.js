$(document).ready(function(){
	$('.ui.sidebar').sidebar();
    $('.ui.accordion').accordion({
        exclusive: false
      });
    $('.ui.dropdown').dropdown();
	
	// TO CHANGE
	$("#submit_button").click(function () {
		$.post("add_sponsor.php",
			{
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                sponsor: $("#sponsor_dropdown").find(":selected").text(),
                type:  $("#type_dropdown").find(":selected").text()
            }, function (data,status) {
                $("#response_content").text(data)
                $('.ui.basic.modal').modal({
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
	
    display_sponsor_info();
});

function display_sponsor_info() {
	$.get("sponsors.php", {sponsor_name: "sponsor"}, function(data, status) {
	$("#sponsors_list").html(data);
});
}

//TO CHANGE
function get_sponsors() {
    if ($("#type_dropdown").find(":selected").text() == "sponsor") {
        $.get("sponsor_list.php", function(data,status) {
            $("#sponsor_selection").html(data);
        });
        $('.ui.dropdown').dropdown();
    } 
}