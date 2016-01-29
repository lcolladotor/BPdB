<html>
<head>
<title>Support</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
}
body {
	background-color: #FFFFFF;
}
a:link {
	color: #0033CC;
	text-decoration: none;
}
a:visited {
	color: #CC3300;
	text-decoration: none;
}
a:hover {
	color: #0099FF;
	text-decoration: underline;
}
a:active {
	color: #FF6633;
	text-decoration: none;
}
.style1 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style></head>
<body>
<div align="center">
  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF">
	<tr>
	<td width="150"><div align="left"><a href="http://kabah.lcg.unam.mx/~lcollado/BPdB/index.php" target="_self"><img src="http://kabah.lcg.unam.mx/~lcollado/BPdB/logo_BPdB_3.gif" width="150" height="100" border="0"/></a></div></td>
    <td width="150"><div align="left"><a href="http://www.unam.mx" target="_self"><img src="http://kabah.lcg.unam.mx/~lcollado/BPdB/logoUNAM.jpg" width="150" height="127" border="0"/></a></div></td>
    <td width="300"></td>

  <td width="100"><div align="center"><a href="index.php" target="_self">Home</a></div></td>
    <td width="100"><div align="center"><a href="tools.php" target="_self">Tools</a></div></td>
    <td width="100"><div align="center"><a href="download.php" target="_self">Downloads</a></div></td>
    <td width="100"><div align="center"><a href="support.php" target="_self">Support</a></div></td>
</tr>
		
			

    <tr>
	<tr>
    
   
    <td colspan="7"><table width="95%" align="center">

            <tr>
            	<td align="center">
                
                 <center>
      <h4>ADVANCED SEARCH<span class="style1"></span></h4>
    </center>
                
                
           
	<?php
    function fields($field_type){
			$result=array();
		   $cont=0;
		   require_once("adodb/adodb.inc.php");
			$db = NewADOConnection("mysql");
			$db -> Connect("kabah.lcg.unam.mx", "lbezares","lbe431","BPdB") or die($db ->ErrorMsg()." " . __LINE__);
		  $query="SELECT field_name FROM fields WHERE field_type  LIKE '$field_type';";
		  $rs = $db -> Execute($query) or die($db -> 	ErrorMsg() . " " . __LINE__);
		  while($row = $rs -> FetchRow()) { 
				array_push($result,$row["field_name"]);
			$cont++;
		   }
		  array_push($result,$cont);
		  return ($result);
 	}
	function database_field($tipo_campo){
			$result2=array();
		   require_once("adodb/adodb.inc.php");
			$db2 = NewADOConnection("mysql");
			$db2 -> Connect("kabah.lcg.unam.mx", "lbezares","lbe431","BPdB") or die($db2 ->ErrorMsg()." " . __LINE__);
		  $query2="SELECT db_field FROM fields WHERE field_type  LIKE '$tipo_campo';";
		  $rs2 = $db2 -> Execute($query2) or die($db2 -> 	ErrorMsg() . " " . __LINE__);
		  while($row = $rs2 -> FetchRow()) { 
				array_push($result2,$row["db_field"]);
		   }
		  return ($result2);
 	}

 ?>				
               <form id="form1" name="form1" method="post" action="ad_results.php">
    <?php
		  $opciones = array("Phage_taxonomy","Host_taxonomy","Phage","Gene","Protein");
		  foreach ($opciones as $key) {
			echo "<br>$key&nbsp;<select width=\"150\" name=\"select$key\">";
			$cont2=0;
			$array=array();
			$array2= array();
			$array=fields($key);
			$array2=database_field($key);
			$cont2=array_pop($array);
			for ($i=0;$i<$cont2;$i++){
				echo "<option value=$array2[$i]>".$array[$i]."</option>";
			}
			echo "</select>";
			echo "<input id=\"text$key\" name=\"text$key\" width=\"150\" type=\"text\">";
			if($key != "Protein"){
				echo " AND";
			}
		  }
		  echo "<br><input type=\"submit\" id=\"button\" name=\"button\" value=\"Search\"/><br>";
		
   ?>  
   	   <input type="hidden" name="boxes" value="<?php $boxes; echo"$boxes" ?>"/>
     </form>
     </td></tr>
      </table>      </td>
	</tr>
    <tr>
    	<td colspan="7"><?php require_once ("update.inc.html"); ?>
        </td>
    </tr>
	<tr>
    	<td colspan="7"><div align="center"><a href="#top" target="_self">Top</a></div></td>
    </tr>
</table>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-3152397-1";
urchinTracker();
</script>
</body>
</html>
