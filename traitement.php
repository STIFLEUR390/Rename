<?php
session_start();

$nombre_fichier_depart = 0;

$nombre_fichier_traiter = 0;

if (isset($_POST['changer_extension'])) {
    $currentdate = date("dmY");
    $str = strlen($_POST['ext_dep']) * -1;

    foreach (glob($_POST['che_dos'] . '/*' . $_POST['ext_dep']) as $filename) {
        $nombre_fichier_depart++;
		$newname = substr($filename, 0, $str) . '' . $_POST['ext_fin'];
		rename($filename, $newname);
		touch($newname);
    }

    foreach (glob($_POST['che_dos'] . '/*' . $_POST['ext_fin']) as $fil) {
        $datefile = date("dmY", fileatime($fil));
		if (file_exists($fil) && ($datefile == $currentdate)) {
			$nombre_fichier_traiter++;
		}
    }

    if ($nombre_fichier_depart == $nombre_fichier_traiter) {
        $msg = "<pre><h5 class='card-title'>Tous les fichiers on été renommer (" . $nombre_fichier_depart . " fichiers renommer)</h5></pre>";
    } else if ($nombre_fichier_depart == 0) {
        $msg = "<pre><h5 class='card-title'>Aucun fichier avec l'extension " . $_POST['ext_dep'] . " trouver dans le dossier entrée</h5></pre>";
    } else {
        $msg = "<pre><h5 class='card-title'>Certain fichier n'on pas été renommer (" . ($nombre_fichier_traiter - $nombre_fichier_depart) . " fichiers non renommer)</h5></pre>";
    }

    $_SESSION['changer_extension_msg'] = $msg;
}

if (isset($_POST['ajouter_prefix'])) {

    $str = strlen($_POST['chem_dos']) + 1;

    foreach (glob($_POST['chem_dos'] . '/*' . $_POST['ext_fich']) as $filename) {
		$newname = $_POST['chem_dos'].'/'.$_POST['name_pref'].' '. substr($filename, $str);
		rename($filename, $newname);
		touch($newname);
    }

    $_SESSION['ajouter_prefix_msg'] = "<pre><h5 class='card-title'> le prefix a été ajouter avec success</h5></pre>";
}

if (isset($_POST['redirection'])) {
    if (!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on") {
        //Tell the browser to redirect to the HTTPS URL.
        //Dites au navigateur de rediriger vers l'URL HTTPS.
        header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
        //Prevent the rest of the script from executing.
        //Empêcher le reste du script de s'exécuter.
        exit;
    }
}

header('Location: index.php');