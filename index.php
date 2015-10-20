<?php 
// verific daca s-a trimis formularul
if(isset($_POST['trimis'])){
	print_r($_POST);
	
	require_once ('connect.php');
	// variabile login
	$user = mysqli_real_escape_string($_POST['user']);
	$password = $_POST['password'];
	
	// verific username si parola
	if(empty($user)){
		$errors[] = "Completati numele!";
	}else{
		// verific daca exista in DB
		$query = "SELECT * FROM admin WHERE nume = '$user'";
		$result = mysqli_query($link, $query);
	}
	
	// verific parola
	if(empty($password)){
		$errors[] = "Completati parola!";
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Trimite E-mail</title>
</head>
    <body>
 		<div class="container">
 			<table align="center">
 				<tr>
 					<td>
 					<p>Conectare</p>
 					<?php 
 					// afisez erorile daca exista
 					if (isset($errors)){
 							echo "<p>$errors</p>";
 					}
 					
 					?>
 					<form action="index.php" method="POST">
 					<label for="user">Nume: </label>
 					<input type="text" name="user" id="user" />
 					<br />
 					<label for="password">Parola: </label>
 					<input type="password" name="password" id="password" />
 					<br />
 					<input type="submit" value="Intra" />
 					<input type="hidden" name="trimis" value="true" />
 					</form>
 					</td>
 				</tr>
 			</table>
 		</div>
    </body>
</html>