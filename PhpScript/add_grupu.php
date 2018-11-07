<?php

function AddGrupu($naziv, $opis)
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
    $tablica = mysqli_query($baza, "SELECT * FROM grupe WHERE grupa='{$naziv}'")or die("Došlo je do pogreške u skripti add_grupu.php linija 6.");
    $row = mysqli_num_rows($tablica);
    #print($row);
    if ($row == 0)
    {
    	$sql = "INSERT INTO grupe(ID, grupa, opis )VALUES( NULL, '{$naziv}', '{$opis}')";
		mysqli_query($baza, $sql) or die("Grupa [" . $naziv . "] nije uspješno dodana bazi GRUPA");
		print("Uspješno ste dodali grupu : [" . $naziv . "]." );
		mysqli_close($baza);

		return 1;
    }
    else
    {
	$red = mysqli_fetch_row($tablica) or die("Došlo je do pogreške u skripti add_grupu.php linija 9.");

	    if (isset($red))
	    {
	    	print("Grupa s nazivom : [" . $naziv . "] već postoji.");

	    	return 0;
	    }
		else
		{
			$sql = "INSERT INTO grupe(ID, grupa, opis )VALUES( NULL, '{$naziv}', '{$opis}')";
			mysqli_query($baza, $sql) or die("Grupa [" . $naziv . "] nije uspješno dodana bazi GRUPA");
			print("Uspješno ste dodali grupu : [" . $naziv . "]." );
			mysqli_close($baza);
			return 1;
		}
	}

}

function UrediGrupu($id, $grupa, $opis)
	{
		include("add_proizvod.php");
		$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
		if ($id == $grupa)
		{
			$sql = "UPDATE grupe SET
			opis = '{$opis}'
			WHERE grupa='{$id}'";
			mysqli_query($baza, $sql) or die(mysqli_error($baza));
			print("Izvršen update na : [" . $id . "].");
			mysqli_close($baza);
		}
		else
		{
			$T1 = mysqli_query($baza, "SELECT * FROM predmeti WHERE grupa='{$id}'");
			foreach ($T1 as $red) 
			{
				mysqli_query($baza, "UPDATE predmeti SET grupa='{$grupa}' WHERE grupa='{$id}'");
			}

			$T2 = mysqli_query($baza, "SELECT * FROM grupe");
			$br = 0;
			while ( $red2 = mysqli_fetch_row($T2))
			{
				if ($grupa == $red2[1])
				{
					$br=1;
				}

			}
			if ($br==0)
			{
				$sql = "UPDATE grupe SET
				grupa = '{$grupa}',
				opis = '{$opis}'
				WHERE grupa='{$id}'";
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