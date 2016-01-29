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
	<td width="150"><div align="left"><a href="http://www.lcg.unam.mx/~lcollado/BPdB/index.php" target="_self"><img src="http://www.lcg.unam.mx/~lcollado/BPdB/logo_BPdB_3.gif" width="150" height="100" border="0"/></a></div></td>
    <td width="150"><div align="left"><a href="http://www.unam.mx" target="_self"><img src="http://www.lcg.unam.mx/~lcollado/BPdB/logoUNAM.jpg" width="150" height="127" border="0"/></a></div></td>
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

	$var_pha=$_POST["phagebut"];
	$valores=array("phage_genome_comp_status","phage_nucleic_acid","phage_topology","phage_genome_size","phage_gc_content","phage_capsid_type_lipid","phage_capsid_type_polysac","phage_capsid_diameter","phage_lipid_vesicle","phage_coding_percentage","phage_original_status","phage_taxid");
	$query="SELECT * FROM phage WHERE phage_species = '$var_pha'";
	require_once("adodb/adodb.inc.php");
	$db = NewADOConnection("mysql");          
	$db ->Connect("www.lcg.unam.mx", "lbezares","lbe431","BPdB") or die($db ->ErrorMsg()." " . __LINE__);
?>
<style type="text/css">
<!--
.style1 {
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
<?php
	$rs = $db -> Execute($query) or die($db -> 	ErrorMsg() . " " . __LINE__);
	$titulos=array("Genome completion status","Nucleic Acid type","Genome topology","Genome size","G + C content","Capsid type lipid","Capsid type polysacharid","Phage capsid diameter","Lipid vesicle","Coding percentage","Original status","Phage taxid");
?>	
	<br  /><div align="center"><em><strong><? echo "$var_pha"; ?></strong></em><span class="style2"></span>
      <table width="800" border="1">
      </div>
	<tr>
    <th scope="col"><span class="style1">Bacteriophage characteristics</span></th>
    <th scope="col"><span class="style1">Bacteriophage entries</span></th>
  </tr>
  <?php
  $i=0;
  $row = $rs -> FetchRow() ;
			foreach ($valores as $actual) { 
				$result = $row[$actual];
				if($result){
					echo "<tr><td>$titulos[$i]</td><td>$result</td></tr>";
				}
				$i++;
			}
  
  ?>
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
	