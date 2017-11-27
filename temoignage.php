<?php
session_start();
try {
    include_once './inc/connexion.inc.php';
    $bdd = getConnexion('pofu');
} catch (Exception $ex) {
    
}
$rqtTemoignage = $bdd->prepare('SELECT *, DATE_FORMAT(date_temoignage, \'%d-%m-%Y\') AS dateTe,DATE_FORMAT(date_reponse, \'%d-%m-%Y\') AS dateRe FROM tbltemoignage ORDER BY `tbltemoignage`.`date_temoignage`  DESC');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Témoignage</title>

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
                        Témoignage
                    </h1>
                    <a href="add_temoignage.php"><button type="button" class="btn btn-primary" style="float: right">Ecrire un témoignage</button></a><br>
                    <?php
                    $rqtTemoignage->execute();
                    while ($row = $rqtTemoignage->fetch(PDO::FETCH_OBJ)) {
                        if($row->status_temoignage == 1){
                            if($row->reponse == NULL){
                                echo '<div class="row">
                                            <hr>
                                            <div class="col-md-2">
                                                Publié le : <br><br>
                                                ',$row->dateTe,'
                                            </div>
                                            <div class="col-md-10">
                                                <p class="text-left">
                                                    ',$row->temoignage,'
                                                </p>
                                            </div>
                                        </div>';
                            }
                            else{
                                echo '<div class="row">
                                            <hr>
                                            <div class="col-md-2">
                                                Publié le : <br><br>
                                                ',$row->dateTe,'
                                                <br>
                                            </div>
                                            <div class="col-md-10">
                                                <p class="text-left">
                                                ',$row->temoignage,'    
                                                </p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                Réponse publié le : <br><br>
                                                ',$row->dateRe,'
                                                <br>
                                            </div>
                                            <div class="col-md-9">
                                                <p>',$row->reponse,'</p>
                                            </div>
                                        </div>';
                            }
                        }
                        
                    }
                    ?>
                    <hr>
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

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>