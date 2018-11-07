<?php

function AddGrad($zip, $naziv, $drzave)
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("Nema konekcije s bazom" . mysqli_error());
    $red = mysqli_fetch_row(mysqli_query($baza, "SELECT * FROM gradovi WHERE naziv='{$naziv}'"));
    
    if (isset($red)) {
    	print("Grad s nazivom : " . $naziv . " već postoji.");
    }
	else
	{
		$tablica1 = mysqli_query($baza, "SELECT * FROM gradovi");
		$br=0;
		while ( $red2 = mysqli_fetch_row($tablica1)) 
		{
			if ($zip ==$red2[0] and $naziv == $red2[1] and $drzava == $red2[2]) 
			{
				$br=1;
			}

		}
		if ($br==0) 
		{
			# code...
		

		$sql = "INSERT INTO gradovi(zip, naziv, drzava)VALUES('{$zip}', '{$naziv}', '{$drzave}')";
		mysqli_query($baza, $sql) or die("Grad [" . $naziv . "] nije uspješno dodana bazi GRADOVI" . mysqli_error());
		print("Uspješno ste dodali grad : " . $naziv );
		mysqli_close($baza);
		}
		else
		{
			mysqli_close($baza);
			print("Već postoji grad : [" . $naziv . "] sa poštanskim kodom : [" . $zip . "] i koje se nalaze u državi : [" . $drzava . "].");
		}

	}
}

function UrediGrad($id, $zip, $naziv, $drzava)
{

	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
	if ($id == $naziv) 
	{
		$sql = "UPDATE gradovi SET  
		zip = '{$zip}',
		naziv = '{$naziv}',
		drzava = '{$drzava}'
		WHERE naziv='{$id}'";
		mysqli_query($baza, $sql) or die(mysqli_error($baza));
		#print("Uspjeh!!!");
		mysqli_close($baza);
	}
	else
	{

		$T1 = mysqli_query($baza, "SELECT * FROM proizvodaci WHERE grad='{$id}'");
			foreach ($T1 as $red) 
			{
				mysqli_query($baza, "UPDATE proizvodaci SET grad='{$naziv}' WHERE grad='{$id}'");
			}
		$tablica1 = mysqli_query($baza, "SELECT * FROM gradovi");
		$br=0;
		while ( $red2 = mysqli_fetch_row($tablica1)) 
		{
			if ($naziv == $red2[1]) 
			{
				$br=1;
			}
		}
		if ($br==0) 
		{
			$sql = "UPDATE gradovi SET  
			zip = '{$zip}',
			naziv = '{$naziv}',
			drzava = '{$drzava}'
			WHERE naziv='{$id}'";
			mysqli_query($baza, $sql) or die(mysqli_error($baza));
			mysqli_close($baza);
            return 0;
		}
		else
		{
			mysqli_close($baza);
			return 1;
		}
	}
}

?>