<?php
    session_start();
    require '../bdd sql/PDOcinema.php';
    if (!isset($_SESSION['IsLog']) || $_SESSION['IsLog'] !== true) {
        header("Location: ../login/login.php?id=".$_GET['id']);
        exit();
    }

    if (isset($_SESSION['IsLog'])){
        if ($_SESSION['IsLog'] === True){
            $request = $bdd->prepare("SELECT PRIX FROM FILMS WHERE ID = " . $_GET["id"]);
            $request->execute();
            $data = $request->fetch();
            if ($data == false) {
                header("Location: ../panier/panier.php");
            }

            $insert = testSqlInjection($bdd, "INSERT INTO paniers (NBR_FILMS, TOTAL, ID_FILM, ID_UTILISATEUR) VALUES(1," . $data["PRIX"] .",". $_GET["id"] .", " . $_SESSION["id"] .")");
            if ($insert) {
                $request = $bdd->prepare("INSERT INTO paniers (NBR_FILMS, TOTAL, ID_FILM, ID_UTILISATEUR) VALUES(1," . $data["PRIX"] .",". $_GET["id"] .", " . $_SESSION["id"] .")");
                $request->execute();
                header("Location: ../panier/panier.php");
            }
        }
    }
?>