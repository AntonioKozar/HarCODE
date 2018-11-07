<?php
session_start();
$damira = $_SESSION['damira'];
if ($damira == 0 or !isset($damira)) {
    print('<script type="text/javascript">window.location.replace("../index.php");</script>');
    exit();
}
else
{
    include("../PhpScript/dohvati_gradove.php");
    include("../PhpScript/add_grad.php");
    include("../PhpScript/dohvati_drzave.php");
    $varDrzave = DohvatiDrzave();
}
?>

<html>
<head>
    <title>Dodaj grad</title>
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="span6 centered adminDiv">
                <legend>Dodaj novi zapis u tablicu Gradovi</legend>
                <div id="LeftPlaceHolder_UpdatePanel1">
                    <div id="LeftPlaceHolder_ValidationSummary1" class="alert alert-error" style="display: none;"></div>
                    <span id="LeftPlaceHolder_DetailsViewValidator" class="alert alert-error" style="display: none;"></span>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl00___ZipCode_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl00_Label1" class="control-label dd_label ZipCode">Poštanski broj</label>
                        <div class="controls">
                            <input style="width:550px;height:30px;" name="zip" maxlength="15" id="zip_txt" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['zip'])) { print($_SESSION['zip']);}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl01___Title_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl01_Label1" class="control-label dd_label Title">Naziv</label>
                        <div class="controls">
                            <input style="width:550px;height:30px;" name="naziv" maxlength="40" id="naziv_txt" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['naziv'])) { print($_SESSION['naziv']);}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl02___Country_DropDownList1" id="LeftPlaceHolder_FormView1_ctl04_ctl02_Label1" class="control-label dd_label Country">Država</label>
                        <div class="controls">
                            <select style="width: 550px; height: 30px;" name="drzava" id="drzava_select" class="DDDropDown  fk_Edit  required Country" required="">
                                <option selected="selected" value="">Nije odabrano</option>
                                <?php
								if (isset($varDrzave))
								{
									foreach ($varDrzave as $drzava)
									{
                                ?>
                                <option value="<?php print($drzava['naziv']); ?>"><?php print($drzava['naziv']); ?></option>
                                <?php
									}
								}
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="pagination-centered">
                        <input type="submit" name="spremi" class="btn btn-primary" id="saveButton" value="Spremi">
                        <a style="padding-top: 2px;" class="btn" href="pregledaj_gradove.php">Odustani</a>
                        <br>
                    </div>
                </div>
                <?php

                if (isset($_POST['spremi']))
                {
                    if ($_POST['zip'] != "" and $_POST['naziv'] != "" and $_POST['drzava'] != "") 
                    {

                        $varGrd = DohvatiGradove();
                        #print_r($varGrd);
                        $varX = 0;
                        foreach ($varGrd as $grd) 
                        {
                            if ($grd['naziv'] == $_POST['naziv'] or $grd['zip'] == $_POST['zip']) 
                            {
                                $varX = 1;
                            }		
                            
                        }
                        #print($varX);
                        if ($varX == 0) 
                        {
                            AddGrad($_POST['zip'], $_POST['naziv'], $_POST['drzava']);
                            unset($_SESSION['zip']);
                            unset($_SESSION['naziv']);
                            //header("Location: pregledaj_gradove.php");
                            print('<script type="text/javascript">window.location.replace("pregledaj_gradove.php");</script>');
                        }
                        else
                        {
                            print("Grad {$_POST['naziv']} već postoji u bazi.");
                        }		
                    }
                    else
                    {
                        if (isset($_POST['zip'])) 
                        {
                            $_SESSION['zip'] = $_POST['zip'];
                        }
                        if (isset($_POST['naziv'])) 
                        {
                            $_SESSION['naziv'] = $_POST['naziv'];
                        }
                        print('<script type="text/javascript">window.location.replace("dodaj_grad.php");</script>');
                        //header("Location: dodaj_grad.php");		
                    }

                }
                else
                {
                    if (isset($_SESSION['zip']))
                    {
                        print("Sva polja moraju biti popunjena.");
                    }
                }

                ?>

            </div>
        </form>
    </div>
</body>
</html>
