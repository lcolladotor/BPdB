<html>
<head>
<title>Downloads</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
}
body {
	background-color: #FFFFFF;
}
.style1 {
	font-size: 24px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
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
.style2 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
}
.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 24px;}
-->
</style></head>
<body>
<div align="center">
  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF">
	<?php
			require_once ("header.inc.php");
	?>
    <tr>
		<td colspan="7"><table width="95%" align="center">
            <tr>
            	<td align="right">
				<?php require_once ("search.php"); ?>
                </td>
             </tr>
             <tr> <td>
             <?php $flag = $_POST["flag"];
			 if ($flag) {
			 	$table = $_POST["tables"];
				echo "<p align=\"center\"><a href=\"downloads/$table.txt\" target=\"_self\">Click to download the $table table</a><p>";
			 }
			 else {
			 	echo "<br><p align=\"justify\">Welcome to the download page. Here you can choose a table from our database that you wish to download. For more information, please check the Entity Relation Diagram <a href=\"ER_Bacteriophage_DB.jpg\" target=\"_self\">here</a>.</p><br>";
			 	echo "<div align=\"center\"><form id=\"form1\" name=\"form1\" method=\"post\" action=\"download.php\">";
				$opt = array ("field","gene_ref_link2","host", "host_taxonomy", "p_family", "p_genus", "p_order", "phage", "phage_gene2", "ref2", "reference_type2");
				echo "<select name=\"tables\">";
				foreach ($opt as $key) {
					echo "<option value=\"$key\">$key</option>";
				}
				echo "</select>";
				echo "<input type=\"hidden\" name=\"flag\" id=\"flag\" value=\"1\">";
				echo "<input type=\"submit\" name=\"button\" id=\"button\" value=\"Download\"></form></div>";
			 }
             ?>
             
              <br><br></td></tr>
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
