<html>
<head>
<title>YouBike Recommended Route</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<link href="./dist/css/bootstrap.css" rel="stylesheet">
<link rel="shortcut icon" href="bike.png">
<!-- Bootstrap core CSS -->
	<style>
		body, #map-canvas {
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
	</style>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=zh-tw"></script>

<script type="text/javascript">
  var directionsDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;
  var oldDirections = [];
  var currentDirections = null;
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
 
  function initialize2(From,End) {
  pFrom=neighborhoods[From];
  pEnd=neighborhoods[End];
  
    var myOptions = {
      zoom: 13,     
      center: new google.maps.LatLng(25.036402 , 121.509422),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 
    directionsDisplay = new google.maps.DirectionsRenderer({
        'map': map,
        'preserveViewport': true,
        'draggable': true
    });
    directionsDisplay.setPanel(document.getElementById("directions_panel"));
 
    google.maps.event.addListener(directionsDisplay, 'directions_changed',
      function() {
        if (currentDirections) {
          oldDirections.push(currentDirections);         
        }
        currentDirections = directionsDisplay.getDirections();
      });
     
     
    calcRoute2(pFrom,pEnd);
     
  }
   
  function calcRoute2(pFrom,pEnd) {
     
    var start = pFrom;
    var end = pEnd;
    var request = {
        origin:start,       //起始地
        destination:end,    //目的地
        travelMode: google.maps.DirectionsTravelMode.WALKING //旅行工具 WALKING | DRIVING | TRANSIT | BICYCLING 
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
        //alert(directionsDisplay.getDirections().routes[0].legs[0].start_address);//起點地點：330台灣桃園縣桃園市興華路23號
        //alert(directionsDisplay.getDirections().routes[0].legs[0].end_address);       //alert(directionsDisplay.getDirections().routes[0].legs[0].distance.text);//24.8公里
        //alert(directionsDisplay.getDirections().routes[0].legs[0].duration.text);//31分鐘
        //alert(directionsDisplay.getDirections().routes[0].copyrights);//地圖資料 2011 Kingway
        //alert(directionsDisplay.getDirections().routes[0].legs[0].steps[0].instructions);//朝<b>西北</b>，走<b>興華路</b>，往<b>大智路</b>前進
        //alert(directionsDisplay.getDirections().routes[0].legs[0].steps[0].distance.text);//0.3公里
         
      }
    });
         
  }
  
  function share(From,End){
  pFrom=neighborhoods[From];
  pEnd=neighborhoods[End];
  ttt="https://maps.google.com.tw/maps?saddr="+pFrom+"&daddr="+pEnd+"&sort=def&hl=zh-TW&dirflg=w&brcurrent=3,0x3442abadec7543e7:0x5dbcdd8252aeabe7,0,0x3442ac6b61dbbd9d:0xc0c243da98cba64b&mra=ltm&t=m&z=16";
  window.open(ttt);
  }
  
</script>
</head>

<script>window.onload=function(){var From=0;var End=1;initialize2(From,End);document.all.txtFrom.value=0;document.all.txtEnd.value=1;};</script>


<?php
$From = $_GET["From"];  
$End = $_GET["End"];	
echo "<script>";
echo "window.onload=function(){";
//echo "alert(From);";
echo "var From=".$From.";";
echo "var End=".$End.";";
echo "initialize2(From,End);";
echo "document.all.txtFrom.value=".$From.";";
echo "document.all.txtEnd.value=".$End.";";
echo "};";
echo "</script>";
?>	

<script>

</script>
<body >
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=1400291400211896";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=1400291400211896";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style type=text/css> 
        body { font-family: 微軟正黑體,Times New Roman,新細明體;}
        
        
        h1,h2,h3,h4,h5{ font-family: 微軟正黑體,Times New Roman,新細明體;}
    </style>

<div id="fb-root"></div>
    <script>
    window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
        appId      : FacebookAppId,                        // App ID from the app dashboard
        cookie     : true,                                 // Allowed server-side to fetch fb auth cookie
        status     : true,                                 // Check Facebook Login status
        xfbml      : true                                  // Look for social plugins on the page
        });

        // Additional initialization code such as adding Event Listeners goes here
        window.fbLoaded();
    };

    // Load the SDK asynchronously
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        //js.src = "//connect.facebook.net/en_US/all.js";
        // Debug version of Facebook JS SDK
        js.src = "//connect.facebook.net/en_US/all/debug.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
<?php
	$stopName=array();
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
$stopName[$i]=$name;
			$i++;
		}	
	}
?>	
</body>

<script>


</script>
<body>
<style type=text/css> 
        body { font-family: 微軟正黑體,Times New Roman,新細明體;}
        
        
        h1,h2,h3,h4,h5{ font-family: 微軟正黑體,Times New Roman,新細明體;}
    </style>
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
            <li class="active"><a href="./index.php">Home</a></li>
            <li class="active"><a href="./xmlTest.php">租賃站資訊</a></li>
			
          </ul>
		  
		  
        </div><!--/.nav-collapse -->
      </div>
	  
    </div>

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
     alert('已經登入了。請跳轉')
    } else if (response.status === 'not_authorized') {//登入了facebook沒有登入我們的應用
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
 
 
 




	
</br>
</br>
</br>

<div class="pull-right">
            
			
			<!--<button id="post" class="btn btn-primary">POST</button>-->
			<div class="fb-login-button" data-show-faces="false">Login with Facebook</div>
			
        </div>

		<!--<div class="fb-login-button" data-show-faces="false">Login with Facebook</div>  Login facebook

<fb:login-button onlogin="require('./log').info('onlogin callback')">
</fb:login-button>-->
		
		



<div>
<p><font size = 4px>本網站仍處於測試階段,如有問題請洽<a href="https://www.facebook.com/youbike.recommended.route" >本網站粉絲團</a><br>
路線計算部分由於目前google map沒有台灣的單車路線,所以暫時用步行路線代替</font></p>
<br>

</div>
<form action="testMap.php" method="get" >

<h4>路線規劃</br><span class="label label-default"></span></h4>
<h4>起始<span class="label label-default"></span>
<SELECT id="txtFrom" name="From">
<?
       for($i=0;$i<count($stopName);$i++){
          echo "<option value = \"".$i."\">".$stopName[$i]."</option>";
       }
?>
</SELECT><br>
目的<span class="label label-default" ></span>
<SELECT id="txtEnd" name="End">
<?
       for($i=0;$i<count($stopName);$i++){
          echo "<option value = \"".$i."\">".$stopName[$i]."</option>";
       }
?>
</SELECT><br>
 <input type="submit" class="btn btn-success value =" "pull-right"送出" />
  <!--<a href='' id='testShare' name='share' onClick='share(txtFrom.value,txtEnd.value);'>路線分享</a>-->
  <br>
  </form>
  </h4>
<div id="map_canvas" style="float:left;width:70%;height:100%"></div>
<div style="float:right;width:30%;height:100%;overflow:auto">
   
  <div id="directions_panel" style="width:100%"></div>
</div>
<div class="row">
	<div id="my-comments" class="col-md-8">
                <!-- Comments -->				<br>				<font size = 4px>可複製頁面網址於下方留言板po文</font>
                <div class="fb-comments" data-href="http://bikeroute.fhero.net/testMap.php/comment" data-width="893" data-numposts="5" data-colorscheme="light"></div>
    </div>
	<div id="my-like-btn" class="col-md-4">
                <!-- Like Button -->
                <div class="fb-like" data-href="https://www.facebook.com/youbike.recommended.route" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            </div>
</div>
</body>
</html>

<!-- Start of FHH Stats -->
<script type="text/javascript">
var sc_project=9400644; 
var sc_invisible=1; 
var sc_security="8ef6104b"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<!-- End of FHH Stats -->
