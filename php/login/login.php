<?php

session_start();
require'../bdd sql/PDOcinema.php';
function secur_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$errors = [];
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['login']) || !empty($_POST['password']) || !empty($_POST['token'])) {
        if ($_POST['token'] != $_SESSION['token']) {
            $errors[] = 'Je pense qu\'il y a eu une injection';
        }
        if (empty($_POST['login']) || !filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Vous devez saisir un email au bon format';
        }
        secur_data($_POST['login']);
        
        if (empty($_POST['password']) || strlen($_POST['password']) < 8) {
            $errors[] = 'Vous devez saisir un mot de passe de 8 caractères';
        }
        secur_data($_POST['password']);

        $recup = $bdd->prepare('SELECT MOTDEPASSE FROM utilisateur WHERE EMAIL=:EMAIL');
        $recup->execute([
            ':EMAIL' => $_POST['login'],
        ]);
        if ($recup -> rowCount() == 1){
            $donnee = $recup->fetch();
            $MDP = $donnee[0];
        }
        else{
            $MDP = "erreur";
        }



        if (password_verify($_POST['password'], $MDP)) {
            $verif = $bdd->prepare('SELECT EMAIL,MOTDEPASSE FROM utilisateur WHERE EMAIL=:EMAIL AND MOTDEPASSE=:MOTDEPASSE');
            $verif->execute([
                ':EMAIL' => $_POST['login'],
                ':MOTDEPASSE' => $MDP,
            ]);
            if ($verif -> rowCount() == 0){
                $errors[] = "Veuillez vous enregistrer avant de vous connecter ! ";
            }
            $verif->closeCursor();
        }
        else {
            $errors[] = "mot de passe incorrect ! ";
        }
        $recup->closeCursor();

        if (count($errors) === 0) {

            $recupid = $bdd->prepare('SELECT ID FROM utilisateur WHERE EMAIL=:EMAIL AND MOTDEPASSE=:MOTDEPASSE');
            $recupid->execute([
                ':EMAIL' => $_POST['login'],
                ':MOTDEPASSE' => $MDP,
            ]);
            while ($donnee = $recupid->fetch()) {
                $_SESSION['id'] = $donnee['ID'];
                }
                $recupid->closeCursor();

            $date = date("Y-m-d H:i:s");
            $fichierlogs = fopen('logs/logs.txt','a');
            $ip = $_SERVER['REMOTE_ADDR'];
            $logs=$ip."s'est connecté le  ".$date." avec pour email ".$_POST['login'].'<br>';
            fputs($fichierlogs,$logs);                                                                                  //écriture du log
            fclose($fichierlogs);
            $_SESSION['ma_variable1'] =True;
            $_SESSION['IsLog'] = True;

            header('location: ../panier/panier.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,PHP,vidéothèque,film,login,connexion,email,password,register,connexion">
    <meta name="description" content="page de login de la vidéothèque CINE ADDICT">
    <meta name="author" content="Tommy Brisset,Orlann Ferreira">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page de login de la vidéothèque CINE ADDICT</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="login-box">
    <div class="wrapper">
        <div class="typing-demo">
            CINE ADDICT WEBSITE
        </div>
    </div>
    <h2>Login</h2>
    <form action="login.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="token" value='<?= $_SESSION['token'] ?>'>
        <div style='color: #f00'>
            <?php for($i=0; $i<count($errors); $i++) {
                echo $errors[$i].'<br>';
            }?>
        </div>
        <div class="user-box">
            <input type="text" name="login" title="insérer votre email" placeholder="Email" required>
            <label for="login">Email</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" title="insérer votre mot de passe" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <a id="asubmit" title="connexion">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <input id="submit" type="submit" value="Connexion">
        </a>
    </form>
    <a href="../index.php" id="accueil" title="revenir à l'accueil">↪ revenir à l'accueil</a>
    <a href="../register/register.php" id="register" title="Register">Register</a>

</div>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<?php
if ($_SESSION['ma_variable'] ===True){
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"]("Vos données ont bien été enregistrez. Veuillez vous connecter !!")
        });
        </script>
        <?php
    }
    $_SESSION['ma_variable'] =False;

    if ((!isset($_SESSION['IsLog']) || $_SESSION['IsLog'] !== true) && isset($_GET["id"])) {
        unset($_GET["id"]);
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["warning"]("Veuillez vous connecter avant d'ajouter un film à votre panier ! ", "Vous n'êtes pas connecté")
        });
    </script>
<?php
}
if ((!isset($_SESSION['IsLog']) OR $_SESSION['IsLog'] == False) ){
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["error"]("Veuillez vous connecter avant de pouvoir accéder à votre panier ! ", "Vous n'êtes pas connecté")
        });
    </script>
    <?php
}
    ?>

</body>
</html>