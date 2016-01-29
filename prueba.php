<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
	function campos ($tipo) {
		$cont;
		$arreglo=array();
		require_once("adodb/adodb.inc.php");
		$db = NewADOConnection("mysql");
		$db -> Connect("www.lcg.unam.mx", "lcollado", "lco771", "BPdB") or die($db -> 	ErrorMsg() . " " . __LINE__);
		$query = "SELECT field_name FROM fields WHERE field_type LIKE '$tipo';";
		$rs = $db -> Execute($query) or die($db -> 	ErrorMsg() . " " . __LINE__);
		while($row = $rs -> FetchRow()) { 
			//echo "$row";
			array_push ($arreglo, $row);
			$cont ++;
		}
		print_r ($arreglo);
	}
	campos("phage");

?>
<body>
</body>
</html>
