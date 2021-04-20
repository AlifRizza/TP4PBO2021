<?php

/******************************************
TP4 RPL
******************************************/

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Task.class.php");

// Membuat objek dari kelas task
$otask = new Task($db_host, $db_user, $db_password, $db_name);

// Memanggil method getTask di kelas Task
$otask->getTask();

// Menutup koneksi database

if(isset($_GET['id_update'])) {
    $id = $_GET['id_update'];
	if(isset($_POST['update'])) {
        $nama_depan = $_POST['fname'];
        $nama_belakang = $_POST['lname'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $jkel = $_POST['jkel'];
    
        $otask->open();
        $otask->update($nama_depan,$nama_belakang,$email,$alamat,$jkel,$id);
        $otask->close();

        header("location:index.php");
    }
}

// Membaca template update.html
$tpl = new Template("templates/update.html");

// Menampilkan ke layar
$tpl->write();