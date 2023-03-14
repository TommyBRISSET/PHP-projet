<?php
session_start();
require'../bdd sql/PDOcinema.php';

//fonction pour sécuriser les données
function secur_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$errors = [];
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_POST['login']) || !empty($_POST['password']) || !empty($_POST['token'])) {
        if ($_POST['token'] != $_SESSION['token']) {
            $errors[] = 'Une erreur s\'est produite, veillez réessayer';
        }
        if (empty($_POST['login']) || !filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Vous devez saisir un email au bon format !';
        }
        secur_data($_POST['login']);

        if (empty($_POST['prénom']) || strlen($_POST['prénom']) < 1){
            $errors[] = 'Vous devez saisir un prénom !';
        }
        secur_data($_POST['prénom']);

        if (empty($_POST['nom']) || strlen($_POST['nom']) < 1){
            $errors[] = 'Vous devez saisir un nom !';
        }
        secur_data($_POST['nom']);

        if (empty($_POST['pseudo']) || strlen($_POST['pseudo']) < 1){
            $errors[] = 'Vous devez saisir un pseudo !';
        }
        secur_data($_POST['pseudo']);

        if (empty($_POST['password']) || strlen($_POST['password']) < 8) {
            $errors[] = 'Vous devez saisir un mot de passe de 8 caractères !';
        }
        secur_data($_POST['password']);
        if (empty($_POST['password-confirmation']) || strlen($_POST['password-confirmation']) < 8 || ($_POST['password'] != $_POST['password-confirmation'])) {
            $errors[] = 'Vous devez saisir un mot de passe de 8 caractères identique à celui inscrit dans la case password ';
        }

        $testemail = $bdd->prepare('SELECT EMAIL,MOTDEPASSE FROM utilisateur WHERE EMAIL=:EMAIL');
        $testemail->execute([
            ':EMAIL' => $_POST['login'],
        ]);
        if ($testemail -> rowCount() === 1){
            $errors[] = "L'email est déjà enregistré ! ";
        }
        $testemail->closeCursor();
        if (count($errors) === 0) {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $insert = $bdd->prepare('INSERT INTO utilisateur (PRENOM,NOM,PSEUDO,EMAIL,MOTDEPASSE) VALUES (:PRENOM,:NOM,:PSEUDO,:EMAIL,:MOTDEPASSE)');
            $insert->execute([
                ':PRENOM' => $_POST['prénom'],
                ':NOM' => $_POST['nom'],
                ':PSEUDO' => $_POST['pseudo'],
                ':EMAIL' => $_POST['login'],
                ':MOTDEPASSE' => $_POST['password'],

            ]);
            $insert->closeCursor();
            $_SESSION['ma_variable'] = True;
            if ( $_SESSION['IsLog'] === True){
                header('location:../index.php');
            }
            else{
                header('location: ../login/login.php');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,PHP,vidéothèque,film,login,connexion,email,password,register,connexion,CINE ADDICT">
    <meta name="description" content="page d'enregistrement de la vidéothèque CINE ADDICT">
    <meta name="author" content="Tommy Brisset,Orlann Ferreira">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>page d'enregistrement de la vidéothèque CINE ADDICT</title>
</head>
<body>
    
<div class="login-box">
    <div class="wrapper">
        <div class="typing-demo">
            CINE ADDICT WEBSITE
        </div>
    </div>
    <h2>Register</h2>
    <form action="register.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="token" value='<?= $_SESSION['token'] ?>'>
        <div style='color: #f00'>
            <?php for($i=0; $i<count($errors); $i++) {
                echo $errors[$i].'<br>';
            }?>
        </div>
        <div class="user-box">
            <input type="text" name="prénom" placeholder="Prénom" title="insérer prénom" required>
            <label for="prénom">Prénom</label>
        </div>
        <div class="user-box">
            <input type="text" name="nom" placeholder="Nom" title="insérer nom" required>
            <label for="nom">Nom</label>
        </div>
        <div class="user-box">
            <input type="text" name="pseudo" placeholder="Pseudo" title="insérer pseudo" required>
            <label for="pseudo">Pseudo</label>
        </div>
        <div class="user-box">
            <input type="text" name="login" placeholder="Email" title="insérer email" required>
            <label for="login">Email</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" placeholder="Password" title="insérer mot de passe" required>
            <label for="password">Password</label>
        </div>
        <div class="user-box">
            <input type="password" name="password-confirmation" placeholder="Password confirmation" title="insérer mot de passe" required>
            <label for="Password confirmation">Password confirmation</label>
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
    <?php
    if (!isset($_SESSION['IsLog']) OR $_SESSION['IsLog'] === False){
        ?>
        <a href="../login/login.php" class="login" title="page de connexion">Connexion</a>
        <?php
    }
    else { ?>
        <a href="../login/logout.php" class="login" title="page de déconnexion">Déconnexion</a>
        <?php
    }
    ?>

</div>
</body>
</html>