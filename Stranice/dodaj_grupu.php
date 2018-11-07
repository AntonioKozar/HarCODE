<?php
include("../PhpScript/add_grupu.php");
include("../PhpScript/dohvati_grupe.php");
session_start();
$damira = $_SESSION['damira'];
if ($damira == 0 or !isset($damira)) {
    //header("Location: ../ ");
    print('<script type="text/javascript">window.location.replace("../index.php");</script>');
    exit();
}
?>

<html>
<head>
    <title>Dodaj grupu proizvoda</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css1.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css2.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css3.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css4.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css5.css">
    <script type="text/javascript" src="../JavaScript/admin.js"></script>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container active">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="admin.php" style="font-family: Xolonium;">HarCODE</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="dropdown" id="pro" onmouseover="proizvod(1)" onmouseout="proizvod(0)"><a class="dropdown-toggle" data-toggle="dropdown" href="pregled_proizvoda.php">Proizvodi</a>
                            <ul class="dropdown-menu" style="margin-top: -2px;">
                                <li><a href="pregled_proizvoda.php">&nbsp;Pregled proizvoda</a></li>
                                <li><a href="dodaj_novi.php">&nbsp;Dodaj novi proizvod</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" id="gru_pro" onmouseover="grupe_proizvoda(1)" onmouseout="grupe_proizvoda(0)"><a class="dropdown-toggle" data-toggle="dropdown" href="grupe_proizvoda.php">Grupe proizvoda</a>
                            <ul class="dropdown-menu" style="margin-top: -2px;">
                                <li><a href="grupe_proizvoda.php">&nbsp;Pregled grupa proizvoda</a></li>
                                <li><a href="dodaj_grupu.php">&nbsp;Dodaj novu grupu proizvoda</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" id="pogru_pro" onmouseover="podgrupe_proizvoda(1)" onmouseout="podgrupe_proizvoda(0)"><a class="dropdown-toggle" data-toggle="dropdown" href="pregled_podgrupe.php">Podgrupe proizvoda</a>
                            <ul class="dropdown-menu" style="margin-top: -2px;">
                                <li><a href="pregled_podgrupe.php">&nbsp;Pregled podgrupa proizvoda</a></li>
                                <li><a href="dodaj_podgrupe.php">&nbsp;Dodaj novu podgrupu proizvoda</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" id="proizvo" onmouseover="proizvodaci(1)" onmouseout="proizvodaci(0)"><a class="dropdown-toggle" data-toggle="dropdown" href="pregled_proizvodaca.php">Proizvođači</a>
                            <ul class="dropdown-menu" style="margin-top: -2px;">
                                <li><a href="pregled_proizvodaca.php">&nbsp;Pregledaj proizvođače</a></li>
                                <li><a href="dodaj_proizvodaca.php">&nbsp;Dodaj novog proizvođača</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" id="grad" onmouseover="gradovi(1)" onmouseout="gradovi(0)"><a class="dropdown-toggle" data-toggle="dropdown" href="pregledaj_gradove.php">Gradovi</a>
                            <ul class="dropdown-menu" style="margin-top: -2px;">
                                <li><a href="pregledaj_gradove.php">&nbsp;Pregledaj gradove</a></li>
                                <li><a href="dodaj_grad.php">&nbsp;Dodaj novi grad</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" id="drzava" onmouseover="drzave(1)" onmouseout="drzave(0)"><a class="dropdown-toggle" data-toggle="dropdown" href="pregledaj_drzave.php">Države</a>
                            <ul class="dropdown-menu" style="margin-top: -2px;">
                                <li><a href="pregledaj_drzave.php">&nbsp;Pregledaj države</a></li>
                                <li><a href="dodaj_drzavu.php">&nbsp;Dodaj novu državu</a></li>
                            </ul>
                        </li>
                        <li><a href="pregled_korisnika.php">Korisinici</a></li>

                        <li style="margin-left: 150px;"><a href="../">Odjava</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 40px; width: 100%;">
        <div class="span12 centered adminDiv">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="span6 centered adminDiv">
                    <legend>Dodaj novi zapis u tablicu Grupe proizvoda</legend>
                    <div id="LeftPlaceHolder_UpdatePanel1">
                        <div id="LeftPlaceHolder_ValidationSummary1" class="alert alert-error" style="display: none;"></div>
                        <span id="LeftPlaceHolder_DetailsViewValidator" class="alert alert-error" style="display: none;"></span>
                        <div class="control-group">
                            <label for="LeftPlaceHolder_FormView1_ctl04_ctl00___Title_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl00_Label1" class="control-label dd_label Title">Naziv (100 znakova)</label>
                            <div class="controls">
                                <input style="width:550px;height:30px;" name="grupa_naziv" maxlength="50" id="ime" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['grupa_naziv'])) { print($_SESSION['grupa_naziv']);}?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label id="opisTxt" class="control-label dd_label Description">Opis (250 znakova)</label>
                            <div class="controls">
                                <textarea style="width: 550px;" name="grupa_opis" rows="10" cols="90" maxlength="250" id="text"><?php if (isset($_SESSION['grupa_opis'])) { print($_SESSION['grupa_opis']);}?></textarea>
                            </div>
                        </div>
                        <div class="pagination-centered">
                            <input type="submit" name="spremi" class="btn btn-primary" id="saveButton" value="Spremi">
                            <a style="padding-top: 2px;" class="btn" href="grupe_proizvoda.php">Odustani</a>
                            <br>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['spremi']))
                    {
                        if ($_POST['grupa_naziv'] != "")
                        {
                            $varGrd = DohvatiGrupe();
                            #print_r($varGrd);
                            $varX = 0;
                            foreach ($varGrd as $grd) 
                            {
                                if ($grd['grupa'] == $_POST['grupa_naziv']) 
                                {
                                    $varX = 1;
                                }		
                                
                            }
                            #print($varX);
                            if ($varX == 0) 
                            {
                                $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1");
                                $fgf = AddGrupu($_POST['grupa_naziv'], mysqli_real_escape_string($baza, $_POST['grupa_opis']));
                                if ($fgf == 1)
                                {
                                    unset($_SESSION['grupa_naziv']);
                                    unset($_SESSION['grupa_opis']);
                                    print('<script type="text/javascript">window.location.replace("grupe_proizvoda.php");</script>');
                                    //header("Location: grupe_proizvoda.php");
                                }
                            }
                            else
                            {
                                print("Grupa {$_POST['grupa_naziv']} već postoji u bazi.");
                            }

                            
                        }
                        else
                        {
                            if (isset($_POST['grupa_naziv'])) 
                            {
                                $_SESSION['grupa_naziv'] = $_POST['grupa_naziv'];
                            }
                            if (isset($_POST['grupa_opis'])) 
                            {
                                $_SESSION['grupa_opis'] = $_POST['grupa_opis'];
                            }
                            print('<script type="text/javascript">window.location.replace("dodaj_grupu.php");</script>');
                            //header("Location: dodaj_grupu.php");
                            
                        }

                    }
                    else
                    {
                        if (isset($_SESSION['grupa_opis']) )
                        {
                            print("Naziv je obavezno polje.");
                        }
                    }

                    ?>

                </div>
            </form>
        </div>
</body>
</html>
