<?php/*
    $baza = mysqli_connect("localhost", "root", "","harcode") or die(mysqli_error());

############# UNOS DRŽAVA #############

    for ($i=0; $i < 10; $i++)
    {
        $naziv = "Država " . $i;
        $opis = "Opis države " . $i;
        mysqli_query($baza, "INSERT INTO drzave (ID, naziv, opis) VALUES (NULL, '{$naziv}', '{$opis}')");
    }
    print("Uspješno dodano '{$i}' država.<br>");
#_____________________________________#

############ UNOS GRADOVA ############

    for ($i=0; $i < 10; $i++)
    {
        for ($j=0; $j < 3; $j++) {
            $zip = $i * $j + ($i + $j);
            $naziv = "Grad " . $i . $j;
            $drzava = "Država " . $i;
            mysqli_query($baza, "INSERT INTO gradovi (zip, naziv, drzava, ID) VALUES ('{$zip}', '{$naziv}', '{$drzava}', NULL)");
        }
    }
    $k = $i * $j;
    print("Uspješno dodano '{$k}' gradova.<br>");

#_____________________________________#

########## UNOS PROIZVOĐAČA ##########

    for ($i=0; $i < 10 ; $i++)
    {
        for ($j=0; $j < 3; $j++)
        {
            for ($k=0; $k < 3; $k++)
            {
                $naziv = "Proizvođač " . $i . $j . $k;
                $opis = "Opis proizvođača " . $i . $j . $k;
                $adresa = "Adresa proizvođača " . $i . $j . $k;
                $telefon = "Telefon proizvođača " . $i . $j . $k;
                $email = "Email proizvođača " . $i . $j . $k;
                $web = "Webstranica proizvođača " . $i . $j . $k;
                $grad = "Grad " . $i . $j;
                mysqli_query($baza, "INSERT INTO proizvodaci (ID, naziv, opis, adresa, tel, email, url, grad) VALUES (NULL, '{$naziv}', '{$opis}', '{$adresa}', '{$telefon}', '{$email}', '{$web}', '{$grad}')");
            }
        }
    }
    $x = $i*$j*$k;
    print("Uspješno dodano '{$x}' proizvođača.<br>");

#_____________________________________#

############## UNOS GRUPA #############

    for ($i=0; $i < 10; $i++)
    {
        $grupa = "Grupa " . $i;
        $opis = "Opis grupe " . $i;
        mysqli_query($baza, "INSERT INTO grupe (ID, grupa, opis) VALUES (NULL, '{$grupa}', '{$opis}')");
    }
    print("Uspješno dodano '{$i}' grupa.<br>");

#_____________________________________#

######### UNOS PROIZVODA #############

for ($i=0; $i < 10; $i++)
    {
        for ($j=0; $j < 3; $j++)
        {
            for ($k=0; $k < 3; $k++)
            {
                $harcode = $i . $j . $k . $i . $j . $k . $i;
                $barcode = $harcode . $harcode;
                $naslov = "Naziv proizvoda " . $i . $j . $k;
                $podnaslov = "Podnaslov proizvoda " . $i . $j . $k;
                $opis = "Opis proizvoda " . $i . $j . $k;
                $info = "Proizvođač " . $i . $j . $k;
                $audio = "Audio "  . $i . $j . $k;
                $video = "Video "  . $i . $j . $k;
                $pdf = "PDF "  . $i . $j . $k;
                $grupa = "Grupa " . $i;
                mysqli_query($baza, "INSERT INTO predmeti (harcode, barcode, naslov, podnaslov, opis, info, audio, video, pdf, grupa, ID)
                VALUES ('{$harcode}', '{$barcode}', '{$naslov}', '{$podnaslov}', '{$opis}', '{$info}', '{$audio}', '{$video}', '{$pdf}', '{$grupa}',NULL)");
            }
        }
    }
    print("Uspješno dodano '{$x}' proizvoda.<br>");

#_____________________________________#

########### UNOS SLIKA #############

    for ($i=0; $i < 10 ; $i++)
    {
       for ($j=0; $j < 3; $j++) {
           for ($k=0; $k < 3; $k++) {
               $harcode = $i . $j . $k . $i . $j . $k . $i;
               $slike = "Slika " . $harcode = $i . $j . $k . $i . $j . $k . $i;
               mysqli_query($baza, "INSERT INTO galerija (ID, harcode, slike) VALUES (NULL, '{$harcode}', '{$slike}')");
           }
       }
    }
print("Uspješno dodano '{$x}' slika.<br>");

#_____________________________________#
*/
?>