<?php
session_start();

$nombre_fichier_depart = 0;
$nombre_fichier_traiter = 0;
$current_time = time();


/* $filename = 'D:/Scan backup/ Tomb Raider King/Tomb Raider King Chapitre 1 - 20.cbz';
if (file_exists($filename)) {
    echo "$filename a été accédé le : " . date("F d Y H:i:s.", fileatime($filename))."<br>";
}

if (file_exists($filename)) {
    echo "$filename a été modifié le : " . date ("F d Y H:i:s.", filemtime($filename))."<br>";
} */

if (isset($_POST['changer_extension'])) {

    $str = strlen($_POST['ext_dep']) * -1;

    foreach (glob($_POST['che_dos'] . '/*' . $_POST['ext_dep']) as $filename) {
        $nombre_fichier_depart++;
		$newname = substr($filename, 0, $str) . '' . $_POST['ext_fin'];
		rename($filename, $newname);
		touch($newname, $current_time);
    }

    foreach (glob($_POST['che_dos'] . '/*' . $_POST['ext_fin']) as $fil) {
		if (file_exists($fil) && ($current_time == fileatime($fil))) {
			$nombre_fichier_traiter++;
		}
    }

    if ($nombre_fichier_depart == $nombre_fichier_traiter) {
        $type = 'success';
        $msg = "Tous les fichiers on été renommer (" . $nombre_fichier_depart . " fichiers renommer)";
    } else if ($nombre_fichier_depart == 0) {
        $type = 'error';
        $msg = "Aucun fichier avec l'extension " . $_POST['ext_dep'] . " trouver dans le dossier entrée";
    } else {
        $type = 'warning';
        $msg = "Certain fichier n'on pas été renommer (" . ($nombre_fichier_traiter - $nombre_fichier_depart) . " fichiers non renommer)";
    }

}

if (isset($_POST['ajouter_prefix'])) {
    $str = strlen($_POST['chem_dos']) + 1;

    foreach (glob($_POST['chem_dos'] . '/*' . $_POST['ext_fich']) as $filename) {
        $nombre_fichier_depart++;
		$newname = $_POST['chem_dos'].'/'.$_POST['name_pref'].''. substr($filename, $str);
		rename($filename, $newname);
		touch($newname, $current_time);
    }

    foreach (glob($_POST['chem_dos'] . '/*' . $_POST['ext_fich']) as $fil) {
		if (file_exists($fil) && ($current_time == fileatime($fil))) {
			$nombre_fichier_traiter++;
		}
    }

    if ($nombre_fichier_depart == $nombre_fichier_traiter) {
        $type = 'success';
        $msg = "Le prefic a été ajouter a tous les fichiers (" . $nombre_fichier_depart . " fichiers modifier)";
    } else if ($nombre_fichier_depart == 0) {
        $type = 'error';
        $msg = "Aucun fichier avec l'extension " . $_POST['ext_fich'] . " trouver dans le dossier entrée";
    } else {
        $type = 'warning';
        $msg = "Le prefix n'a pas pu être ajouter a certain fichier (" . ($nombre_fichier_traiter - $nombre_fichier_depart) . " fichiers)";
    }
}

if (isset($_POST['sup_carac'])) {
    $str = strlen($_POST['chem_doss']) + 1;

    foreach (glob($_POST['chem_doss'] . '/*' . $_POST['ext_fich']) as $filename) {
        $nombre_fichier_depart++;
		$newname = $new_msg = $_POST['chem_doss'].'/'.str_replace($_POST['carac_name'], '', substr($filename, $str));
		rename($filename, $newname);
		touch($newname, $current_time);
    }

    foreach (glob($_POST['chem_doss'] . '/*' . $_POST['ext_fich']) as $fil) {
		if (file_exists($fil) && ($current_time == fileatime($fil))) {
			$nombre_fichier_traiter++;
		}
    }

    if ($nombre_fichier_depart == $nombre_fichier_traiter) {
        $type = 'success';
        $msg = "le caractère a été supprimer du nom de tous les fichiers (" . $nombre_fichier_depart . " fichiers modifier)";
    } else if ($nombre_fichier_depart == 0) {
        $type = 'error';
        $msg = "Aucun fichier avec l'extension " . $_POST['ext_fich'] . " trouver dans le dossier entrée";
    } else {
        $type = 'warning';
        $msg = "le caractère n'a pas pu être supprimer du nom de certain fichier (" . ($nombre_fichier_traiter - $nombre_fichier_depart) . " fichiers)";
    }
}



if (isset($_POST['remp_carac'])) {
    $str = strlen($_POST['chem_dos']) + 1;

    foreach (glob($_POST['chem_dos'] . '/*' . $_POST['ext_fich']) as $filename) {
        $nombre_fichier_depart++;
		$newname = $new_msg = $_POST['chem_dos'].'/'.str_replace($_POST['carac_dep'], $_POST['carac_fin'], substr($filename, $str));
		rename($filename, $newname);
		touch($newname, $current_time);
    }

    foreach (glob($_POST['chem_dos'] . '/*' . $_POST['ext_fich']) as $fil) {
		if (file_exists($fil) && ($current_time == fileatime($fil))) {
			$nombre_fichier_traiter++;
		}
    }

    if ($nombre_fichier_depart == $nombre_fichier_traiter) {
        $type = 'success';
        $msg = "le caractère a été remplacer du nom de tous les fichiers (" . $nombre_fichier_depart . " fichiers modifier)";
    } else if ($nombre_fichier_depart == 0) {
        $type = 'error';
        $msg = "Aucun fichier avec l'extension " . $_POST['ext_fich'] . " trouver dans le dossier entrée";
    } else {
        $type = 'warning';
        $msg = "le caractère n'a pas pu être remplacer du nom de certain fichier (" . ($nombre_fichier_traiter - $nombre_fichier_depart) . " fichiers)";
    }
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


$_SESSION['type'] = $type;
$_SESSION['message'] = $msg;
header('Location: index.php');