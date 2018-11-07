<?php
session_start();
$proizvod = $_SESSION['proizvod'];
$kod = $proizvod[5];
$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("Nema konekcije na bazu.");
$T1 = mysqli_query($baza, "SELECT * FROM proizvodaci WHERE naziv='{$kod}'");
if($T1->num_rows == 1)
{
    $R1 = mysqli_fetch_row($T1);
    
    $T2 = mysqli_query($baza, "SELECT * FROM gradovi WHERE naziv='{$R1[7]}'");
    $R2 = mysqli_fetch_row($T2);
    $I = $R1;
    $I[7] = $R2[0];
    $I[8] = $R2[1];
    $I[9] = $R2[2];
    $I[10] = $R2[3];
    //print_r($I);
    print(json_encode($I));
}
else
{
    print(0);
    mysqli_close($baza);
    exit;
}
?>