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
    <script src="./js/gm.js"></script>
    <title>Testowa mapa</title>

    <!-- Bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/screen.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		<style type="text/css">		
		#wskazowki
		{
			font-family: Tahoma;
			font-size: 11px;
			height: 500px;
			width: 300px;
			overflow: auto;
		}
		
		.trolo
		{
			width:100%;
			margin-top:5px;
		}
		
		.trololo
		{
			padding:10px;
		}
		
		.cen
		{
			width:100%;
			
		}

		
		</style>
  </head>
  <body onload="mapaStart()">
  <div class="container">
	<div class="mapmenu">
		<form action="index.php?action=znacznik" method="POST" onsubmit='znajdzDojazd(); return false;'>
				<div class="row">
					<div class="col-md-6 trololo">
						<div class="row">
							<div class="col-md-4">
								Miasto startu:
							</div>
							<div class="col-md-8">
								<input id="miasto1" name="miasto1" type="text" class="trolo"/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Adres startu:
							</div>
							<div class="col-md-8">
								<input id="osiedle1" name="osiedle1" type="text" class="trolo"/>
							</div>
						</div>
					</div>
					<div class="col-md-6 trololo">
						<div class="row">
							<div class="col-md-4">
								Miasto mety:
							</div>
							<div class="col-md-8">
								<input id="miasto2" name="miasto2" type="text" class="trolo"/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Adres mety:
							</div>
							<div class="col-md-8">
								<input id="osiedle2" name="osiedle2" type="text" class="trolo"/>
							</div>
						</div>
					</div>
					<hr>
					<div class="col-md-4 col-md-offset-4">
						<button type="submit" class="btn btn-default cen">Pokaż na mapie</button>
					</div>
				</div>
			
			
		</form>
	</div>

	<hr>
	<div class="row">
		<div class="col-md-8">
			<div id="mapka">
			
				
				
			</div>
		</div>
		<div class="col-md-4">
			<div id="wskazowki">
			
			</div>
		</div>
	</div>
	<div class="row">
	</div>
  </div>
    
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>