<html>

<head>
	<title>租賃站資訊</title>
	<!-- Bootstrap core CSS -->
    <link href="./dist/css/bootstrap.css" rel="stylesheet">
<link rel="shortcut icon" href="bike.png">

    <!-- Custom styles for this template -->
    <link href="./bootstrap-3.0.3/examples/starter-template/starter-template.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./bootstrap-3.0.3/examples/navbar/navbar.css" rel="stylesheet">
  
    <!-- Latest compiled and minified CSS -->
   <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">-->

    <!-- Optional theme -->
  <!--  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">-->

    <!-- Latest compiled and minified JavaScript -->
    <script src="./dist/js/bootstrap.js"></script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 90%;
        margin: 0px auto;
        padding: 0px
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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=zh-tw"></script>
	<script type='text/javascript' 
            src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>		
			
<div align="center"><img src="http://www.youbike.com.tw/images/point/facebar.png" ></div>
<select id="locationSelect" style="width:100%; display:none"></select>
<input type="hidden" id="lat" value="">
<input type="hidden" id="lng" value="">
<script>
var myLatlng = new google.maps.LatLng(25.036402, 121.509422);

var markers = [];
var iterator = 0;

var map;	
var neighborhoods=[];
var stopName=[];
var address=[];
var stopNameen=[];
var addressen=[];
var lat=[];
var lng=[];
var tot=[];
var sus=[];
var mday=[];
var icon_type=[];
var contentString=[];
var latlng=[];
var showicon=[];
var info=[];
var icon = "http://www.youbike.com.tw/images/marker.png";
var icon1 = "http://www.youbike.com.tw/images/point/25/bface.png";
var icon2 = "http://www.youbike.com.tw/images/point/25/gface.png";
var icon3 = "http://www.youbike.com.tw/images/point/25/yface.png";
var icon4 = "http://www.youbike.com.tw/images/point/25/rface.png";
	var infoWindow = new google.maps.InfoWindow();
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
	
	 i=0;
	while(i<neighborhoods.length)
	{
	bounds.extend(neighborhoods[i]);
		if(icon_type[i]==1){showicon[i]=icon1;}
	  else if(icon_type[i]==2){ showicon[i] = icon2;}
	  else if(icon_type[i]==3){ showicon[i] = icon3;}
	  else if(icon_type[i]==0){ showicon[i] = icon4;}
	  else{ showicon[i] = icon;}

	  contentString[i]="站點名稱："+stopName[i]+"<br>"+
		"站點位置："+address[i]+"<br>"+
		"可借車輛："+tot[i]+"<br>"+
		"可停空位："+sus[i]+"<br>"+
		"更新時間："+mday[i]+"<br>";
		
		txt=contentString[i];
		//alert(txt);
		 marker = new google.maps.Marker({
			position: neighborhoods[i],
			map: map,
			animation: google.maps.Animation.DROP,
			title: stopName[i],
			icon: showicon[i]
		});
		//markers[i]=marker;
		/*infowindow = new google.maps.InfoWindow({
		content:contentString[i]});*/
		//infoWindow.setContent(contentString[i]);
		//info[i]=infowindow;
//		google.maps.event.addListener(marker, 'click', function() {
//		infoWindow.setContent(txt);
		//infowindow.setPosition(neighborhoods[i]);
//		infoWindow.open(map,this);
//	});
	//markers[i]=marker;
		//markers.push(marker);
		i++;
	}
	
	//調整檢視範圍
	map.fitBounds(bounds);
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
</head>	
<body>

<table border="1" align="center" cellpadding="1" cellspacing=0 cellpadding=1 width=560>
	<tr>
	<!--<td bgcolor="#addbf7" width=100><font color="#2323af">站點分區</td>-->
	<!--<td bgcolor="#addbf7" width=100><font color="#2323af">站點編號</td>-->
	<td bgcolor="#addbf7" width=160><font color="#2323af">站點名稱</td>
	<!--<td bgcolor="#addbf7" width=160><font color="#2323af">站點位置</td>-->
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
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">

          <a class="navbar-brand" >UBike Recommended Route</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="./index.php">Home</a></li>
            <li class="active"><a href="./testMap.php?From=0&End=1">路線規劃</a></li>
			
          </ul>
		  
		  
        </div>
      </div>
	  
    </div><br>
	<!--<div id="map-canvas" align="center" style="height:385px; width:700;"></div><br>-->
<h4 align="center" ><font color=#ff0000 face="標楷體"><b>本資料約每分鐘會有一次更新,如有需要請按F5重新整理視窗</b></font></h4>

</body>
</html>		
	
	
	
