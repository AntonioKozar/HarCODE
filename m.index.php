<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>HarCODE</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" /> 
  <link rel="stylesheet" media="all" href="Stilovi/m.index/style.css" type="text/css">
  <link rel="stylesheet" media="all" href="Stilovi/index/css6.css" type="text/css">
</head>

<body>
  <div class="wrap">
    <header>
      <div class="logo"><a href="m.index.php">HarCODE</a></div>
      <div class="options">
      	
      </div>
      <div class="clear"></div>
    </header>
    
        

<article>
    	<h2 class="underline">Pretraživanje proizvoda</h2>
			<form action="" method="get" class="label-top">
			    <div class="span6 centered adminDiv">
	    
	    <div class="control-group">
	        <label class="control-label" for="inputHarcode">Harcode ili barcode</label>
	        <div class="controls">
	            <div class="input-append">
	                <input style="height:30px;" id="kod" name="kod" value="" placeholder="Harcode ili barcode" maxlength="13" required type="text" autocomplete="off" tabindex="1" ><br><br>
	                <?php 
	                	if (isset($_GET['trazi']) ) 
	                	{               		
	                		if (strlen($_GET['kod']) == 7 or strlen($_GET['kod']) == 13) 
	                		{
	                			include("PhpScript/m.index.trazi.kod.php");
	                			list($varString, $varTest, $varKod) = FunctionTrazi($_GET['kod']);
	                			print($varTest);
	                			if ($varTest == 0) 
	                			{
	                				print($varString);
	                			}
	                			else
	                			{
	                				print('<script type="text/javascript">window.location.replace("Stranice/m.prikaz.php?kod='.$varKod.'");</script>');
	                				//header("Location: Stranice/m.prikaz.php?kod={$varKod}");
	                			}
	                		}
	                		else
	                		{
	                			print("Polje mora sadržavati 7 znakova ukoliko unosite HarCODE ili u slučaju BarCODE 13 znakova.");
	                		}
	                	}
	                ?>

	            </div>
	        </div>
	    </div>
	    <div class="control-group">
	        <div class="controls">
	            <input type="submit" name="trazi" id="saveButton" value="Pretraživanje"><br><br><br>
	            <a style="padding-top:2px;" href="index.php?nop=1" class="btn">Vrati na normalnu verziju</a>
	        </div>
	    </div>
	</div>
			</form>			
    </article>
    <footer>
    	<p>HarCODE - AK</p>
    </footer>

</body>
</html>
