<table border="1" align="center" cellpadding="1" cellspacing=0 cellpadding=1 width=600>
	<tr>
	<td bgcolor="#addbf7" width=100><font color="#2323af">站點分區</td>
	<td bgcolor="#addbf7" width=100><font color="#2323af">站點編號</td>
	<td bgcolor="#addbf7" width=160><font color="#2323af">站點名稱</td>
	<td bgcolor="#addbf7" width=40><font color="#2323af">總數量</td>
	<td bgcolor="#addbf7" width=40><font color="#2323af">空位</td>
	<td bgcolor="#addbf7" width=80><font color="#2323af">可借數量</td>
	<!--<td bgcolor="#addbf7" width=150><font color="#2323af">站點座標</td>-->
	<!--<td bgcolor="#addbf7" width=150><font color="#2323af">更新時間</td>-->
	
	</tr>
	
<?php

	$json = file_get_contents('http://210.69.61.60:8080/you/gwjs_cityhall.json');
	$a = json_decode($json);

	for($i=0;$i<count($a->retVal);$i++)
	{
			$bemp=$a->retVal[$i]->bemp;
			$sbi=$a->retVal[$i]->sbi;
			$sna=$a->retVal[$i]->sna;
			$mday=$a->retVal[$i]->mday;
			$tot=$a->retVal[$i]->tot;
			$lat=$a->retVal[$i]->lat;
			$lng=$a->retVal[$i]->lng;
			$sarea=$a->retVal[$i]->sarea;
			$sno=$a->retVal[$i]->sno;
			
			echo "\t<tr>\n";
				print("<td>".$sarea."</td>\n");
				print("<td>".$sno."</td>\n");
				print("<td>".$sna."</td>\n");
				print("<td>".$tot."</td>\n");
				print("<td>".$bemp."</td>\n");
				print("<td>".$sbi."</td>\n");
				//print("<td>".$lat." , ".$lng."</td>\n");
				//print("<td>".$mday."</td>\n");
			echo "\t</tr>\n";
	}
	
?>	
	
	
	
	
	
	
	
	
