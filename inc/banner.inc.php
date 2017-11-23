<?php
$BannerLogout = '';
if(isset($_SESSION['role'])){
if ($_SESSION['role'] == 'administrateur') {
    $BannerLogout = '  <li>
                <a href="logout.php">logout</a>
            </li>';
}
 else {
     $BannerLogout = '';
}

}
else{
    $BannerLogout = '';
}
    echo '<div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                            </button> <a class="navbar-brand" href="index.html">POFU</a>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="index.php">Accueil</a>
                                </li>
                                <li>
                                    <a href="temoignage.html">Témoignages</a>
                                </li>
                                <li>
                                    <a href="article.html">Article</a>
                                </li>
                                <li>
                                    <a href="texte.html">Texte</a>
                                </li>
                                <li>
                                    <a href="galerie.html">Galerie</a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>', $BannerLogout, '

                            </ul>
                        </div>

                    </nav>
                </div>
            </div>';
?>