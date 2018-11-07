<?php 
function ObrisiPodgrupu($kod)
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("Nema konekcije s bazom." . mysql_error());

	mysqli_query($baza, "DELETE FROM podgrupe WHERE naziv='{$kod}'") or die("Nije izvršeno brisanje u bazi PODGRUPE elementa : [" . $kod . "].");	
	mysqli_close($baza);     
}   
?>