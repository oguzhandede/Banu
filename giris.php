<?php
include("baglanti.php");
$ip = $_SERVER["REMOTE_ADDR"];
$host = gethostname();
$kullaniciadi_err =  $parola_err = "";

// $email = $_POST["email"];
// $kullaniciadi = $_POST["kullaniciadi"];
// $parolatekrar = $_POST["parolatekrar"];

if (isset($_POST["giris"])) {

    /////////////////////////////////

    //KULLANICI ADI DOGRULAMA
    if (empty($_POST["kullaniciadi"])) {
        $kullaniciadi_err = "kullanıcı adı boş geçilemez";
    } else {
        $kullaniciadi = $_POST["kullaniciadi"];
    }
    ///////////////////////////////

    // PAROLA DOGRULAMA
    // if (empty($_POST[["parola"]])) {
    //     $parola_err = "Parola boş geçilemez";
    // } else {
    //     $parola = password_hash($_POST["parola"], PASSWORD_DEFAULT);
    // }
    ///////////////////////////////
    ///////////////////////////////
    // $parola = password_hash($_POST["parola"], PASSWORD_DEFAULT);
    $parola = $_POST['parola'];

    if (isset($kullaniciadi)  && isset($parola)) {

        $secim = "SELECT * FROM hesaplar WHERE kullaniciadi ='$kullaniciadi' ";
        $calistir = mysqli_query($baglanti, $secim);
        $kayitsayisi = mysqli_num_rows($calistir);
        if ($kayitsayisi > 0) {

            $ilgilikayit =  mysqli_fetch_assoc($calistir);
            $hasliparola = $ilgilikayit["parola"];
            
            if (password_verify($parola, $hasliparola)) {
                session_start();
                $_SESSION["kullaniciadi"] = $ilgilikayit["kullaniciadi"];
                header("location:profil.php");
            } else {
                echo '<div class="alert alert-danger" role="alert">
                 Parola Yanlış         
                 </div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
           Böyle bir kullanıcı yok.
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
    <title>Giriş Yap |BANÜ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <div class="container  p-5">

        <div class="card m-5 p-5">
            <H3>Giriş Yap</H3>
            <form action="giris.php" method="POST">
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
                    <span class="input-group-text" id="inputGroup-sizing-default">Parola</span>
                    <input type="password" class="form-control <?php if (!empty($parola_err)) {
                                                                    echo "is-invalid";
                                                                } ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="parola">
                    <div class="invalid-feedback">
                        <?php echo $parola_err; ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="giris">Giriş Yap</button>
            </form>
            <a href="./kayit.php"> <button type="submit" class="btn btn-primary" >Kayıt Ol</button></a>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>