<?php
session_start();
require'../bdd sql/PDOcinema.php';
if (!isset($_SESSION['IsLog']) OR $_SESSION['IsLog'] == False){
    header('location: ../login/login.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="HTML,CSS,PHP,videotheque,film,acteur,realisateur">
		<meta name="description" content="page contenant les films désirés par un utilisateur">
		<meta name="author" content="Tommy Brisset,Orlann Ferreira">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    	integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        <link rel="stylesheet" href="panier.css">
		<title>Panier du site CINE ADDICT</title>
	</head>
<body>

	<header>
        <div class="navbar">
            <div class="nav-header">
                <div class="nav-logo">
                    <h1 id="neon">Cine addict</h1>
                </div>
            </div>
            <input type="checkbox" id="nav-check">
            <div class="nav-btn">
                <label for="nav-check">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
            <div class="nav-links">
                <a href="../index.php" title="lien vers page d'accueil">Accueil</a>
                <div class="dropdown">
                    <a class="dropBtn" href="#" title="Titre menu catégorie">Catégorie
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="drop-content">
                        <a href="../categorie comedie/comedie.php" title="lien vers page de la catégorie Comédie ">Comédie</a>
                        <a href="../categorie action/action.php" title="lien vers la page de la catégorie Action">Action</a>
                    </div>
                </div>
                <?php
                if (!isset($_SESSION['IsLog']) OR $_SESSION['IsLog'] == False){
                    ?>
                    <a href="../login/login.php" title="lien vers page de connexion" class="loginBtn">Connexion</a>
                    <?php
                }
                else { ?>
                    <a href="../login/logout.php" title="lien vers page de déconnexion" class="loginBtn">Déconnexion</a>
                    <?php
                }
                ?>
                <a href="../register/register.php" title="lien vers page d'enregistrement" class="loginBtn">Inscription</a>
                <a href="../panier/panier.php" title="lien vers page du panier">Panier</a>
                <form id="case" method="POST" action="../resultat/resultat.php">
                    <input id="search" name="search" type="text" placeholder="titre ou réalisateur">
                    <input type="submit" value="recherche" id="buttonsearch">
                </form>
            </div>
        </div>
    </header>
	
	<h2>Mon panier </h2>
	<main>
        <?php
        $recupname = $bdd->prepare('SELECT PRENOM,NOM FROM utilisateur WHERE ID=:ID ');
        $recupname->execute([
        ':ID' => $_SESSION['id']
        ]);
        while ($donnee = $recupname->fetch()) {
            ?>
            <h3>Bonjour, <?php echo $donnee['PRENOM']?> <?php echo $donnee['NOM']?> </h3>
        <?php
        }
        $recupname->closeCursor();
        ?>

	<table>
		<thead>
		<tr>
			<th>Titre  du film</th>
			<th>Prix</th>
			<th><a href="./delete.php?type=ALL" class="removeall-button">Tous Supprimer</a></th>
		</tr>
		</thead>
		<tbody>
        <?php
            $total = 0;
            $r = "SELECT f.PRIX, f.TITRE, f.ID FROM paniers p JOIN films f ON (p.ID_FILM= f.ID) WHERE p.ID_UTILISATEUR =" . $_SESSION["id"];
            $select = testSqlInjection($bdd, $r);
            if ($select) {
                $request = $bdd->prepare($r);
                $request->execute();
                while ($data = $request->fetch()) {
                    $total = $total + $data["PRIX"];
                    ?> 
                    <tr>
                        <td><?=$data["TITRE"]?></td>
                        <td><?=$data["PRIX"]?> €</td>
                        <td><a href="./delete.php?type=ONE&id=<?=$data["ID"]?>" class="remove-button">Supprimer</a></td>
                    </tr>
                    <?php
                }
            }
        ?>
		</tbody>
		<tfoot>
		<tr>
			<td>Total</td>
			<td><?=$total?> €</td>
		</tr>
		<tr>
			<td colspan="3" class="paie">Veillez procéder au paimement : 
				<br>Choississez un moyen de paiement <br> <br>
				<i class="fa-brands fa-paypal fa-5x" style="margin-right:20px;color: #253b80;"></i>
				<i class="fa-brands fa-btc fa-5x" style="margin-right:20px;color:#ee9209;"></i>
				<i class="fa-brands fa-cc-mastercard fa-5x" style="margin-right:20px;color:#0a3a82; "></i>
				<i class="fa-brands fa-cc-discover fa-5x" style="margin-right:20px;color:#f68121;"></i>
				<i class="fa-brands fa-cc-visa fa-5x" style="margin-right:20px;color: #0147a2;"></i>
		</tr>
		</tfoot>
	</table>
	</main>

	<footer>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="footer">
        <div class="row">
                <a href="#" title="lien vers facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" title="lien vers instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" title="lien vers linkedin"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#" title="lien vers discord"><i class="fa-brands fa-discord"></i></a>
                <a href="#" title="lien vers youtube"><i class="fa fa-youtube"></i></a>
                <a href="#" title="lien vers twitter"><i class="fa fa-twitter"></i></a>
            </div>
            <div class="row">
                <ul>
                    <li><a href="../index.php" title="liens vers accueil">Accueil</a></li>
                    <li><a href="../categorie action/action.php" title="liens vers film d'action">Film d'action</a></li>
                    <li><a href="../categorie comedie/comedie.php" title="liens vers film de comédie">Film de comédie</a></li>
                    <?php
                    if (!isset($_SESSION['IsLog']) OR $_SESSION['IsLog'] == False){
                        ?>
                        <li><a href="../login/login.php" title="page de connexion">Connexion</a></li>
                        <?php
                    }
                    else { ?>
                        <li><a href="../login/logout.php" title="page de déconnexion">Déconnexion</a></li>
                        <?php
                    }
                    ?>
                    <li><a href="../register/register.php" title="page d'enregistrement">Inscription</a></li>
                </ul>
            </div>
            <div class="row">
                CINE ADDICT WEBSITE Copyright © 2023 - All rights reserved || Designed By: Tommy Brisset
            </div>
        </div>
    </footer>

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <?php
    if ($_SESSION['ma_variable1'] ===True){
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-full-width",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "400",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                Command: toastr["success"]("Vous êtes connecté !! Vous pouvez désormais procéder à vos achats et accéder au panier", "BRAVO !!")
            });
        </script>
        <?php
    }
    $_SESSION['ma_variable1'] =False;
    ?>
</body>
</html>