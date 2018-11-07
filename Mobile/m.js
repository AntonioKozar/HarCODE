

function trazi_m(ID) { //THIS IS FUNCTION THAT NEEDS TO GET HARCODE OR BARCODE AS INPUT
    switch (ID.length) {
        case 7:
            var trazi7;
            if (window.XMLHttpRequest) { trazi7 = new XMLHttpRequest(); } else { trazi7 = new ActiveXObject("Microsoft.XMLHTTP"); }
            trazi7.onreadystatechange = function () {
                if (trazi7.readyState == 4 && trazi7.responseText != "") {
                    if (trazi7.responseText == 1) {
                        window.location.replace("m.prikaz.html");
                        //alert(trazi7.responseText);
                    }
                    else {
                        document.getElementById('info').innerHTML = 'Uneseni harcode nije pronađen u bazi. [' + ID + ']';
                    }
                }
            }
            trazi7.open("GET", "http://www.harcode.com/PhpScript/m.potvrda.php?code=" + ID, true);
            trazi7.send();
            break;
        case 13:
            var trazi7;
            if (window.XMLHttpRequest) { trazi7 = new XMLHttpRequest(); } else { trazi7 = new ActiveXObject("Microsoft.XMLHTTP"); }
            trazi7.onreadystatechange = function () {
                if (trazi7.readyState == 4 && trazi7.responseText != "") {
                    if (trazi7.responseText == 1) {
                        window.location.replace("m.prikaz.html");
                        //alert(trazi7.responseText);
                    }
                    else {
                        document.getElementById('info').innerHTML = 'Uneseni barcode nije pronađen u bazi. [' + ID + ']';
                    }
                }
            }
            trazi7.open("GET", "http://www.harcode.com/PhpScript/m.potvrda.php?code=" + ID, true);
            trazi7.send();
            break;
        default:
            document.getElementById('info').innerHTML = 'Harcode mora sadržavati 7 znakova (a-z, A-Z, 0-9).<br> Barcode mora sadržavati 13 znakova (0-9).';
    }
}


function postavi() {
    //------PROIZVOD-------------------------------------------------------------------------------------------------------------------------------------------------------------    
    var proizvod
    var item;
    if (window.XMLHttpRequest) { item = new XMLHttpRequest(); } else { item = new ActiveXObject("Microsoft.XMLHTTP"); }
    item.onreadystatechange = function () {
        if (item.readyState == 4 && item.responseText != 0) {
             proizvod= JSON.parse(item.responseText);
            document.getElementById('naziv').innerHTML = proizvod[2];
            document.getElementById('kratak_opis').innerHTML = proizvod[3];
            document.getElementById('grupa').innerHTML = proizvod[9];
            document.getElementById('podgrupa').innerHTML = proizvod[10];
            document.getElementById('opis').innerHTML = proizvod[4];
            document.getElementById('audio').innerHTML = '<h3 class="underline">Audio</h3><video src="http://www.harcode.com/Audio/' + proizvod[0] + ' - ' + proizvod[6] + '" onclick="this.play();"></video><br>';
            document.getElementById('video').innerHTML = '<h3 class="underline">Video</h3><iframe src="//' + proizvod[7] + '"></iframe><br>';
            document.getElementById('pdf').innerHTML = '<h3 class="underline">Pdf</h3><a href="http://www.harcode.com/Pdf/' + proizvod[0] + ' - ' + proizvod[8] + '"><img height="15%" width="20%" src="http://www.harcode.com/Podatci/Slike/pdf.png" alt="Došlo je do pogreške"></a><br>';
            document.getElementById('proizvodac').innerHTML = proizvod[5];
        }
    }
    item.open("GET", "http://www.harcode.com/PhpScript/m.dohvati.proizvod.php", true);
    item.send();
    //------PROIZVOĐAČ---------------------------------------------------------------------------------------------------------------------------------------------   
    var item_pro;
    if (window.XMLHttpRequest) { item_pro = new XMLHttpRequest(); } else { item_pro = new ActiveXObject("Microsoft.XMLHTTP"); }
    item_pro.onreadystatechange = function () {
        if (item_pro.readyState == 4 && item_pro.responseText != 0) {
            var proizvodac = JSON.parse(item_pro.responseText);
            document.getElementById('adresa').innerHTML = 'ADRESA : ' + proizvodac[3] + ', ' + proizvodac[7] + " " + proizvodac[8] + ", " + proizvodac[9] + '<br>TEL : ' + proizvodac[4] + '<br>WEB : <a href="//' + proizvodac[6] + '">' + proizvodac[6] + '</a><br>E-mail : <a href="mailto:' + proizvodac[5] + '">' + proizvodac[5] + '</a>';
        }
    }
    item_pro.open("GET", "http://www.harcode.com/PhpScript/m.dohvati.proizvodac.php", true);
    item_pro.send();
    //------SLIKE---------------------------------------------------------------------------------------------------------------------------------------------   
    var item_slike;
    if (window.XMLHttpRequest) { item_slike = new XMLHttpRequest(); } else { item_slike = new ActiveXObject("Microsoft.XMLHTTP"); }
    item_slike.onreadystatechange = function () {
        if (item_slike.readyState == 4 && item_slike.responseText != 0) {
            var slike = JSON.parse(item_slike.responseText);
            if (slike[0] != 0)
            {
                var html = '<h3 class="underline">Slike</h3>';
                var i = 1;
                while (i <= slike[0])
                {
                    html = html + '<a href="http://www.harcode.com/Img/' + proizvod[0] + ' - ' + slike[i] + '" target="_blank" class="thumbnail mainImage" title="Slika"><img src="http://www.harcode.com/Img/' + proizvod[0] + ' - ' + slike[i] + '" alt="Došlo je do pogreške."></a> ';
                    i++;
                }
                document.getElementById('img').innerHTML = html;
            }
        }
    }
    item_slike.open("GET", "http://www.harcode.com/PhpScript/m.dohvati.slike.php", true);
    item_slike.send();
}