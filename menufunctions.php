<?php


function affichageMenu($traduction) {

  print($traduction['affichageMenu'][1]).PHP_EOL;
  print($traduction['affichageMenu'][2]).PHP_EOL;
  print($traduction['affichageMenu'][3]).PHP_EOL;
  print($traduction['affichageMenu'][4]).PHP_EOL;
  print($traduction['affichageMenu'][5]).PHP_EOL;
  print($traduction['affichageMenu'][6]).PHP_EOL;
  print($traduction['affichageMenu'][7]).PHP_EOL;

}

// Execution de l'option saisie par l'utilisateur

function choixUtilisateur(&$tableau, &$fin, $traduction) {

  $choix = intval(readline($traduction['choixUtilisateur'][1]));
  while ($choix < 1 || $choix > 5) {

  print($traduction['choixUtilisateur'][2]).PHP_EOL;
  $choix = readline($traduction['choixUtilisateur'][3]);

}
  switch ($choix) {

    case 1:
      // Lancer la fonction affichage liste
	  liste($tableau, $traduction);
      break;

    case 2:
      // Lancer la fonction ajouter un candidat
      ajout($tableau, $traduction);
      break;

      case 3:
        // Lancer la fonction modifier les informations
        modif($tableau, $traduction);
        break;

      case 4:
        // Rechercher un candidat
        rechercher($tableau, $traduction);
        break;

      case 5:
        // Lancer la fonction quitter
		exportCsv($tableau);
		$fin=true;
   		break;

  }

}

?>
