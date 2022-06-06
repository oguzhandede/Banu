<?php
include("baglanti.php");
session_start();
$ip = $_SERVER["REMOTE_ADDR"];
$host = gethostname();
$sesskullaniciadi = $_SESSION["kullaniciadi"];


$sec = "SELECT id FROM hesaplar WHERE kullaniciadi='$sesskullaniciadi'";

$sonuc = mysqli_query($baglanti, $sec);
$cek = $sonuc->fetch_assoc();
$id = $cek["id"];






if (isset($_POST["guncelle"])) {






    $kullaniciadi = $_POST["kullaniciadi"];
    $email = $_POST["email"];




    $yeniparola = $_POST["yeniparola"];
    $yeniparolatekrar = $_POST["yeniparolatekrar"];


    if ($yeniparola === $yeniparolatekrar && $yeniparola != "" && $yeniparolatekrar != "" && $kullaniciadi != "" && $email != "") {
        $yeniparola = password_hash($_POST["yeniparola"], PASSWORD_DEFAULT);

        $veriguncelle = "UPDATE `hesaplar` SET `kullaniciadi` = '$kullaniciadi' ,`email` = '$email' ,`parola` = '$yeniparola' WHERE `hesaplar`.`id` = $id ";
        $vericalistir = mysqli_query($baglanti, $veriguncelle);

        if ($vericalistir) {
            echo '<div class="alert alert-success" role="alert">
       güncellendi      
        </div>';
            $_SESSION = array();
            session_destroy();
            header("location:giris.php ");
        } else {
            echo '<div class="alert alert-danger" role="alert">
        güncellenemedi         
        </div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
       boş veri olmalalı      
        </div>';
    }
}



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
            } else {
                echo "bu sayfayı görüntüleme izniniz yok";
                echo  '  <a href="./giris.php"> <button type="submit" class="btn btn-primary" >Giriş Yap</button></a>';
                echo  '    <a href="./kayit.php"> <button type="submit" class="btn btn-primary" >Kayıt Ol</button></a>';
                header("location:giris.php");

            }
            ?>
           <h2> Profil güncelleme </h2>
           <form action="veri_guncelle.php" method="POST">
                <h6>Ip: <?php echo $ip ?></h6>
                <h6>Host: <?php echo $host ?></h6>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Kullanıcı Adı</span>
                    <input type="text" value="<?php echo  $_SESSION["kullaniciadi"]; ?>" class="form-control <?php if (!empty($kullaniciadi_err)) {
                                                                                                                    echo "is-invalid";
                                                                                                                } ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="kullaniciadi">
                    <div class="invalid-feedback">
                        <?php echo $kullaniciadi_err; ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                    <input type="email" value="<?php echo  $_SESSION["email"]; ?>" class="form-control <?php if (!empty($email_err)) {
                                                                                                            echo "is-invalid";
                                                                                                        } ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email">
                    <div class="invalid-feedback">
                        <?php echo $email_err; ?>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">YeniParola</span>
                    <input type="password" value="" class="form-control <?php if (!empty($parola_err)) {
                                                                            echo "is-invalid";
                                                                        } ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="yeniparola">
                    <div class="invalid-feedback">
                        <?php echo $parola_err; ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Yeni Parola Tekrar</span>
                    <input type="password" class="form-control <?php if (!empty($parolatekrar_err)) {
                                                                    echo "is-invalid";
                                                                } ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="yeniparolatekrar">
                    <div class="invalid-feedback">
                        <?php echo $parolatekrar_err; ?>
                    </div>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Güncelle
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Dikkat!!</h5>
                            </div>
                            <div class="modal-body">
                                Bilgilerinini güncellemek istedigie eminmisin ?
                                Oturumun sonlancak!!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>

                                <button type="submit" class="btn btn-primary" name="guncelle">Güncelle</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>