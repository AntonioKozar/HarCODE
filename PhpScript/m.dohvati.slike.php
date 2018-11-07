<?php

session_start();
$proizvod = $_SESSION['proizvod'];
$kod = $proizvod[0];

$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("Nema konekcije na bazu.");
$T1 = mysqli_query($baza, "SELECT * FROM galerija WHERE harcode='{$kod}'");
if($T1->num_rows != 0)
{
    $i = 1;
    foreach($T1 as $R1)
    {
        $I1[$i] = $R1['slike'];
        $i++;
    }
    $I1[0] = $i-1;    
    print(json_encode($I1));
    exit;
}
else
{
    print(0);
    exit;
}
?>