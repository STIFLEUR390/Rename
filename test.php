<?php

$msg = "Demain a etre son flanc encore contemplons parce, quel charmer et de un dans cette frémir. Et de véritable force.";

$a_retirer = "contemplons";

$remplacer_part = "Demain";

// $new_msg = str_replace($a_retirer, '', $msg);
$new_msg = str_replace($a_retirer, $remplacer_part, $msg);

//fileatime

$filename = 'D:/Scan backup/ Tomb Raider King/Tomb Raider King Chapitre 1 - 20.cbz';
if (file_exists($filename)) {
    echo "$filename a été accédé le : " . date("F d Y H:i:s.", fileatime($filename))."<br>";
}

if (file_exists($filename)) {
    echo "$filename a été modifié le : " . date ("F d Y H:i:s.", filemtime($filename))."<br>";
}