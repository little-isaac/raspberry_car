<?php

include_once '../config.php';
header("Content-type:application/json");
$retObj = new stdClass();

function setPins() {
    changeDirection('mode', PIN_MOTOR_LEFT_FORWARD, 'out');
    changeDirection('mode', PIN_MOTOR_LEFT_BACKWARD, 'out');
    changeDirection('mode', PIN_MOTOR_LEFT_LOGIC, 'out');
    changeDirection('write', PIN_MOTOR_LEFT_LOGIC, 1);

    changeDirection('mode', PIN_MOTOR_RIGHT_FORWARD, 'out');
    changeDirection('mode', PIN_MOTOR_RIGHT_BACKWARD, 'out');
    changeDirection('mode', PIN_MOTOR_RIGHT_LOGIC, 'out');
    changeDirection('write', PIN_MOTOR_RIGHT_LOGIC, 1);
}

function moveForward() {
    changeDirection('write', PIN_MOTOR_LEFT_FORWARD, 1);
    changeDirection('write', PIN_MOTOR_LEFT_BACKWARD, 0);

    changeDirection('write', PIN_MOTOR_RIGHT_FORWARD, 1);
    changeDirection('write', PIN_MOTOR_RIGHT_BACKWARD, 0);
}

function moveRight() {
    changeDirection('write', PIN_MOTOR_LEFT_FORWARD, 1);
    changeDirection('write', PIN_MOTOR_LEFT_BACKWARD, 0);

    changeDirection('write', PIN_MOTOR_RIGHT_FORWARD, 0);
    changeDirection('write', PIN_MOTOR_RIGHT_BACKWARD, 1);
}

function moveBack() {
    changeDirection('write', PIN_MOTOR_LEFT_FORWARD, 0);
    changeDirection('write', PIN_MOTOR_LEFT_BACKWARD, 1);

    changeDirection('write', PIN_MOTOR_RIGHT_FORWARD, 0);
    changeDirection('write', PIN_MOTOR_RIGHT_BACKWARD, 1);
}

function moveLeft() {
    changeDirection('write', PIN_MOTOR_LEFT_FORWARD, 0);
    changeDirection('write', PIN_MOTOR_LEFT_BACKWARD, 1);

    changeDirection('write', PIN_MOTOR_RIGHT_FORWARD, 1);
    changeDirection('write', PIN_MOTOR_RIGHT_BACKWARD, 0);
}

function stop() {
    changeDirection('write', PIN_MOTOR_LEFT_FORWARD, 0);
    changeDirection('write', PIN_MOTOR_LEFT_BACKWARD, 0);

    changeDirection('write', PIN_MOTOR_RIGHT_FORWARD, 0);
    changeDirection('write', PIN_MOTOR_RIGHT_BACKWARD, 0);
}

try {
    if (isset($_REQUEST['direction'])) {
        $direction = $_REQUEST['direction'];
        setPins();
        switch ($direction) {
            case $directions['FORWARD']:
                moveForward();
                break;
            case $directions['BACKWARD']:
                moveBack();
                break;
            case $directions['RIGHT']:
                moveRight();
                break;
            case $directions['LEFT']:
                moveLeft();
                break;
            case $directions['STOP']:
                stop();
                break;
            default:
                $direction = "Please provide valid direction";
                break;
        }

        $retObj->direction = $direction;
        $retObj->status = FD_SUCCESS;
        $retObj->msg = "SUCCESS";
    } else {
        $retObj->status = FD_ERROR;
        $retObj->msg = "No Direction Given";
        $retObj->direction = "No Direction Given";
    }
} catch (Exception $ex) {
    $retObj->status = FD_ERROR;
    $retObj->msg = $ex->getMessage();
    $retObj->direction = "No Direction Given";
}
echo json_encode($retObj);
?>