<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'email';

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// verific daca s-a realizat conexiunea
if(mysqli_connect_error($link)){
	die("Conexiune esuata");
}
// var_dump($link);

?>