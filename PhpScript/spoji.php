<?php 
function spoji($id, $pw)
	{
        //session_start();
		$baza = mysqli_connect("localhost", "root", "","harcode_db1") or die(mysql_error());
        $tablica1 = mysqli_query($baza, "SELECT * FROM korisnici WHERE user='{$id}' and password='{$pw}'");
        
        if ($tablica1->num_rows == 1) 
        {
            $red1 = mysqli_fetch_row($tablica1);
            $varKorisnik['ime'] = $red1[3];
            $varKorisnik['prezime'] = $red1[4];
            
            $_SESSION['korisnik'] = $id;
            
            $damira = 1;
           
            mysqli_close($baza);
            return array($varKorisnik, $damira);
        }
        else
        {
            $damira = 0;
            $varKorisnik = 0;
            mysqli_close($baza);
            return array($varKorisnik, $damira);
        }
    }
?>