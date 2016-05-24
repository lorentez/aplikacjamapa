<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Podsumowanie zamowienia</title>
</head>

<body>

<?php

	$poczatek = $_POST["poczatek"];
	$koniec= $_POST["koniec"];
	
echo<<<END

	"<h2>Podsumowanie zamówienia</h2>"
	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<td>Początek</td> <td>$poczatek</td>
	</tr>
	<tr>
		<td>Koniec</td> <td>$koniec</td>
	</tr>
	<tr>
		<td>Przewidywany czas</td> <td>0 h</td>
	</tr>
	
	</table>
	<br><a href="index.php">Powrot do strony </a>
END;
?>	
	
</body>
</html>