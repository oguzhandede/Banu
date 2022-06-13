<?php
include("baglanti.php");
$ip = $_SERVER["REMOTE_ADDR"];
$host = gethostname();
$kullaniciadi_err = $email_err = $parola_err = $parolatekrar_err = "";
// $email = $_POST["email"];
// $kullaniciadi = $_POST["kullaniciadi"];
// $parolatekrar = $_POST["parolatekrar"];

if (isset($_POST["kaydet"])) {
    /////////////////////////////////
    //KULLANICI ADI DOGRULAMA
    if (empty($_POST["kullaniciadi"])) {
        $kullaniciadi_err = "kullanıcı adı boş geçilemez";
    } 
    // else if (!preg_match('/^[a-z\d_]{5,20}$/i',  $_POST["kullaniciadi"])) {
    //     $kullaniciadi_err = "kullanıcı adı büyük küçük harf verakamdan oluşöalıdı";
    // }
     else {
        $kullaniciadi = $_POST["kullaniciadi"];
    }
    ///////////////////////////////
    // EMAİL DOGRULAMA
    if (empty($_POST["email"])) {
        $email_err = "email boş geçilemez";
    } 
    // else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $email_err = "Geçersiz Email Formatı";
    // }
      else {
        $email = $_POST["email"];
    }
    ///////////////////////////////
    // PAROLA DOGRULAMA

      if (empty($_POST["parola"])) {
        $parola_err = "parola  boş geçilemez";
    } else {
         $parola =password_hash($_POST["parola"],PASSWORD_DEFAULT);
     }
    ///////////////////////////////
    //PAROLA TEKRAR DOGRULMA
    if (empty($_POST["parolatekrar"])) {
        $parolatekrar_err = "Boş Geçilemez";
    } else if ($_POST["parola"] != $_POST["parolatekrar"]) {
        $parolatekrar_err = "parolalar eşleşmiyor";
    }

    ///////////////////////////////
    if (isset($kullaniciadi) && isset($email) && isset($parola) && empty($parolatekrar_err)) {

        $ekle="INSERT INTO hesaplar (ip,host,kullaniciadi,email,parola) VALUES('$ip','$host','$kullaniciadi','$email','$parola')";
        $calistirekle = mysqli_query($baglanti, $ekle);
        if ($calistirekle) {
            echo '<div class="alert alert-success" role="alert">
           Kayıt başarılı bir şekilde eklendi
         </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
        Kayıt eklenemedi.
      </div>';
        }
        mysqli_close($baglanti);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt OL |BANÜ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <div class="container  p-5">

        <div class="card m-5 p-5">
            <H3>Kayıt OL</H3>
            <form action="kayit.php" method="POST">
                <h6>Ip: <?php echo $ip ?></h6>
                <h6>Host: <?php echo $host ?></h6>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Kullanıcı Adı</span>
                    <input type="text" class="form-control <?php if (!empty($kullaniciadi_err)) {
                                                                echo "is-invalid";
                                                            } ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="kullaniciadi">
                    <div class="invalid-feedback">
                        <?php echo $kullaniciadi_err; ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                    <input type="email" class="form-control <?php if (!empty($email_err)) {
                                                                echo "is-invalid";
                                                            } ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email">
                    <div class="invalid-feedback">
                        <?php echo $email_err; ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Parola</span>
                    <input type="password" class="form-control <?php if (!empty($parola_err)) {
                                                                    echo "is-invalid";
                                                                } ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="parola">
                    <div class="invalid-feedback">
                        <?php echo $parola_err; ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Parola Tekrar</span>
                    <input type="password" class="form-control <?php if (!empty($parolatekrar_err)) {
                                                                    echo "is-invalid";
                                                                } ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="parolatekrar">
                    <div class="invalid-feedback">
                        <?php echo $parolatekrar_err; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="kaydet">Kayıt Ol</button>
            </form>
            <a href="./giris.php"> <button type="submit" class="btn btn-primary" >Giriş Yap</button></a>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>