$(document).ready(function(){
    display_guests()
    
    $("#search_box").on('input', function(){
        display_guests()
    });
});

function display_guests() {
    console.log($("#search_box").val());
    $.post("rooms.php",
    {
        guests_list: $("#search_box").val()
    }, function(data, status) {
        $("#guests").html(data);
    });
}