<html>
<head>
<title>blast</title>
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
             <tr> <td><p align="center"><h2>BLAST</h2></p> </td></tr>
			 <tr><td>
				<form name="blast" id="blast" method="post" action="result_blast.php">
				<input type="radio" name="program" value="blastp">blastp
				<input type="radio" name="program" value="blastn">blastn<br>
				E-value<input type="text" name="evalue" id="evalue" value="10.0"><br>
				Paste your query in fasta format<br><textarea name="query" id="query" cols="75" rows="15"></textarea><br><br>
				<input type="submit" value="BLAST!">
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
