$(document).ready(function(){
    get_companies();
    display_sponsors();
	
	$('.ui.sidebar').sidebar();
    $('.ui.accordion').accordion({
        exclusive: false
      });
    $('.ui.dropdown').dropdown();
	
	
	$("#add_button").click(function () {
		$.post("add_sponsor.php",
			{
                name: $("#company_name").val(),
                tier: $("#tier_dropdown").find(":selected").text(),
                cost: $("#cost").val()
            }, function (data,status) {
                $("#response_content").text(data)
                $('.ui.mini.modal').modal({
                    closable  : false,
                    onApprove : function() {
                        display_sponsors();
                        get_companies();
                        $('.ui.dropdown').dropdown("refresh");
                    }
                  })
                  .modal('show');
            });
        });
		
	$("#delete_button").click(function () {
		$.post("delete_sponsor.php",
			{
                company: $("#company_dropdown").find(":selected").text()
            }, function (data,status) {
                $("#response_content").text(data)
                $('.ui.mini.modal').modal({
                    closable  : false,
                    onApprove : function() {
                        display_sponsors();
                        get_companies();
                        $('.ui.dropdown').dropdown("refresh");
                    }
                  })
                  .modal('show');
            });
        });
	
});

function display_sponsors(){
    $.get("display_sponsors.php", function(data, status) {
        $("#sponsor_content").html(data);
        $("#sponsor_data_table").DataTable({
        scrollY:        '55vh',
        scrollCollapse: true,
        paging:         false}).draw();
    });
}


function get_companies() {
	$.get("get_companies.php", function(data,status) {
            $("#company_dropdown").html(data);
        });
}