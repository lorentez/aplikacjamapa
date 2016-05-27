<?php
	
	
	if(isset($_POST['startAdres'],$_POST['metaAdres'],$_GET['action']))
	{
		$start = $_POST['startAdres'];
		$meta = $_POST['metaAdres'];
		$akcja = $_GET['action'];
	}
	else
	{

	}
	
?>


<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src='http://maps.google.com/maps?file=api&amp;v=2.x&amp;sensor=false&amp;key=ABQIAAAAskA3kyDm631CGf6Rw_GrbBRBRXpdM9jp6G1MF9yLMfWuIYZt2BR5Ltrn1m4MP2hliyyWcC1AqLxZ3A&hl=pl' type='text/javascript'></script> 
    <script src="js/gm.js"></script>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Testowa mapa</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/screen.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="mapaStart()">
	<script type="text/javascript">
		var mapa;
		var dojazd;
		
		/*<?php
			if(isset($akcja))
			{
				
				echo 'adres1 = \''.$start.'\';';
				echo 'adres2 = \''.$meta.'\';';
				echo 'znajdzDojazd();';
			}
		?>*/
		function znajdzDojazd() // funkcja znajduje dojazd
		{
			var adres1 = document.getElementById('adres1').value;
			var adres2 = document.getElementById('adres2').value;
			dojazd.load('from:'+adres1+' to:'+adres2);
		}
		
		function mapaStart()
		{
			if(GBrowserIsCompatible())
			{
				mapa = new GMap2(document.getElementById('mapka'));
				mapa.addControl(new GLargeMapControl());
				mapa.setCenter(new GLatLng(52.40241887397331,17.9736328125),6,G_NORMAL_MAP);
				
				dojazd = new GDirections(mapa, document.getElementById("wskazowki"));
				
				// obsługa błędów
				GEvent.addListener(dojazd, "error", function()
				{
					var blad = tekstBledu(dojazd.getStatus().code);
					alert('Bład '+dojazd.getStatus().code+': '+blad);
				});

			}
		}
		
		function tekstBledu(blad)
		{
			switch(blad)
			{
				case G_GEO_MISSING_QUERY:
				case G_GEO_MISSING_ADDRESS: var tekst = 'Nie podano adresu!'; break;
				case G_GEO_UNAVAILABLE_ADDRESS:
				case G_GEO_BAD_REQUEST:
				case G_GEO_SERVER_ERROR:
				case G_GEO_UNKNOWN_ADDRESS: var tekst = 'Nie udało się geokodować adresu'; break;
				case G_GEO_TOO_MANY_QUERIES: var tekst = 'Przekroczono limit zapytań do strony Google'; break;
				default: var tekst = 'Nie udało się znaleźć przejazdu pomiędzy podanymi punktami';
			}
			return tekst;
		}
	</script>
  
  <div class="container">
	<div class="mapmenu">
		<form action="index.php?action=znacznik" method="POST" onsubmit='znajdzDojazd(); return false;'>
			<table>
				<tr>
					<td>
						Punkt startu:
					</td>
					<td>
						<input id="adres1" name="adres1" type="text"/>
					</td>
				</tr>
				<tr>
					<td>
						Punkt mety:
					</td>
					<td>
						</span><input id="adres2" name="adres2" type="text"/>
					</td>
				</tr>
			</table>
			<input type="submit" value="Pokaż na mapie" />
		</form>
	</div>
	
	
	
	<div id="mapka">
		
			
			
	</div>
	<div id="wskazowki">
	</div>
  </div>
    
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>