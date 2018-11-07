<?php 
	function ObrisiProizvod($kod1)
	{
		$baza1 = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
		$T11 = mysqli_query($baza1, "SELECT * FROM predmeti WHERE harcode='{$kod1}'");
		$I11 = mysqli_fetch_row($T11);
		unlink("../Audio/". $kod1 . " - " . $I11[6]);
		unlink("../Pdf/". $kod1 . " - " . $I11[8]);
		$T21 = mysqli_query($baza1, "SELECT * FROM galerija WHERE harcode='{$kod1}'");
		while ($R11 = mysqli_fetch_row($T21)) 
		{
			unlink("../Img/{$kod1} - {$R11[2]}");
		}
		mysqli_query($baza1, "DELETE FROM galerija WHERE harcode='{$kod1}'")or die("Nije izvršeno brisanje u bazi galerija elementa : [" . $kod1 . "] i dobije se greška : " . mysql_error());
		mysqli_query($baza1, "DELETE FROM predmeti WHERE harcode='{$kod1}'")or die("Nije izvršeno brisanje u bazi predmeti elementa : [" . $kod1 . "] i dobije se greška : " . mysql_error());
		mysqli_close($baza1);	
	}
?>