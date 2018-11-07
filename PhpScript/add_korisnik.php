<?php

function AddKorisnik($ime, $prezime, $id, $pw, $email)
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
    $red = mysqli_fetch_row(mysqli_query($baza, "SELECT * FROM korisnici WHERE user='{$id}'"));
    
    if (isset($red)) {
    	print("<br><br>Korisnik s korisničkim imenom : " . $id . " već postoji.");
    }
	else
	{
		$sql = "INSERT INTO korisnici(ID, user, password, ime, prezime, email)VALUES(NULL, '{$id}', '{$pw}', '{$ime}', '{$prezime}', '{$email}')";
		mysqli_query($baza, $sql) or die("Korisnik [" . $id . "] nije uspješno dodana bazi KORISNICI" . mysqli_error());
		print("<br><br>Uspješno ste dodali novog korisnika : " . $ime . " " . $prezime . "." );
		mysqli_close($baza);
	
	}
}

function UrediKorisnika($id, $username, $password, $ime, $prezime, $email)
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
    if ($id == $username) 
	{
		$sql = "UPDATE korisnici SET  
	    password = '{$password}',
	    ime = '{$ime}',
	    prezime = '{$prezime}',
	    email = '{$email}'
	    WHERE user='{$id}'";
	    mysqli_query($baza, $sql) or die(mysqli_error($baza));
	    #print("Uspjeh!!!");
	    mysqli_close($baza);
        return 0;
	}
	else
	{
        $T1 = mysqli_query($baza, "SELECT * FROM korisnici");
        $br=0;
		while ( $red2 = mysqli_fetch_row($T1)) 
		{
			if ($username == $red2[1]) 
			{
				$br=1;
			}
		}
		if ($br==0) 
		{  
	        $sql = "UPDATE korisnici SET  
	        user = '{$username}',
	        password = '{$password}',
	        ime = '{$ime}',
	        prezime = '{$prezime}',
	        email = '{$email}'
	        WHERE user='{$id}'";
	        mysqli_query($baza, $sql) or die(mysqli_error($baza));
	        #print("Uspjeh!!!");
	        mysqli_close($baza);
        }
        else
        {
            mysqli_close($baza);
            return 1;
        }
    }

}

?>