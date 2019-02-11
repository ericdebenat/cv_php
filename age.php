<?php

$d=readline ("date");

$date=strtotime($d);

print "$date"; 

if (strtotime($d)>980812800){
	
	print "interdit au mineur"; 
	
}

?>