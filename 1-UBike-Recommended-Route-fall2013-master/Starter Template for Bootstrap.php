<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/starter-template/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://www.youbike.com.tw/images/point/25/gface.png">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./dist/css/bootstrap.css" rel="stylesheet">


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
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
        
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



        
  </head>

  <body style="">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">UBike</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>-->
          <a class="navbar-brand" >UBike Recommended Route</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
           <!-- <li class="active"><a href="http://getbootstrap.com/examples/starter-template/#">Home</a></li>
            <li><a href="http://getbootstrap.com/examples/starter-template/#about">About</a></li>
            <li><a href="http://getbootstrap.com/examples/starter-template/#contact">Contact</a></li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>UBike Recommended Route</h1>
        <p class="lead">Save money scheme.Route planning.start to finish.</p>
      </div>

    </div><!-- /.container -->

    <div class="dropdown">
      <button class="btn dropdown-toggle sr-only" type="button" id="dropdownMenu1" data-toggle="dropdown">
        Dropdown
        <span class="caret"></span>
      </button>
     <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
    </ul>
    </div>


       <!--<div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">起點：依區別選擇 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">士林區</a></li>
                <li class="dropdown-submenu"><a tabindex="-1" href="#">中山區</a>
                  <ul class="sub-menu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">X點</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">X點</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">X點</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">X點</a></li>
                </ul></li>
              </ul>
            </li>
          </ul>

       
                  <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">終點：依區別選擇 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">士林區</a></li>
                <li class="dropdown-submenu"><a tabindex="-1" href="#">中山區</a>
                                        <ul class="dropdown-submenu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">X點</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">X點</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">X點</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">X點</a></li>
                                        </ul>
                                </li>
              </ul>
            </li>
          </ul>
          <br><a href="MapTest.html" target="right">按鈕</a>
        </div><!--/.nav-collapse -->
                
                
                
                
                
<div id='cssmenu' style='z-index:1000'>
<ul>
  <!-- <li class='active'><a href='index.html'><span>Home</span></a></li>-->
   <li class='has-sub'><a href='#'><span>起點：依區別選擇</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>中正區</span></a>
            <ul>
               <li><a href='#'><span>Y-17青少年育樂中心</span></a></li>
                           <li><a href='#'><span>捷運善導寺站(1號出口)</span></a></li>
                           <li><a href='#'><span>南昌公園</span></a></li>
                           <li><a href='#'><span>國家圖書館</span></a></li>
                           <li><a href='#'><span>捷運臺大醫院(4號出口)</span></a></li>
                           <li><a href='#'><span>信義連雲街口</span></a></li>
                           <li><a href='#'><span>捷運西門站(3號出口)</span></a></li>
                           <li><a href='#'><span>和平重慶路口</span></a></li>
                           <li><a href='#'><span>金山市民路口</span></a></li>
                           <li><a href='#'><span>華山文創園區</span></a></li>
                           <li><a href='#'><span>臺北轉運站</span></a></li>
                           <li><a href='#'><span>華山文創園區</span></a></li>
                           <li><a href='#'><span>臺北市客家文化主題公園</span></a></li>
                           
               <li class='last'><a href='#'><span>捷運小南門站(1號出口)</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>萬華區</span></a>
            <ul>
               <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
               <li class='last'><a href='#'><span>Sub Item</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>信義區</span></a>
            <ul>
               <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
               <li class='last'><a href='#'><span>Sub Item</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>中山區</span></a>
            <ul>
               <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
               <li class='last'><a href='#'><span>Sub Item</span></a></li>
            </ul>
         </li>                 
      </ul>
   </li>
    <li class='has-sub'><a href='#'><span>終點：依區別選擇</span></a>
            <ul>
         <li class='has-sub'><a href='#'><span>中正區</span></a>
            <ul>
               <li><a href='#'><span>Y-17青少年育樂中心</span></a></li>
                           <li><a href='#'><span>捷運善導寺站(1號出口)</span></a></li>
                           <li><a href='#'><span>南昌公園</span></a></li>
                           <li><a href='#'><span>國家圖書館</span></a></li>
                           <li><a href='#'><span>捷運臺大醫院(4號出口)</span></a></li>
                           <li><a href='#'><span>信義連雲街口</span></a></li>
                           <li><a href='#'><span>捷運西門站(3號出口)</span></a></li>
                           <li><a href='#'><span>和平重慶路口</span></a></li>
                           <li><a href='#'><span>金山市民路口</span></a></li>
                           <li><a href='#'><span>華山文創園區</span></a></li>
                           <li><a href='#'><span>臺北轉運站</span></a></li>
                           <li><a href='#'><span>華山文創園區</span></a></li>
                           <li><a href='#'><span>臺北市客家文化主題公園</span></a></li>
                           
               <li class='last'><a href='#'><span>捷運小南門站(1號出口)</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>萬華區</span></a>
            <ul>
               <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
               <li class='last'><a href='#'><span>Sub Item</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>信義區</span></a>
            <ul>
               <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
               <li class='last'><a href='#'><span>Sub Item</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>中山區</span></a>
            <ul>
               <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
                           <li><a href='#'><span>Sub Item</span></a></li>
               <li class='last'><a href='#'><span>Sub Item</span></a></li>
            </ul>
         </li>                 
      </ul>
   </li>
   
   <!--<li><a href='#'><span>About</span></a></li>-->
   <li class='last'><a href='xmlTest.php'><span>開始計算</span></a></li>
</ul>
</div>                                  
<!--<div><img src="http://www.youbike.com.tw/images/point/facebar.png"></div>-->
	<div id="map-canvas" style="height:385px; width:700;z-index:-1;"></div>




   


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" async="" src="./Starter Template for Bootstrap_files/ga.js"></script><script src="./Starter Template for Bootstrap_files/jquery-1.10.2.min.js"></script>
    <script src="./Starter Template for Bootstrap_files/bootstrap.min.js"></script>
  

</body></html>