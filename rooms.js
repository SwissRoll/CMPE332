$(document).ready(function(){
    get_rooms();
    display_guests()
    
    
    
    $("#rooms").dropdown('setting', 'onChange', function(){
        display_guests();
    });
});

function display_guests() {
    $.post("rooms.php",
    {
        room: $("#rooms").find(":selected").text()
    }, function(data, status) {
        $("#guests").html(data);
    });
}

function get_rooms() {
    $.get("get_rooms.php", function(data, status) {
        $("#rooms").html(data);
    });

}