$(document).ready(function(){
    display_sponsor_info();
});

function display_sponsor_info() {
    $.post("sponsors.php", function(data, status) {
        $("#sponsors_list").html(data);
    });
}