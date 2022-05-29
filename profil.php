<?php
include("baglanti.php");
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="container p-5">
        <div class="card p-5 m-5">
            <?php if (isset($_SESSION["kullaniciadi"])) {

                echo "<h3>" . $_SESSION["kullaniciadi"] . " Hoşgeldin </h3>";
                echo  '  <a href="./cikis.php"> <button type="submit" class="btn btn-primary" >Çıkış Yap</button></a>';


                // $guncelle="UPDATE hesaplar SET kullaniciadi= WHERE kullaniciadi=$_SESSION['kullaniciadi']";




            } else {
                echo "bu sayfayı görüntüleme izniniz yok";
            echo  '  <a href="./giris.php"> <button type="submit" class="btn btn-primary" >Giriş Yap</button></a>';
            echo  '    <a href="./kayit.php"> <button type="submit" class="btn btn-primary" >Kayıt Ol</button></a>';
    
            } 
            ?>
            
          
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>