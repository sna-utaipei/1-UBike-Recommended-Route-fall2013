<html>

<head>
	<title>租賃站資訊</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 90%;
        margin: 0px;
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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script type='text/javascript' 
            src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>		
			
<div><img src="http://www.youbike.com.tw/images/point/facebar.png"></div>
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
var icon = "http://www.youbike.com.tw/images/marker.png";
var icon1 = "http://www.youbike.com.tw/images/point/25/bface.png";
var icon2 = "http://www.youbike.com.tw/images/point/25/gface.png";
var icon3 = "http://www.youbike.com.tw/images/point/25/yface.png";
var icon4 = "http://www.youbike.com.tw/images/point/25/rface.png";
	var infowindow = new google.maps.InfoWindow();
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
		infowindow = new google.maps.InfoWindow({
		content:txt});
		google.maps.event.addListener(marker, 'click', function() {
		//infoWindow.setContent(txt);
		infowindow.open(map,marker);
	});
		markers.push(marker);
		
		
		
		//alert(latlng[i]);
		 //latlng[i] = new google.maps.LatLng(lat[i],lng[i]);
				//  alert(latlng[i]);
		//createMarker(latlng[i],stopName[i],address[i],tot[i],sus[i],icon_type[i],addressen[i],nameen[i],mday[i]);
	}

	//調整檢視範圍
	map.fitBounds(bounds);


	
	//for(var i = 0;i<neighborhoods.length;i++){
	//google.maps.event.addListener(marker, 'click', function() {
	//	infoWindow.setContent(contentString);
	//	infowindow.open(map,marker);
	//});
	//}
	/*google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});*/
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
</head>	
<body>
<!--<table border="1" align="center" cellpadding="1" cellspacing=0 cellpadding=1 width=560>-->
	<!--<tr>-->
	<!--<td bgcolor="#addbf7" width=100><font color="#2323af">站點分區</td>-->
	<!--<td bgcolor="#addbf7" width=100><font color="#2323af">站點編號</td>-->
	<!--<td bgcolor="#addbf7" width=160><font color="#2323af">站點名稱</td>-->
	<!--<td bgcolor="#addbf7" width=160><font color="#2323af">站點位置</td>-->
	<!--<td bgcolor="#addbf7" width=40><font color="#2323af">總數量</td>-->
	<!--<td bgcolor="#addbf7" width=80><font color="#2323af">可借車輛</td>-->
	<!--<td bgcolor="#addbf7" width=80><font color="#2323af">可停空位</td>-->
	<!--<td bgcolor="#addbf7" width=150><font color="#2323af">站點座標</td>-->
	<!--<td bgcolor="#addbf7" width=150><font color="#2323af">更新時間</td>-->
	
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
			
			/*echo "\t<tr\n>";
				print("<td>".$name."</td>\n");
				print("<td>".$tot."</td>\n");
				print("<td>".$sus."</td>\n");
				print("<td>".$mday."</td>\n");
			echo "\t</tr>\n";*/
			
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
	<div id="map-canvas" style="height:385px; width:700;"></div>
<div class="paupau" id="paupau" style="display:none">
	<table width="260" border="0" align="center" cellpadding="0" cellspacing="0" class="info01">
   <tr>
    <td width="90">站點名稱：</td>
    <td width="170" id="td_sna">紐約紐綠園道</td>
  </tr>
  <tr>
    <td>站點位置：</td>
    <td id="td_adr">台北市信義區松智路XX號</td>
  </tr>
  <tr>
    <td>可借車輛：</td>
    <td id="td_tot">22 /輛</td>
  </tr>
  <tr>
    <td>可停空位：</td>
    <td id="td_sus">10 /輛</td>
  </tr>
   <tr>
    <td>時間：</td>
    <td id="td_time">10 /cars</td>
  </tr>
   </table>
</div>
</body>

<script>/*
    var curWin;
	var curInfo;
	var contents=[];
    var map;
    var markers = [];
    var infoWindow;
    var locationSelect;
	var default_center;
	
	var icon = "http://www.youbike.com.tw/images/marker.png";
	var mark_click;
	var icon1 = "http://www.youbike.com.tw/images/point/25/bface.png";
	var icon2 = "http://www.youbike.com.tw/images/point/25/gface.png";
	var icon3 = "http://www.youbike.com.tw/images/point/25/yface.png";
	var icon4 = "http://www.youbike.com.tw/images/point/25/rface.png";
function createMarker(latlng,name,address,tot,sus,icon_type,addressen,nameen,mday) {
	
	var lan = 0;
     
	  if(lan==1)
	  {
	  document.getElementById("td_sna").innerHTML = nameen;
	  document.getElementById("td_adr").innerHTML = addressen;
	    document.getElementById("td_tot").innerHTML = tot+"/Vehicles";
	  document.getElementById("td_sus").innerHTML = sus+"/Vehicles";
	  }
	  else
	  {
	   document.getElementById("td_sna").innerHTML = name;
	  document.getElementById("td_adr").innerHTML = address;
	  document.getElementById("td_tot").innerHTML = tot+"/輛";
	  document.getElementById("td_sus").innerHTML = sus+"/輛";
	  }
	    document.getElementById("td_time").innerHTML = mday;
	  var html = document.getElementById("paupau").innerHTML;
	
	 
	  var cIcon;
	  if(icon_type==1){cIcon=icon1;}
	  else if(icon_type==2){ cIcon = icon2;}
	  else if(icon_type==3){ cIcon = icon3;}
	  else if(icon_type==0){ cIcon = icon4;}
	  else{ cIcon = icon;}
		
	  if(icon_type==4)
	  {
	  	var marker = new google.maps.Marker({
			map: map,
			icon: icon,
			position: latlng,
		
			
		  });
	  }
	  else
	  {
		 var  marker = new google.maps.Marker({
			map: map,
			icon: cIcon,
			position: latlng,
			sna:name,
			adr:address
			
		  });
		   google.maps.event.addListener(marker, 'click', function() {
			infoWindow.setContent(html);
			infoWindow.open(map, marker);
			curWin = infoWindow;
			curInfo=html;
	
		  });
	   }	

	  */
      /*google.maps.event.addListener(marker, 'mouseover', function() {
	  	
		
		infoWindow.setContent(html);
        infoWindow.open(map, marker);
		curWin = infoWindow;
		curInfo=html;
	 });*/
	 
	  /*
      markers.push(marker);
    }   */
</script>

</html>		
	
	
	
