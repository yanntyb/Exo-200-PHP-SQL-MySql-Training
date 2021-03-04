<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/formulaire.css">
</head>
<body>
    <?php include "./parts/nav.html" ?>
    <div id="cont">
        <div id="form">
            <form action="checkInsert.php?mod=1" method="post">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
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
                    <input type="number" name="distance" id="distance" placeholder="mettre" required>
                </div>
                <div>
                    <label for="duration">Duration</label>
                    <input type="number" name="heure" id="heure" placeholder="Heure" min="0" required>
                    <span>:</span>
                    <input type="number" name="minute" id="minute" placeholder="Minute" min="0" max="59" required>
                </div>
                <div>
                    <label for="height_difference">Height difference</label>
                    <input type="number" name="height_difference" id="height_difference" required>
                </div>
                <div>
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>