<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Article</title>

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
				Article
			</h1>
			<div class="row">
                <hr>
				<div class="col-md-12">
                    <p>Date : 20.11.2017</p>
                    <br>
                    <center>
				<iframe src="pdf/Catalogue-Donnee.pdf" style="width:718px; height:700px;" frameborder="0"></iframe>
                    </center>
                    
                    <hr>
                    <p>Date : 20.11.2017</p>
                    <br>
                    <center>
					<img src="img/pageJournal.jpg" class="imgArticle">
                    </center>
				</div>
                
			</div>
            <hr>
            <br>
		</div>
		<div class="col-md-2">
		</div>
	</div>
    <br>
    <footer class="footer">
	<div class="row">
		<div class="col-md-12 footer">
			 
			<address>
				 <strong>POFU</strong>
			</address>
		</div>
	</div>
  </footer>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>