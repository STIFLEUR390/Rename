<?php
$a = 0;
$b = 0;

if (isset($_POST['rename'])) {
$currentdate = date("dmY");
// $fileexist = file_exists("E:\SCAN\Martial Peak\martial-peak-c393.cbr");
// $datefile = date("dmY", fileatime("E:\SCAN\Martial Peak\martial-peak-c393.cbr"));
// var_dump($fileexist, $currentdate, $datefile);
// die();

	# code...
	foreach (glob($_POST['chemin_dosier'].'/*'.$_POST['ext_dep']) as $value) {
		$a++;
		$newname = substr($value, 0, -3).''.$_POST['ext_fin'];
		// rename( string $oldname, string $newname[, resource $context] ) : bool
		rename($value, $newname);
		touch($newname);
	}

	foreach (glob($_POST['chemin_dosier'].'/*'.$_POST['ext_fin']) as $filename) {
		$datefile = date("dmY", fileatime($filename));
		if(file_exists($filename) && ($datefile == $currentdate)) {
			$b++;
		}
	}

	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Renomer fichier</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container py-4">
		<div class="card">
		  <div class="card-header">
		    Changer extension fichiers d'un dossier
		  </div>
		  <div class="card-body">
		  	<?php 
		  	if (isset($_POST)) {
				if ($a == $b) {
					echo "<pre><h5 class='card-title'>Tous les fichiers on été renommer (".$a." fichiers renommer)</h5></pre>";
				}else if ($a == 0){
					echo "<pre><h5 class='card-title'>Aucun fichier avec l'extension ".$_POST['ext_dep']." trouver dans le dossier entrée</h5></pre>";
				}else{
					echo "<pre><h5 class='card-title'>Certain fichier n'on pas été renommer (".($b-$a)." fichiers non renommer)</h5></pre>";
				}
		  	}
		  	?>
		    <!-- <h5 class="card-title">D'une</h5> -->
		    <form method="POST" action="">
		    	<div class="form-group">
		    		<label>Extension de départ</label>
		    		<input type="text" name="ext_dep" class="form-control" aria-describedby="extensionDepart" value="<?php if(isset($_POST['ext_dep'])){ echo $_POST['ext_dep']; } ?>">
		    		<small id="extensionDepart" class="form-text text-muted">Verifier diectement a partir des fichiers</small>
		    	</div>
		    	<div class="form-group">
		    		<label>Extension voulue</label>
		    		<input type="text" name="ext_fin" class="form-control" aria-describedby="extensionFin" value="<?php if(isset($_POST['ext_fin'])){ echo $_POST['ext_fin']; } ?>">
		    		<small id="extensionFin" class="form-text text-muted">Entrer uniquement l'extension sans le point(<strong>.</strong>)</small>
		    	</div>
		    	<div class="form-group">
		    		<label>Chemin absolue du dossier</label>
		    		<input type="text" name="chemin_dosier" class="form-control" aria-describedby="cheminDossier">
		    		<small id="cheminDossier" class="form-text text-muted">recuperer le chemin depuis la barre de navigation</small>
		    	</div>
		    	<button class="btn btn-primary" type="submit" name="rename">Renomer</button>
		    </form>		    
		    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
		  </div>
		</div>
	</div>
	<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
</body>
</html>
