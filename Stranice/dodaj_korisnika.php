<?php
session_start();
$damira = $_SESSION['damira'];
if ($damira == 0 or !isset($damira)) {
    header("Location: ../ ");
    exit();
}
else
{
    include("../PhpScript/add_korisnik.php");
    include("../PhpScript/dohvati_korisnike_sve.php");
    #		$varKorisnici = DohvatiDrzave();
}
?>

<html>
<head>
    <title>Dodaj korisnika</title>
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
                <legend>Dodaj novi zapis u tablicu Korisnici</legend>
                <div id="LeftPlaceHolder_UpdatePanel1">
                    <div id="LeftPlaceHolder_ValidationSummary1" class="alert alert-error" style="display: none;"></div>
                    <span id="LeftPlaceHolder_DetailsViewValidator" class="alert alert-error" style="display: none;"></span>
                    <div class="control-group">
                        <label id="LeftPlaceHolder_FormView1_ctl04_ctl00_Label1" class="control-label dd_label ZipCode">Ime</label>
                        <div class="controls">
                            <input style="height:30px;" name="ime" maxlength="15" id="zip_txt" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['ime'])) { print($_SESSION['ime']);}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label id="LeftPlaceHolder_FormView1_ctl04_ctl01_Label1" class="control-label dd_label Title">Prezime</label>
                        <div class="controls">
                            <input style="height:30px;" name="prezime" maxlength="40" id="naziv_txt" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['prezime'])) { print($_SESSION['prezime']);}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label id="LeftPlaceHolder_FormView1_ctl04_ctl01_Label1" class="control-label dd_label Title">Korisničko ime</label>
                        <div class="controls">
                            <input style="height:30px;" name="id" maxlength="40" id="naziv_txt" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['id'])) { print($_SESSION['id']);}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label id="LeftPlaceHolder_FormView1_ctl04_ctl01_Label1" class="control-label dd_label Title">Zaporka (Lozinak)</label>
                        <div class="controls">
                            <input style="height:30px;" name="pw" maxlength="40" id="naziv_txt" class=" required" required="" type="password" autocomplete="off" value="<?php if (isset($_SESSION['pw'])) { print($_SESSION['pw']);}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label id="LeftPlaceHolder_FormView1_ctl04_ctl01_Label1" class="control-label dd_label Title">Zaporka (Lozinak) ponovno</label>
                        <div class="controls">
                            <input style="height: 30px;" name="pw2" maxlength="40" id="naziv_txt" class=" required" required="" type="password" autocomplete="off">
                        </div>
                    </div>
                    <div class="control-group">
                        <label id="LeftPlaceHolder_FormView1_ctl04_ctl01_Label1" class="control-label dd_label Title">e-mail</label>
                        <div class="controls">
                            <input style="height:30px;" name="email" maxlength="40" id="naziv_txt" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['email'])) { print($_SESSION['email']);}?>">
                        </div>
                    </div>
                    <div class="pagination-centered">
                        <input type="submit" name="spremi" class="btn btn-primary" id="saveButton" value="Spremi">
                        <a style="padding-top: 2px;" class="btn" href="pregled_korisnika.php">Odustani</a>
                        <br>
                    </div>
                </div>
                <?php

                if (isset($_POST['spremi']))
                {
                    if ($_POST['ime'] != "" and $_POST['prezime']!="" and $_POST['id'] !="" and $_POST['pw']!="" and $_POST['email'] !="")
                    {
                        if ($_POST['pw'] == $_POST['pw2'])
                        {
                            $varGrd = DohvatiKorisnikeSve();
                            #print_r($varGrd);
                            $varX = 0;
                            foreach ($varGrd as $grd) 
                            {
                                if ($grd['id'] == $_POST['id']) 
                                {
                                    $varX = 1;
                                }		
                                
                            }
                            #print($varX);
                            if ($varX == 0) 
                            {
                                AddKorisnik($_POST['ime'],$_POST['prezime'],$_POST['id'],$_POST['pw'],$_POST['email']);
                                unset($_SESSION['ime']);
                                unset($_SESSION['prezime']);
                                unset($_SESSION['id']);
                                unset($_SESSION['pw']);
                                unset($_SESSION['email']);
                                header("Location: pregled_korisnika.php");
                            }
                            else
                            {
                                print("Korisnik {$_POST['id']} već postoji u bazi.");
                            }


                            
                        }
                        else
                        {
                            print("Zaporka i potvrda zaporke se ne poklapaju, pokušajte ponovno.");
                        }
                    }
                    else
                    {
                        if (isset($_POST['ime'])) 
                        {
                            $_SESSION['ime'] = $_POST['ime'];
                        }
                        if (isset($_POST['prezime'])) 
                        {
                            $_SESSION['prezime'] = $_POST['prezime'];
                        }
                        if (isset($_POST['id'])) 
                        {
                            $_SESSION['id'] = $_POST['id'];
                        }
                        if (isset($_POST['pw'])) 
                        {
                            $_SESSION['pw'] = $_POST['pw'];
                        }
                        if (isset($_POST['email'])) 
                        {
                            $_SESSION['email'] = $_POST['email'];
                        }
                        header("Location: dodaj_korisnika.php");
                        
                    }

                }
                else
                {
                    if (isset($_SESSION['ime']) or isset($_SESSION['prezime']) or isset($_SESSION['id']))
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
