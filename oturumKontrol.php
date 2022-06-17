<?php
if (isset($_SESSION["kullaniciadi"])) {
} else {

    header("location:giris.php");

}

?>