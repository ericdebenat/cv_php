<?php

function liste($tableau, $traduction) {
	foreach($tableau as $k=>$v) {
		 
		$N[$k]=$v["nom"];
	}
	
	array_multisort($N, SORT_ASC, $tableau);
	
	affichageTableau($tableau, $traduction);

print $traduction['liste'][1]. PHP_EOL;
print $traduction['liste'][2]. PHP_EOL;
print $traduction['liste'][3]. PHP_EOL;
print $traduction['liste'][4]. PHP_EOL; 
print $traduction['liste'][5]. PHP_EOL; 
print $traduction['liste'][6]. PHP_EOL;
print $traduction['liste'][7]. PHP_EOL;
print $traduction['liste'][8]. PHP_EOL;
print $traduction['liste'][9]. PHP_EOL;
print $traduction['liste'][10]. PHP_EOL; 


$choix = readline ($traduction['liste'][11]);

while ($choix<1 or $choix>10){
	
	$choix =readline ($traduction['liste'][11]);
	
}
/*trier le tableau*/

while ($choix!=10) {

switch($choix) {
	
	case 1: foreach($tableau as $k=>$v) {
		 
		$N[$k]=$v["nom"];
	}
	
	array_multisort($N, SORT_ASC, $tableau);
	affichageTableau($tableau,$traduction);
	break; 
	
	case 2: foreach ($tableau as $k=>$v) {
		
		$N[$k]=$v["nom"]; 
	}
	
	array_multisort($N, SORT_DESC, $tableau); 
	affichageTableau($tableau, $traduction);
	break; 
	
	case 3: foreach($tableau as $k =>$v) {
		
		$P[$k]=$v["profil"];
		
	}
	array_multisort($P, SORT_ASC, $tableau);
	affichageTableau($tableau, $traduction);
	break; 
	
	case 4: foreach($tableau as $k =>$v) {
		
		$P[$k]=$v["profil"];
		
	}
	array_multisort($P, SORT_DESC, $tableau);
	affichageTableau($tableau, $traduction);
	break; 
	
	case 5: foreach($tableau as $k =>$v) {
		
		if ($v["ville"]=="NULL") {
			
			$v["ville"]="zzz"; 
		}
		$Vi[$k]=trim($v["ville"]);
		
	}
	array_multisort($Vi, SORT_ASC, $tableau);
	affichageTableau($tableau, $traduction);
	break; 
	
	case 6: foreach($tableau as $k =>$v) {
		
		if ($v["ville"]=="NULL") {
			
			$v["ville"]="0"; 
		}
		
		$Vi[$k]=trim($v["ville"]);
		
	}
	array_multisort($Vi, SORT_DESC, $tableau);
	affichageTableau($tableau, $traduction);
	break; 
	
	case 7: foreach($tableau as $k =>$v) {
		
		$v["birthdate"]=str_replace("/","-",$v["birthdate"]); 		
		$A[$k]=strtotime($v["birthdate"]);
		
	}
	array_multisort($A, SORT_DESC, $tableau);
	affichageTableau($tableau, $traduction);
	break; 
	
	case 8: foreach($tableau as $k =>$v) {
		
		$A[$k]=strtotime($v["birthdate"]);
	
	}
	array_multisort($A, SORT_ASC, $tableau);
	affichageTableau($tableau, $traduction);
	break; 
	
	case 9: 
	
	foreach($tableau as $k=>$v) {
		 
		$N[$k]=$v["nom"];
	}
	
	array_multisort($N, SORT_DESC, $tableau);
	
	
			for ($i=0;$i<count($tableau);$i++) {
				print $traduction['modif'][2].($i+1)." : ".$tableau[$i]["nom"]." ".$tableau[$i]["prenom"].PHP_EOL;
			}
			print $traduction['modif'][3].PHP_EOL;
	
				$numero = readline ("choix "); 
				
				lirecv($numero); 
				
				break; 

}
		
		print $traduction['liste'][1]. PHP_EOL;
		print $traduction['liste'][2].PHP_EOL;
		print $traduction['liste'][3]. PHP_EOL;
		print $traduction['liste'][4]. PHP_EOL; 
		print $traduction['liste'][5]. PHP_EOL; 
		print $traduction['liste'][6]. PHP_EOL;
		print $traduction['liste'][7]. PHP_EOL;
		print $traduction['liste'][8]. PHP_EOL;
		print $traduction['liste'][9]. PHP_EOL;
		print $traduction['liste'][10]. PHP_EOL;		
		
		$choix =readline ($traduction['liste'][11]); 
	
}	
}

function rechercher($tableau, $traduction) {

  $saisie = cleanInput($traduction);
  $resultats = array();
    for ($i=0;$i<count($tableau);$i++) {
	  foreach ($tableau[$i] as $key => $val) {
		  if (is_array($val)) {
			  for ($j=0;$j<10;$j++) {
				  $tableau[$i]["competences"][$j]=strtolower(removeSpecialChars($tableau[$i]["competences"][$j]));
			  }
		  }
		  else {
			  $tableau[$i][$key]=strtolower(removeSpecialChars($tableau[$i][$key]));
		  }
	  }
  }


  for ($i = 0 ; $i < count($tableau) ; $i++) {

    // La fonction in_array indique si une valeur appartient à un tableau.
    if (in_array($saisie, $tableau[$i]["competences"])== true) { 

      $resultats[$i]["nom"] = $tableau[$i]["nom"];
      $resultats[$i]["prenom"] = $tableau[$i]["prenom"];
 


    }

     else if (in_array($saisie, $tableau[$i]) == true) {

      $resultats[$i]["nom"] = $tableau[$i]["nom"];
      $resultats[$i]["prenom"] = $tableau[$i]["prenom"];

     }

  }

  print($traduction['rechercher'][1]);

  // Affiche le nombre de candidats en fonction des résultats de la saisie (compétence, nom, age, ville).
  print count($resultats).PHP_EOL;
  
  foreach ($resultats as $key=>$value){
	  
	  print strtoupper($value["nom"])." ".ucfirst($value["prenom"]). PHP_EOL; 
	 
  
  }
   
  return $resultats;

}

function ajout (&$tableau, $traduction) {			// Le tableau sera modifié dans la fonction
		$ajout=array();
		$competences=array();
		do {
			print $traduction['ajout'][1].PHP_EOL;
			do {
				
	/* Affichage du menu */			
				
				print $traduction['ajout'][2].PHP_EOL;
				print $traduction['ajout'][3].PHP_EOL;
				$choix=readline($traduction['ajout'][4]);
			} while ($choix!=0 && $choix!=1);
			if ($choix==1) {
				print $traduction['ajout'][5].PHP_EOL;
				
	/* Les infos du candidat à ajouter sont demandées une par une */			
				
				$ajout["id"]=(count($tableau)+1);			// Id calculé automatiquement
				do {
					$ajout["nom"]=strtoupper(readline($traduction['ajout'][6]));
				} while ($ajout["nom"]=="");
				do {
					$ajout["prenom"]=ucfirst(readline($traduction['ajout'][7]));
				} while ($ajout["prenom"]=="");
				$ajout["age"]=0;
				do {
					do {
						$ajout["birthdate"]=readline($traduction['ajout'][8]);
					} while (preg_match("#^[0-9]{2}[/][0-9]{2}[/][0-9]{4}$#", $ajout["birthdate"])==false);
					$date=explode("/", $ajout["birthdate"]);
				} while ((checkdate($date[1], $date[0], $date[2])==false) || ($ajout["birthdate"]==""));
				$ajout["age"]=age($ajout["birthdate"]);			// Calcul de l'âge par rapport à la date de naissance
				$ajout["adresse"]=readline($traduction['ajout'][9]);
				$ajout["adresse1"]=readline($traduction['ajout'][10]);
				$ajout["code"]=readline($traduction['ajout'][11]);
				$ajout["ville"]=strtoupper(readline($traduction['ajout'][12]));
				do {
					$ajout["portable"]=readline($traduction['ajout'][13]);
					
				} while (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $ajout["portable"])==false || $ajout["portable"]=="");
				
				$ajout["fixe"]=readline($traduction['ajout'][14]);
				
				do {
					$ajout["email"]=readline($traduction['ajout'][15]);
				} while (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $ajout["email"])==false || $ajout["email"]=="");
				do {
					$ajout["profil"]=ucfirst(readline($traduction['ajout'][16]));
				} while ($ajout["profil"]=="");
				for ($i=0;$i<5;$i++) {			// Les 5 premières compétences sont obligatoires
					do {
						$competences[$i]=ucfirst(readline($traduction['ajout'][17].($i+1)." : "));
					} while ($competences[$i]=="");
				}
				for ($i=5;$i<10;$i++) {			// Les autres compétences ne sont pas obligatoires
					if ($competences[$i-1]!="") {
						$competences[$i]=ucfirst(readline($traduction['ajout'][17].($i+1)." : "));
					}
					else {
						$competences[$i]="";
					}
				}
				$ajout["competences"]=$competences;
				$ajout["site"]=readline($traduction['ajout'][18]);
				$ajout["linkedin"]=readline($traduction['ajout'][19]);
				$ajout["viadeo"]=readline($traduction['ajout'][20]);
				$ajout["facebook"]=readline($traduction['ajout'][21]);
				$tableau[]=$ajout;
			}
		} while ($choix!=0);
	}
	
	

function modif (&$tableau, $traduction) {
		do {
			
	/* Affichage initial : n°, nom, prénom */	
	
			print $traduction['modif'][1].PHP_EOL;
			for ($i=0;$i<count($tableau);$i++) {
				print $traduction['modif'][2].($i+1)." : ".$tableau[$i]["nom"]." ".$tableau[$i]["prenom"].PHP_EOL;
			}
			print $traduction['modif'][3].PHP_EOL;
			
	/* On sélectionne le candidat par son n° Id */		
	
			$num_modif=readline($traduction['modif'][4]);
			
	/* On affiche toutes les infos du candidat sélectionné */		
			
			if ($num_modif>0 && $num_modif<=count($tableau)) {
				do {
					$i=0;
					$correspondance=array();
					foreach ($tableau[$num_modif-1] as $key=>$value) {
						if (is_array($value)) {
							foreach ($value as $k=>$v) {
								$correspondance[$i]=$key.$k;
								print $i.$traduction['modif'][5].($k+1)." : ".$v.PHP_EOL;
								if ($k<9) {
									$i++;
								}
							}
						}
						elseif ($i!=0) {
							$correspondance[$i]=$key;
							print $i." : ".$key." : ".$value.PHP_EOL;
						}	
						$i++;						
					}
					
					
					print ($traduction['modif'][6].PHP_EOL);
					
	/* On choisit l'info à modifier */				
					
					do {
						$choix_modif=readline($traduction['modif'][7]);
					} while ($choix_modif<0 || $choix_modif>26);
					if ($choix_modif>0) {
						switch ($choix_modif) {
							case 1:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=strtoupper(readline($traduction['modif'][8]));
							break;
							case 2:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=ucfirst(readline($traduction['modif'][9]));
							break;
							case 3:
							print $traduction['modif'][10];
							break;
							case 4:
							do {
								do {
									$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][11]);
								} while (preg_match("#^[0-9]{2}[/][0-9]{2}[/][0-9]{4}$#", $tableau[$num_modif-1][$correspondance[$choix_modif]])==false);
								$date=explode("/", $tableau[$num_modif-1][$correspondance[$choix_modif]]);
							} while ((checkdate($date[1], $date[0], $date[2])==false) || ($tableau[$num_modif-1][$correspondance[$choix_modif]]==""));
							$tableau[$num_modif-1][$correspondance[$choix_modif-1]]=age($tableau[$num_modif-1][$correspondance[$choix_modif]]);
							break;
							case 5:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][12]);
							break;
							case 6:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][13]);
							break;
							case 7:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][14]);
							break;
							case 8:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][15]);
							break;
							case 9:
							do {
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][16]);
							} while (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $tableau[$num_modif-1][$correspondance[$choix_modif]])==false || $tableau[$num_modif-1][$correspondance[$choix_modif]]=="");
							break;
							case 10:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][17]);
							break;
							case 11:
							do {
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][18]);
							} while (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $tableau[$num_modif-1][$correspondance[$choix_modif]])==false || $tableau[$num_modif-1][$correspondance[$choix_modif]]=="");
							break;
							case 12:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][19]);
							break;
							case 23:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][20]);
							break;
							case 24:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][21]);
							break;
							case 25:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][22]);
							break;
							case 26:
							$tableau[$num_modif-1][$correspondance[$choix_modif]]=readline($traduction['modif'][23]);
							break;
						}
						if (strstr($correspondance[$choix_modif],"competences")) {
							$tableau[$num_modif-1]["competences"][str_replace("competences","",$correspondance[$choix_modif])]=readline($traduction['modif'][24]);
						} 
					}
				} while ($choix_modif!=0);			// Retour aux infos du candidat
			}
		} while ($num_modif!=0);			// Retour à la liste des candidats
	}

function exportCsv($tableau) {

	$file="hrdata.csv";
	$newfile="backup/hrdata_".date("Y-m-d_H-i-s").".csv";
	copy($file, $newfile);

	unlink("hrdata.csv"); 

	$T=fopen("hrdata.csv","w");  
	$temp=array();	

	$temp[0][]="Id";
	$temp[0][]="Nom";
	$temp[0][]="Prénom";
	$temp[0][]="Âge";
	$temp[0][]="Date de naissance";
	$temp[0][]="Adresse";
	$temp[0][]="Adresse 1";
	$temp[0][]="Code postal";
	$temp[0][]="Ville";
	$temp[0][]="Numéro de portable";
	$temp[0][]="Numéro de fixe";
	$temp[0][]="Email";
	$temp[0][]="Profil";
	$temp[0][]="Compétence 1";
	$temp[0][]="Compétence 2";
	$temp[0][]="Compétence 3";
	$temp[0][]="Compétence 4";
	$temp[0][]="Compétence 5";
	$temp[0][]="Compétence 6";
	$temp[0][]="Compétence 7";
	$temp[0][]="Compétence 8";
	$temp[0][]="Compétence 9";
	$temp[0][]="Compétence 10";
	$temp[0][]="Site Web";
	$temp[0][]="Profil Linkedin";
	$temp[0][]="Profil Viadeo";
	$temp[0][]="Profil Facebook";


	for ($m=0; $m<count($tableau); $m++) {
				
		foreach($tableau[$m] as $key=>$value) {
				
			if (is_array($value)) {
				
				for ($i=0; $i<count($value); $i++) {
					$temp[$m+1][]=$value[$i];	
				}
			} else {
				$temp[$m+1][]=$value;	
			}
			
		}
		
	}

	for ($i=0;$i<count($temp); $i++){ 

		fputcsv($T, $temp[$i],";");	

	}	
	fclose($T);
}

	
?>