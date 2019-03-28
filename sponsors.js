$(document).ready(function(){
	display_sponsor_info();
	
	$('.ui.sidebar').sidebar();
    $('.ui.accordion').accordion({
        exclusive: false
      });
    $('.ui.dropdown').dropdown();
	
	$("#type_dropdown").dropdown('setting', 'onChange', function(){
        get_sponsors();
    });
	
	// TO CHANGE
	$("#submit_button").click(function () {
		$.post("add_sponsor.php",
			{
                name: $("#name").val(),
                tier: $("#tier").val(),
                cost: $("#cost").val(),
            }, function (data,status) {
                $("#response_content").text(data)
                $('.ui.basic.modal').modal({
                    closable  : false,
                    onApprove : function() {
                       /* display_attendees("student");
                        display_attendees("sponsor");
                        display_attendees("professional");*/
                    }
                  })
                  .modal('show');
            });
        });
	
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