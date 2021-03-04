<?php

require_once "import.php";

$randoManager = new RandoManager();

function sanitize($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);

    return $data;
}



if(isset($_GET['mod'])){
    if(isset($_POST, $_POST["avalide"], $_POST["name"], $_POST["difficulty"], $_POST["distance"], $_POST["heure"], $_POST["minute"], $_POST["height_difference"])){

        if($_POST["minute"] < 10){
            $_POST["minute"] = "0" . strval($_POST["minute"]);
        }

        if($_POST["avalide"] === "yes"){
            $valide = 1;
        }
        else{
            $valide = 0;
        }

        $rando = new Rando();
        $rando
            ->setName(sanitize($_POST["name"]))
            ->setDifficulty(sanitize($_POST["difficulty"]))
            ->setDistance(sanitize($_POST["distance"]))
            ->setDuration(sanitize($_POST["heure"]) . "h" . sanitize($_POST["minute"]))
            ->setHeightDifference(sanitize($_POST["height_difference"]))
            ->setId(intval(sanitize($_GET["id"])))
            ->setAvalide($valide);

    }
    if($_GET["mod"] === "1"){
        $randoManager->insert($rando);
    }
    elseif($_GET["mod"] === "2"){
        $randoManager->update($rando);
    }
    header("Location: ./read.php?success=true");
}
else{
    echo "error";
}