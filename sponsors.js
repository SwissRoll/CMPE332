$(document).ready(function(){
	display_sponsor_info();
	
	$('.ui.sidebar').sidebar();
    $('.ui.accordion').accordion({
        exclusive: false
      });
    $('.ui.dropdown').dropdown();
	
	/*$("#type_dropdown").dropdown('setting', 'onChange', function(){
        get_sponsors();
    });*/
	
	
	$("#submit_button").click(function () {
		$.post("add_sponsor.php",
			{
                name: $("#cname").val(),
                tier: $("#tier").val(),
                cost: $("#amount").val()
            }, function (data,status) {
                $("#response_content").text(data)
                $('.ui.basic.modal').modal({
                    closable  : false,
                    onApprove : function() {
                      display_sponsor_info();
                    }
                  })
                  .modal('show');
            });
        });
		
	$("#delete_button").click(function () {
		$.post("delete_sponsor.php",
			{
                company: $("#company").val()
            }, function (data,status) {
                $("#response_content").text(data)
                $('.ui.basic.modal').modal({
                    closable  : false,
                    onApprove : function() {
                      display_sponsor_info();
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

function get_sponsors() {
	$.get("sponsor_list.php", function(data,status) {
            $("#sponsor_dropdown").html(data);
        });
	$('.ui.dropdown').dropdown();
}