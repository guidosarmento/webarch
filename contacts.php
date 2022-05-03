<!DOCTYPE html>
<html>
  <head>
	<link rel="stylesheet" href="style.css">
    <title>Web Archive | Home</title>
    
  </head>
  <body>
  
<div align="center">
    <h2><u>Contacts</u></h2>
	<h3>Address : TIC Timor Agency<h3>
    <h4>Tecnologia de Informação e Comunicação<h4>
    <h4>Gabinete do Primeiro Ministro</h4>
    <h4>Palácio do Governo<h4>
    <h3>Dili, Timor Leste</h3>
	<h3>Ph. Nº.: +670 33 03 00 03</h3>
	<h3>Email  : contacts@tic.gov.tl</h3>
</div>


<div id="map">
<script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvTvDjlYrN3DSBK9Fvvsiby4cElXPBkZQ&callback=initMap">
</script>

<script type="text/javascript">
	var map = document.getElementById('map');

	var lp = new locationPicker(map, {
    setCurrentPosition: true,
		lat: 8.5541° S,
		lng: 125.5793° E
		}, {
		zoom: 15 // You can set any google map options here, zoom defaults to 15
			});

// Listen to button onclick event
	confirmBtn.onclick = function () {
    var location = lp.getMarkerPosition();
    var location = location.lat + ',' + location.lng;
    console.log(location);
};

	google.maps.event.addListener(lp.map, 'idle', function (event) {
    var location = lp.getMarkerPosition();
    var location = location.lat + ',' + location.lng;
    console.log(location);
});
</script>
</div>

<div align="center">



	</body>
</html>
<?php
	include 'includes/footer.php';
	?>
</div>

