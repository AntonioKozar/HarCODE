<?php
include("../PhpScript/add_podgrupu.php");
include("../PhpScript/dohvati_grupe.php");
session_start();
$damira = $_SESSION['damira'];
if ($damira == 0 or !isset($damira)) {
    //header("Location: ../ ");
    print('<script type="text/javascript">window.location.replace("../index.php");</script>');
    exit();
}
else
{
	$varGrupe = DohvatiGrupe();
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
                    <legend>Dodaj novi zapis u tablicu podgrupe proizvoda</legend>
                    <div id="LeftPlaceHolder_UpdatePanel1">
                        <div id="LeftPlaceHolder_ValidationSummary1" class="alert alert-error" style="display: none;"></div>
                        <span id="LeftPlaceHolder_DetailsViewValidator" class="alert alert-error" style="display: none;"></span>
                        <div class="control-group">
                            <label for="LeftPlaceHolder_FormView1_ctl04_ctl00___Title_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl00_Label1" class="control-label dd_label Title">Naziv (150 znakova)</label>
                            <div class="controls">
                                <input style="width:550px;height:30px;" name="podgrupa_naziv" maxlength="50" id="ime" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['podgrupa_naziv'])) { print($_SESSION['podgrupa_naziv']);}?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label id="opisTxt" class="control-label dd_label Description">Opis (500 znakova)</label>
                            <div class="controls">
                                <textarea style="width: 550px;" name="podgrupa_opis" rows="10" cols="90" maxlength="250" id="text"><?php if (isset($_SESSION['podgrupa_opis'])) { print($_SESSION['podgrupa_opis']);}?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="LeftPlaceHolder_FormView1_ctl04_ctl02___Country_DropDownList1" id="LeftPlaceHolder_FormView1_ctl04_ctl02_Label1" class="control-label dd_label Country">Grupa</label>
                            <div class="controls">
                                <select style="width: 550px; height: 30px;" name="podgrupa" id="grupe_select" class="DDDropDown  fk_Edit  required Country" required="">
                                    <option selected="selected" value="">Nije odabrano</option>
                                    <?php
                                    if (isset($varGrupe))
                                    {
                                        foreach ($varGrupe as $grupa)
                                        {
                                    ?>
                                    <option value="<?php print($grupa['grupa']); ?>"><?php print($grupa['grupa']); ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="pagination-centered">
                            <input type="submit" name="spremi" class="btn btn-primary" id="saveButton" value="Spremi">
                            <a style="padding-top: 2px;" class="btn" href="pregled_podgrupe.php">Odustani</a>
                            <br>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['spremi']))
                    {
                        if ($_POST['podgrupa_naziv'] != "" and $_POST['podgrupa'] !="" )
                        {
                            include("../PhpScript/dohvati_podgrupu.php");
                            $varGrd = DohvatiPodgrupe();
                            #print_r($varGrd);
                            $varX = 0;
                            foreach ($varGrd as $grd) 
                            {
                                if ($grd['naziv'] == $_POST['podgrupa_naziv']) 
                                {
                                    $varX = 1;
                                }		
                                
                            }
                            #print($varX);
                            if ($varX == 0) 
                            {
                                $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1");
                                $fgf = AddPodgrupa($_POST['podgrupa_naziv'], mysqli_real_escape_string($baza, $_POST['podgrupa_opis']), $_POST['podgrupa']);
                                if ($fgf == 1)
                                {
                                    unset($_SESSION['podgrupa_naziv']);
                                    unset($_SESSION['podgrupa_opis']);
                                    //header("Location: pregled_podgrupe.php");
                                    print('<script type="text/javascript">window.location.replace("pregled_podgrupe.php");</script>');
                                }
                            }
                            else
                            {
                                print("Podgrupa {$_POST['podgrupa_naziv']} već postoji u bazi.");
                            }

                        }
                        else
                        {
                            if (isset($_POST['podgrupa_naziv'])) 
                            {
                                $_SESSION['podgrupa_naziv'] = $_POST['podgrupa_naziv'];
                            }
                            if (isset($_POST['podgrupa_opis'])) 
                            {
                                $_SESSION['podgrupa_opis'] = $_POST['podgrupa_opis'];
                            }
                            //header("Location: dodaj_podgrupe.php");
                            print('<script type="text/javascript">window.location.replace("dodaj_podgrupe.php");</script>');
                            print("Sva polja moraju biti popunjena");
                        }

                    }
                    else
                    {
                        if (isset($_SESSION['podgrupa_naziv']) or isset($_SESSION['podgrupa_opis']))
                        {
                            print("Naziv i Grupa su obavezna polja.");
                        }
                    }

                    ?>

                </div>
            </form>
        </div>
</body>
</html>
