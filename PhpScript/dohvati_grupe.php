<?php 
function DohvatiGrupe()
{
	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $tablica1 = mysqli_query($baza, "SELECT * FROM grupe ORDER BY grupa"); 
    $varGrupa=array(); 
    $i=0;
  
	while ($red1 = mysqli_fetch_row($tablica1) )
	{
        $varGrupa[$i]=array();
        $varGrupa[$i]['grupa']=$red1[1];
        $varGrupa[$i]['opis']=$red1[2];
        $i++;
    }
    mysqli_close($baza);

    return $varGrupa;

}
function DohvatiGrupu($id)
{
    $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysql_error());
    $red1 = mysqli_fetch_row(mysqli_query($baza, "SELECT * FROM grupe WHERE grupa='{$id}'")); 
    
    $varGrupa['grupa']=$red1[1];
    $varGrupa['opis']=$red1[2];
    mysqli_close($baza);
    return $varGrupa;
    
}
?>
