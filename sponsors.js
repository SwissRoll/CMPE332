$(document).ready(function(){
    display_sponsor_info();
});

function display_sponsor_info() {
	$.get("sponsors.php", {sponsor_name: "sponsor"}, function(data, status) {
        $("#sponsors_list").html(data);
    });
}