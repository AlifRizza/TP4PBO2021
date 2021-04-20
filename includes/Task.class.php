<?php 

/******************************************
TP 4 RPL
******************************************/

class Task extends DB{
	
	// Mengambil data
	function getTask(){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM mahasiswa";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function addTask($nama_depan,$nama_belakang,$email,$alamat,$jkel) {
		$query = "INSERT INTO mahasiswa(nama_depan, nama_belakang, email, alamat, jenis_kelamin) VALUES('$nama_depan','$nama_belakang','$email','$alamat','$jkel')";
		
		$this->execute($query); 
	}


	function deleteTask($id) {
		$query = "DELETE FROM mahasiswa WHERE id = {$id}";
		$this->execute($query);
	}

	function update($nama_depan,$nama_belakang,$email,$alamat,$jkel, $id) {
		$query = "UPDATE mahasiswa SET nama_depan = '$nama_depan', nama_belakang = '$nama_belakang', email = '$email', alamat = '$alamat', jenis_kelamin = '$jkel' WHERE id = {$id}";
		print_r($query);
		$this->execute($query);
	}
}

?>
