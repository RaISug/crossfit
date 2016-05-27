<?php

	include VIEWPATH . "/vheader.php";

?>

	<script src="http://maps.googleapis.com/maps/api/js"></script>

	<div class="container">
		<div class="page_content">
			<div class="content_body" align="center">
	
				<h4>Адрес: Адреса на залата</h4>
				<h4>Контакти: +359888123456</h4>
				<div id="googleMap" style="width:100%; height:500px;"></div>
				
			</div>
		</div>
	</div>

	<script>
		function initializeGoogleMaps() {
			var mapCenter = new google.maps.LatLng(42.6752172, 23.3756846);
		  	var mapPropties = {
		    	zoom: 16,
		    	center: mapCenter,
		    	mapTypeId: google.maps.MapTypeId.ROADMAP
		  	};

		  	var mapContainer = document.getElementById("googleMap");
	  		var googleMap = new google.maps.Map(mapContainer, mapPropties);

	  		var mapMarker = new google.maps.Marker({
  		 	 	position: mapCenter,
  			  	animation: google.maps.Animation.BOUNCE
  		  	});

  		  	mapMarker.setMap(googleMap);
		}
		
		google.maps.event.addDomListener(window, 'load', initializeGoogleMaps);
	</script>

<?php

	include VIEWPATH . "/vfooter.php";

?>