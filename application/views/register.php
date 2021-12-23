<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url('sweetalert2/dist/sweetalert2.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('fonts/material-icon/css/material-design-iconic-font.min.css') ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link href="<?= base_url() ?>Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
</head>

<body>

    <div class=" main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img" style="color:aqua;">
                    <img src="<?= base_url('images/signup-img.jpg') ?>" alt="" width="auto" style="height:90%;">>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="<?= base_url('login/adduser'); ?>" enctype="multipart/form-data">
                        <h2><?= $title; ?></h2>
                        <?php if ($this->session->userdata('pesan')) { ?>

                        <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="name">Nama Pengguna :</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Pengguna" value="<?= set_value('nama') ?>">
                            <?= form_error(
                                'nama',
                                " <div class='alert alert-primary' role='alert' style='color:red;font-size:13px;font-family:arial;'>",
                                "</div>"
                            ) ?>

                        </div>
                        <div class="form-group">
                            <label for="name">Tempat Lahir :</label>
                            <input type="text" class="form-control" name="lahir" placeholder="Contoh : Bekasi" value="<?= set_value('lahir') ?>">
                            <?= form_error(
                                'lahir',
                                " <div class='alert alert-primary' role='alert' style='color:red;font-size:13px;font-family:arial;'>",
                                "</div>"
                            ) ?>
                        </div>
                        <div class="form-group">

                            <label for="name">Tanggal Lahir :</label>
                            <?= form_error(
                                'tgl_lahir',
                                " <div class='alert alert-primary' role='alert' style='color:red;font-size:13px;font-family:arial;'>",
                                "</div>"
                            ) ?>
                            <input type="date" class="form-control" name="tgl_lahir" placeholder="Contoh : 1999-05-18" value="<?= set_value('tgl_lahir') ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Username :</label>
                            <input type="text" class="form-control" name="user" placeholder="Username" value="<?= set_value('user') ?>">
                            <?= form_error(
                                'user',
                                " <div class='alert alert-primary' role='alert' style='color:red;font-size:13px;font-family:arial;'>",
                                "</div>"
                            ) ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Password :</label>
                            <input type="password" class="form-control" name="pass" placeholder="Password">
                            <?= form_error(
                                'pass',
                                " <div class='alert alert-primary' role='alert' style='color:red;font-size:13px;font-family:arial;'>",
                                "</div>"
                            ) ?>
                        </div>
                        <input type="hidden" name="level" id="address" value="Anggota" />
                        <div class="form-radio">
                            <label for="gender" class="radio-label">Jenis Kelamin :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="jenkel" id="male" value="Laki-Laki" <?php if (set_value('jenkel') == 'Laki-Laki') { ?> checked <?php }  ?>>
                                <label for="male">Laki-Laki</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="jenkel" id="female" value="Perempuan" <?php if (set_value('jenkel') == 'Perempuan') { ?> checked <?php }  ?>>
                                <label for="female">Perempuan</label>
                                <span class="check"></span>
                            </div>
                            <?= form_error(
                                'jenkel',
                                " <div class='alert alert-primary' role='alert' style='color:red;font-size:13px;font-family:arial;'>",
                                "</div>"
                            ) ?>
                        </div>

                        <div class="form-group">
                            <label>No Telpon:</label>
                            <input type="number" id="uintTextBox" class="form-control" name="telepon" placeholder="Contoh : 089618173609" value="<?= set_value('telepon') ?>">
                            <?= form_error(
                                'telepon',
                                " <div class='alert alert-primary' role='alert' style='color:red;font-size:13px;font-family:arial;'>",
                                "</div>"
                            ) ?>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Email :</label>
                            <input type="text" class="form-control" name="email" placeholder="Contoh : XXXXX@crooz.com" value="<?= set_value('email') ?>">
                            <?= form_error(
                                'email',
                                " <div class='alert alert-primary' role='alert' style='color:red;font-size:13px;font-family:arial;'>",
                                "</div>"
                            ) ?>

                        </div>
                        <div class="form-group">
                            <label for="pincode">Foto :</label>
                            <input type="file" accept="image/*" name="gambar" required="required">
                        </div>
                        <div class="form-group">
                            <label>Alamat :</label>
                            <?= form_error(
                                'alamat',
                                " <div class='alert alert-primary' role='alert' style='color:red;font-size:13px;font-family:arial;'>",
                                "</div>"
                            ) ?>
                            <textarea class="form-control" name="alamat" style="width:540px;height:170px;" value="<?= set_value('alamat') ?>"></textarea>
                        </div>

                        <div class="form-submit">

                            <a href="<?= base_url() ?>"><i class="fas fa-long-arrow-alt-left">
                                    <input value="Kembali" class="submit " id="submit" style="width: 140px; height:40px; background-color:aqua; color:black; font-size:16px;" />
                                </i></a>
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>




    < !--JS-->
        </script>
        <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('js/main.js') ?>"></script>
        <script src="<?= base_url('sweetalert2/dist/sweetalert2.all.min.js'); ?>"> </script>
        <script src="<?= base_url('sweetalert2/dist/sweetalert2.min.js'); ?>"> </script>
        <script src="<?= base_url('vendor/jquery/pscript.js') ?>"></script>
        <script src="<?= base_url() ?>Assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url() ?>Assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url() ?>Assets/js/sb-admin-2.min.js"></script>




</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>