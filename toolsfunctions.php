<?php


function affichageTableau($tableau,$traduction) {
	foreach ($tableau as $ligne) {
		foreach ($ligne as $key=>$value) {
			if (is_array($value)==true) {
				for ($i=0;$i<10;$i++) {
					print $traduction['affichageTableau'][1].($i+1)." : ".($value[$i]).PHP_EOL;
				}
			}
			else {
				print $key." : ".$value.PHP_EOL;
			}
		}
		print PHP_EOL;
	}
}


function fichier($traduction) {
	if (($fichier = fopen("hrdata.csv", "r"))!==FALSE) {
	
	$tableau=array(); 
	$ligne=array(); 
	$i=0;
	

	while (($candidat=fgetcsv($fichier, 2000, ";"))!==FALSE) {
		
		$comp=0;

			$ligne["id"]=$candidat[0];
		    $ligne["nom"]=$candidat[1];
			$ligne["prenom"]=$candidat[2];
			$ligne["age"]=$candidat[3];
			$ligne["birthdate"]=str_replace("/","-","$candidat[4]"); 
			$ligne["adresse"]=$candidat[5]; 
			$ligne["adresse1"]=$candidat[6]; 
			$ligne["code"]=$candidat[7]; 
			$ligne["ville"]=$candidat[8]; 
			$ligne["portable"]=$candidat[9]; 
			$ligne["fixe"]=$candidat[10]; 
			$ligne["email"]=$candidat[11]; 
			$ligne["profil"]=$candidat[12];
			
			$competences[0]=$candidat[13];
			$competences[1]=$candidat[14];
			$competences[2]=$candidat[15];
			$competences[3]=$candidat[16];
			$competences[4]=$candidat[17];
			$competences[5]=$candidat[18];
			$competences[6]=$candidat[19];
			$competences[7]=$candidat[20];
			$competences[8]=$candidat[21];
			$competences[9]=$candidat[22];
			
			$ligne["competences"]=$competences;
			
			$ligne["site"]=$candidat[23];
            $ligne["linkedin"]=$candidat[24]; 
			$ligne["viadeo"]=$candidat[25]; 
			$ligne["facebook"]=$candidat[26];
			
			for ($c=0 ; $c<=9; $c++) {
				
				if ($competences[$c]!="NULL"){
					
					$comp = $comp + 1; 
				}
			}				
		
			if ($i>0 && $ligne["nom"]!="NULL" && $ligne["prenom"]!="NULL" && $ligne["birthdate"]!="NULL" && $ligne["portable"]!="NULL" && $ligne["email"]!="NULL" && $ligne["profil"]!="NULL" && $comp>=5) {
			$tableau[]=$ligne;
			}
			$i++;
	}

	fclose($fichier);
} 
 
print $traduction['fichier'][1].count($tableau). PHP_EOL; 

for ($m=0; $m<count($tableau); $m++) {
	
	

 $tableau[$m]["age"]=age($tableau[$m]["birthdate"]); 
 
 
}
return $tableau;
}


function age($birthdate) {
 
	$birthdate = str_replace("/","-","$birthdate");
    $dateDuJour = date("Y-m-d");
    $age = strtotime($dateDuJour) - strtotime($birthdate);
    $age = intval($age / (60*60*24*365.25));
    return $age;

  }
  
function cleanInput($traduction) {

  $saisie = readline($traduction['clearInput'][1]);

  // La fonction trim() supprime les espaces en début et fin de chaîne.
  $saisie = strtolower(trim(removeSpecialChars($saisie))); 

  return $saisie;

}

function removeSpecialChars($saisie) {

  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');
  
  // La fonction str_replace remplace toutes les occurrences dans une chaîne.
  return str_replace($a, $b, $saisie); 

}


?>

