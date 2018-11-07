<?php
	session_start();
	$damira = $_SESSION['damira'];
	if ($damira == 0 or !isset($damira))
	{
        print('<script type="text/javascript">window.location.replace("../index.php");</script>');
        exit();
    }
    else
    {
    	$id = $_GET['ID'];
    	include("../PhpScript/dohvati_proizvode.php");
    	$varProizvodi = DohvatiProizvod($id);
    }


?>
<html>
<head>
	<title>Uredi proizvod</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css1.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css2.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css3.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css4.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css5.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/opis.css">
	<!--<link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvoda/css6.css">-->
    <script type="text/javascript" src="../JavaScript/admin.js"></script>

</head>
<body id="sve_item">
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
                        <li><a href="pregled_proizvoda.php">&nbsp;Pregled proizvoda</a></li>
                        <li><a href="dodaj_novi.php">&nbsp;Dodajnovi proizvod</a></li>
                    </ul>
                    <ul class="nav pull-right">
                        <li><a href="../?gg=0">&nbsp;Odlogiraj se</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


<!-- OVDJE POČINJE KONTENJER ZA UNOS PODATAKA -->



<div class="container" style="margin-top:40px; width:100%;" onclick="function_def();" >
<form action="" method="post" enctype="multipart/form-data">
	<div class="span6 centered adminDiv">
	    <legend>Uredi proizvod</legend>
	    <div class="alert alert-success fade hidden" id="productNotification">
	        <button type="button" class="close">×</button>
	        <span id="productNotificationMessage">Proizvod spremljen!</span>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="inputHarcode">Harcode</label>
	        <div class="controls">
	            <div class="input-append">
	                <input name="harcode" disabled style="height:30px;width:550px;" id="harcodeTextbox" placeholder="Harcode" maxlength="6" class="required" autocomplete="off" required="" type="text" value="<?php print($varProizvodi['harcode']);  ?>">
	                <span class="add-on"  disabled><a href="" id="harcodeGenerate"  ></a></span>
	            </div>
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="barcodeTextbox">Barcode</label>
	        <div class="controls">
	            <input name="barcode1" style="height:30px;width:550px;" id="barcodeTextbox" autocomplete="off" placeholder="Barcode" maxlength="13" autocomplete="off" class="required" required="" type="text" value="<?php print($varProizvodi['barcode']);  ?>">
	            <p id="err"></p>
	        </div>
	    </div>
	   <div class="control-group">
	        <label class="control-label" for="titleTextbox">Barcode ponovno</label>
	        <div class="controls">
	            <input name="barcode2" style="height:30px;width:550px;" id="titleTextbox" autocomplete="off" placeholder="Naslov" maxlength="13" autocomplete="off" class="input-xlarge required" required="" type="text" value="<?php print($varProizvodi['barcode']);  ?>">
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="shortDescriptionTextbox">Naziv</label>
	        <div class="controls">
	            <input name="naslov" style="height:30px; width:550px;" id="shortDescriptionTextbox" autocomplete="off"  placeholder="Kratki opis" autocomplete="off" maxlength="50" class="input-xlarge" type="text" value="<?php print($varProizvodi['naziv']);  ?>">
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="shortDescriptionTextbox">Kratki opis</label>
	        <div class="controls">
	            <input name="podnaslov" style="height:30px; width:550px;" id="shortDescriptionTextbox" autocomplete="off"  placeholder="Kratki opis" autocomplete="off" maxlength="50" class="input-xlarge" type="text" value="<?php print($varProizvodi['podnaslov']);  ?>">
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="descriptionTextbox">Dugi opis</label>
	        <div class="controls">
	            <textarea name="opis" style="width:550px;" id="descriptionTextbox" placeholder="Dugi opis" cols="20" rows="10" class="input-xlarge"><?php print($varProizvodi['opis']);  ?></textarea>
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="inputManufacturer">Proizvođač</label>
	        <div class="controls">
	            <select id="inputManufacturer" name="info" style="width:550px;">
	            	<?php
	            	include("../PhpScript/dohvati_proizvodace.php");
	            	$varProizvodaci = DohvatiProizvodave();
	            		foreach ($varProizvodaci as $proizvod)
	            		{
	            			if ($proizvod['naziv'] == $varProizvodi['info']) 
	            			{
    				?>
					<option selected="selected" value="<?php print($proizvod['naziv']); ?>"><?php print($proizvod['naziv']); ?></option>
    				<?php
	            			}
	            			else
	            			{
	            	?>
						<option value="<?php print($proizvod['naziv']); ?>" ><?php print($proizvod['naziv']); ?></option>
	            	<?php
	            			}
	            		}
	            	?>
	            </select>
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="">Grupa proizvoda</label>
	        <div class="controls" id="productGroups">
	            <select name="grupa" id="inputProductGroups"  style="width:550px;">
	            	<?php
	            	include("../PhpScript/dohvati_grupe.php");
	            	$varGrupe = DohvatiGrupe();
	            		foreach ($varGrupe as $grupe)
	            		{
	            			if ($grupe['grupa'] == $varProizvodi['grupa']) 
	            			{
	            	?>
					<option selected="selected" value="<?php print($grupe['grupa']); ?>"><?php print($grupe['grupa']); ?></option>
	            	<?php
	            			}
	            			else
	            			{
	            	?>
	            	<option value="<?php print($grupe['grupa']); ?>"><?php print($grupe['grupa']); ?></option>
					<?php
							}
	            		}
	            	?>
	            	</select>
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="">Podgrupa proizvoda</label>
	        <div class="controls" id="productGroups">
	            <select name="podgrupa" id="inputProductGroups"  style="width:550px;">
	            	<?php
	            	include("../PhpScript/dohvati_podgrupu.php");
	            	$varPodgrupe = DohvatiPodgrupe();
	            		foreach ($varPodgrupe as $podgrupe)
	            		{
	            			if ($podgrupe['naziv'] == $varProizvodi['podgrupa']) 
	            			{
	            	?>
					<option selected="selected" value="<?php print($podgrupe['naziv']); ?>"><?php print($podgrupe['naziv']); ?></option>
	            	<?php
	            			}
	            			else
	            			{
	            	?>
	            	<option value="<?php print($podgrupe['naziv']); ?>"><?php print($podgrupe['naziv']); ?></option>
					<?php
							}
	            		}
	            	?>
	            	</select>
	        </div>
	    </div>
	    <div class="control-group">
	        <label class="control-label" for="">Prilozi</label><br>
	        <div class="controls">
	        	Video : <input name="video" autocomplete="off" style="margin-top:10px; height:30px;width:550px;" type="text"  value="<?php print($varProizvodi['video']);  ?>"><br>
	        </div>
	    </div>
	    <div class="control-group">
	        <div class="controls">
	            <input type="submit" name="spremi" class="btn btn-primary" id="saveButton" value="Spremi" >
	            <a style="padding-top:2px;" href="pregled_proizvoda.php" class="btn">Odustani</a>
	        </div>
	    </div>
	    <?php
	    if (isset($_POST['spremi']) and $_POST['barcode1'] == $_POST['barcode2'] )
		{
			if ($_POST['barcode1'] != "" and $_POST['naslov']!="" and $_POST['podnaslov'] !="" and $_POST['opis']!="" and $_POST['info'] !="" and $_POST['grupa'] !="" and $_POST['video']!="" and $_POST['podgrupa']!="")
			{
			include("../PhpScript/add_proizvod.php");
            if($varProizvodi['video'] == $_POST['video'])  
            {
                $x = $varProizvodi['video'];
                //print($x);
            }
            else
            {
            $start = 'watch?v=';
				$end   = '%';
				$string = $_POST['video'] . "%";
				$output = strstr(substr( $string, strpos( $string, $start) + strlen( $start)), $end, true);
                
				    $x = "www.youtube.com/embed/" . $output . "?feature=player_detailpage";
                    //print($x);
            }
            	$baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1");
				list($varname) = UrediItem($varProizvodi['harcode'], $_POST['barcode1'], $_POST['naslov'], $_POST['podnaslov'], mysqli_real_escape_string($baza, $_POST['opis']), $_POST['info'], $_POST['grupa'], $x, $_POST['podgrupa']);
				print('<script type="text/javascript">window.location.replace("pregled_proizvoda.php");</script>');
				//header("Location: pregled_proizvoda.php");
		   	}
		   	else
		   	{		   		
		   		print("Sva polja moraju biti popunjena");
		   	}

		}
		?>
	</div>
</form>
</div>
</body>
</html>
