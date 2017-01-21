var $keyBtn = $(".direction");
var $direction = $("#direction");
var interface = "interface/interfaceIndex.php";
$(document).ready(function () {
    addClickEvent();
    addKeyPressEvent();
});

function addClickEvent() {
    $keyBtn.click(function () {
        var direction = $(this).attr("data-direction");
        sendDirection(direction);
    });
}
function sendDirection(direction) {
    $.post(interface, {
        direction: direction
    }, function (data) {
        $direction.html(data.direction);
    });
}

function addKeyPressEvent() {
    $(document).keydown(function (event) {
        switch (event.which) {
            case 38:    // 38 for forward
                sendDirection(window.directions.FORWARD);
                break;
            case 39:    // 39 for right
                sendDirection(window.directions.RIGHT);
                break;
            case 40 : // 40 for backward
                sendDirection(window.directions.BACKWARD);
                break;    
            case 37 : // 40 for left
                sendDirection(window.directions.LEFT);
                break;    
            case 32 : // 40 for left
                sendDirection(window.directions.STOP);
                break;    
        }
    });
}