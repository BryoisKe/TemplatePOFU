<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Galerie</title>

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
				Galerie
			</h1>
            <p class="text-center">
                Voici la galerie de photos
            </p>
			<div class="row">
				<div class="col-md-12">
                    <center>
                        <div class="carousel slide" id="carousel-769139">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-769139">
					</li>
					<li data-slide-to="1" data-target="#carousel-769139">
					</li>
					<li data-slide-to="2" data-target="#carousel-769139" class="active">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
						<a href="index.html"><img alt="Image 1 du carrousel" src="img/c1.jpg"/></a>
						<div class="carousel-caption">
						</div>
					</div>
					<div class="item">
						<img alt="Image 2 du carrousel" src="img/c2.jpg"/>
						<div class="carousel-caption">
						</div>
					</div>
					<div class="item active">
						<img alt="Image 3 du carrousel" src="img/c3.jpg"/>
						<div class="carousel-caption">
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-769139" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-769139" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
                    </center>
				</div>
			</div>
        
            <br>
            <div class="row">
                <div class="col-md-12">
                   <div class="col-lg-3 col-md-4 col-xs-6">
                      <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                      </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                      <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                      </a>
                    </div>
                                <div class="col-lg-3 col-md-4 col-xs-6">
                      <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                      </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                      <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                      </a>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-md-2">
		</div>
	</div>
    <br>
    <br>
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