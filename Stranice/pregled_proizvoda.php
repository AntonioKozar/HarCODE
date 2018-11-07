<?php 
    include("../PhpScript/obrisi_proizvod.php");
    include("../PhpScript/dohvati_proizvode.php");
    
    session_start();
    $damira = $_SESSION['damira'];
    if ($damira == 0 or !isset($damira)) {
        print('<script type="text/javascript">window.location.replace("../index.php");</script>');
        exit();
    }
    else
    {
        $varProizvodi = DohvatiProizvode();
        if (isset($_GET['del'])) 
        {
        	$del = $_GET['del'];    	
        	ObrisiProizvod($del);
            print('<script type="text/javascript">window.location.replace("pregled_proizvoda.php");</script>');
            //header('Location: pregled_proizvoda.php');
        }
    }
?>

<html>
<head>
	<title>Pregled proizvoda</title>
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
                        <li><a href="dodaj_novi.php">&nbsp;Dodaj novi proizvod</a></li>
                    </ul>
                    <ul class="nav pull-right">
                        <li><a href="../?gg=0">&nbsp;Odlogiraj se</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:40px; width:100%;" onclick="function_def();" >
    <div class="span12 centered adminDiv">
        <legend>Pregled proizvoda</legend>
        <table id="productsTable" class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th style="width:80px;">Harcode</th>
                    <th style="width:130px;">Barcode</th>
                    <th style="width:150px;">Naziv</th>
                    <th>Kratak opis</th>
                </tr>
            </thead>
            <tbody> 
                <?php  
                if (isset($varProizvodi))
                {                
                foreach ($varProizvodi as $proizvod) 
                    { 
                ?>      
                <tr id="12row">
                    <td style="width: 150px;">
                        <a data-toggle="modal" class="btn btn-success btn-small" href="uredi_proizvod.php?ID=<?php print($proizvod["harcode"]); ?>">Uredi</a> 
                        <a class="btn btn-danger btn-small" href="?del=<?php print($proizvod["harcode"]); ?>">Izbriši</a> 
                    </td>
                    <td class="harcode"><?php print($proizvod["harcode"]);?></td>
                    <td class="barcode" ><?php print($proizvod["barcode"]); ?></td>
                    <td class="title"><?php print($proizvod["naziv"]); ?></td>
                    <td class="description"><?php print($proizvod["podnaslov"]); ?></td>
                </tr>
                <?php 
                    } }
                ?>
            </tbody>
        </table>
        <div class="pagination-large pagination-centered">
            <div class="form-inline">
                <div id="paginationContainer"></div>
            </div>
        </div>
        <div class="">
            <a href="dodaj_novi.php" class="btn btn-info">Dodaj novi proizvod</a>
            <!--<a href="#" class="btn btn-danger" id="multiDelete">Izbriši</a>-->
        </div>
    </div>
    </div>
</body>
</html>