$(document).ready(function(){
    display_sponsor_info()
});

function display_sponsor_info() {
    $.post("sponsors.php",{type: "sponsor"}, function(data, status) {
        $("#sponsors").html(data);
    });
}