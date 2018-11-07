<?php
	function AddPodgrupa($naziv, $opis, $grupa)
	{
		$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
	    $tablica = mysqli_query($baza, "SELECT * FROM podgrupe WHERE naziv='{$naziv}'")or die("Došlo je do pogreške u skripti add_grupu.php linija 6.");
	    $row = mysqli_num_rows($tablica);
	    print($row);
	    if ($row == 0) 
	    {
	    	print($grupa);
	    	$sql = "INSERT INTO podgrupe(ID, naziv, opis, grupa )VALUES( NULL, '{$naziv}', '{$opis}', '{$grupa}')";
			mysqli_query($baza, $sql) or die("Podgrupa [" . $naziv . "] nije uspješno dodana bazi PODGRUPA");
			print("Uspješno ste dodali podgrupu : [" . $naziv . "]." );
			mysqli_close($baza);
			
			return 1;
	    }
	    else
	    {
		$red = mysqli_fetch_row($tablica) or die("Došlo je do pogreške u skripti add_grupu.php linija 9.");

		    if (isset($red)) 
		    {
		    	print("Podgrupa s nazivom : [" . $naziv . "] već postoji.");
		    
		    	return 0;
		    }
			else
			{
				$sql = "INSERT INTO podgrupe(ID, naziv, opis, grupa )VALUES( NULL, '{$naziv}', '{$opis}', '{$grupa}')";
				mysqli_query($baza, $sql) or die("Podgrupa [" . $naziv . "] nije uspješno dodana bazi PODGRUPA");
				print("Uspješno ste dodali podgrupu : [" . $naziv . "]." );
				mysqli_close($baza);
				return 1;
			}
		}
		    
	}

	function UrediPodgrupu($id, $naziv, $opis, $grupa)
	{
		#print($id);
		$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
		if ($id == $naziv) 
		{
			$sql = "UPDATE podgrupe SET  
			opis = '{$opis}',
			grupa='{$grupa}'
			WHERE naziv='{$id}'";
			mysqli_query($baza, $sql) or die(mysqli_error($baza));
			print("Izvršen update na : [" . $id . "].");		
			mysqli_close($baza);
			#header("Location: pregled_podgrupe.php");
		}
		else
		{
			$tablica1 = mysqli_query($baza, "SELECT * FROM podgrupe");
			$br = 0;
			while ( $red2 = mysqli_fetch_row($tablica1)) 
			{
				if ($naziv ==$red2[1]) 
				{
					$br=1;
				}

			}
			if ($br==0) 
			{
				$sql = "UPDATE podgrupe SET  
				naziv = '{$naziv}', 
				opis = '{$opis}',
				grupa='{$grupa}'
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