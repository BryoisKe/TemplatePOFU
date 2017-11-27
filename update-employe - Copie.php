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
    $bdd = getConnexion('pofu');
} catch (Exception $ex) {
    
}
$nom = '';
$prenom = '';
$email = '';
$telephone = '';
$nom_image = '';
$msgErreur = '';
$genre = '';


//Modification de l'employé dans la bdd
    if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['telephone']) and isset($_POST['image']) and isset($_POST['email'])) {
        if (!empty($_POST['nom']) and ! empty($_POST['prenom']) and ! empty($_POST['telephone']) and ! empty($_POST['image']) and ! empty($_POST['email'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $nom_image = $_POST['image'];
            $genre = $_POST['genre'];

            $rqtAddEmploye = $bdd->prepare('INSERT INTO tblemploye (prenom,nom,numero_telephone,adresse_mail,image_employe,genre,status_employe,role) VALUES (:prenom,:nom,:telephone,:email,:image,:genre,1,0)');

            $rqtAddEmploye->bindValue(':prenom', $prenom);
            $rqtAddEmploye->bindValue(':nom', $nom);
            $rqtAddEmploye->bindValue(':email', $email);
            $rqtAddEmploye->bindValue(':telephone', $telephone);
            $rqtAddEmploye->bindValue(':image', $nom_image);
            $rqtAddEmploye->bindValue(':genre', $genre);

            $rqtAddEmploye->execute();
            header("Location: contact.php");
        } else {
            $msgErreur = 'Veuillez remplir un champ';
        }
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
                        Connexion
                    </h1>
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">


                                    <div class="form-group col-sm-6">
                                        <label>Nom</label>
                                        <input type="text" name="nom" class="form-control" id="" value="<?php echo $nom; ?>">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label>Prénom</label>
                                        <input type="text" name="prenom" class="form-control" id="" value="<?php echo $prenom; ?>">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label>Numéro de téléphone</label>
                                        <input type="text" name="telephone" class="form-control" id="" value="<?php echo $telephone; ?>">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label>Nom de l'image ( avec extension )</label>
                                        <input type="" name="image" class="form-control" id="" value="<?php echo $nom_image; ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Genre</label>
                                        <select name="genre" class="form-control">
                                            <option value="Monsieur">Homme</option>
                                            <option value="Madame">Femme</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">                              
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label>Adresse mail</label>
                                        <input type="email" name="email" class="form-control" id="" value="<?php echo $email; ?>">
                                    </div>

                                    <div class="col-sm-6">
                                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Valider"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <a href="contact.php" class="btn btn-lg btn-primary btn-block">Annuler</a>
                                    </div>
                                </form>
                                <div>
                                    <?php echo $msgErreur; ?>
                                </div>
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