<?php
include("../PhpScript/add_drzavu.php");
include("../PhpScript/dohvati_drzave.php");
session_start();
$damira = $_SESSION['damira'];
if ($damira == 0 or !isset($damira)) {
    //header("Location: ../ ");
    print('<script type="text/javascript">window.location.replace("../index.php");</script>');
    exit();
}
else
{
    if (isset($_GET['ID']))
    {
        $varDrzava = DohvatiDrzavu($_GET['ID']);
    }
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
                <legend>Uredi državu</legend>
                <div id="LeftPlaceHolder_UpdatePanel1">
                    <div id="LeftPlaceHolder_ValidationSummary1" class="alert alert-error" style="display: none;">
                    </div>
                    <span id="LeftPlaceHolder_DetailsViewValidator" class="alert alert-error" style="display: none;"></span>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl00___Title_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl00_Label1" class="control-label dd_label Title">Naziv (40 znakova)</label>
                        <div class="controls">
                            <input style="width:550px;height:30px;" autocomplete="off" name="naziv" maxlength="40" id="naziv_txt" class=" required" required="" type="text" value="<?php print($varDrzava['naziv']) ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="LeftPlaceHolder_FormView1_ctl04_ctl01___Description_TextBox1" id="LeftPlaceHolder_FormView1_ctl04_ctl01_Label1" class="control-label dd_label Description">Opis</label>
                        <div class="controls">
                            <textarea style="width: 550px;" name="opis" rows="10" cols="80" id="opis_txt" class="DDControl"><?php print($varDrzava['opis']) ?></textarea>
                        </div>
                    </div>
                    <div class="pagination-centered">
                        <input type="submit" name="spremi" class="btn btn-primary" id="saveButton" value="Spremi">
                        <a style="padding-top: 2px;" class="btn" href="pregledaj_drzave.php">Odustani</a>
                    </div>
                    <?php
                    if (isset($_POST['spremi']))
                    {
                        if ($_POST['naziv'] != "")
                        {
                            $base = mysqli_connect("localhost", "harcode_db1root", "nqld.66R","harcode_db1");
                            $testbr = UrediDrzavu($varDrzava['naziv'], $_POST['naziv'], mysqli_real_escape_string($base, $_POST['opis']));
                            if($testbr == 0)
                            {
                                //header("Location: pregledaj_drzave.php");
                                print('<script type="text/javascript">window.location.replace("pregledaj_drzave.php");</script>');
                            }
                            else
                            {
                                print("Država s ovim nazivom već postoji.");
                            }
                        }
                        else
                        {
                            print("Sva polja moraju biti popunjena");
                        }

                    }

                    ?>

                </div>
            </div>
        </form>
    </div>
</body>
</html>
