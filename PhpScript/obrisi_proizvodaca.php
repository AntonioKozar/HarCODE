<?php 
function ObrisiProizvodaca($kod)
{
	include("obrisi_proizvod.php");
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("Nema konekcije s bazom." . mysqli_error());
	$T1 = mysqli_query($baza, "SELECT * FROM predmeti WHERE info='{$kod}'");
	foreach ($T1 as $red) 
	{
		ObrisiProizvod($red["harcode"]);
	}
	mysqli_query($baza, "DELETE FROM proizvodaci WHERE naziv='{$kod}'") or die("Nije izvršeno brisanje u bazi PROIZVOĐAČI elementa : [" . $kod . "]");	 
    mysqli_close($baza);
   
}
   
?>