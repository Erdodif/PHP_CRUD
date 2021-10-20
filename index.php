<?php 
require_once "DB.php";
require_once "Elorejelzes.php";
if ($_POST["action"]??null === "create"){
    //TODO
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="letrehoz">
        <?php
            echo Elorejelzes::form();
        ?>
    </div>
    <div class="lista">
        <?php
            $elemek = Elorejelzes::osszes();
            $ki = "";
            foreach($elemek as $elem){
                $ki.= $elem->kartya();
            }
            echo $ki;
        ?>
    </div>
</body>
</html>