<?php
	function database_table($t_campo){
			$result=array();
		   require_once("adodb/adodb.inc.php");
			$db = NewADOConnection("mysql");
			$db -> Connect("kabah.lcg.unam.mx", "lbezares","lbe431","BPdB") or die($db ->ErrorMsg()." " . __LINE__);
		  $query="SELECT db_table FROM fields WHERE db_field  LIKE '$t_campo';";
		  $rs = $db -> Execute($query) or die($db -> 	ErrorMsg() . " " . __LINE__);
		  while($row = $rs -> FetchRow()) { 
				array_push($result,$row["db_table"]);
		   }
		  return ($result);
 	}
	
	$boxes = $_POST["boxes"];
	$opciones = array("phage","protein","host","gene","other");
	
	foreach ($opciones as $key) {
		$option_{$key} = array();
		$text_{$key} = array();
		$bool_{$key} = array();
		$table_{$key} = array();
	}
	
	for ($box=1; $box <= $boxes; $box++) {
		foreach ($opciones as $key) {
			if ($text = $_POST["text$key$box"]) {
				array_push ($option_{$key}, $_POST["select$key$box"]);
				array_push ($text_{$key}, $_POST["text$key$box"]);
				array_push ($bool_{$key}, $_POST["boolean$key$box"]);
				$table = database_table( $_POST["select$key$box"] );
				array_push ($table_{$key}, $table[0] );
			}
		}
	}
	//print_r($option_{"phage"}); echo "Option <br>";
	//print_r($text_{"phage"}); echo "Text <br>";
	//print_r($bool_{"phage"}); echo "Bool <br>";
	//print_r($table_{"phage"}); echo "Table <br>";
	
	// aqui va lo que quieras hacer con esta info ^_^
?>