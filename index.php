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
$otask->open();

// Memanggil method getTask di kelas Task
$otask->getTask();

// Proses mengisi tabel dengan data
$data = null;
$no = 1;

while (list($id, $nama_depan, $nama_belakang, $email, $alamat, $jkel) = $otask->getResult()) {
	$data .= "<tr>
	<th scope='row'>" . $no . "</th>
	<td>" . $nama_depan . " " . $nama_belakang . "</td>
	<td>" . $email ."</td>
	<td>" . $alamat . "</td>
	<td>" . $jkel . "</td>
	<td>
	<button class='btn btn-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
	<button class='btn btn-success' ><a href='update.php?id_update=" . $id .  "' style='color: white; font-weight: bold;'>Update</a></button>
	</td>
	</tr>";
	$no++;
}

// Menutup koneksi database
$otask->close();

if(isset($_POST['add'])) {
	$nama_depan = $_POST['fname'];
	$nama_belakang = $_POST['lname'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$jkel = $_POST['jkel'];

	$otask->open();
	$otask->addTask($nama_depan,$nama_belakang,$email,$alamat,$jkel);
	$otask->close();

	header("location:index.php");
}

if(isset($_GET['id_hapus'])) {
	$otask->open();
	$otask->deleteTask($_GET['id_hapus']);
	$otask->close();

	header("location:index.php");
}

// Membaca template skin.html
$tpl = new Template("templates/skin.html");

// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_TABEL", $data);

// Menampilkan ke layar
$tpl->write();