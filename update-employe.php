<?php
session_start();
//Vérification des sessions
if(!isset($_SESSION['role'])){
        header("Location: index.php");
}
 else {
    if(!$_SESSION['role'] == 'administrateur'){
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

//Recupération des informations pour afficher les données de l'utilisateur
if (isset($_GET['id'])) {
    $numero_employe = $_GET['id'];
    $rqtSelect = $bdd->prepare('SELECT nom,prenom,adresse_mail,telephone,image_employe FROM tblemployes WHERE numero=:id');
    $rqtSelect->bindValue('id', $numero_employe);
    $rqtSelect->execute();
    while ($row = $rqtSelect->fetch(PDO::FETCH_OBJ)) {
        $nom = $row->nom;
        $prenom = $row->prenom;
        $email = $row->adresse_mail;
        $telephone = $row->telephone;
        $nom_image = $row->image_employe;
    }
}
//Modification de l'employé dans la bdd

if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['telephone']) and isset($_POST['image']) and isset($_POST['email'])) {
    if (!empty($_POST['nom']) and ! empty($_POST['prenom']) and ! empty($_POST['image']) and ! empty($_POST['email'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $nom_image = $_POST['image'];
        $rqtUpdateEmploye = $bdd->prepare('UPDATE tblemployes SET prenom =:prenom, nom =:nom, telephone =:telephone,adresse_mail=:email,image_employe =:image'
                . ' WHERE numero =:id');
        
        $rqtUpdateEmploye->bindValue(':prenom', $prenom);
        $rqtUpdateEmploye->bindValue(':nom', $nom);
        $rqtUpdateEmploye->bindValue(':email', $email);
        $rqtUpdateEmploye->bindValue(':telephone', $telephone);
        $rqtUpdateEmploye->bindValue(':image', $nom_image);
        $rqtUpdateEmploye->bindValue(':id', $numero_employe);
        
        $rqtUpdateEmploye->execute();
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
                        Modification de l'employé
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