<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="memory.css">
    <title>神経衰弱</title>
</head>
<body>
<?php
include "memory.php";
session_start();
$game = new Memory();

if (isset($_POST["reset"])) {
    $_SESSION = array();
    session_destroy();
}

if (isset($_POST["num"])) {
    $_SESSION = array();
    session_destroy();

    $num = $_POST["num"];
    $_SESSION["num"] = $num;
    $score = array(0,0,0,0,0,0,0);
}

if (!isset($_SESSION["cards"])) {
    $cards = $game->setCards();
    $_SESSION["cards"] = $cards;
} else {
    $cards = unserialize($_SESSION["cards"]);
}

if (isset($_POST["card"])) {
    if (!isset($_SESSION["card"])) {
        $_SESSION["card"] = $_POST["card"];
    } else {
        $o = $_SESSION["card"];
        $t = $_POST["card"];
        echo $i;
        echo $j;
        preg_match('/[0-9]{2}/', $cards[$o], $one);
        preg_match('/[0-9]{2}/', $cards[$t], $two);
        if (strcmp($one[0], $two[0]) == 0) {
            $cards[$o] = $game->SKEL;
            $cards[$t] = $game->SKEL;
            $FLAG = 1;
        } else {
            $FLAG = 1;
        }
    }
}
$_SESSION["cards"] = serialize($cards);

?>
<div class="center">
<form method="post" action="game.php">
    <?php
    for ($i = 0; $i < 52; $i++) {
        if ($i%13 == 0) {
            echo "<br>";
        }
        if (strcmp($game->SKEL, $cards[$i]) == 0) {
            echo '<img src="'.$game->TRUMP_PATH.$game->SKEL.'" width="6%" height="6%">';
        }
        else if (isset($_POST["card"]) && $_POST["card"] == $i) {
            echo '<img src="'.$game->TRUMP_PATH.$cards[$i].'" width="6%" height="6%">';
        }
        else if (isset($_SESSION["card"]) && $_SESSION["card"] == $i) {
            echo '<img src="'.$game->TRUMP_PATH.$cards[$i].'" width="6%" height="6%">';
            //echo "hello";
        }
        else {
            echo '<input type="image" src="'.$game->TRUMP_PATH.$game->BACK.'" name="card" width="6%" height="6%" value="'.$i.'">';
            //echo '<input type="image" src="'.$game->TRUMP_PATH.$cards[$i].'" name="card" width="7%" height="7%" value="'.$i.'">';
        }
    }
    if ($FLAG == 1) {
        //echo "<br>";
        //echo '<input type="submit" value="次へ">';
        unset($_SESSION["card"]);
    }
    echo "<br>";
    echo '<input type="submit" name="reset" value="リセット">';

    ?>
</form>
</div>

</body>
</html>