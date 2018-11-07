<?php 
function HarCODE()
{


	#	1. brojka	-----------
	$d1 = mt_rand (0, 2);
	if ($d1 == 0) {
		$d21 = mt_rand (0, 9);
		$d11 = chr($d21 + 48);
	}
	elseif ($d1 == 1) {
		$d21 = mt_rand (0, 25);
		$d11 = chr($d21 + 65);
	}
	else
	{
		$d21 = mt_rand (0, 25);
		$d11 = chr($d21 + 97);
	}
	############################

	#	2. brojka	-----------
	$d2 = mt_rand (0, 2);
	if ($d2 == 0) {
		$d22 = mt_rand (0, 9);
		$d12 = chr($d22 + 48);
	}
	elseif ($d2 == 1) {
		$d22 = mt_rand (0, 25);
		$d12 = chr($d22 + 65);
	}
	else
	{
		$d22 = mt_rand (0, 25);
		$d12 = chr($d22 + 97);
	}
	############################

	#	3. brojka	-----------
	$d3 = mt_rand (0, 2);
	if ($d3 == 0) {
		$d23 = mt_rand (0, 9);
		$d13 = chr($d23 + 48);
	}
	elseif ($d3 == 1) {
		$d23 = mt_rand (0, 25);
		$d13 = chr($d23 + 65);
	}
	else
	{
		$d23 = mt_rand (0, 25);
		$d13 = chr($d23 + 97);
	}
	############################

	#	4. brojka	-----------
	$d4 = mt_rand (0, 2);
	if ($d4 == 0) {
		$d24 = mt_rand (0, 9);
		$d14 = chr($d24 + 48);
	}
	elseif ($d4 == 1) {
		$d24 = mt_rand (0, 25);
		$d14 = chr($d24 + 65);
	}
	else
	{
		$d24 = mt_rand (0, 25);
		$d14 = chr($d24 + 97);
	}
	############################

	#	5. brojka	-----------
	$d5 = mt_rand (0, 2);
	if ($d5 == 0) {
		$d25 = mt_rand (0, 9);
		$d15 = chr($d25 + 48);
	}
	elseif ($d5 == 1) {
		$d25 = mt_rand (0, 25);
		$d15 = chr($d25 + 65);
	}
	else
	{
		$d25 = mt_rand (0, 25);
		$d15 = chr($d25 + 97);
	}
	############################

	#	6. brojka	-----------
	$d6 = mt_rand (0, 2);
	if ($d6 == 0) {
		$d26 = mt_rand (0, 9);
		$d16 = chr($d26 + 48);
	}
	elseif ($d6 == 1) {
		$d26 = mt_rand (0, 25);
		$d16 = chr($d26 + 65);
	}
	else
	{
		$d26 = mt_rand (0, 25);
		$d16 = chr($d26 + 97);
	}
	############################

	#print($d11.$d12.$d13.$d14.$d15.$d16);

	$sub_DXX = array($d21, $d22, $d23, $d24, $d25, $d26);
	$sub_ASC = array($d11, $d12, $d13, $d14, $d15, $d16);
	$sub_DX = array($d1, $d2, $d3, $d4, $d5, $d6);

	#print_r($sub_DX);
	$i = 0;
	foreach ($sub_DX as $br) 
	{
		
		if ($br == 0) 
		{
			$code_start = 1;
			$code_end = 10;
			$code[$i] = $code_start + $sub_DXX[$i];
		}
		elseif ($br == 1) 
		{
			$code_start = 11;
			$code_end = 36;
			$code[$i] = $code_start + $sub_DXX[$i];
		}
		else
		{
			$code_start = 37;
			$code_end = 62;
			$code[$i] = $code_start + $sub_DXX[$i];
		}
		$i++;
	}

	$sub = str_split($code[5]);
	$num = strlen($code[5]);
	if ($num == 1) 
	{
		for ($i6=0; $i6 <= $sub[0] ; $i6++) 
		{ 
			switch ($i6) 
			{
				case '0':
					$br = 9;
					break;
				case '1':
					$br = 8;
					break;
				case '2':
					$br = 6;
					break;
				case '3':
					$br = 4;
					break;
				case '4':
					$br = 2;
					break;
				case '5':
					$br = 9;
					break;
				case '6':
					$br = 7;
					break;
				case '7':
					$br = 5;
					break;
				case '8':
					$br = 3;
					break;
				case '9':
					$br = 1;
					break;
				default:
					$br = "";
					break;
			}
		}
	}
	else
	{
		for ($i6=0; $i6 <= $sub[1] ; $i6++) 
		{ 
			switch ($i6) 
			{
				case '0':
					$br = 9;
					break;
				case '1':
					$br = 8;
					break;
				case '2':
					$br = 6;
					break;
				case '3':
					$br = 4;
					break;
				case '4':
					$br = 2;
					break;
				case '5':
					$br = 9;
					break;
				case '6':
					$br = 7;
					break;
				case '7':
					$br = 5;
					break;
				case '8':
					$br = 3;
					break;
				case '9':
					$br = 1;
					break;
				default:
					$br = "";
					break;
			}
		}
	}

	$x = $sub_ASC[0].$sub_ASC[1].$sub_ASC[2].$sub_ASC[3].$sub_ASC[4].$sub_ASC[5].$br;
	return $x;
}
?>