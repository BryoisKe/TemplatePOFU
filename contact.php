<?php
session_start();
try {
    include_once './inc/connexion.inc.php';
    $bdd = getConnexion('pofuv2');
} catch (Exception $ex) {
    
}
$idEmploye = 0;
$role = 0;
if (isset($_SESSION['role'])) {
    $role = 1;
}
if (isset($_GET['id'])) {
    $idEmploye = $_GET['id'];
    $rqtSuppEmploye = $bdd->prepare('UPDATE tblemployes SET status_employe = 0 WHERE numero = :numero');
    $rqtSuppEmploye->bindValue(':numero', $idEmploye);
    $rqtSuppEmploye->execute();
    header("Location: contact.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>contact</title>

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
                        Contact
                    </h1>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>POFU</strong><br /><br /> <br /><img src="img/pointIcon.png" height="20px;"> Notre addresse : 795 Folsom Ave, Suite 600<br /><br /><img src="img/directionalIcon.png" height="20px;"> Notre ville : San Francisco, CA 94107<br /><br /><img src="img/telephoneIcon.png" height="20px;"> Numéro de téléphone : (123) 456-7890<br><br /><img src="img/mailIcon.png" height="20px;"> Notre addresse mail : pofu@info.ch
                            </address>
                        </div>
                        <div class="col-md-6">
                            <center>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1618.0552440653883!2d6.946332273446883!3d46.99638387000964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478e0a24799ec6a7%3A0xd0328b28528dfeaa!2sCentre+Professionnel+du+Littoral+Neuch%C3%A2telois!5e0!3m2!1sfr!2sch!4v1511172467947" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </center>                            
                        </div>
                    </div>
                    <?php
                    if ($role == 1) {
                        echo '<br><div class="row">'
                        . '<div class="col-sm-4"><a href="add-employe.php" class="btn btn-lg btn-primary btn-block">Ajouter un employé</a></div>'
                        . '<div class="col-sm-4"><a href="display-delete-employe.php" class="btn btn-lg btn-primary btn-block">Les employés supprimés</a></div>'
                        . '<div class="col-sm-4"></div></div><br>';
                    }
                    ?>
                    <div class="row">
                        <br>
                        <center>                         
                            <?php
                            $numeroEmploye = 1;
                            $rqtEmploye = $bdd->prepare('SELECT numero,prenom, nom, telephone,adresse_mail,genre,image_employe,status_employe FROM tblemployes');
                            $rqtEmploye->execute();
                            while ($row = $rqtEmploye->fetch(PDO::FETCH_OBJ)) {                                
                                if($row->telephone == NULL){
                                    $AfficheNum = '';
                                }
                                else{
                                    $AfficheNum = $row->telephone;
                                }
                                if($row->genre == 'homme'){
                                    $genre = 'Monsieur';
                                }
                                else{
                                    $genre = 'Madame';
                                }
                                
                                if ($row->status_employe == 1) {
                                    echo '<div class="listeImageEmploye">
                                                <img alt="Image de collaborateur ', $numeroEmploye, '" src="img/employe/', $row->image_employe, '" class="imgCollabo"/>
                                                <p> ', $genre, ' ', $row->nom, ' ', $row->prenom, '<br>
                                                ', $row->adresse_mail, '<br>
                                                ', $AfficheNum,'<br>';
                                    if ($role == 1) {
                                        echo '<a href="', $_SERVER['PHP_SELF'], '?id=', $row->numero, '" onclick="return confirm(\'Etes-vous sûr ?\');">Supprimer l\'employé</a><br>';
                                        echo '<a href="update-employe.php?id=', $row->numero, '" >Modifier l\'employé</a>';
                                    }
                                    echo '</p></div>';
                                    $numeroEmploye += 1;
                                }
                            }
                            ?>
                        </center>
                    </div>
                    <br><br>
                </div>
                <div class="col-md-2">
                </div>
            </div>
            <footer>
                <div class="row">
                    <div class="col-md-12 footer">
                        <strong>POFU | N° (123) 456-7890  | pofu@info.ch </strong>
                    </div>
                </div>
            </footer>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>