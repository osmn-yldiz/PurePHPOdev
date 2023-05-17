<?php

include 'baglan.php';
include 'functions.php';

if (isset($_POST['kullanicikaydet'])) {

    if ($_SESSION['csrf_token'] == $_POST['csrf_token']) {
        $errOther = array();
        $errEmpty = array();

        if ($_POST['full_name'] == '') {
            $errEmpty[]  = "Full Name";
        }
        if ($_POST['email'] == '') {
            $errEmpty[]  = "Email";
        }

        if (strlen($_POST['full_name']) < 3) {
            $errOther[] = "Adınız Soyadınız alanı en en 3 karakter olmalı";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errOther[] = "Düzgün bir mail adresi giriniz";
        }
        if (count($errOther) == 0 && count($errEmpty) == 0) {

            $return =  StudentAdd($_POST['full_name'], $_POST['email'], $_POST['gender']);
            if ($return) {
                $success_message = "Kaydınız başarılı bir şekilde kaydedilmiştir.";
            } else {
                $error_message = "Kaydınız başarılı bir şekilde kaydedilmemiştir.";
            }
        } else {
            $error_message = "Lütfen bir hata oluştu daha sonra tekrar deneyiniz.";
        }
    } else {
        //print "csrf_token error.!!!";
    }
}

$_SESSION['csrf_token'] = md5(generateRandomString());

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Öğrenci Kayıt Formu</title>
</head>

<body>

    <div class="container">
        <header class="header">
            <h1 id="title" class="text-center">Öğrenci Kayıt Formu</h1>
            <p id="description" class="text-center">
                Öğrenci Kayıt Formu
            </p>
        </header>
        <div class="form-wrap">
            <div class="row">
                <div class="col-md-4 pb-4">
                    <a href="ogrencitable.php" target="_blank" class="btn btn-dark btn-block"><i class="fa fa-arrow-right"></i> Öğrenci Tablosu</a>
                </div>
            </div>
            <form id="survey-form" action="index.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php print $_SESSION['csrf_token'] ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="name-label" for="name">Full Name</label>
                            <input type="text" name="full_name" id="full_name" placeholder="Full Name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="email-label" for="email">Email</label>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender?</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" value="0" name="gender" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="customRadioInline1">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" value="1" name="gender" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">Female</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" name="kullanicikaydet" id="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </div>

                <div class="my-3">
                    <!-- <div class="loading">Yükleniyor</div> -->
                    <?php
                    if (count($errEmpty) > 0) {
                    ?>
                        <div class="alert alert-danger">Lütfen alanları doldurunuz:<?php print implode(", ", $errEmpty); ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if (count($errOther) > 0) {
                        print "<ul class='alert alert-danger pl-3'>";
                        foreach ($errOther as $value) {
                    ?>
                            <li style="list-style-type: circle;"><?php print $value; ?></li>
                    <?php
                        }
                        print "</ul>";
                    }
                    ?>
                    <?php if (isset($success_message)) { ?>
                        <div class="alert alert-success"><?php echo $success_message ?></div>
                    <?php } ?>
                    <?php if (isset($error_message)) { ?>
                        <div class="alert alert-danger"><?php echo $error_message ?></div>
                    <?php } ?>
                </div>

            </form>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</html>