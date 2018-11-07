<?php 
function DohvatiProizvode()
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM predmeti ORDER BY naslov") or die(); 
#    $red1 = mysqli_fetch_row($tablica1);
    if (isset($tablica1)) 
    {
        $varProizvodi=array(); 
        $varSlike = array();
        $i=0;
        while ($red1 = mysqli_fetch_row($tablica1)) 
        {
            $varProizvodi[$i]=array();
            $varProizvodi[$i]['harcode']=$red1[0];
            $varProizvodi[$i]['barcode']=$red1[1];
            $varProizvodi[$i]['naziv']=$red1[2];
            $varProizvodi[$i]['podnaslov']=$red1[3];
            $varProizvodi[$i]['opis']=$red1[4];
            $i++;
        }
        mysqli_close($baza);

        return $varProizvodi;
    }
    else
    {
        $varProizvodi = 0;
        mysqli_close($baza);

        return $varProizvodi;
    }    
}

function DohvatiProizvod($id)
{
    $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM predmeti WHERE harcode='{$id}'") or die(); 
#    $red1 = mysqli_fetch_row($tablica1);
    if (isset($tablica1)) 
    {
        $varSlike = array();
        $i=0;
        $red1 = mysqli_fetch_row($tablica1);
        
        $varProizvodi['harcode'] = $red1[0];
        $varProizvodi['barcode'] = $red1[1];
        $varProizvodi['naziv'] = $red1[2];
        $varProizvodi['podnaslov'] = $red1[3];
        $varProizvodi['opis'] = $red1[4];
        $varProizvodi['info'] = $red1[5];
        $varProizvodi['video'] = $red1[7];
        $varProizvodi['pdf'] = $red1[8];
        $varProizvodi['grupa'] = $red1[9];
        $varProizvodi['podgrupa'] = $red1[10];
        mysqli_close($baza);

        return $varProizvodi;
    }
    else
    {
        $varProizvodi = 0;
        mysqli_close($baza);

        return $varProizvodi;
    }    
}
?>