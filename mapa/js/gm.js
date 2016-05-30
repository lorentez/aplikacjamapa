var mapa;
var dojazd;


function znajdzDojazd() // funkcja znajduje dojazd
{
	var adres1 = document.getElementById('miasto1').value+' '+document.getElementById('osiedle1').value;
	var adres2 = document.getElementById('miasto2').value+' '+document.getElementById('osiedle2').value;
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
