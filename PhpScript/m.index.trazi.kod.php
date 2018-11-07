<?php 
	function FunctionTrazi($kod)
	{
		$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("Nema konekcije na bazu.");
		$T1 = mysqli_query($baza, "SELECT * FROM predmeti WHERE harcode='{$kod}' OR barcode='{$kod}'");
		$R1 = mysqli_num_rows($T1);
		print($R1);
		if ($R1 != 0) 
		{
			$varTest = 1;
			$varRet = "";
			$varKod = $kod;
			mysqli_close($baza);
			return array($varRet, $varTest, $varKod);
		}
		else
		{			
			$varTest = 0;
			$varRet = "U bazi ne postoji element koji sadrži HarCODE ili BarCODE : '{$kod}'";
			$varKod = 0;
			mysqli_close($baza);
			return array($varRet, $varTest, $varKod);
		}
	}
	function FunctionNadi($kod)
	{
		$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1") or die("Nema konekcije na bazu.");
		$T1 = mysqli_query($baza, "SELECT * FROM predmeti WHERE harcode='{$kod}' OR barcode='{$kod}'");
		$I1 = mysqli_fetch_row($T1);
		$P1['harcode'] = $I1[0];
		$P1['barcode'] = $I1[1]; 
		$P1['naziv'] = $I1[2]; 
		$P1['ko'] = $I1[3]; 
		$P1['opis'] = $I1[4]; 
		$P1['p'] = $I1[5]; 
		$P1['audio'] = $I1[6]; 
		$P1['video'] = $I1[7]; 
		$P1['pdf'] = $I1[8]; 
		$P1['grupa'] = $I1[9]; 
		$P1['podgrupa'] = $I1[10]; 
		$P1['time'] = $I1[11]; 
		$T2 = mysqli_query($baza, "SELECT * FROM galerija WHERE harcode='{$I1[0]}'");
		if ($T2) 
		{
			$i = 0;
			while($I2 = mysqli_fetch_row($T2))
			{
				$S1[$i] = $I2[2];
				$i++;
			}

		}
		else
		{
			$S1 = 0;
		}
		mysqli_close($baza);
		return array($P1, $S1);
	}

?>