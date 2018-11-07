<?php 
function DohvatiGradove()
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM gradovi ORDER BY naziv"); 
    $varGradovi=array(); 
    $i=0;
	while ($red1 = mysqli_fetch_row($tablica1)) 
	{
        $varGradovi[$i]=array();
        $varGradovi[$i]['zip']=$red1[0];
        $varGradovi[$i]['naziv']=$red1[1];
        $varGradovi[$i]['opis']=$red1[2];
        $i++;
    }
    mysqli_close($baza);

    return $varGradovi;
   
}
function DohvatiOdabraneGradove($kod)
{
    $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM gradovi WHERE drzava='{$kod}'"); 
    $varGradovi=array(); 
    $i=0;
    while ($red1 = mysqli_fetch_row($tablica1)) 
    {
        $varGradovi[$i]=array();
        $varGradovi[$i]['zip']=$red1[0];
        $varGradovi[$i]['naziv']=$red1[1];
        $varGradovi[$i]['opis']=$red1[2];
        $i++;
    }
    mysqli_close($baza);

    return $varGradovi;
    
}

function DohvatiGrad($id)
{
    $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM gradovi WHERE zip='{$id}'"); 
    $red1 = mysqli_fetch_row($tablica1);
    $varGradovi['zip']=$red1[0];
    $varGradovi['naziv']=$red1[1];
    $varGradovi['opis']=$red1[2];
    mysqli_close($baza);

    return $varGradovi;
    
}
?>

