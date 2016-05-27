/*function dodajMarker(lat,lon,opcjeMarkera)
{
	// tworzymy marker z współrzędnymi i opcjami z argumentów funkcji dodajMarker
	opcjeMarkera.position = new google.maps.LatLng(lat,lon);
	
	opcjeMarkera.map = mapa; // obiekt mapa jest obiektem globalnym!
	var marker = new google.maps.Marker(opcjeMarkera);
}

function mapaStart()  
{  
	var opcjeMapy = 
	{
		center: new google.maps.LatLng(50.061887,19.944822),
		zoom: 10,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	mapa = new google.maps.Map(document.getElementById("mapka"), opcjeMapy); 
	
	dodajMarker(50.066903,19.921589,{title: 'Budynek C2.'});
}  


//poniższa funkcja zamienia współrzędne DMS na DDEG
// przykład użycia
//var lat_ddeg = dms2deg(53,15,20);
//var lon_ddeg = dms2deg(14,15,12);
function dms2deg(d,m,s)
{
	// d,m,s - współrzędne, kolejno stopnie, minuty, sekundy
	return d+(m*60+s)/3600;
}

//dodajMarker(50.066903,19.921589,{title: 'Budynek C2.'});
//Kraków: var wspolrzedne = new google.maps.LatLng(50.061887,19.944822);

function skoczDoAdresu(adres)
{
	wskaznik.setMap(null); // ukrywamy marker
	geokoder.geocode({address: adres}, function(wyniki, status)
	{
		if(status == google.maps.GeocoderStatus.OK)
		{
			mapa.setCenter(wyniki[0].geometry.location);
			wskaznik.setPosition(wyniki[0].geometry.location);
			wskaznik.setMap(mapa); // pokazujemy go ponownie
			dymek.open(mapa, wskaznik); // dymek ze znalezionym adresem
			dymek.setContent('<strong>Poszukiwany adres</strong><br />'+adres);
		}
		else
		{
			alert("Nie znalazłem podanego adresu!");
		}
	});
}
*/