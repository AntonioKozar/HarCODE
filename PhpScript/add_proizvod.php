<?php
function DodajNoviItem($harcode, $barcode1, $barcode2, $naslov, $podnaslov, $opis, $info, $grupa, $audio, $video, $pdf, $slike1, $podgrupa)
{
	if ($barcode2 == $barcode1) {
		$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
		$tablica1 = mysqli_query($baza, "SELECT * FROM predmeti WHERE harcode='{$harcode}'");
		$redTest = mysqli_num_rows($tablica1);
		if ($redTest == 0) 
		{
            session_start();
            $korisnik = $_SESSION['korisnik'];
            $harcode = mysqli_real_escape_string($baza, $harcode);
            $barcode1 = mysqli_real_escape_string($baza, $barcode1);
            $naslov = mysqli_real_escape_string($baza, $naslov);
            $podnaslov = mysqli_real_escape_string($baza, $podnaslov);
            $opis = mysqli_real_escape_string($baza, $opis);
            $info = mysqli_real_escape_string($baza, $info);
            $grupa = mysqli_real_escape_string($baza, $grupa);
            $audio = mysqli_real_escape_string($baza, $audio);
            $video = mysqli_real_escape_string($baza, $video);
            $pdf = mysqli_real_escape_string($baza, $pdf);
            $podgrupa = mysqli_real_escape_string($baza, $podgrupa);
            date_default_timezone_set('Europe/Zagreb');        
            $ureden = date("D M j G:i:s T Y");
            
            
            
			$sql = "INSERT INTO predmeti(harcode ,barcode, naslov, podnaslov, opis, info, audio, video, pdf, grupa, podgrupa, edit, user)VALUES('{$harcode}', '{$barcode1}', '{$naslov}', '{$podnaslov}', '{$opis}', '{$info}', '{$audio}', '{$video}', '{$pdf}', '{$grupa}', '{$podgrupa}', '{$ureden}', '{$korisnik}')";
			mysqli_query($baza, $sql);
			foreach ($slike1 as $slika) 
			{
				$sql_img = "INSERT INTO galerija(ID, harcode ,slike, user, edit)VALUES(NULL, '{$harcode}', '{$slika}', '{$korisnik}', '{$ureden}')";
    			mysqli_query($baza, $sql_img);
			}
			mysqli_close($baza);  
		}
		else
		{
			print("Već postoji element u bazi s ovim HarCODOM : [" . $harcode . "].");
			mysqli_close($baza);
		}
  	
	}
}

function UrediItem($harcode, $barcode1, $naslov, $podnaslov, $opis, $info, $grupa, $video, $podgrupa)
{
    date_default_timezone_set('Europe/Zagreb');        
    $ureden = date("D M j G:i:s T Y");
    session_start();
    $korisnik = $_SESSION['korisnik'];
    $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die(mysqli_error());
		$sql = "UPDATE predmeti SET 		
		barcode = '{$barcode1}' , 
		naslov = '{$naslov}', 
		podnaslov = '{$podnaslov}', 
		opis = '{$opis}', 
		info = '{$info}', 
		video = '{$video}', 
		grupa = '{$grupa}',
		podgrupa = '{$podgrupa}',
        edit = '{$ureden}',
        user = '{$korisnik}'
		WHERE harcode='{$harcode}'";
		mysqli_query($baza, $sql) or die(mysqli_error($baza));
#print("Uspjeh!!!");
		mysqli_close($baza);
	
	
}
?>
