<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/starter-template/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="bike.png">
    <!--<link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">-->

    <title>UBike Recommended Route</title>

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
		z-index:1;
        height: 85%;
        margin: 3px;
        padding: 3px
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
	  <style type=text/css> 
        body { font-family: 微軟正黑體,Times New Roman,新細明體;}
        
        
        h1,h2,h3,h4,h5{ font-family: 微軟正黑體,Times New Roman,新細明體;}
    </style>
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
		//infowindow = new google.maps.InfoWindow({
		//content:txt});
		
		markers.push(marker);
		
		//google.maps.event.addListener(marker, 'click', function() {
		//infoWindow.setContent(txt);
		//infowindow.open(map,this);
	//});
		
		
	}

	//調整檢視範圍
	map.fitBounds(bounds);


	
	
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
	
  </head>
  
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
		
			
		
	}
?>
  

  <body style="">
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=1400291400211896";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : FacebookAppId,                        // App ID from the app dashboard
      status     : true,                                 // Check Facebook Login status
      xfbml      : true                                  // Look for social plugins on the page
    });
 FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs.
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they
      // have logged in to the app.
     // testAPI();
     alert('Hello 你已經登入')
    } else if (response.status === 'not_authorized') {//登?了facebook?有登?我?的?用
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so.
      // In real-life usage, you wouldn't want to immediately prompt someone to login
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login()
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook.
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });
  };
  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

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
           <li class="active"><a href="./testMap.php?From=0&End=1">路線規劃</a></li>
            <li class="active"><a href="./xmlTest.php">租賃站資訊</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	</br>
	<div class="fb-like" data-href="https://www.facebook.com/youbike.recommended.route" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
		<div class="pull-right">
            		
			<div class="fb-login-button" data-show-faces="false">Login with Facebook</div>
			
        </div>
	
	
    <div class="container">

      <div class="starter-template">
        <h1>UBike Recommended Route</h1>
        <p class="lead">Save money scheme.Route planning.start to finish.</p>
      </div>

    </div><!-- /.container -->

    


       
		
		
		
		
<div id='cssmenu' style='z-index:1000'>
<ul>

   
   <!--<li><a href='#'><span>About</span></a></li>-->
   <li class='last'><a href='testMap.php'><span>開始計算</span></a></li>
</ul>
</div>		  		

<div id="map-canvas" style='z-index:11'></div>


   


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" async="" src="./Starter Template for Bootstrap_files/ga.js"></script><script src="./Starter Template for Bootstrap_files/jquery-1.10.2.min.js"></script>
    <script src="./Starter Template for Bootstrap_files/bootstrap.min.js"></script>
  

</body></html>
