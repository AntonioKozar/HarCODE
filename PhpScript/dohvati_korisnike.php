
<?php 
function DohvatiKorisnike()
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM korisnici ORDER BY user"); 
    $varKorisnici=array(); 
    $i=0;
	while ($red1 = mysqli_fetch_row($tablica1)) 
	{
        $varKorisnici[$i]=array();
        $varKorisnici[$i]['ime']=$red1[3];
        $varKorisnici[$i]['prezime']=$red1[4];
        $varKorisnici[$i]['email']=$red1[5];
        $i++;
    }
    mysqli_close($baza);

    return $varKorisnici;
}
?>

