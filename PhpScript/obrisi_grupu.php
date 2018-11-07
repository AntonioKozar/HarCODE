<?php
function ObrisiGrupu($kod)
{
	
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("Nema konekcije s bazom.");
	$T2 = mysqli_query($baza, "SELECT * FROM predmeti WHERE grupa='{$kod}'");
	foreach ($T2 as $red)
	{
		ObrisiProizvod($red["harcode"]);
	}
	$T1 = mysqli_query($baza, "SELECT * FROM podgrupe WHERE grupa='{$kod}'");
	foreach ($T1 as $red2)
	{
		ObrisiPodgrupu($red2['naziv']);
	}
	mysqli_query($baza, "DELETE FROM grupe WHERE grupa='{$kod}'");
	mysqli_close($baza);
}

?>