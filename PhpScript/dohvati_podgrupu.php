<?php 

function DohvatiPodgrupe()
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM podgrupe ORDER BY naziv ASC"); 
    $varPodgrupe=array(); 
    $i=0;
	while ($red1 = mysqli_fetch_row($tablica1)) 
	{
        $varPodgrupe[$i]=array();
        $varPodgrupe[$i]['id']=$red1[0];
        $varPodgrupe[$i]['naziv']=$red1[1];
        $varPodgrupe[$i]['opis']=$red1[2];
        $varPodgrupe[$i]['grupa']=$red1[3];
        $i++;
    }
    mysqli_close($baza);
    return $varPodgrupe;
}

function DohvatiPodgrupu($id)
{
    $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM podgrupe WHERE naziv='{$id}'"); 
    $red1 = mysqli_fetch_row($tablica1);
      
    $varKorisnici['naziv']=$red1[1];
    $varKorisnici['opis']=$red1[2];
    $varKorisnici['grupa']=$red1[3];
    mysqli_close($baza);
    return $varKorisnici;
}

?>
