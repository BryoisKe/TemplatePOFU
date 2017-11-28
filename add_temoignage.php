<?php
session_start();
try {
    include_once './inc/connexion.inc.php';
    $bdd = getConnexion('pofu');
} catch (Exception $ex) {
    
}
//if(isset($_POST['temoignage'])){
//    if(!empty($_POST['temoignage'])){
//        echo 'oui';
//    }
//}

 require('recaptcha/autoload.php');
  if(isset($_POST['temoignage'])) {
    if(isset($_POST['g-recaptcha-response'])) {
      $recaptcha = new \ReCaptcha\ReCaptcha('6Lc2ljoUAAAAAIs7MZjKw_fr_RPxM4cnbMQVRCrL');
      $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
      if ($resp->isSuccess()) {
          var_dump('Captcha Valide');
      } else {
          $errors = $resp->getErrorCodes();
          var_dump('Captcha Invalide');
          var_dump($errors);
      }
    } else {
      var_dump('Captcha non rempli');
    }
  }


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
       <script src='https://www.google.com/recaptcha/api.js'></script>
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
                        <center>
                            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                                <div class="col-md-12">
                                    <textarea placeholder="Votre témoignage..." rows="10" cols="100" name="temoignage"></textarea>
                                </div>
                                <br>
                                <div class="g-recaptcha col-md-12" data-sitekey="6Lc2ljoUAAAAAIs7MZjKw_fr_RPxM4cnbMQVRCrL"></div>
                                <div class="col-md-12">
                                    <a href="<?php$_SERVER['PHP_SELF']?>"><button type="submit" class="btn btn-primary">Poster</button></a> 
                                    <a href="temoignage.php"><button type="button" class="btn btn-primary">Annuler</button></a>
                                </div>
                            </form>
                        </center>
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