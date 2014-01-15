<html>

<head>
	<title>租賃站資訊</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 90%;
        margin: 10px;
        padding: 10px
      }
	  #panel {
        position: absolute;
        top: 15px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script type='text/javascript' 
            src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>		
			

<script>
var myLatlng = new google.maps.LatLng(25.036402, 121.509422);

var markers = [];
var iterator = 0;

var map;	
var neighborhoods=[];
var stopName=[];
var contentString;
var icon1 = "http://www.youbike.com.tw/images/point/25/gface.png";
// Enable the visual refresh
google.maps.visualRefresh = true;

function initialize() {
	var mapOptions = {
		zoom: 12,
		center: myLatlng
	};
	map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
	
	//使用LatLngBounds統計檢視範圍
	var bounds = new google.maps.LatLngBounds();
	
	for (var i = 0; i < neighborhoods.length; i++) {
		bounds.extend(neighborhoods[i]);
		 marker = new google.maps.Marker({
			position: neighborhoods[i],
			map: map,
			animation: google.maps.Animation.DROP,
			title: stopName[i],
			icon: icon1
		});
		markers[i]=marker;
		
	}

	//調整檢視範圍
	map.fitBounds(bounds);

	//var contentString = 'test\n';
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	//for(var i = 0;i<neighborhoods.length;i++){
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});
	//}
	/*google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});*/
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
</head>	
	
<body>
<table border="1" align="center" cellpadding="1" cellspacing=0 cellpadding=1 width=1200>
	<!--<tr>-->
	<!--<td bgcolor="#addbf7" width=100><font color="#2323af">站點分區</td>-->
	<!--<td bgcolor="#addbf7" width=100><font color="#2323af">站點編號</td>-->
	<td bgcolor="#addbf7" width=160><font color="#2323af">站點名稱</td>
	<td bgcolor="#addbf7" width=160><font color="#2323af">站點位置</td>
	<!--<td bgcolor="#addbf7" width=40><font color="#2323af">總數量</td>-->
	<td bgcolor="#addbf7" width=80><font color="#2323af">可借車輛</td>
	<td bgcolor="#addbf7" width=80><font color="#2323af">可停空位</td>
	<!--<td bgcolor="#addbf7" width=150><font color="#2323af">站點座標</td>-->
	<td bgcolor="#addbf7" width=150><font color="#2323af">更新時間</td>
	
	<!--</tr>-->
	
<?php

	if(!$xml=simplexml_load_file('http://www.youbike.com.tw/ccccc.php'))
	{
		echo 'unable to load XML file';
	}
	else
	{
	
		$i=0;
	
		foreach($xml as $marker)
		{
			$name = $marker[0]["name"];
			$address = $marker[0]["address"];
			$nameen = $marker[0]["nameen"];
			$addressen = $marker[0]["addressen"];
			$lat = $marker[0]["lat"];
			$lng = $marker[0]["lng"];
			$tot = $marker[0]["tot"];
			$sus = $marker[0]["sus"];
			$mday = $marker[0]["mday"];
			$icon_type = $marker[0]["icon_type"];
			
			echo "\t<tr\n>";
				print("<td>".$name."</td>\n");
				print("<td>".$address."</td>\n");
				print("<td>".$tot."</td>\n");
				print("<td>".$sus."</td>\n");
				print("<td>".$mday."</td>\n");
			echo "\t</tr>\n";
			
			echo "<script>";
				echo " neighborhoods[".$i."]=new google.maps.LatLng(".$lat.",".$lng.");";
				echo " stopName[".$i."]=\"".$name."\";";
				echo " address[".$i."]=\"".$address."\";";
				echo "stopNameen[".$i."]=\"".$nameen."\";";
				echo " addressen[".$i."]=\"".$addressen."\";";
				echo " lat[".$i."]=".$lat.";";
				echo " lng[".$i."]=".$lng.";";
				echo " tot[".$i."]=\"".$tot."\";";
				echo " sus[".$i."]=\"".$sus."\";";
				echo " mday[".$i."]=\"".$mday."\";";
				echo " icon_type[".$i."]=\"".$icon_type."\";";
			echo "</script>";
			
			//echo "<script>";
				//echo "icon_type=".$icon_type;
				//echo "var latlng = new google.maps.LatLng(parseFloat(\"".$lat."\")),parseFloat(\"".$lng."\")));";
				//echo "createMarker(latlng,".$name.",".$address.",".$tot.",".$sus.",".$icon_type.",".$addressen.",".$nameen.",".$mday.");";
			//echo "</script>";
			
			$i++;
		}
		
			/*echo "<script>";
				echo " contentString=\"站點名稱：".$name."<br>";
				echo "站點位置：".$address."<br>";
				echo "可借車輛：".$tot."<br>";
				echo "可停空位：".$sus."<br>";
				echo "更新時間：".$mday."<br>\";";
			echo "</script>";*/
		
	}
?>	
</body>

<body>
	<div id="map-canvas"></div>
	<div class="paupau" id="paupau" style="display:none">
</body>
</html>		
	
	
	