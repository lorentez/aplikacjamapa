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
	<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
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
			var mapa; 		// obiekt globalny
			var geokoder 	= new google.maps.Geocoder();
			var licznikmark				= 0;
			var rozmiar 			= new google.maps.Size(32,32);
			var rozmiar_cien 		= new google.maps.Size(59,32);
			var punkt_startowy		= new google.maps.Point(0,0);
			var punkt_zaczepienia	= new google.maps.Point(16,16);
			var ikona				= new google.maps.MarkerImage("http://maps.google.com/mapfiles/kml/pal3/icon52.png", rozmiar, punkt_startowy, punkt_zaczepienia);
			var cien 				= new google.maps.MarkerImage("http://maps.google.com/mapfiles/kml/pal3/icon52s.png", rozmiar_cien, punkt_startowy, punkt_zaczepienia);
		
			
			function mapaStart()  
			{  
				var wspolrzedne = new google.maps.LatLng(50.061887,19.944822);
				var opcjeMapy = {
					zoom: 13,
					center: wspolrzedne,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					disableDefaultUI: true
				};
				
				mapa = new google.maps.Map(document.getElementById("mapka"), opcjeMapy); 			
				dymek = new google.maps.InfoWindow();
				geokoder.geocode({address: 'Kraków, Rynek Główny'}, obslugaGeokodowania);
				
				<?php
					if(isset($akcja))
					{
						echo 'skoczDoAdresu(\''.$start.'\',\'punkt A\');';
						echo 'skoczDoAdresu(\''.$meta.'\',\'punkt B\');';
					}
						
				?>
				
			}  
			
			function skoczDoAdresu(adres,t)
			{
				geokoder.geocode({address: adres}, function(wyniki, status)
				{
					if(status == google.maps.GeocoderStatus.OK)
					{
						var opcjeMarkera =
						{
							position: wyniki[0].geometry.location,
							map: mapa,
							title: t
						}
						var marker = new google.maps.Marker(opcjeMarkera, {title: t});
						//mapa.setCenter(wyniki[0].geometry.location);
				}
				else
				{
					alert("Nie znalazłem podanego adresu!");
				}
			});
		}
		
		function obslugaGeokodowania(wyniki, status)
		{
			
		}
			
		
		
		
		
		
		
		
		
	</script>
  
  <div class="container">
	<div class="mapmenu">
		<form action="index.php?action=znacznik" method="POST">
			<table>
				<tr>
					<td>
						Punkt startu:
					</td>
					<td>
						<input id="startAdres" name="startAdres" type="text"/>
					</td>
				</tr>
				<tr>
					<td>
						Punkt mety:
					</td>
					<td>
						</span><input id="metaAdres" name="metaAdres" type="text"/>
					</td>
				</tr>
			</table>
			<input type="submit" value="Pokaż na mapie" />
		</form>
	</div>
	
	
	
	<div id="mapka">
		
			
			
	</div>
  </div>
    
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>