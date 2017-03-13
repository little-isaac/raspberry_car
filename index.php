<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include_once 'config.php';
?>
<!DOCTYPE>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css?t=<?php echo time(); ?>">
    </head>
    <body>
        <div id="direction"></div>
        <?php
        foreach ($directions as $direction => $display) {
            ?>
            <button class="direction" data-direction="<?php echo $display; ?>"><?php echo $direction; ?></button>
            <?php
        }
        ?>
        <div class="rotation direction">
            <div id="xRotationDiv">

            </div>
            <div id="yRotationDiv">

            </div>
            <button id="startRotation">Start Rotation</button>
        </div>
        

<!--        <button class="direction" data-direction="<?php echo $directions['FORWARD']; ?>">Forward</button>
<button class="direction" data-direction="<?php echo $directions['RIGHT']; ?>">Right</button>
<button class="direction" data-direction="<?php echo $directions['BACKWARD']; ?>">Back</button>
<button class="direction" data-direction="<?php echo $directions['LEFT']; ?>">Left</button>-->

        <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
        <script>
            window.directions = <?php echo json_encode($directions) ?>;
        </script>
        <script   src="js/main.js?t=<?php echo time(); ?>"></script>
    </body>
</html>	