<?php
session_start();
try {
    include_once './inc/connexion.inc.php';
    $bdd = getConnexion('pofuv2');
} catch (Exception $ex) {
    
}
$email = '';
$mdp = '';
$mdpCrypt = '';
$msgErreur = '';

if (isset($_POST['email']) and isset($_POST['mdp'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $email = strtolower($email);
    $connexion = $bdd->prepare('SELECT adresse_mail,mot_de_passe,status_employe,numero_tblroles as role FROM tblemployes');
    $connexion->execute();
    if ($mdp != NULL) {
        $mdpCrypt = md5($mdp);
    }

    while ($row = $connexion->fetch(PDO::FETCH_OBJ)) {
        $emailbdd = strtolower($row->adresse_mail);
        if ($email == $emailbdd) {
            if ($row->status_employe == 1) {
                if ($mdpCrypt == $row->mot_de_passe) {
                    if ($row->role == 120) {
                        $_SESSION['role'] = 'administrateur';
                        $msgErreur = '';
                        header("Location: index.php");
                    } else {
                        $msgErreur = 'Vous n\'avez pas les droits';
                    }
                } else {
                    $msgErreur = 'Identifiant invalide';
                }
            }else{
                $msgErreur = 'Compte désactiver';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Connexion</title>

        <meta name="description" content="Source code generated using layoutit.com">
        <meta name="author" content="LayoutIt!">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    </head>
    <body>

        <div class="container-fluid">
            <?php
            require_once './inc/banner.inc.php';
            ?>
            <div class="row banner">
                <div class="col-md-12">

                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <h1 class="text-center title">
                        Connexion
                    </h1>
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                                    <div class="form-login">
                                        <input type="email" placeholder="adresse mail" size="20" class="espacement form-control" name="email"/>
                                    </div>
                                    <div class="form-login">
                                        <input type="password" placeholder="Mot de passe" size="20" class="espacement form-control" name="mdp"/>
                                    </div>
                                    <div class="form-login">
                                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Valider"/>
                                        <a href="index.html" class="btn btn-lg btn-primary btn-block">Annuler</a>
                                    </div>
                                </form>
                                <?php
                                if ($msgErreur != '') {
                                    echo '<div class="alert alert-danger">', $msgErreur, '</div>';
                                    $msgErreur = '';
                                }
                                ?>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
                <br>
                <div class="row footer">
                    <div class="col-md-12">
                        Test  
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>