<html>
<head>
<title>Results</title>
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
.style4 {font-family: "Courier New", Courier, monospace}
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
            <td colspan="7"><table width="95%" align="right">
            <tr>
            	<td align="right">
				
	<form id="form1" name="form1" method="post" action="result.php">
	<input id="search" name="search" type="text">
	<select name="options">
  	  <option value="phage_species" selected="selected">Phage Species</option>
  	  <option value="phage_taxid">Phage Taxid</option>
  	  <option value="host_taxid">Host Taxid</option>

      <option value="pg_name">Gene Name</option>
      <option value="pg_accession_number">Gene Accession Number</option>
  	</select>
	<input type="submit" id="button" name="button" value="Search"/>
    <a href="ad_search.php" target="_self">Advanced Search</a>
    </form>                </td>
              </tr>
</table> 
</tr>
  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF">
	<?php
			require_once ("header.inc.php");
	?>

<?php
		
	$opciones = array("Host_taxonomy","Phage_taxonomy","Phage","Gene","Protein");

	$fields=array();
	array_push($fields,"phage_species","p_genus_name","p_family_name","p_order_name");
	$taxtext_pt=$_POST["textPhage_taxonomy"];
	$taxfield_pt=$_POST["selectPhage_taxonomy"];
	$select_pt="phage_species,p_genus_name,p_family_name,p_order_name";
	$cond_pt="";
	if($taxfield_pt == "p_order_name"){
	  	$alias_pt="po.$taxfield_pt";
		$from_pt="phage p,p_genus pg,p_family pf,p_order po"; 
		$where_pt= "p.p_genus_taxid=pg.p_genus_taxid AND pg.p_family_taxid=pf.p_family_taxid AND pf.p_order_taxid=po.p_order_taxid";
	}elseif($taxfield_pt =="p_family_name"){
	  	$alias_pt="pf.$taxfield_pt";
		$from_pt="phage p,p_genus pg,p_family pf LEFT JOIN p_order po ON pf.p_order_taxid=po.p_order_taxid";  /*Probar la consulta pertinente*/
	  	$where_pt= "p.p_genus_taxid=pg.p_genus_taxid AND pg.p_family_taxid=pf.p_family_taxid";
	}elseif($taxfield_pt =="p_genus_name"){
	  	$alias_pt="pg.$taxfield_pt";
		$from_pt="(phage p,p_genus pg) LEFT JOIN p_family pf ON pg.p_family_taxid=pf.p_family_taxid LEFT JOIN p_order po ON pf.p_order_taxid=po.p_order_taxid";
		$where_pt="pg.p_genus_taxid=p.p_genus_taxid";
	}elseif($taxfield_pt =="phage_species"){
		$alias_pt="p.$taxfield_pt";
		$from_pt="phage p LEFT JOIN p_genus pg ON p.p_genus_taxid=pg.p_genus_taxid LEFT JOIN p_family pf ON pg.p_family_taxid=pf.p_family_taxid LEFT JOIN p_order po ON pf.p_order_taxid=po.p_order_taxid";		
		$where_pt="p.phage_taxid=p.phage_taxid";
	}if($taxtext_pt){
		$cond_pt="AND $alias_pt LIKE '%$taxtext_pt%'";
	}
	$taxtext_ht=$_POST["textHost_taxonomy"];
	$taxfield_ht=$_POST["selectHost_taxonomy"];
	$select_ht="genus_name,species_name";
	$from_ht="LEFT JOIN host_phage_link hpl ON p.phage_taxid=hpl.phage_taxid LEFT JOIN host h ON hpl.host_taxid=h.host_taxid LEFT JOIN host_taxonomy ht ON h.host_taxid=ht.host_taxid";
	$where_ht="p.phage_taxid=hpl.phage_taxid AND hpl.host_taxid=h.host_taxid AND h.host_taxid=ht.host_taxid"; 
	$cond_ht="";
	if($taxtext_ht){
		$from_ht="JOIN host_taxonomy ht,host h,host_phage_link hpl";
		$cond_ht="AND $taxfield_ht LIKE '%$taxtext_ht%'";
	}
	array_push($fields,"genus_name","species_name");
	
	$text_p=$_POST["textPhage"];
	$field_p=$_POST["selectPhage"];
	echo "$text_p<br>";
	$select_p="";
	$where_p="";
	if($text_p){
		if(($field_p=="phage_gc_content")||($field_p=="phage_genome_size")){
			$where_p="AND $field_p <= $text_p AND $field_p >= 0";
		}else{
			$where_p="AND $field_p LIKE '$text_p'";
		}
		$select_p=",$field_p";
		$p_field=array();
		array_push($fields,$field_p);
	}
	$text_g=$_POST["textGene"];
	$field_g=$_POST["selectGene"];
	$select_g="";
	$from_g="";   
	$where_g="";
	if($text_g){
		$from_g="JOIN phage_gene2 g";
		$select_g=",pg_name,pg_product_type,pg_sequence,pg_pos_left,pg_pos_right,pg_strand,pg_accession_number";
		$where_g="AND g.phage_id=p.phage_id AND $field_g LIKE '$text_g'";
		array_push($fields,"pg_name","pg_product_type","pg_sequence","pg_pos_left","pg_pos_right","pg_strand","pg_accession_number");
	}
	
	$text_pr=$_POST["textProtein"];
	$field_pr=$_POST["selectProtein"];
	$select_pr="";
	$where_pr="";
	if($text_pr){
		$select_pr=",pg_product_name,pg_protein_sequence,ref_accession_number";
		if($field_pr=="ref_accession_number"){
			$from_g="JOIN phage_gene2 g,gene_ref_link2 grl,ref2 r";
			$where_pr="AND g.pg_id=grl.pg_id AND grl.ref_id=r.ref_id AND $field_pr LIKE '$text_pr'";
		}else{
			$from_g="JOIN phage_gene2 g LEFT JOIN gene_ref_link2 grl ON g.pg_id=grl.pg_id LEFT JOIN ref2 r ON grl.ref_id=r.ref_id";
			$where_pr="AND $field_pr LIKE '$text_pr'";
		}
		array_push($fields,"pg_product_name","pg_protein_sequence","ref_accession_number");
	}
	$query= "SELECT $select_pt,$select_ht $select_p $select_g $select_pr FROM ($from_pt) $from_ht $from_g WHERE $where_pt AND $where_ht $cond_pt $cond_ht $where_p $where_g $where_pr;";
	require_once("adodb/adodb.inc.php");
	$db = NewADOConnection("mysql");           //cómo se cierra la conexión????
	$db -> Connect("kabah.lcg.unam.mx", "lbezares","lbe431","BPdB") or die($db ->ErrorMsg()." " . __LINE__);
	$rs = $db -> Execute($query) or die($db -> 	ErrorMsg() . " " . __LINE__);
	
	if ($rs->EOF) {
				echo "<strong>There were no results with your query. Please check your input or visit the support page.</strong><br>";
	}
	else{
		 echo "<strong>Go To Result Number: </strong><br>";
		 while(!$rs -> EOF) {
			$cont ++;
			if($cont%30==0){
				echo "<br>";
			}
			echo "<a href=\"#res$cont\" target=\"_self\">$cont</a>&nbsp;";
			$rs->MoveNext();
		}
		echo "<br><br>";
		$rs->MoveFirst();
		$total = $cont;
		$cont = 0;
		while($row = $rs -> FetchRow()) {
			$cont ++;
			echo "<br><br><br><strong>Result $cont<a name=\"res$cont\"></a></strong>&nbsp;&nbsp;<a href=\"#top\" target=\"_self\">Top</a><br>";
			foreach ($fields as $actual) { 
				$result = $row[$actual];
				if($result){
					echo "<br><strong>$actual</strong><br>";
					if ($actual=="phage_species"){
					?>	<form id="form1" name="form1" method="post" action="tab_phage.php">
						<input type="submit" id="phagebut" name="phagebut" value="<?php $result; echo "$result"; ?>"/><br>
						</form>
					<?php
					}
					else{
						echo "$result<br>";
					}
				}
			}
		}
	}
		
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
