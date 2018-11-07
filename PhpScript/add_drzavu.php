<?php

function AddDrzavu($naziv, $opis)
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $red = mysqli_fetch_row(mysqli_query($baza, "SELECT * FROM drzave WHERE naziv='{$naziv}'"));
    
    if (isset($red)) {
    	print("Država s nazivom : " . $naziv . " već postoji.");
    	return 0;
    }
	else
	{
		$sql = "INSERT INTO drzave(ID, naziv, opis)VALUES( NULL, '{$naziv}', '{$opis}')";
		mysqli_query($baza, $sql) or die("Država [" . $naziv . "] nije uspješno dodana bazi DRŽAVE");
		print("Uspješno ste dodali državu : " . $naziv );

	}
}

function UrediDrzavu($id, $ime, $opis1)
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
	$red = mysqli_fetch_row(mysqli_query($baza, "SELECT * FROM drzave WHERE naziv='{$ime}'"));
    if ($id == $ime) 
    {
    	$sql = "UPDATE drzave SET opis = '{$opis1}' WHERE naziv='{$id}'";
		mysqli_query($baza, $sql) or die(mysqli_error($baza));
		mysqli_close($baza);
        return 0;
    }
    else
    {
		$T1 = mysqli_query($baza, "SELECT * FROM gradovi WHERE drzava='{$id}'");
		foreach ($T1 as $red) 
		{
			mysqli_query($baza, "UPDATE gradovi SET drzava='{$ime}' WHERE drzava='{$id}'");
		}
        $tablica1 = mysqli_query($baza, "SELECT * FROM drzave");
        $br=0;
		while ( $red2 = mysqli_fetch_row($tablica1)) 
		{
			if ($ime == $red2[1]) 
			{
				$br=1;
			}

		}
        
	    if ($br==0) 
		{
			$sql = "UPDATE drzave SET  
			naziv = '{$ime}', 
			opis = '{$opis1}'
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