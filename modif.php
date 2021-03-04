<?php

include "./import.php";
$randoManager = new RandoManager();

if(isset($_GET['id'])){
    $rando = $randoManager->getRandos(true, [intval($_GET["id"])]);
    if(count($rando) === 1){
        $rando = $rando[0];
        $choose = true;
        $duration = explode("h",$rando->getDuration());
    }
    else{
        $choose = false;
    }
}
else{
    $choose = false;
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modif</title>
    <link rel="stylesheet" href="./css/formulaire.css">
</head>
<body>
    <?php
        include "./parts/nav.html";
        if($choose){?>
        <div id="cont">
            <div id="form">
                <form action="checkInsert.php?mod=2&id=<?php echo $_GET["id"] ?>" method="post">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $rando->getName() ?>" required>
                    </div>
                    <div>
                        <label for="difficulty">Difficulty</label>
                        <select name="difficulty" id="difficulty" required>
                            <option value="Facile">Facile</option>
                            <option value="Moyen">Moyen</option>
                            <option value="Difficile">Difficile</option>
                            <option value="Très difficile">Très difficile</option>
                        </select>
                    </div>
                    <div>
                        <label for="distance">Distance</label>
                        <input type="number" name="distance" id="distance" placeholder="mettre" value="<?php echo $rando->getDistance() ?>" required>
                    </div>
                    <div>
                        <label for="duration">Duration</label>
                        <input type="number" name="heure" id="heure" placeholder="Heure" value="<?php echo $duration[0] ?>" min="0" required>
                        <span>:</span>
                        <input type="number" name="minute" id="minute" placeholder="Minute" value="<?php echo $duration[1] ?>" min="0" max="59" required>
                    </div>
                    <div>
                        <label for="height_difference">Height difference</label>
                        <input type="number" name="height_difference" id="height_difference"  value="<?php echo $rando->getHeightDifference() ?>"required>
                    </div>
                    <div>
                        <label for="avalide">Avalide</label>
                        <select name="avalide" id="avalide">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div>
                        <input type="submit">
                    </div>
                </form>
            </div>
        </div><?php
        }?>
</body>
</html>