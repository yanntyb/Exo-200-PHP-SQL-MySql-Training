<?php

include "./import.php";
$randoManager = new RandoManager();
$json = json_decode(file_get_contents('php://input'), true)['id'];

$tab = $randoManager->getRandos(true, $json);

foreach($tab as $item){
   $randoManager->delete($item);
}