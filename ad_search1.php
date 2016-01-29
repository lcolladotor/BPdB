<html>
   <body>
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
 ?>
   
     <form id="form1" name="form1" method="get" action="result.php">
   <?php    
      for($cont3=1; $cont3<=2; $cont3++) {
		  $opciones = array("phage","protein","host","gene","other");
		  foreach ($opciones as $key) {
			echo "<br>$key&nbsp;<select name=\"select$key$cont3\">";
			$cont2=0;
			$array=array();
			$array=fields($key);
			$cont2=array_pop($array);
			for ($i=0;$i<$cont2;$i++){
				echo "<option value=$i>".$array[$i]."</option>";
			}
			echo "</select>";
			echo "<input id=\"text$key$cont3\" name=\"text$key$cont3\" type=\"text\">";
			echo "<select name=\"boolean$key$cont3\"> <option value=and>AND</option> <option value=or>OR</option> </select>";
		  }
		  echo "<br><input type=\"submit\" id=\"button$cont3\" name=\"button$cont3\" value=\"Search\"/><br>";
		}
   ?>  
   
     </form>
  </body>
</html>
