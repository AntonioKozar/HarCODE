<?php

if (isset($_GET['code'])) 
{
    $kod = $_GET['code'];
    $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("Nema konekcije na bazu.");
    $T1 = mysqli_query($baza, "SELECT * FROM predmeti WHERE harcode='{$kod}' OR barcode='{$kod}'");

    if ($T1->num_rows == 1) 
    {
        $R1 = mysqli_fetch_row($T1);
        session_start();
        $_SESSION['proizvod'] = $R1;
        mysqli_close($baza);
        print(1);
        exit;
    }
    else
    {			
        mysqli_close($baza);
        print(0);
        exit;
    }
}
else
{
    print(0);
}

?>