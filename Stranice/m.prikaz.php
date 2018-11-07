<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>HarCODE</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" /> 
  <link rel="stylesheet" media="all" href="../Stilovi/m.index/style.css" type="text/css">
  <link rel="stylesheet" media="all" href="../Stilovi/index/css6.css" type="text/css">
</head>

<body>
  <div class="wrap">
    <header>
      <div class="logo"><a href="../">HarCODE</a></div>
      <div class="options">
      	
      </div>
      <div class="clear"></div>
    </header>  
  	<article>
		<?php 
			include '../PhpScript/m.index.trazi.kod.php';
			list($P, $S) = FunctionNadi($_GET['kod']);
			include '../PhpScript/pretrazi.php';
			list($varProizvod, $varSlike, $x)=trazi($_GET['kod']);
		?>
		<h5>NAZIV PROIZVODA : <h1 class="underline"><?php print($P['naziv']); ?></h1></h5>
		<h5>KRATAK OPIS : <h3 class="underline"><?php print($P['ko']);?></h3></h5>
		<h5>GRUPA : <h3 class="underline"><?php print($P['grupa']);?></h3></h5>
		<h5>PODGRUPA : <h3 class="underline"><?php print($P['podgrupa']);?></h3></h5>
		<div>
			<h3 class="underline">Proizvođač</h3>
			<p><b><?php print($x[0]);?></b></p>
          		<p>ADRESA : <?php print($x[2]);?>, <?php print($x[7]);?> <?php print($x[6]);?>, <?php print($x[8]);?><br>
          		TEL : <?php print($x[3]);?><br>
          		WEB : <a href="//<?php print($x[5])?>"><?php print($x[5])?></a><br>
          		E-mail : <a href="mailto:<?php print($x[4])?>"><?php print($x[4])?></a>
		</div>
		<div>
			<h3 class="underline">Opis</h3>
			<p style="text-align:justify;"><?php print($P['opis']);?></p>
		</div>
		
		<div>
			<h3 class="underline">Audio</h3>
			<video src="../Audio/<?php echo $P['harcode'] . " - " . $P['audio'];?>" onclick="this.play();"></video>
<!-- Android trenutno ne podržava html5, kada bude podržavo ovo bude radilo			
			<audio controls>
                <embed type="audio/mp3" src="../Audio/<?php echo $P['harcode'] . " - " . $P['audio'];?>">
                <source type="audio/mp3" src="../Audio/<?php echo $P['harcode'] . " - " .$P['audio'];?>">
            </audio>
-->            
		</div>
		<div>
			<h3 class="underline">Video</h3>
			<iframe src="//<?php print($P['video']); ?>" frameborder="0" allowfullscreen></iframe>
		</div>
		<div>
			<h3 class="underline">Slike</h3>
                 	<?php 
						if ($varSlike != 0) 
						{
							foreach($varSlike as $slika)
							{
					?>                 
					<a href="../Img/<?php print($varProizvod['harcode'] . " - " . $slika);?>" target="_blank" class="thumbnail mainImage" title="Slika">
						<img src="../Img/<?php print($varProizvod['harcode'] . " - " . $slika);?>" alt="Došlo je do pogreške.">
					</a>        
					<?php 
							}
						}
					?>  

			        

			
		</div>
		<div>
			<h3 class="underline">Pdf</h3>
			<a href="../Pdf/<?php print($P['harcode'] . " - " . $P['pdf']); ?>" target="_parent" ><img height="15%" width="20%" src="../Podatci/Slike/pdf.png" alt="Došlo je do pogreške"></a>
		</div>
	</article>
    <footer>
    	<p>HarCODE - AK</p>
    </footer>

</body>
</html>
