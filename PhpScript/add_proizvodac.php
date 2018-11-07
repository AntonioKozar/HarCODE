

<?php

function AddProizvodaca($naziv, $opis, $adresa, $tel, $email, $url, $grad)
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $red = mysqli_fetch_row(mysqli_query($baza, "SELECT * FROM proizvodaci WHERE naziv='{$naziv}'"));
    
    if (isset($red)) {
    	print("Grupa s nazivom : " . $naziv . " već postoji.");
    }
	else
	{
		$sql = "INSERT INTO proizvodaci(ID, naziv, opis, adresa, tel, email, url, grad)VALUES( NULL, '{$naziv}', '{$opis}', '{$adresa}', '{$tel}', '{$email}', '{$url}', '{$grad}')";
		mysqli_query($baza, $sql) or die("Proizvođač [" . $naziv . "] nije uspješno dodana bazi PROIZVOĐAČ");
		print("Uspješno ste dodali grupu : " . $naziv );
	}

}

function UrediProizvodaca($id, $naziv, $opis, $adresa, $tel, $email, $url, $grad)
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
	if ($id == $naziv) 
	{
		$sql = "UPDATE proizvodaci SET  
			opis = '{$opis}',
			adresa = '{$adresa}',
			tel = '{$tel}',
			email = '{$email}',
			url = '{$url}',
			grad = '{$grad}'
			WHERE naziv='{$id}'";
			mysqli_query($baza, $sql) or die(mysqli_error($baza));
			print("Izvršen update na : [" . $id . "].");
			mysqli_close($baza);
	}
	else
	{
		$T1 = mysqli_query($baza, "SELECT * FROM predmeti WHERE info='{$id}'");
			foreach ($T1 as $red) 
			{
				mysqli_query($baza, "UPDATE predmeti SET info='{$naziv}' WHERE info='{$id}'");
			}

		$tablica1 = mysqli_query($baza, "SELECT * FROM proizvodaci");
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
			$sql = "UPDATE proizvodaci SET  
			naziv = '{$naziv}',
			opis = '{$opis}',
			adresa = '{$adresa}',
			tel = '{$tel}',
			email = '{$email}',
			url = '{$url}',
			grad = '{$grad}'
			WHERE naziv='{$id}'";
			mysqli_query($baza, $sql) or die(mysqli_error($baza));
			print("Promjene su spremljene.");
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