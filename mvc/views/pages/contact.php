<!-- checkout page -->
<div class="container">
	<h3 style="font-weight: bold; margin-top: 30px">LIÊN HỆ CHÚNG TÔI</h3>
	<div class="row" style="margin-top: 30px; margin-bottom: 55px">
		<div class="col-md-7 col-sm-7 col-xs-12">
				<div id="map" style="height:300px;"></div>
				<script>
					function myMap() {
					  var mapCanvas = document.getElementById("map");
					  var myCenter = new google.maps.LatLng(10.761157,106.690818);
					  var mapOptions = {center: myCenter, zoom: 13};
					  var map = new google.maps.Map(mapCanvas,mapOptions);
					  var marker = new google.maps.Marker({
						position: myCenter,
						animation: google.maps.Animation.BOUNCE
					  });
					  marker.setMap(map);
					}
            	</script>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHXf-8bmIXaKqxEzh0tHi6NXN6ihyYcsA&callback=myMap"></script>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-12">
			<div>
				<p style="color:rgb(85, 85, 85); font-weight: bold; margin-bottom: 10px">CÔNG TY TNHH NLINK VIỆT NAM</p>       
				<p style="color:rgb(85, 85, 85)"><span style="font-weight: bold">Địa chỉ</span>: 76 Trần Đình Xu, P. Cô Giang, Q.1, TP.HCM</p>     
				<p style="color:rgb(85, 85, 85)"><span style="font-weight: bold">E-mail</span>: contact@nlink.vn</p>            
				<p style="color:rgb(85, 85, 85)"><span style="font-weight: bold">ĐT</span>: +84 08 383 7811/222</p>            
				<p style="color:rgb(85, 85, 85)"><span style="font-weight: bold">Fax</span>: +84 08 3837 8000</p>            
				<p style="color:rgb(85, 85, 85)"><span style="font-weight: bold">Hotline</span>: 0903 029 313</p>            
			</div>
		</div>
	</div>
</div>	
<!-- //checkout page -->