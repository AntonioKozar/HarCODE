<?php 
function ObrisiGrad($kod)
{
	include("obrisi_proizvodaca.php");
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("Nema konekcije s bazom." . mysql_error());
	$T1 = mysqli_query($baza, "SELECT * FROM proizvodaci WHERE grad='{$kod}'");
	foreach ($T1 as $red) 
	{
		ObrisiProizvodaca($red['naziv']);
	}
	mysqli_query($baza, "DELETE FROM gradovi WHERE naziv='{$kod}'") or die("Nije izvršeno brisanje u bazi GRADOVI elementa : [" . $kod . "]");	 
}
?>