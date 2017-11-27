<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ecrire témoignage</title>

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
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <form>
                                    <textarea placeholder="Votre témoignage..." rows="10" cols="100"></textarea>
                                </form>
                            </center>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="temoignage.html"><button type="button" class="btn btn-primary">Envoyer</button></a> 
                            <a href="temoignage.html"><button type="button" class="btn btn-primary">Annuler</button></a>
                        </div>
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
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>