<?php
    function getConnexion($dataBaseName){
	//$ini=parse_ini_file('/cfg/db-cfg.ini');
try{
	$dbh=new PDO('mysql:host=localhost;dbname='.$dataBaseName,'root','');
	$dbh->setAttribute(PDO::ATTR_ERRMODE,
	PDO::ERRMODE_EXCEPTION);
	$dbh->exec("SET CHARACTER SET utf8");
	return $dbh;
} catch (PDOException $e){
	echo 'Connection échoué :',$e->getMessage();
	
}
}



?>

