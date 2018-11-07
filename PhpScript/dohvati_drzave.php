
<?php 
function DohvatiDrzave()
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM drzave ORDER BY naziv"); 
    $varDrzave = array(); 
    $i=0;
	while ($red1 = mysqli_fetch_row($tablica1)) 
	{
        $varDrzave[$i]=array();
        $varDrzave[$i]['ID'] = $red1[0];
        $varDrzave[$i]['naziv']=$red1[1];
        $varDrzave[$i]['opis']=$red1[2];
        $i++;
    }
    mysqli_close($baza);
    return $varDrzave;

    
}

function DohvatiDrzavu($id)
{
    $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM drzave WHERE naziv='{$id}'"); 
    $red1 = mysqli_fetch_row($tablica1);
    $varDrzave['ID'] = $red1[0];
    $varDrzave['naziv']=$red1[1];
    $varDrzave['opis']=$red1[2];
        mysqli_close($baza);
    return $varDrzave;
    
}
?>

