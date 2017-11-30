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
$genre = '';


//Ajout de l'employé dans la bdd
if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['telephone']) and isset($_POST['email']) and isset($_FILES['avatar'])) {
    if (!empty($_POST['nom']) and ! empty($_POST['prenom']) and ! empty($_POST['email'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $nom_image = basename($_FILES['avatar']['name']);
        $genre = $_POST['genre'];
        $role = 60;

        $rqtAddEmploye = $bdd->prepare('INSERT INTO tblemployes (prenom,nom,telephone,adresse_mail,image_employe,genre,status_employe,numero_tblroles) VALUES (:prenom,:nom,:telephone,:email,:image,:genre,1,:role)');

        $rqtAddEmploye->bindValue(':prenom', $prenom);
        $rqtAddEmploye->bindValue(':nom', $nom);
        $rqtAddEmploye->bindValue(':email', $email);
        $rqtAddEmploye->bindValue(':telephone', $telephone);
        $rqtAddEmploye->bindValue(':image', $nom_image);
        $rqtAddEmploye->bindValue(':genre', $genre);
        $rqtAddEmploye->bindValue(':role', $role);

        $dossier = './img/employe/';
        $fichier = basename($_FILES['avatar']['name']);
        $taille_maxi = 100000;
        $taille = filesize($_FILES['avatar']['tmp_name']);
        $extensions = array('.png', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['avatar']['name'], '.');
//Début des vérifications de sécurité...
        if (!in_array($extension, $extensions)) { //Si l'extension n'est pas dans le tableau
            $erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg';
        }
        if ($taille > $taille_maxi) {
            $erreur = 'Le fichier est trop gros...';
        }
        if (!isset($erreur)) { //S'il n'y a pas d'erreur, on upload
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                $rqtAddEmploye->execute();
                header("Location: contact.php");
            } else { //Sinon (la fonction renvoie FALSE).
                echo 'Echec de l\'upload !';
            }
        } else {
            echo $erreur;
        }
        header("Location: contact.php");
        exit();
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
                        Ajout d'un nouvel employé
                    </h1>
                    <div class="row">

                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                            <div class="row form-addemp">
                                <div class="form-group col-sm-6">
                                    <label>Genre</label>
                                    <select name="genre" class="form-control">
                                        <option value="homme">Monsieur</option>
                                        <option value="femme">Madame</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-addemp">
                                <div class="form-group col-sm-6">
                                    <label>Nom :</label>
                                    <input type="text" name="nom" class="form-control" id="" value="<?php echo $nom; ?>">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>Prénom :</label>
                                    <input type="text" name="prenom" class="form-control" id="" value="<?php echo $prenom; ?>">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>Numéro de téléphone :</label>
                                    <input type="text" name="telephone" class="form-control" id="" value="<?php echo $telephone; ?>">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>Nom de l'image : ( avec extension )</label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                    <input type="file" name="avatar" class="form-control">
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Adresse mail :</label>
                                    <input type="email" name="email" class="form-control" id="" value="<?php echo $email; ?>">
                                </div>

                                <div class="col-sm-6">
                                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Valider"/>
                                </div>

                                <div class="col-sm-6">
                                    <a href="contact.php" class="btn btn-lg btn-primary btn-block">Annuler</a>
                                </div>
                            </div>
                        </form>

                        <br><br>
                        <div>
                            <?php echo $msgErreur; ?>
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