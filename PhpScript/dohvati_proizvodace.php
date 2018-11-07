<?php 
function DohvatiProizvodave()
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM proizvodaci ORDER BY naziv"); 
    $varProizvodaci=array(); 
    $i=0;
	while ($red1 = mysqli_fetch_row($tablica1)) 
	{
        $varProizvodaci[$i]=array();
        $varProizvodaci[$i]['naziv']=$red1[1];
        $varProizvodaci[$i]['opis']=$red1[2];
        $varProizvodaci[$i]['adresa']=$red1[3];
        $varProizvodaci[$i]['tel']=$red1[4];
        $varProizvodaci[$i]['email']=$red1[5];
        $varProizvodaci[$i]['url']=$red1[6];
        $varProizvodaci[$i]['grad']=$red1[7];
        $i++;
    }
    mysqli_close($baza);

    return $varProizvodaci;
    
}

function DohvatiProizvodaca($id)
{
    $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM proizvodaci WHERE naziv='{$id}'"); 
    $red1 = mysqli_fetch_row($tablica1);

    $varProizvodaci['naziv']=$red1[1];
    $varProizvodaci['opis']=$red1[2];
    $varProizvodaci['adresa']=$red1[3];
    $varProizvodaci['tel']=$red1[4];
    $varProizvodaci['email']=$red1[5];
    $varProizvodaci['url']=$red1[6];
    $varProizvodaci['grad']=$red1[7];
    mysqli_close($baza);

    return $varProizvodaci;
    
}
?>