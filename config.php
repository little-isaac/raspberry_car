<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$directions = array(
    "FORWARD"=>"forward",
    "BACKWARD"=>"back",
    "RIGHT"=>"right",
    "LEFT"=>"left",
    "STOP"=>"stop",
);
define('FD_SUCCESS',0);
define('FD_ERROR',1);

define('PIN_MOTOR_LEFT_FORWARD',17);
define('PIN_MOTOR_LEFT_BACKWARD',27);
define('PIN_MOTOR_LEFT_LOGIC',22);

define('PIN_MOTOR_RIGHT_FORWARD',13);
define('PIN_MOTOR_RIGHT_BACKWARD',19);
define('PIN_MOTOR_RIGHT_LOGIC',26);

function executeCommand($cmd){
    return shell_exec($cmd);
}
function changeDirection($action,$pin,$value){
    return executeCommand("/usr/local/bin/gpio -g $action $pin $value");
}