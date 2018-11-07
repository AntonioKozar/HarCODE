<?php
session_start();
$damira = $_SESSION['damira'];
if ($damira == 0 or !isset($damira)) 
{
    //header("Location: ../ ");
    print('<script type="text/javascript">window.location.replace("../index.php");</script>');
    exit();
}
else
{    
    include("../PhpScript/dohvati_drzave.php");
    include("../PhpScript/obrisi_drzavu.php");
    $varDrzave = DohvatiDrzave();
    if (isset($_GET['naziv']))
    {
        $x = $_GET['naziv'];
        ObrisiDrzavu($x);
        //header('Location: pregledaj_drzave.php');
        print('<script type="text/javascript">window.location.replace("pregledaj_drzave.php");</script>');
    }
    
}
?>
<html>
<head>
    <title>Države</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css1.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css2.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css3.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css4.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/css5.css">
    <link rel="stylesheet" type="text/css" href="../Stilovi/pregled_proizvodaca/opis.css">
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
            <legend>Države</legend>
            <div id="LeftPlaceHolder_UpdatePanel1">
                <div class="DD">
                    <div id="LeftPlaceHolder_ValidationSummary1" class="alert alert-error" style="display: none;"></div>
                    <span id="LeftPlaceHolder_GridViewValidator" class="alert alert-error" style="display: none;"></span>
                    <br>
                </div>
                <div>
                    <table class="table table-hover table-striped table-bordered" rules="all" id="LeftPlaceHolder_GridView1" style="border-collapse: collapse;" cellspacing="0" border="1">
                        <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">Naziv</th>
                                <th scope="col">Opis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($varDrzave))
                            {
                                foreach ($varDrzave as $drzava) {
                            ?>
                            <tr>
                                <td style="width: 170px;">
                                    <div class="pagination-centered gridButtons">
                                        <a class="btn btn-success btn-small" href="uredi_drzavu.php?ID=<?php print($drzava['naziv']); ?>">Uredi</a>
                                        <a onclick="" class="btn btn-danger btn-small" href="?naziv=<?php print($drzava['naziv']); ?>">Izbriši</a>
                                    </div>
                                </td>
                                <td class="harcode"><?php print($drzava['naziv']); ?></td>
                                <td class="description">
                                    <?php 
                                    $start = '#';
                                    $end   = '.';
                                    $string = "#" . $drzava['opis'];
                                    $output = strstr(substr( $string, strpos( $string, $start) + strlen( $start)), $end, true);
                                    $asd = $drzava['naziv'];
                                    if ($output != "") 
                                    {
                                        print($output . '... <a href="#' . $asd .'">Opis</a>') ; 
                                    }
                                    else
                                    {
                                        print($drzava['opis']);
                                    }
                                    
                                    ?>
                                </td>

                            </tr>
                            <?php
                                }
                            }

                            ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
                <br>
                <div class="DDBottomHyperLink">
                    <a id="LeftPlaceHolder_InsertHyperLink" class="btn btn-info" href="dodaj_drzavu.php">Dodaj novu stavku</a>
                </div>

            </div>
        </div>
    </div>
    <?php
    if (isset($varDrzave))
    {
        foreach ($varDrzave as $drzava) {
    ?>
    <div id="<?php print(trim($drzava['naziv'])) ?>" class="modalDialog">
        <div style="margin-left: 25%; margin-top: 10%; width: 50%; height: 50%;">
            <a href="" title="Close" class="closeA">ZATVORI</a>
            <h1>Opis</h1>

            <textarea style="width: 100%; height: 100%;"><?php print($drzava['opis']) ?></textarea>



        </div>
    </div>
    <?php
        }
    }

    ?>
</body>
</html>
