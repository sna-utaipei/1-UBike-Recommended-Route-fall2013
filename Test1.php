
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41591387-1', 'youbike.com.tw');
  ga('send', 'pageview');

</script>
<script src="js/jquery-1.7.1.min.js"></script>
<script>
var url = window.location.href;
var lock=1;
//if(url.indexOf("info.php")>-1){lock=0;}

function addInterdict(){
    return false;
}
function removeInterdict(){
    return true;
}
function DisableKeys() {
if(event.ctrlKey||event.shiftKey||event.altKey)
{
window.event.returnValue=false;
addInterdict();
}} 

function AbleKeys() {
if(event.ctrlKey||event.shiftKey||event.altKey) 
{
window.event.returnValue=true;
removeInterdict();
}}
if(lock==1)
{
$(document).ready(function(){
	
	
		$(document).bind("contextmenu",function(e){
		return false;
		});
		document.ondragstart=addInterdict
		document.oncontextmenu=addInterdict;
		document.onkeydown=DisableKeys;
	   
		var nodes = $("input,textarea");
	   
		for (var i=0,L=nodes.length; i<L; i++)  
		{
			var node = nodes[i];
			node.onmouseover = function()
			{
				document.onkeydown=AbleKeys;
			}
			node.onmouseout = function()
			{
				document.onkeydown=DisableKeys;
			}
		}  
	$("body").addClass("bodyclass");

	
	});
}

function hide(name){
	if(document.getElementById(name)){
		document.getElementById('SUB_Display').style.display = "none";
		document.getElementById(name).style.display = "none";
    }
}
</script> 
<style type="text/css">

.bodyclass {-moz-user-select : none;-webkit-user-select: none;}
</style>



<head>
<link rel="shortcut icon" href="./images/ubike.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>歡迎光臨YouBike</title>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="WRAPPER">
<!--<div id="SUB_Display"></div>
<div id="SUB_T" onclick="hide('SUB_T');"><img id="appdm" src="images/appdm.jpg" ></div>-->
<div id="HEADER">
<div id="UBIKE"><a href="home.php"><img src="images/ubikelogo.png" width="282" height="112" /></a></div>


 <div id="LINK"  style="Font-Size:12pt">
<a href="home.php">首頁</a>│<a href="lost.php">失物招領</a>│<a href="find_2.php">自行車遺失協尋</a>│<a href="contact_02.php">問與答</a>│<a href="https://www.youbike.com.tw/user/member_login01.php">登入</a>│<a href="https://www.youbike.com.tw/user/member_regist01.php">註冊</a>│
  <span style="border:1px solid #FFF;position:absolute;overflow:hidden">
  <form name="lanFrm" method="post" action="info.php">
  <select style="margin:-4px;Font-Size:12pt" name="eng" onchange="javascript:document.lanFrm.submit()">
   <option value="1">English</option>
 <option value="0" selected="selected">正體中文</option>

  </select>
 </form>

 </span></div>
   <ul>
   
  
        <li class="n01">
     <a href="about.php">
          關於YouBike
    </a>
     </li>
       
   	     <li class="n02">
    <a href="news.php">
        最新消息
        </a>
    </li>
            <li class="n03">
    <a href="guide.php">
           使用說明
            </a>
      </li>
             <li class="n07">
     <a href="info.php" class="nav4">
          租賃站資訊
          </a></li>
              <li class="n05">
     <a href="download.php">
            下載專區
          </a>
     </li>
              <li class="n06"><a href="https://www.youbike.com.tw/user/member_login01.php">
             會員專區
      </a></li>
      </ul>

</div>


<div id="MAIN">
  <div id="INFO">
    <ul>
       <li class="blue"><a href="info.php">租賃站資訊</a></li>
     <li><a href="MapTest.html">租賃站點列表</a></li>
    <li ><a href="info02.php">服務中心資訊</a></li>
    <li ><a href="http://www.dot.taipei.gov.tw/ct.asp?xItem=51419341&ctNode=65044&mp=117001" target="_blank">租賃站預計設<br>&nbsp;&nbsp;站地點</a></li>
     </ul>
</div>
<div id="INFO_MAP">
<div><img src="images/point/facebar.png"></div>
<div id="map" style="height:385px; width:700;"></div>
<!--<img src="images/map2.jpg" width="700" height="385" />-->
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
 <!--<div class="search">
<table width="580" border="0" cellpadding="0" cellspacing="0">
  <tr>
   
    <td width="497">
       <input type="text" name="addressInput" id="addressInput" class="textinfo" value="捷運市政府站" onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}">
        <input type="text" name="addressInput" id="addressInput" class="textinfo" value="顯示全部站點">
    </td>
    <td width="83" class="s02"><a href="#" onClick="searchLocations()">搜尋</a></td>
  </tr>
</table>
</div> 
<div style="margin-left:15px;"><font color="ff0000">※TIP：請在輸入框內，輸入地址作為搜尋目標，地圖將會秀出五公里內的所有站點。</font></div>-->
<br class="CLEAR">
</div>
<select id="locationSelect" style="width:100%; display:none"></select>
<input type="hidden" id="lat" value="">
<input type="hidden" id="lng" value="">
<script src="https://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<script type="text/javascript">
   
	load();
    var curWin;
	var curInfo;
	var contents=[];
    var map;
    var markers = [];
    var infoWindow;
    var locationSelect;
	var default_center;
	
	var icon = "images/marker.png";
	var mark_click;
	var icon1 = "images/point/25/bface.png";
	var icon2 = "images/point/25/gface.png";
	var icon3 = "images/point/25/yface.png";
	var icon4 = "images/point/25/rface.png";
	
	
    function load() {
	
	 var lat = document.getElementById("lat").value;
	 var lng = document.getElementById("lng").value;
	 
      map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(lat, lng),
        zoom: 17,
        mapTypeId: 'roadmap',
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
      });
      infoWindow = new google.maps.InfoWindow();

      locationSelect = document.getElementById("locationSelect");
      locationSelect.onchange = function() {
        var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
        if (markerNum != "none"){
          google.maps.event.trigger(markers[markerNum], 'click');
        }
      };
	  searchLocations();
   }

   var srh_type = 0;
   function searchLocations() {
 
	 var lan = 0;
	 if(lan==1){
		var address="顯示全部站點";
	 }else{
		var address ="顯示全部站點";
	 }
	 
	 if(address=="顯示全部站點"){address="台北市政府";srh_type=0}else{ srh_type=1;}
     var geocoder = new google.maps.Geocoder();
     geocoder.geocode({address: address}, function(results, status) {
       if (status == google.maps.GeocoderStatus.OK) {
	  	map.setCenter(results[0].geometry.location);
		searchLocationsNear(results[0].geometry.location);
		default_center = results[0].geometry.location;
		//alert(results[0].geometry.location);
		
       } else {
         alert(address + ' not found');
       }
     });
   }

   function clearLocations() {
  
  	if(infoWindow){    infoWindow.close();}
	   for (var i = 0; i < markers.length; i++) {
       markers[i].setMap(null);
     }
     markers.length = 0;

     locationSelect.innerHTML = "";
     var option = document.createElement("option");
     option.value = "none";
     option.innerHTML = "See all results:";
     locationSelect.appendChild(option);
	
   }

   function searchLocationsNear(center) {
  
     clearLocations(); 
	  var radius = 5;
     
     var searchUrl = 'ccccc.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius+"&mode="+srh_type;
	
     downloadUrl(searchUrl, function(data) {
	 
	   var xml = parseXml(data);
       var markerNodes = xml.documentElement.getElementsByTagName("marker");
	   var bounds = new google.maps.LatLngBounds();
	
	  if(markerNodes.length>0)
	  {
		   for (var i = 0; i < markerNodes.length; i++) {
		    var mday = markerNodes[i].getAttribute("mday");
			 var name = markerNodes[i].getAttribute("name");
			 
			 var address = markerNodes[i].getAttribute("address");
			  var nameen = markerNodes[i].getAttribute("nameen");
			  var addressen = markerNodes[i].getAttribute("addressen");
			  
			 var icon_type = markerNodes[i].getAttribute("icon_type");
			 var distance = parseFloat(markerNodes[i].getAttribute("distance"));
			 var tot = markerNodes[i].getAttribute("tot");
			 var sus = markerNodes[i].getAttribute("sus");
			 var icon_type = markerNodes[i].getAttribute("icon_type");
			
			 var latlng = new google.maps.LatLng(
				  parseFloat(markerNodes[i].getAttribute("lat")),
				  parseFloat(markerNodes[i].getAttribute("lng")));
	
			 createOption(name, distance, i);
			 createMarker(latlng,name,address,tot,sus,icon_type,addressen,nameen,mday);
			 bounds.extend(latlng);
		   }
		   map.fitBounds(bounds);
		   if(srh_type==1){	   map.setZoom(15);}
	  }
	  map.setCenter(default_center);
	  if(srh_type==1){createMarker(default_center,'','','','',4);   }
		   
		   locationSelect.style.visibility = "visible";
		   locationSelect.onchange = function() {
			 var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
			 google.maps.event.trigger(markers[markerNum], 'click');
		   };
		  });
		  
	 
    }



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
		  var marker = new google.maps.Marker({
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

	  
      /*google.maps.event.addListener(marker, 'mouseover', function() {
	  	
		
		infoWindow.setContent(html);
        infoWindow.open(map, marker);
		curWin = infoWindow;
		curInfo=html;
	 });*/
	 
	  
      markers.push(marker);
    }

    function createOption(name, distance, num) {
      var option = document.createElement("option");
      option.value = num;
      option.innerHTML = name + "(" + distance.toFixed(1) + ")";
      locationSelect.appendChild(option);
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request.responseText, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function parseXml(str) {
      if (window.ActiveXObject) {
        var doc = new ActiveXObject('Microsoft.XMLDOM');
        doc.loadXML(str);
        return doc;
      } else if (window.DOMParser) {
        return (new DOMParser).parseFromString(str, 'text/xml');
      }
    }

    function doNothing() {}
	


  </script>
  </div>

<div id="FOOTER">
  <!--<p><a href="contact.php">聯絡我們</a>│Copyright 2012 Taiwan GIANT Sales Company 請尊重智慧財產權，勿任意轉載，違者依法必究 <img src="images/taipei.jpg" height="25" style="margin-top:5px;"></p>-->
 <div id="footer_a"><table align="center"><tr><td><a href="privacy.php">隱私權政策</a>│<a href="contact.php">聯絡我們</a>│Copyright 2012 Taiwan GIANT Sales Company 請尊重智慧財產權，勿任意轉載，違者依法必究</td><td><img src="images/taipei.jpg" height="30"></tr></table></div>
<script type="text/javascript" src="admin/js/jquery-1.7.1.min.js"></script>
<script>


var mH = document.body.clientHeight;
var nn = window.screen.height;
var obj = document.getElementById("MAIN");
var nH = nn-(420);
var ua = navigator.userAgent.toLowerCase();
if(ua.indexOf("msie")>-1)
{
	nH = nn-420;
}
else if(ua.indexOf("firefox")>-1)
{
	nH = nn-440;
}
else if(ua.indexOf("chrome")>-1)
{
	nH = nn-400;
	
	
}
var dH = $("#MAIN").height();
$("#WRAPPER").css('minHeight',mH);
var n1=(mH-190);

if(dH&&(dH<n1))
{


var fh = mH-250;
$("#MAIN").css('height',fh);
$("#FOOTER").css('bottom',0);
$("#FOOTER").css('position','absolute');
}

</script>
</div>
</div>
</body>
</html>
