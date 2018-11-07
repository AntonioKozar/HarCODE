<?php
	session_start();
	$varProizvod = $_SESSION['varProizvod'];
	$varSlike = $_SESSION['varSlike'];
	$x = $_SESSION['x'];
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../Stilovi/predmet/css1.css">
	<link rel="stylesheet" type="text/css" href="../Stilovi/predmet/css2.css">
	<link rel="stylesheet" type="text/css" href="../Stilovi/predmet/css3.css">
	<link rel="stylesheet" type="text/css" href="../Stilovi/predmet/css4.css">
	<link rel="stylesheet" type="text/css" href="../Stilovi/predmet/css5.css">
	<link rel="stylesheet" type="text/css" href="../Stilovi/predmet/css6.css">
	<link rel="stylesheet" type="text/css" href="../Stilovi/predmet/css7.css">
	
	<link rel="stylesheet" type="text/css" href="../Stilovi/predmet/audio.css">
	<link rel="stylesheet" type="text/css" href="../Stilovi/predmet/video.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/predmet/galerija.css">
	<script type="text/javascript" src="../JavaScript/admin.js"></script>
	<title>Proizvod : <?php print($varProizvod['harcode']); ?></title>
</head>
<body style="margin: 0px 5% 0px 5%;">
    <br>
<legend>    
    
	<h5>NAZIV PROIZVODA : <strong style="font-size:20px;"><?php print($varProizvod['naslov']);?></strong></h5>
	<h5>KRATAK OPIS : <?php print($varProizvod['podnaslov']); ?></h5>
	<h5>GRUPA : <?php print($varProizvod['grupa']); ?></h5>
	<h5>PODGRUPA : <?php print($varProizvod['podgrupa']); ?></h5>
</legend>
        <span><a href="../">Naslovna</a></span> > 
    <span><?php print($varProizvod['naslov']) ?></span>
<div class="centered bordered" id="centar">
        <div class="row">
        <div class="span6 pull-left">          
      		
		</div>        
        <!-- <div class="span4 pull-right social">          
              <a href="#" class=""><img src="/_resources/icons/s_facebook.png" alt="Podijeli na facebooku!" width="40" height="40" /></a>
              <a href="#" class=""><img src="/_resources/icons/s_twitter.png" alt="Podijeli na twitteru!" width="40" height="40" /></a>
              <a href="#" class=""><img src="/_resources/icons/s_googleplus.png" alt="Podijeli na google+!" width="40" height="40" /></a>
              <a href="#" class=""><img src="/_resources/icons/s_linkedin.png" alt="Podijeli na linkedInu!" width="40" height="40" /></a>
          
        </div> -->
		<div class="row">
			<div class="span11 pull-left">
				                  
       		</div>                
		</div>
		<div class="row">
			<div class="span3">                   
				<div class="gallery">                    			
					<?php 
						if ($varSlike != 0) 
						{
							foreach($varSlike as $slika)
							{
					?>                 
					<a href="#img<?php print($slika); ?>" class="thumbnail mainImage" title="Slika">
						<img src="../Img/<?php print($varProizvod['harcode'] . " - " . $slika);?>" alt="Došlo je do pogreške.">
					</a>        
					<?php 
							}
						}
					?>           
				</div>
			</div>
			<div class="span8">
			<h3>Proizvođač</h3><br>
          		<p><b><?php print($x[0]);?></b></p>
          		<p>ADRESA : <?php print($x[2]);?>, <?php print($x[7]);?> <?php print($x[6]);?>, <?php print($x[8]);?><br>
          		TEL : <?php print($x[3]);?><br>
          		WEB : <a href="//<?php print($x[5])?>"><?php print($x[5])?></a><br>
          		E-mail : <a href="mailto:<?php print($x[4])?>"><?php print($x[4])?></a>
          		<?php #print_r($x);?>
          		

          			
          		</p>
          		<h3>Opis</h3>
				<p class="justified">
					<?php print($varProizvod['opis']);?>
				</p>
                    <div>
                      	<ul class="nav nav-tabs">
							<li class="active"><a href="#1Tab" data-toggle="tab"><i class="icon-tags"></i> Uputstva za korištenje (3)</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="1Tab">   
								<div>
									<ul class="thumbnails">
										<li class="span2">
											<a href="#audio"><img src="../Podatci/Slike/audio.png" alt="Došlo je do pogreške"></a>
										</li>
										<li class="span2">
											<a href="#video"><img src="../Podatci/Slike/youtube.png" alt="Došlo je do pogreške"></a>
										</li>
										<li class="span2">
											<a href="../Pdf/<?php print($varProizvod['harcode'] . " - " . $varProizvod['pdf']); ?>" target="_parent" ><img src="../Podatci/Slike/pdf.png" alt="Došlo je do pogreške"></a>
										</li>
									</ul>
								</div>  
								<div>
								</div>
 							</div>
							<div class="tab-pane " id="2Tab">   
								<div>
									<ul class="thumbnails">
									</ul>
								</div>  
								<div>
								</div>
							</div>
							<div class="tab-pane " id="3Tab">   
								<div>
									<ul class="thumbnails">
									</ul>
								</div>  
								<div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span8" style="margin-bottom: 0px;">
                    <p></p><hr><p></p>
                </div>
            </div>
			<div class="span11 manufacturerDetails">     
          		
			</div>
        </div>
	</div>
    <div id="audio" class="modalDialog">
		<div>
			<a href="" title="Close" class="closeA">ZATVORI</a>
        		<audio controls>
                    <embed type="audio/mp3" src="../Audio/<?php echo $varProizvod['harcode'] . " - " . $varProizvod['audio'];?>">
                    <source type="audio/mp3" src="../Audio/<?php echo $varProizvod['harcode'] . " - " .$varProizvod['audio'];?>">
                </audio>
		</div>
	</div>
    <div id="video" class="modalDialog_video">
		<div>
			<a href="" title="Close" class="closeV">ZATVORI</a>
			<iframe width="640" height="360" src="//<?php print($varProizvod['video']); ?>" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>



<?php
	if (isset($varSlike))
	{
		foreach ($varSlike as $slika) 
		{
?>
			<div id="img<?php print($slika); ?>" class="modalDialog_galerija">
				<div style="vertical-align:central;text-align:center; margin:10% 25% 10% 25%; width:50%; height:75%">
					<a href="" title="Close" class="closeG">ZATVORI</a>
					<img style=""  src="../Img/<?php print($varProizvod['harcode'] . " - " . $slika);?>">
				</div>
			</div>
<?php
		}
	}
?>
    

	
</body>
</html>