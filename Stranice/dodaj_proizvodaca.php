<?php
include("../PhpScript/dohvati_gradove.php");
include("../PhpScript/dohvati_korisnike.php");
session_start();
$damira = $_SESSION['damira'];
if ($damira == 0 or !isset($damira)) {
    //header("Location: ../ ");
    print('<script type="text/javascript">window.location.replace("../index.php");</script>');
    exit();
}
else
{
    $varGradovi = DohvatiGradove();
    $varKorisnici = DohvatiKorisnike();
}
?>

<html>
<head>
    <title></title>
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

                <legend>Dodaj novi zapis u tablicu Proizvođači</legend>
                <div id="LeftPlaceHolder_UpdatePanel1">
                    <div id="LeftPlaceHolder_ValidationSummary1" class="alert alert-error" style="display: none;">
                    </div>
                    <span id="LeftPlaceHolder_DetailsViewValidator" class="alert alert-error" style="display: none;"></span>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl00___Title_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl00_Label1" class="control-label dd_label Title">Naziv</label>
                        <div class="controls">
                            <input style="width:550px;height:30px;" name="naziv" maxlength="50" id="naziv_txt" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['naziv'])) { print($_SESSION['naziv']);}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl01___Description_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl01_Label1" class="control-label dd_label Description">Opis</label>
                        <div class="controls">
                            <textarea style="width: 550px;" name="opis" rows="10" cols="80" id="opis_txt"><?php if (isset($_SESSION['opis'])) { print($_SESSION['opis']);}?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl02___Address_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl02_Label1" class="control-label dd_label Address">Adresa</label>
                        <div class="controls">
                            <input style="width:550px;height:30px;" name="adresa" maxlength="100" id="adresa_txt" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['adresa'])) { print($_SESSION['adresa']);}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl03___Phone_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl03_Label1" class="control-label dd_label Phone">Telefon</label>
                        <div class="controls">
                            <input style="width:550px;height:30px;" name="tel" maxlength="20" id="tel_txt" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['tel'])) { print($_SESSION['tel']);}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl04___EmailAddress_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl04_Label1" class="control-label dd_label EmailAddress">Email adresa</label>
                        <div class="controls">
                            <input style="width:550px;height:30px;" name="email" maxlength="80" id="email_tex" class=" required" required="" type="text" autocomplete="off" value="<?php if (isset($_SESSION['email'])) { print($_SESSION['email']);}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl06___WebAddress_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl06_Label1" class="control-label dd_label WebAddress">Web adresa</label>
                        <div class="controls">
                            <input style="width:550px;height:30px;" name="web" maxlength="255" id="web_txt" type="text" class=" required" required="" autocomplete="off" value="<?php if (isset($_SESSION['web'])) { print($_SESSION['web']);}?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl07___City_DropDownList1" id="LeftPlaceHolder_FormView1_ctl04_ctl07_Label1" class="control-label dd_label City">Grad</label>
                        <div class="controls">
                            <select style="width: 550px; height: 30px;" name="grad" id="grad_txt" class=" required" required="">
                                <option selected="selected" value="">Nije odabrano</option>
                                <?php
                                if (isset($varGradovi)) {
                                    foreach ($varGradovi as $grad) {
                                ?>
                                <option value="<?php print($grad['naziv']) ?>"><?php print($grad['naziv'] . " - " . $grad['zip'] . " [" . $grad['opis'] . "]"); ?></option>
                                <?php
                                    }
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="pagination-centered">
                        <input type="submit" name="spremi" class="btn btn-primary" id="saveButton" value="Spremi">
                        <a style="padding-top: 2px;" class="btn" href="pregled_proizvodaca.php">Odustani</a>
                    </div>
                    <?php
                    if (isset($_POST['spremi']))
                    {
                        if ($_POST['naziv'] != "" and $_POST['adresa'] !="" and $_POST['tel']!="" and $_POST['email'] !="" and $_POST['web'] !="" and $_POST['grad']!="")
                        {
                            include("../PhpScript/dohvati_proizvodace.php");
                            $varGrd = DohvatiProizvodave();
                            #print_r($varGrd);
                            $varX = 0;
                            foreach ($varGrd as $grd) 
                            {
                                if ($grd['naziv'] == $_POST['naziv']) 
                                {
                                    $varX = 1;
                                }		
                                
                            }
                            #print($varX);
                            if ($varX == 0) 
                            {
                                include("../PhpScript/add_proizvodac.php");
                                $baza = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1");
                                AddProizvodaca($_POST['naziv'], mysqli_real_escape_string($baza, $_POST['opis']), $_POST['adresa'], $_POST['tel'], $_POST['email'], $_POST['web'], $_POST['grad']);
                                unset($_SESSION['naziv']);
                                unset($_SESSION['opis']);
                                unset($_SESSION['adresa']);
                                unset($_SESSION['tel']);
                                unset($_SESSION['email']);
                                unset($_SESSION['web']);
                                unset($_SESSION['grad']);

                                //header("Location: pregled_proizvodaca.php");
                                print('<script type="text/javascript">window.location.replace("pregled_proizvodaca.php");</script>');
                            }
                            else
                            {
                                print("Proizvođač {$_POST['naziv']} već postoji u bazi.");
                            }

                            
                        }
                        else
                        {
                            if (isset($_POST['naziv'])) 
                            {
                                $_SESSION['naziv'] = $_POST['naziv'];
                            }
                            if (isset($_POST['opis'])) 
                            {
                                $_SESSION['opis'] = $_POST['opis'];
                            }
                            if (isset($_POST['adresa'])) 
                            {
                                $_SESSION['adresa'] = $_POST['adresa'];
                            }
                            if (isset($_POST['tel'])) 
                            {
                                $_SESSION['tel'] = $_POST['tel'];
                            }
                            if (isset($_POST['email'])) 
                            {
                                $_SESSION['email'] = $_POST['email'];
                            }
                            if (isset($_POST['web'])) 
                            {
                                $_SESSION['web'] = $_POST['web'];
                            }
                            if (isset($_POST['grad'])) 
                            {
                                $_SESSION['grad'] = $_POST['grad'];
                            }
                            
                            //header("Location: dodaj_proizvodaca.php");
                            print('<script type="text/javascript">window.location.replace("dodaj_proizvodaca.php");</script>');
                            
                        }
                    }
                    if (isset($_SESSION['naziv']) or isset($_SESSION['opis'])) 
                    {
                        print("Sva potrebna polja moraju biti popunjena");
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
