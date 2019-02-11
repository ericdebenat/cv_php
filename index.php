<?php
require_once "toolsfunctions.php";
require_once "menufunctions.php";
require_once "userfunctions.php";
require_once "lirecv.php"; 

print "1 : Français".PHP_EOL;
print "2 : English".PHP_EOL;

do {
	$langue=readline();
} while ($langue!=1 && $langue!=2);

if ($langue==1) {
	$langue='traduction_fr.php';
} else {
	$langue='traduction_en.php';
}
require_once "$langue";

$tableau=array();
$tableau=fichier($traduction);
$fin=false;
do {
	affichageMenu($traduction);
	choixUtilisateur($tableau, $fin,$traduction);
} while ($fin!=true);
 ?>
