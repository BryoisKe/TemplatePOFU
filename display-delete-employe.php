<?php
session_start();
//Vérification des sessions
if (!isset($_SESSION['role'])) {
    header("Location: index.php");
} else {
    if (!$_SESSION['role'] == 'administrateur') {
        header("Location: index.php");
    }
}

try {
    include_once './inc/connexion.inc.php';
    $bdd = getConnexion('pofuv2');
} catch (Exception $ex) {
    
}
$nom = '';
$prenom = '';
$email = '';
$telephone = '';
$nom_image = '';
$msgErreur = '';

//Modification du status de l'employé dans la bdd
try {
    if (isset($_GET['id'])) {
            $numero_employe = $_GET['id'];
            $rqtUpdateEmployeDel = $bdd->prepare('UPDATE tblemployes SET status_employe = 1 WHERE numero =:id');
            $rqtUpdateEmployeDel->bindValue(':id', $numero_employe);
            $rqtUpdateEmployeDel->execute();
            header("Location: display-delete-employe.php");
    }
} catch (Exception $e) {
    $msgErreur = 'Erreur de modification';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>employé supprimer</title>

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
                        Liste des employés supprimés
                    </h1>
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Prénom</th>
                                            <th>Nom</th>
                                            <th>adresse mail</th>
                                            <th>Numéro de téléphone</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <?php
                                            $rqtSelect = $bdd->prepare('SELECT numero,nom,prenom,adresse_mail,telephone FROM tblemployes WHERE status_employe = 0');
                                            $rqtSelect->execute();
                                            while ($row = $rqtSelect->fetch(PDO::FETCH_OBJ)) {
                                                echo '<tr><td>',$row->nom,'</td><td>',$row->prenom,'</td><td>',$row->adresse_mail,'</td><td>',$row->telephone,'</td><td><a href="',$_SERVER['PHP_SELF'],'?id=',$row->numero,'">Activer le compte</a></td></tr>';
                                            }
                                            ?>
                                    </tbody>
                                </table>
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