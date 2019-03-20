<html>
<head>
	<title>Tambah Data</title>
</head>

<body>
<?php
include_once("function.php");
include_once("Validation.php");

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['Submit'])) {	
	$name = $crud->escape_string($_POST['name']);
	$age = $crud->escape_string($_POST['age']);
	$email = $crud->escape_string($_POST['email']);
		
	$msg = $validation->check_empty($_POST, array('name', 'age', 'email'));
	$check_age = $validation->is_age_valid($_POST['age']);
	$check_email = $validation->is_email_valid($_POST['email']);
	
	// cek jika kosong
	if($msg != null) {
		echo $msg;		
		echo "<br/><a href='javascript:self.history.back();'>Kembali</a>";
	} elseif (!$check_age) {
		echo 'ISI !.';
	} elseif (!$check_email) {
		echo 'ISI !.';
	}	
	else { 
		//masukan ke db	
		$result = $crud->execute("INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
		
		//jika sukses 
		echo "<font color='green'>Data berhasil ditambahkan.";
		echo "<br/><a href='index.php'>Lihat Hasil</a>";
	}
}
?>
</body>
</html>
