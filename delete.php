<?php
include_once("function.php");

$crud = new Crud();


$id = $crud->escape_string($_GET['id']);

//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $crud->delete($id, 'users');

if ($result) {
	header("Location:index.php");
}
?>

