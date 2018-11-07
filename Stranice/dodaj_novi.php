<?php
include("../PhpScript/HarCODE_generator.php");
	session_start();
	$damira = $_SESSION['damira'];
	if ($damira == 0 or !isset($damira))
	{
        print('<script type="text/javascript">window.location.replace("../index.php");</script>');
        exit();
    }


?>
<html>
<head>
	<title>Dodaj novi proizvod</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css1.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css2.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css3.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css4.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css5.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/opis.css">
	<script type="text/javascript" src="../JavaScript/dodaj_novi.js"></script>
	<script type="text/javascript" src="../JavaScript/admin.js"></script>
</head>
<body>
	<?php
		if (isset($varwer)) {
			print($varwer);
		}
	?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container active">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="admin.php" style="font-family:Xolonium;">HarCODE</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="pregled_proizvoda.php"><i class="icon-list"></i>&nbsp;Pregled proizvoda</a></li>
                    <li><a href="dodaj_novi.php"><i class="icon-plus-sign"></i>&nbsp;Dodaj novi proizvod</a></li>
                </ul>
                <ul class="nav pull-right">
                    <li><a href="../"><i class="icon-user"></i>&nbsp;Odjava</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- OVDJE POČINJE KONTENJER ZA UNOS PODATAKA -->



<div class="container" style="margin-top:40px; width:100%;" onclick="function_def();" >
<form action="" method="post" enctype="multipart/form-data">
	<div class="span6 centered adminDiv">
	    <legend>Kreiraj novi proizvod</legend>
	    <div class="alert alert-success fade hidden" id="productNotification">
	        <button type="button" class="close">×</button>
	        <span id="productNotificationMessage">Proizvod spremljen!</span>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="inputHarcode">Harcode</label>
	        <div class="controls">
	            <div class="input-append">
	                <input style="height:30px;width:550px;" id="harcodeTextbox" name="harcode" placeholder="Harcode" maxlength="7" class="required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['harcode'])) { print($_SESSION['harcode']);} if(isset($_GET['harcode'])) {print(HarCODE());} ?>">
	                <span class="add-on"><a href="?harcode=1" id="harcodeGenerate">x</a></span>
	            </div>
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="barcodeTextbox">Barcode</label>
	        <div class="controls">
	            <input style="height:30px;width:550px;" id="barcodeTextbox" name="barcode1" placeholder="Barcode" maxlength="13" class="required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['barcode1'])) { print($_SESSION['barcode1']);}?>">
	            <p id="err"></p>
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="barcodeTextbox">Barcode ponovno</label>
	        <div class="controls">
	            <input style="height:30px;width:550px;" id="barcodeTextbox1" name="barcode2" placeholder="Barcode ponovno" maxlength="13" class="required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['barcode2'])) { print($_SESSION['barcode2']);}?>">
	            <p id="err"></p>
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="titleTextbox">Naziv</label>
	        <div class="controls">
	            <input style="height:30px;width:550px;" id="titleTextbox" name="naslov" placeholder="Naslov" maxlength="50" class="input-xlarge required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['naslov'])) { print($_SESSION['naslov']);}?>">
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="shortDescriptionTextbox">Kratki opis</label>
	        <div class="controls">
	            <input style="height:30px; width:550px;" id="shortDescriptionTextbox" name="podnaslov" placeholder="Kratki opis" maxlength="50" class="input-xlarge" type="text" autocomplete="off" value="<?php if (isset($_SESSION['podnaslov'])) { print($_SESSION['podnaslov']);}?>">
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="descriptionTextbox">Dugi opis</label>
	        
	        <div class="controls">
	            <textarea style="width:550px;" id="txt" placeholder="Dugi opis" name="opis" cols="20" rows="10" class="input-xlarge"><?php if (isset($_SESSION['opis'])) { print($_SESSION['opis']);}?></textarea>
	        </div>
	    </div>
	    <!--<div class="control-group">
	        <label class="control-label" for="isActiveCheckbox">Aktivan</label>
	        <div class="controls">
	            <input id="isActiveCheckbox" type="checkbox">
	        </div>
	    </div>-->
	    <div class="control-group">
	        <label class="control-label" for="inputManufacturer">Proizvođač</label>
	        <div class="controls">
	            <select id="inputManufacturer" name="info" style="width:550px;">
	            	<?php
	            	include("../PhpScript/dohvati_proizvodace.php");
	            	$varProizvodaci = DohvatiProizvodave();
	            		foreach ($varProizvodaci as $proizvod)
	            		{
	            	?>
						<option value="<?php print($proizvod['naziv']); ?>"><?php print($proizvod['naziv']); ?></option>
	            	<?php
	            		}
	            	?>
	            </select>
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="">Grupa proizvoda</label>
	        <div class="controls" id="productGroups">
	            <select id="inputProductGroups" name="grupa" style="width:550px;">
	            	<?php
	            	include("../PhpScript/dohvati_grupe.php");
	            	$varGrupe = DohvatiGrupe();
	            		foreach ($varGrupe as $grupe)
	            		{
	            	?>
	            	<option value="<?php print($grupe['grupa']); ?>"><?php print($grupe['grupa']); ?></option>
					<?php
	            		}
	            	?>
	            	</select>
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="">Podgrupa proizvoda</label>
	        <div class="controls" id="productGroups">
	            <select id="inputProductGroups" name="podgrupa" style="width:550px;">
	            	<?php
	            	include("../PhpScript/dohvati_podgrupu.php");
	            	$varPodgrupe = DohvatiPodgrupe();
	            		foreach ($varPodgrupe as $podgrupe)
	            		{
	            	?>
	            	<option value="<?php print($podgrupe['naziv']); ?>"><?php print($podgrupe['naziv']); ?></option>
					<?php
	            		}
	            	?>
	            	</select>
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="">Prilozi</label><br>
	        <div class="controls">
	        	Dodaj audio : <br><input type="file" name="audio" ><br><br>
	        	Dodaj video : <br><input style="margin-top:10px; height:30px;width:550px;" type="text" name="video" autocomplete="off" value="<?php if (isset($_SESSION['video'])) { print($_SESSION['video']);}?>" ><br>
	        	Dodaj pdf : <br> <input type="file" name="file" id="file">

	            <!--<a href="#mediaDialog" role="button" class="btn btn-success" data-toggle="modal" id="btnAddMedia">Dodaj audio</a>
	            <a href="#mediaDialog" role="button" class="btn btn-success" data-toggle="modal" id="btnAddMedia">Dodaj video</a>
	            <a href="#mediaDialog" role="button" class="btn btn-success" data-toggle="modal" id="btnAddMedia">Dodaj pdf</a>-->
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="">Slike :</label>
	        <div class="controls" id="slike">
				<!--<input style="height:30px; width: 30px; margin-top:5px;" id="br" name="xbr" maxlength="2" class="input-xlarge" type="text" value="0">
	        	Dodaj slike : <br>
	        	<!--<input onclick="btnSlike(0)" type="button" value="+" id="btn" style="height:40; width: 40px;">-->
	        	<input type="file" name="slika1">
	        	<input type="file" name="slika2">
	        	<input type="file" name="slika3">
	        	<input type="file" name="slika4">
	        	<input type="file" name="slika5">
	        	<input type="file" name="slika6">
	            <!--<a href="#galleryDialog" role="button" class="btn btn-success" data-toggle="modal" id="btnAddGallery">Dodaj slike</a>-->

	        </div>
	    </div>
	    <div class="control-group">
	        <div class="controls">
	            <input type="submit" name="spremi" class="btn btn-primary" id="saveButton" value="Spremi">
	            <a style="padding-top:2px;" href="pregled_proizvoda.php" class="btn">Odustani</a>
	        </div>
	    </div>
	    <?php
	    if (isset($_POST['spremi']))
		{
			if (isset($_FILES['audio']) and isset($_FILES['slika1']) and $_POST['harcode'] != "" and $_POST['barcode1']!="" and $_POST['barcode2'] !="" and $_POST['naslov']!="" and $_POST['podnaslov'] !="" and $_POST['opis'] !="" and $_POST['info']!="" and $_POST['grupa']!="" and $_FILES['file']!="" and $_POST['video']!="" and $_POST['podgrupa']!="")
			{
				include("../PhpScript/add_proizvod.php");
######################################-----------------SLIKE----------------############################################################
				if ($_POST['barcode1'] == $_POST['barcode2'] and strlen($_POST['barcode1']) == 13)
				{
					for ($i=1; $i <= 6 ; $i++)
					{
						if(count($_FILES) > 0)
					    /*{
							if(is_uploaded_file($_FILES['slika' . $i]['tmp_name']))
				      		{
								$slike[$i] = addslashes(file_get_contents($_FILES['slika' . $i]['tmp_name']));
							}
						}*/
						{
							$temp = explode(".", $_FILES['slika' . $i]["name"]);
							$extension = end($temp);

							if ($_FILES['slika' . $i]["size"] < 20000000)
							{
						    	if ($_FILES['slika' . $i]["error"] > 0)
						    	{
						        	#echo "Return Code: " . $_FILES['slika' . $i]["error"] . "<br>";
						    	}
						    	else
						    	{
						    		if ($_FILES['slika' . $i]["name"] != "") 
						    		{
						    			#mkdir("../Audio/" . $_POST['harcode'] . "/");
						        		if (file_exists("../Img/" . $_POST['harcode'] . " - " . $_FILES['slika' . $i]["name"]))
						        		{
						            		#echo $_FILES['slika' . $i]["name"] . " already exists. ";
						        		}
						        		else
						        		{
						        			move_uploaded_file($_FILES['slika' . $i]["tmp_name"], "../Img/" . $_POST['harcode'] . " - " . $_FILES['slika' . $i]["name"]);
						        			#print($_FILES['slika' . $i]["tmp_name"]);
						        		}
						    		}
						    	}
						    	if ($_FILES['slika' . $i]["name"] != "") 
						    	{
						    		$slike[$i] = $_FILES['slika' . $i]["name"];
						    	}
						    
							}
							else
							{
						    	print("Odabrana datoteka je iznad 200MB. Nedopuštena veličina.");
							}
						}
					}
#---------------------------------------------------------------------------------------------------------------------------------------#				
				
#######################################-------------------VIDEO---------------###########################################################					
					$start = 'watch?v=';
					$end   = '%';
					$string = $_POST['video'] . "%";
					$output = strstr(substr( $string, strpos( $string, $start) + strlen( $start)), $end, true);

					$x = "www.youtube.com/embed/" . $output . "?feature=player_detailpage";
					#print("Video");
#---------------------------------------------------------------------------------------------------------------------------------------#

#######################################-------------------AUDIO---------------###########################################################
					$temp = explode(".", $_FILES["audio"]["name"]);
					$extension = end($temp);

					if ($_FILES["audio"]["size"] < 200000000)
					{
					    if ($_FILES["audio"]["error"] > 0)
					    {
					        echo "Return Code: " . $_FILES["audio"]["error"] . "<br>";
					    }
					    else
					    {
					    	#mkdir("../Audio/" . $_POST['harcode'] . "/");
					        if (file_exists("../Audio/" . $_POST['harcode'] . " - " . $_FILES["audio"]["name"]))
					        {
					            echo $_FILES["audio"]["name"] . " already exists. ";
					        }
					        else
					        {
					        	move_uploaded_file($_FILES["audio"]["tmp_name"], "../Audio/" . $_POST['harcode'] . " - " . $_FILES["audio"]["name"]);
					        	#print("Audio");
					        }
					    }
					    $audio = $_FILES["audio"]["name"];
					}
					else
					{
					    Print("Odabrana datoteka je iznad 200MB. Nedopuštena veličina.");
					}
#---------------------------------------------------------------------------------------------------------------------------------------#

#######################################-------------------PDF---------------###########################################################

					$temp = explode(".", $_FILES["file"]["name"]);
					$extension = end($temp);
					if ($_FILES["file"]["size"] < 200000000)
					{
					    if ($_FILES["file"]["error"] > 0)
					    {
					        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
					    }
					    else
					    {
					    	#mkdir("../Pdf/" . $_POST['harcode'] . "/");
					        if (file_exists("../Pdf/" . $_POST['harcode'] . " - " . $_FILES["file"]["name"]))
					        {
					            echo $_FILES["file"]["name"] . " already exists. ";
					        }
					        else
					        {
					        	move_uploaded_file($_FILES["file"]["tmp_name"], "../Pdf/"  . $_POST['harcode'] .' - '. $_FILES["file"]["name"]);
					        	#print("PDF");
					        }
					    }
					}
				
					else
					{
					    Print("Odabrana datoteka je iznad 200MB. Nedopuštena veličina.");
					}
#---------------------------------------------------------------------------------------------------------------------------------------#

					include("../PhpScript/dohvati_proizvode.php");
					$varGrd = DohvatiProizvode();
					#print_r($varGrd);
					$varX = 0;
					foreach ($varGrd as $grd) 
					{
						if ($grd['harcode'] == $_POST['harcode']) 
						{
							$varX = 1;
						}		
						
					}
					#print($varX);
					if ($varX == 0) 
					{
						if ($audio == "") 
						{
							$audio=0;

						}
						if ($x == "") 
						{
							$x=0;
						}
						if ($slike =="") 
						{
							$slike=0;
						}
						$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1");
						list($varname) = DodajNoviItem($_POST['harcode'], $_POST['barcode1'], $_POST['barcode2'], $_POST['naslov'], $_POST['podnaslov'], mysqli_real_escape_string($baza, $_POST['opis']), $_POST['info'], $_POST['grupa'], $audio, $x, $_FILES["file"]["name"], $slike, $_POST['podgrupa']);
						unset($_SESSION['harcode']);
						unset($_SESSION['barcode1']);
						unset($_SESSION['barcode2']);
						unset($_SESSION['naslov']);
						unset($_SESSION['podnaslov']);
						unset($_SESSION['opis']);
						unset($_SESSION['grupa']);
						unset($_SESSION['video']);
						unset($_SESSION['podgrupa']);
						#print("uspjeh");
						print('<script type="text/javascript">window.location.replace("pregled_proizvoda.php");</script>');
						//header("Location: pregled_proizvoda.php");
					}
					else
					{
						print("Proizvod {$_POST['harcode']} već postoji u bazi.");
					}
					
			   	}
			   	else
			   	{
			   		print("Barcode mora sadržavati 13 znakova, barcode i potvrda barcode moraju biti identične.");
			   	}
			}
			else
			{
				if (isset($_POST['harcode'])) 
				{
					$_SESSION['harcode'] = $_POST['harcode'];
				}
				if (isset($_POST['barcode1'])) 
				{
					$_SESSION['barcode1'] = $_POST['barcode1'];
				}
				if (isset($_POST['barcode2'])) 
				{
					$_SESSION['barcode2'] = $_POST['barcode2'];
				}
				if (isset($_POST['naslov'])) 
				{
					$_SESSION['naslov'] = $_POST['naslov'];
				}
				if (isset($_POST['podnaslov'])) 
				{
					$_SESSION['podnaslov'] = $_POST['podnaslov'];
				}
				if (isset($_POST['opis'])) 
				{
					$_SESSION['opis'] = $_POST['opis'];
				}
				if (isset($_POST['grupa'])) 
				{
					$_SESSION['grupa'] = $_POST['grupa'];
				}
				if (isset($_POST['video'])) 
				{
					$_SESSION['video'] = $_POST['video'];
				}
				if (isset($_POST['podgrupa'])) 
				{
					$_SESSION['podgrupa'] = $_POST['podgrupa'];
				}	
				print('<script type="text/javascript">window.location.replace("dodaj_novi.php");</script>');
				//header("Location: dodaj_novi.php");		
				print("Sva polja moraju biti popunjena");
			}

		}
		?>	</div>
</form>
</div>
</body>
</html>
