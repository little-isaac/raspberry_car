var $keyBtn = $(".direction");
var $direction = $("#direction");
var $startRotation = $("#startRotation");
var $xRotationDiv = $("#xRotationDiv");
var $yRotationDiv = $("#yRotationDiv");
var rotationPath = "http://192.168.1.102:8080";
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
    $startRotation.click(function () {
//        getRotation();
        setInterval(getRotation, 100);
    });
}
function getRotation() {
    $.ajax({
        url: rotationPath,
        // The name of the callback parameter, as specified by the YQL service
        jsonp: "callback",
        // Tell jQuery we're expecting JSONP
        dataType: "jsonp",
        // Work with the response
        success: function (data) {
//            var data = $.parseJSON(dataObject);
            window.y = data.y;
            if(window.y > 10 || window.y < -10){
                if(window.y > 10){
                    sendDirection('back');
                }
                else{
                    sendDirection('forward');
                }
            }
            else{
                sendDirection('stop');
            }
            $yRotationDiv.html("Y : "+data.y);
        }
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
function sendDirection(direction) {
    $.post(interface, {
        direction: direction
    }, function (data) {
        $direction.html(data.direction);
    });
}