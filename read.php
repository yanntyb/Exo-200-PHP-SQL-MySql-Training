<?php
    require_once "import.php";

    $randoManager = new RandoManager();
    $articles = $randoManager->getRandos();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "./parts/nav.html";
        if(isset($_GET, $_GET["success"])){
            if($_GET["success"] === "true"){?>
                <div id="succes">
                    Rando added with success
                </div><?php
            }
        }
    ?>
    <div id="cont">
        <div id="title"><?php
            foreach (((array) $articles[0]) as $title => $val){?>
                <h1><?php echo substr($title, 6) ?></h1><?php
            }
            ?>
        </div><?php
        foreach($articles as $article){?>
            <div class="row">
                <div class="info id">
                    <input type="checkbox">
                    <span><?php
                        echo $article->getId();?>
                    </span>
                </div>
                <div class="info"><?php
                    echo $article->getName();
                    ?>
                </div>
                <div class="info" style="
                <?php
                    switch($article->getDifficulty()) {
                        case "Moyen":
                            echo "background-color: orange";
                            break;
                        case "Facile":
                            echo "background-color: green";
                            break;
                        case "Difficile":
                            echo "background-color: red";
                            break;
                        case "Très difficile":
                            echo "background-color: black; color: white";
                            break;
                    }?>"><?php
                    echo $article->getDifficulty();
                    ?>
                </div>
                <div class="info"><?php
                    echo $article->getDuration();
                    ?>
                </div>
                <div class="info"><?php
                    echo $article->getHeightDifference();
                    ?>
                </div>
                <div class="info"><?php
                    echo $article->getDistance();
                    ?>
                </div>
                <div class="info"><?php
                    echo $article->getAvalide();
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div id="center">
        <div id="suppress">Suppress</div>
    </div>
    <script src="modifie.js"></script>
    <script src="delete.js"></script>
</body>
</html>