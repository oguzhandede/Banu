<?php
$host="localhost";
$kullanici="root";
$parola="";
$vt="banu";
$baglanti=mysqli_connect($host,$kullanici,$parola,$vt);
mysqli_set_charset($baglanti,"utf8");
if (!$baglanti) {
    echo "Baglantida sorun var";
}

?>
