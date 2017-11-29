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
$msgErreur = '';

//Recupération des informations pour afficher les données de l'utilisateur
if (isset($_GET['id'])) {
    $_SESSION['num_emp'] = $_GET['id'];
    $rqtSelect = $bdd->prepare('SELECT nom,prenom FROM tblemployes WHERE numero=:id');
    $rqtSelect->bindValue('id', $_SESSION['num_emp']);
    $rqtSelect->execute();
    while ($row = $rqtSelect->fetch(PDO::FETCH_OBJ)) {
        $nom = $row->nom;
        $prenom = $row->prenom;
    }
}
//Modification de l'employé dans la bdd

if (isset($_GET['confirm'])) {
    $rqtSuppEmploye = $bdd->prepare('UPDATE tblemployes SET status_employe = 0 WHERE numero = :numero');
    $rqtSuppEmploye->bindValue(':numero', $_SESSION['num_emp']);
    $rqtSuppEmploye->execute();
    $_SESSION['num_emp'] = '';
    header("Location: contact.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modifier l'employé</title>

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
                        Confirmation de la suppression de l'employé
                    </h1>
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">


                                    <div class="form-group col-sm-6">
                                        <label>Nom</label>
                                        <input type="text" name="nom" class="form-control" id="" value="<?php echo $nom; ?>" disabled>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label>Prénom</label>
                                        <input type="text" name="prenom" class="form-control" id="" value="<?php echo $prenom; ?>" disabled>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="confirmation-employe.php?confirm=oui" class="btn btn-lg btn-primary btn-block">Confirmer</a>
                                    </div>

                                    <div class="col-sm-6">
                                        <a href="contact.php" class="btn btn-lg btn-primary btn-block">Annuler</a>
                                    </div>
                                </form>
                                <?php echo $msgErreur; ?>
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