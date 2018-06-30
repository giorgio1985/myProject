<!DOCTYPE html>
<html>
<head>
    <title>file html</title>
   


 <!--                                written by giorgio1985                                                          -->
    



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="E:/wamp/documenti.js"></script> 
  <link href="http://vjs.zencdn.net/5.10.2/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

    <script type="text/javascript">                                                      //italian version !!!!!!!!!!!!
        function reg(){
          window.location.href="registration.php";
        }
        function log(){
            window.location.href="itlogin.php";
        }
        function reDirect(){
        window.location.href="redirect.php";
        }
 function es_redirect(){
        window.location.href="home/es.guest.php";
        }


    </script>
<link rel="stylesheet" type="text/css" href="C:/Users/pc/Documents/file.css">
<style>
body {text-align:center;}
.contenitore {position:relative;margin:auto;width:85%;background:#f2f2f2; height:5190px;text-align:left;padding-left:1%;padding-right:1%}
.linea {position:absolute;background:#f2f2f2;height:100%;width:1%;right:69%;top:0;z-index:50;padding-bottom:100px}
#home{color: green;}
#myMenu{color:blue;}
</style>
</head>
<body>
<hr>
<div>
    <img src='logo.png' height="60" width="180">
</div>
<form id="customsearch" action="C:/Users/pc/Desktop/silicon.html/"> 
<input type="text" name="testo"  id="site"  size="40" maxlength="100" placeholder="Search in this site...">
<input type="submit" value="go">
</form>
<div id="home">
    <h2>Home</h2>   <img src="itFLAG.jpg" alt="it-language"/>
</div>

<hr>
<fieldset>
<div id="enter">
    <button type="button" id="button1" onclick="log()">LOG IN</button> <button type="button" id="button2"><a href="flamer.php">ESCI</a></button>
    <div id="enter1"> <br>
        <button type="button" id="button3" onclick="reg()">REGISTRAZIONE</button> 
</fieldset>

</div>
    </div>




<?php
#session_start();                                                                         //italian version !!!!!!!!!!!!

if(!isset($_SESSION['posta'])) echo "Registrati.";
else
if(isset($_SESSION['posta'])){ echo "Utente: "; echo $_SESSION['posta'];  }
ini_set("session.gc_maxlifetime","120");


header("Refresh: 500; url=" . $_SERVER["PHP_SELF"]);


echo "<div>";
echo"<button type=\"button\" id=\"redirect\" onclick=\"reDirect()\" style=\"float:center\">Your Videos</button>";
echo"</div>";

echo "<div id>";
echo "<button type=\"button\" id=\"es-redirect\" onclick=\"es_redirect()\" style=\"float:right\">Spanish version</button>";
echo "</div>";

?>
<hr>
<div class="contenitore">
<div class="linea">
<!--
inizio a connettermi al db
-->
<?php

#questa variabile serve solo per i test, poi va posta a 0. mentre va posta a 1 per i test
$debug  = 0;

#questa variabile serve quando il tuo file si trova su un percorso specifico diverso da quello dove si trova il file php. Se per esempio salvi su una 
#cartella particolare i video, devi specificare il path
$path = "http://localhost/";
$path = "";
$path = "video/";

#questa subroutine serve per il debug, per evitare di scrivere tanti if
function doLog($log) {
    global $debug;
    if ($debug){
        echo "$log<br>";
    }
}

$link=mysqli_connect('localhost','root', '' , 'basedata');
if(!$link){
die ('failled connection:'.mysql_error());
}
$link2=mysqli_select_db($link, 'basedata');

$sql="select * from videos where lingua='italiano' order by id_video DESC LIMIT 8";

$result = mysqli_query($link,$sql);

#nota che le lettere accentate creano spesso problemi, meglio usare l' apostrofo
#questo e' per il debug, poi puoi toglierlo quando vuoi, ponendo a 0 debug
#questo e' un modo elementare per tracciare i log
#echo "righe trovate:" . mysqli_num_rows($result) . "<br>" if $debug;
#questo e' un modo piu' smart di tracciare gli eventi. se in futuro avrai bisogno bastera cambiare una sola funzione in un solo punto

doLog("righe trovate:" . mysqli_num_rows($result)); #sto richiamando una funzione


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        doLog("Processo la riga:  " . $row["nomevideo"]);
        $nome = $row["nomevideo"];
        $html = "
            <video id=\"my-video\"  class=\"video-js\" controls preload=\"auto\" width=\"700\" heigth=\"400\" poster=\"\" data-setup=\"{}\">
            <!--<source src=\"C:\Users\pc\Videos\Any Video Converter\HTML5\Smartphones in 2030 - Wearable Ring Phone-2Kb4FCSwWeg_libtheora.ogv\" type=\"video/ogg\">-->
                        <source src=\"$path$nome\" type=\"video/mp4\">
                        <source src=\"$path$nome\" type=\"video/webm\">
                        <source src=\"$path$nome\" type=\"video/ogg\">
                        <p>
            To view this video pleas enable javascript, and consider upgrading to a web that support HTML5 video.
            </p>
                          <object>
                        <embed src=\"$path$nome\"  type=\"application/x-shockwave-flash\"  allowfullscreen=\"true\"  allowscriptaccess=\"always\"/>
                         </object>
                        </video>
 <script src=\"http://vjs.zencdn.net/5.10.2/video.js\"></script>
        ";
        #TODO                                                                                                //italian version !!!!!!!!!!!!
        /*
        #$notevideo = $row["notevideo"];
        $noteHtml = "
        ";
        */
    echo "<table border='1' bgcolor='#FFF'><tr><td>";    echo $html."<br>";
        #echo $noteHtml;
echo "-Settore: ".$row["settore"]."<br>";
echo "-COD: " . $row["id_video"]."<br>";
echo " - Description: " . $row["descrizione"]. "<br>";    
echo "-ID: " . $row["idvideo"]. "<br>";   
echo "  -Upload Date:  ". $row["upload"]. "<br><hr>";
if($row["lingua"]=="italiano"){
echo "<img src=\"itFLAG.jpg\" alt=\"it-language\"/>";
}
echo "</td></tr></table>";
    }
} else {
    doLog("Nessun record...."); echo "non ci sn record..";
}

mysqli_close($link);


?><br>
<hr>
</div>


<div id="menues">
<div id="myMenu"><h3>MENU</h3></div>
<div id='abbigliamento'>
<li><a href="abbigliamento.php">ABBIGLIAMENTO</a><br>
</div>

<div id='abbigliamento1'>
<ul>
<li><a href="donna.php">DONNA</a></li>
<li><a href="uomo.php">UOMO</a></li>
<li><a href="bimbi.php">BIMBI</a></li>
<li><a href="sport.php">SPORT</a></li>
</ul>
</li>
</div>

<div id='auto'>
<li><a href="auto.php">AUTO</a>
</div>

<div id='auto1'>
<ul>
<li><a href="nuova.php">NUOVA</a></li>
<li><a href="usata.php">USATA</a></li>
<li><a href="roulotte.php">ROULOTTE</a></li>
<li><a href="side-car.php">SIDE-CAR</a></li>
</ul>
</li>
</div>

<div id='moto'>
<li><a href="moto.php">MOTO</a><br>
</div>

<div id='moto1'>
<ul>
<li><a href="motoveicoli.php">MOTOVEICOLI</a></li>
<li><a href="motocicli.php">MOTOCICLI</a></li>
</ul>
</li>
</div>

<div id="elettrodomestici">
<li><a href="elettrodomestici.php">ELETTRODOMESTICI</a><br>
</div>

<div id="elettrodomestici1">
<ul>
<li><a href="domotica.php">DOMOTICA</a></li>
<li><a href="tempo-libero.php">TEMPO-LIBERO</a></li>
<li><a href="cucina.php">CUCINA</a></li>
</ul>
</li>
</div>

<div id="bigiotteria">
<li><a href="bigiotteria.php">BIGIOTTERIA</a><br>
</div>


<div id="bigiotteria1">
<ul>
<li><a href="oro.php">ORO</a></li>
<li><a href="diamanti.php">DIAMANTI</a></li>
<li><a href="argento.php">ARGENTO</a></li>
<li><a href="colier.php">COLIER</a></li>
<li><a href="orologi.php">OROLOGI</a></li>
<li><a href="pietre-preziose.php">PIETRE-PREZIOSE</a></li>
<li><a href="bracciali.php">BRACCIALI</a></li>
</ul>
</li>
</div>

<div id="elettronica">
<li><a href="elettronica.php">ELETTRONICA</a><br>
</div>

<div id="elettronica1">
<ul>
<li><a href="pc-smartphone.php">PC|SMARTPHONS</a></li>
<li><a href="robot.php">ROBOTS</a></li>
<li><a href="security-device.php">SECURITY DEVICES</a></li>
<li><a href="automazione.php">AUTOMAZIONE</a></li>
<li><a href="microchip.php">MICROCHIPS</a></li>
<li><a href="realta-aumentata.php">REALTA AUMENTATA</a></li>
</ul>
</li>
</div>

<div id="casa">
<li><a href="casa.php">CASA</a><br>
</div>

<div id="casa1">
<ul>
<li><a href="appartamenti.php">APPARTAMENTI</a></li>
<li><a href="ville.php">VILLE</a></li>
<li><a href="affittasi-vendesi.php">AFFITTASI E VENDESI</a></li>
<li><a href="aste-pignoramenti.php">ASTE E PIGNORAMENTI</a></li>
</ul>
</li>
</div>


<div id="secondamano">
<li><a href="secondamano.php">SECONDAMANO</a><br>
</div>
<div id="secondamano1">
<ul>
<li><a href="oggettistica.php">OGGETTISTICA</a></li>
<li><a href="beneficenza.php">BENEFICENZA</a></li>
</ul>
</li>
</div>

<div id="invenzioni">
<li><a href="invenzioni.php">INVENZIONI</a><br>
</div>
<div id="invenzioni1">
<ul>
    <li><a href="ingegneria.php">INGEGNERIA</a></li>
    <li><a href="prototipi.php">PROTOTIPI</a></li>
    <li><a href="materiali.php">MATERIALI</a></li>
    <li><a href="nuove-idee.php">NUOVE IDEE...</a></li>
</ul>
</il>
</div>

<div id="altro">
<li><a href="altro.php">ALTRO ...</a><br>
</il>
</div>

</li>

</div>

</div>

</div>
<script>
//$(document).ready(function(){confirm('ciao, benvenuto nella nuova home page, accedi alla reservetion room in cui potrai dialogare con i tuoi acquirenti.');
//});
//</script>

<hr>
<div id=bottom>
<footer class="foot">
<h1>Video Embeed</h1>
<p>Chi siamo</p>
<p>normativa</p>
<p>Note legali</p>
<p>Prodotti</p>

</footer>
</div>
</body>
