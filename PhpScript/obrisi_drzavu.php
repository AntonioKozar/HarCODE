<?php 
function ObrisiDrzavu($kod)
{
	include("obrisi_grad.php");
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("Nema konekcije s bazom." . mysql_error());
	$T1 = mysqli_query($baza, "SELECT * FROM gradovi WHERE drzava='{$kod}'");
	foreach ($T1 as $red) 
	{
		ObrisiGrad($red['naziv']);
	}

	mysqli_query($baza, "DELETE FROM drzave WHERE naziv='{$kod}'");	 
    mysqli_close($baza);	
}
   
?>