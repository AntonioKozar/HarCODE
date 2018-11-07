<?php
session_start();
$_SESSION['damira'] = 0;
include("PhpScript/pretrazi.php");
include("PhpScript/spoji.php");


if (isset($_POST['trazi']))
{
    if (strlen($_POST['kod']) == 7 or strlen($_POST['kod']) == 13) 
    {
        list($varProizvod, $varSlike, $x)=trazi($_POST['kod']);
    }
    else
    {
        $varProizvod = 1;
        $varSlike =1;

    }
}

if (isset($_POST['spoji']))
{
    list($VarKorisnik, $damira) = spoji($_POST['id'], $_POST['pw']);
    unset($_SESSION['varProizvod']);
    unset($_SESSION['varSlike']);
}

?>

<?php
if (!isset($_GET['nop'])) 
{
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $bberry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $webos = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    if ($android || $bberry || $iphone || $ipod || $webos== true) 
    { 
        print('<script type="text/javascript">window.location.replace("m.index.php");</script>');
        #header('Location: m.index.php');
    }
    else
    {
        print('<script>var w = screen.width;if(w < 668){window.location.replace("Mobile/index.html");}</script>');
    }
}

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="stylesheet" type="text/css" href="Stilovi/index/css1.css">
    <link rel="stylesheet" type="text/css" href="Stilovi/index/css2.css">
    <link rel="stylesheet" type="text/css" href="Stilovi/index/css3.css">
    <link rel="stylesheet" type="text/css" href="Stilovi/index/css4.css">
    <link rel="stylesheet" type="text/css" href="Stilovi/index/css5.css">
    <link rel="stylesheet" type="text/css" href="Stilovi/index/css6.css">
    <script type="text/javascript" src="JavaScript/index.js"></script>
    <title>HarCODE</title>
</head>
<body>
    <form method="post">
        <div class="item" style="min-width: 700px;">
            <div class="pagination-centered searchBox rounded" style="margin-left: 25%; width: 25%; min-width: 350px; margin-top: 100px; height: 15%; min-height: 200px; border-color: #08c;">

                <legend style="margin-left: 25%; width: 50%;">
                    <h2 id="h2harcode">HarCODE</h2>
                </legend>
                <div class="control-group">
                    <div class="controls">
                        <input style="height: 30px; width: 50%;" placeholder="HarCODE ili BarCODE" name="kod" maxlength="13" id="txtCode" class="" autocomplete="off" type="text" oninvalid="this.setCustomValidity('Molim unesite Harcode ili barcode.')">
                    </div>
                </div>
                <br>
                <div class="pagination-centered">
                    <input name="trazi" value="Pretraživanje" id="btnPretrazi" class="btn btn-primary" type="submit"><br>
                </div>
                <div class="centered nomargin">
                    <?php
                    if (isset($_POST['trazi']))
                    {
                        if ($varProizvod == 0 and $varSlike == 0)
                        {
                            print_r("Ne postoji stavka u bazi koja ima  HarCODE ili BarCODE : " . $_POST['kod']);
                        }
                        elseif ($varProizvod == 1 and $varSlike == 1) {
                            print("Polje mora sadržavati 7 znakova ukoliko unosite HarCODE ili u slučaju BarCODE 13 znakova.");

                        }
                        else
                        {
                            $_SESSION['varProizvod'] = $varProizvod;
                            $_SESSION['varSlike'] = $varSlike;
                            $_SESSION['x'] = $x;

                            print('<script type="text/javascript">trazi();</script>');
                        }
                    }

                    if (isset($_POST['spoji']))
                    {
                        if ($damira == 0)
                        {
                            print("Uneseni podatci su nevažeći. Pokušajte ponovno.");
                        }
                        else
                        {
                            #           print("Spojeni ste.");
                            #           sleep(1);
                            #           session_start();
                            $_SESSION['damira'] = $damira;
                            print('<script type="text/javascript">spoji();</script>');
                        }
                    }
                    ?>
                </div>

            </div>
        </div>

    </form>

    <div class="navbar navbar-fixed-bottom navbar-inner" style="min-width: 800px;">
        <div id="kontenjer" style="min-width: 600px; margin: 0px;">
            <a class="brand" href="index.php" style="font-family: Xolonium; color: #08c; margin-left: 23%;">HarCODE</a>
            <ul class="nav" style="margin-left: 30%;">

                <li id="spojise" class="dropdown" onmouseover="Otvori()" onmouseout="Zatvori();"><a class="dropdown-toggle">&nbsp;Spoji se <strong class="caret"></strong></a>
                    <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px; margin-bottom: -5px;">
                        <div style="margin: 0px;">
                            <form method="post">
                                <input style="height: 30px;" placeholder="Korisnik" name="id" maxlength="50" id="id" autocomplete="off" type="text">
                                <input style="height: 30px;" placeholder="Zaporka" name="pw" maxlength="50" id="pw" autocomplete="off" type="password">
                                <button type="submit" class="btn btn-primary" id="spoji" name="spoji" style="clear: left; width: 100%; height: 32px; font-size: 13px; margin-bottom: 10px;">Spoji se</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!--<input style="margin-bottom: 15px;" class="input input-medium" placeholder="Korisnik" id="id" name="id" type="text"><input style="margin-bottom: 15px;" class="input input-medium" placeholder="Zaporka" id="pw" name="pw" type="password">-->


</body>
</html>

