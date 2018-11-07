<?php 
function trazi($kod)	
{
    $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("mysql_error()");
    $tablica1 = mysqli_query($baza, "SELECT * FROM predmeti WHERE harcode='{$kod}' OR barcode='{$kod}'");  
#   print_r($tablica1);
    $red = mysqli_fetch_row($tablica1);
    if (isset($red)) 
    {
    	$varProizvod['harcode'] = $red[0];
    	$varSub = $red[0];
    	$varProizvod['naslov'] = $red[2];
    	$varProizvod['podnaslov'] = $red[3];
    	$varProizvod['opis'] = $red[4];
    	$varProizvod['info'] = $red[5];
    	$varProizvod['audio'] = $red[6];
    	$varProizvod['video'] = $red[7];
    	$varProizvod['pdf'] = $red[8];
        $varProizvod['grupa'] = $red[9];
        $varProizvod['podgrupa'] = $red[10];

    	$tablica2 = mysqli_query($baza,"SELECT * FROM galerija WHERE harcode='{$red[0]}'" );
    	$br = 0;
    	while ($red2 = mysqli_fetch_row($tablica2))
    	{
    		$varSlike[$br] = $red2[2];
    		$br++;
    	}
        $x = $varProizvod['info'];
        $y = array();
        $T1 = mysqli_query($baza, "SELECT * FROM proizvodaci WHERE naziv='{$x}'");
        $R1 = mysqli_fetch_row($T1);
        $y[0]  = $R1[1];
        $y[1] = $R1[2];
        $y[2] = $R1[3];
        $y[3] = $R1[4];
        $y[4] = $R1[5];
        $y[5] = $R1[6];
        $y[6] = $R1[7];
        $T2 = mysqli_query($baza, "SELECT * FROM gradovi WHERE naziv='{$R1[7]}'");
        $R2 = mysqli_fetch_row($T2);

        $y[7] = $R2[0];
        $y[8] = $R2[2];
    }
	if (isset($varSlike)) 
	{
        mysqli_close($baza);
		return array($varProizvod, $varSlike, $y);
		
	}
	if (isset($varProizvod)) 
	{
        mysqli_close($baza);
		return array($varProizvod, 0, $y);
		
	}
	else
	{
		mysqli_close($baza);
	}
}
?>