<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Trimite eMail</title>
</head>
    <body>
    <h2>Compune e-mail</h2>
<p>Scrie e-mailul pe care vrei sa il trimiti:</p>
	<form action="mail.php" method="post">
	<div>
		<label for="titlu">Titlu:</label>
		<input type="text" name="titlu" id="titlu" />
		</div>
		<label for="mesaj">Mesaj:</label><br />
		<textarea name="mesaj" id="mesaj" rows="25" cols="60" title="Scrieti mesajul aici..."></textarea>	
		<br />
		<input type="submit" value="Trimite Email" />
	</form>

    </body>
</html>