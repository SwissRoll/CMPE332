$(document).ready(function(){
    display_committee()
    $('.ui.sidebar').sidebar();
    $('.ui.dropdown').dropdown();
    
    $("#committee_dropdown").dropdown('setting', 'onChange', function(){
        display_committee()
    });
});

function display_committee() {
    console.log('test');
    $.post("committee.php",
    {
        committee: $("#committee_dropdown").find(":selected").text()
    }, function(data, status) {
        $("#committee_members").html(data);
    });
}
