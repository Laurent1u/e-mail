<?php 
if(isset($_POST['submit'])){
	// from email
	$from = "pascu.laurentiu17@gmail.com";
	
	// variabilele din formular
	require_once 'connect.php';
	
	$subiect = $_POST['subiect'];
	$mesaj = $_POST['mesaj'];
	
	// afisez from + subiect
	
	echo "From: " . $from . "<br />";
	echo "Subiect: " . $subiect . "<hr />";
	
	//conectare la DB + selectare email-uri
	$query = "SELECT email FROM lista_email";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	while ($rand = mysqli_fetch_array($result)){
		$to = $rand['email'];
		
		mail($to, $subiect, $mesaj, 'From: ' . $from);
		
		// Afisam cui am trimis mail
		
		echo "Mail trimis catre: " . $to . "<hr />";
	}
	
	// Afisam succes sau erori
	
	if(count($result)>0){
		echo "<br />Mail-uri trimise!";
	}else{
		echo "<br />Nu s-au trimis mail-uri!";
	}
//mysqli_close($link);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Trimite eMail</title>
<script src="ckeditor/ckeditor.js"></script>
</head>
    <body>
    <h2>Compune e-mail</h2>
<p>Scrie e-mailul pe care vrei sa il trimiti:</p>
	<form action="" method="POST">
	<div>
		<label for="titlu">Subiect:</label>
		<input type="text" name="subiect" id="subiect" />
		</div>
		<label for="mesaj">Mesaj:</label><br />
		<textarea name="mesaj" class="ckeditor" rows="40" cols="60"></textarea>	
		<br />
		<input type="submit" name="submit" value="Trimite Email" />
	</form>

    </body>
</html>