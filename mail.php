<?php 

if(isset($_POST['submit'])){
	
		// from email
	$from = "pascu.laurentiu17@gmail.com";
	
	function send_mail($to, $subiect, $mesaj, $from){
	$eol = "\r\n";
	
	// Adauga corect adresa $from si headers
  //$headers = "From: " . $from .$eol;
  $headers .= "MIME-Version: 1.0" . $eol;
  $headers .= "Content-type: text/html; charset=iso-8859-1" . $eol;
	
  
	// Executa expedierea datelor la serverul de mail
  // Daca au fost trimise cu succes returneaza mesaj de confirmare, in caz contrar, de eroare
  if (mail($to, stripslashes($subiect), stripslashes($mesaj), $headers))
    return 'Mesajul a fost trimis cu succes catre: ' . $to . "<hr />";
  else return 'Eroare: mesajul nu a putut fi expediat catre: ' . $to . "<hr />";
}
	
	// variabilele din formular
	require_once 'connect.php';
	
	$subiect = $_POST['subiect'];
	$mesaj = $_POST['mesaj'];
	
	// afisari
	
	echo "From: " . $from . "<br />";
	echo "Subiect: " . $subiect . "<hr />";
	
	//conectare la DB + selectare email-uri
	$query = "SELECT email FROM lista_email";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	while ($rand = mysqli_fetch_array($result)){
		$to = $rand['email'];
		
		// Afisam succes sau erori
	$go_mail = send_mail($to, $subiect, $mesaj, $from);
	echo $go_mail;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Trimite eMail</title>
<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">

function verifica (form) {
	if (form.subiect.value == "") {
		alert("Subiectul nu poate fi gol !");
		return false;
	}
	/*else if (form.mesaj.value == "") {
		alert("Mesajul nu poate fi gol !");
		return false;
	}*/
	return true;
}

</script>
</head>
    <body>
    <h2>Compune e-mail</h2>
<p>Scrie e-mailul pe care vrei sa il trimiti:</p>
	<form action="mail.php" method="POST">
	<div>
		<label for="titlu">Subiect:</label>
		<input type="text" name="subiect" id="subiect" />
		</div>
		<label for="mesaj">Mesaj:</label><br />
		<textarea name="mesaj" class="ckeditor" rows="40" cols="60"></textarea>	
		<br />
		<input type="submit" name="submit" value="Trimite Email" onClick="return verifica(form)" />
	</form>

    </body>
</html>