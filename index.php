<?php 
require_once "DB.php";
require_once "Elorejelzes.php";
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
        <form>
            <input type="text" name="hofok" placeholder="10"> C°
            <input type="date" name="datum">
            <input type="text" name="leiras" placeholder="Leírás">
            <input type="submit" value="Feltölt">
        </form>
    </div>
    <div class="lista">
        <?php
            $elemek = Elorejelzes::osszes();
            $ki = "";
            foreach($elemek as $elem){
                $ki.= $elem->kartya();
            }
            echo $ki;
            echo Elorejelzes::getById(1)->kartya();
        
        ?>
    </div>
</body>
</html>