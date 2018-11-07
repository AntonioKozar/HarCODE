		<?php 
			include '../PhpScript/m.index.trazi.kod.php';
			list($P, $S) = FunctionNadi($_GET['kod']);
			include '../PhpScript/pretrazi.php';
			list($varProizvod, $varSlike, $x)=trazi($_GET['kod']);
						if ($P['naziv']!='' && $P['ko']!='' && $P['grupa']!='' && $P['podgrupa']) {
			
		?>
		<h5>NAZIV PROIZVODA : <h1 class="underline"><?php echo $P['naziv']; ?></h1></h5><hr>
		<h5>KRATAK OPIS : <h3 class="underline"><?php echo($P['ko']);?></h3></h5><hr>
		<h5>GRUPA : <h3 class="underline"><?php echo($P['grupa']);?></h3></h5><hr>
		<h5>PODGRUPA : <h3 class="underline"><?php echo($P['podgrupa']);?></h3></h5><hr>
		<div>
			<h3 class="underline">Proizvođač</h3>
			<p><b><?php echo($x[0]);?></b></p>
          		<p>ADRESA : <?php echo($x[2]);?>, <?php echo($x[7]);?> <?php echo($x[6]);?>, <?php echo($x[8]);?><br>
          		TEL : <?php echo($x[3]);?><br>
          		WEB : <a href="//<?php echo($x[5])?>"><?php echo($x[5])?></a><br>
          		E-mail : <a href="mailto:<?php echo($x[4])?>"><?php echo($x[4])?></a><hr>
		</div>
		<div>
			<h3 class="underline">Opis</h3>
			<p style="text-align:justify;"><?php echo($P['opis']);?></p>
		</div>
		
		<div>
	<!--		<h3 class="underline">Audio</h3>
			<video src="http://www.harcode.com/Audio/<?php echo $P['harcode'] . " - " . $P['audio'];?>" onclick="this.play();"><a href="" class="ui-btn ui-icon-carat-r ui-btn-icon-right ui-btn-icon-notext" style="width:50px; height:50px;border-radius:20px;margin-left:5px;"></a></video>
 Android trenutno ne podržava html5, kada bude podržavo ovo bude radilo			
			<audio controls>
                <embed type="audio/mp3" src="http://www.harcode.com/Audio/<?php echo $P['harcode'] . " - " . $P['audio'];?>">
                <source type="audio/mp3" src="http://www.harcode.com/Audio/<?php echo $P['harcode'] . " - " .$P['audio'];?>">
            </audio>
-->            
		</div>
		<div style="display:block;margin:0 auto;">
			<h3 class="underline">Video</h3>
			<iframe src="//<?php echo($P['video']); ?>" frameborder="0" allowfullscreen></iframe>
		</div>
		<div>
			<h3 class="underline">Slike</h3>
                 	<?php 
						if ($varSlike != 0) 
						{
							foreach($varSlike as $slika)
							{
					?>                 
					<a href="http://www.harcode.com/Img/<?php echo($varProizvod['harcode'] . " - " . $slika);?>" style="width:100%" target="_blank" class="thumbnail mainImage" title="Slika">
						<img src="http://www.harcode.com/Img/<?php echo($varProizvod['harcode'] . " - " . $slika);?>" style="width:100%" alt="Došlo je do pogreške.">
					</a>        
					<?php 
							}
						}
					?>  

			        

			
		</div>
		<div>
			<h3 class="underline">Pdf</h3>
			<a href="http://www.harcode.com/Pdf/<?php echo($P['harcode'] . " - " . $P['pdf']); ?>" target="_parent" ><img height="15%" width="20%" src="http://www.harcode.com/Podatci/Slike/pdf.png" alt="Došlo je do pogreške"></a>
		</div>

<?php }
	else{
		echo 0;
	}
 ?>