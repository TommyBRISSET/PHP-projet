<?php
    session_start();
    require '../bdd sql/PDOcinema.php';

    if (isset($_GET['type']) == false) {
        header("Location: ../panier/panier.php");
        return;
    }

    $type = $_GET['type'];
    if ($type == 'ALL') {
        $str = "DELETE FROM PANIERS WHERE ID_UTILISATEUR =" . $_SESSION["id"];
        $ok = testSqlInjection($bdd, $str);
        if ($ok) {
            $request = $bdd->prepare($str);
            $request->execute();
        }
    } else if ($type == 'ONE') {
        $str = "DELETE FROM PANIERS WHERE ID_UTILISATEUR =" . $_SESSION["id"] . " AND ID_FILM = " . $_GET["id"];
        $ok = testSqlInjection($bdd, $str);
        if ($ok) {
            $request = $bdd->prepare($str);
            $request->execute();
        }
    }
    header("Location: ../panier/panier.php");
?>