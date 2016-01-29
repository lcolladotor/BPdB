<html>
<head>
<title>BacterioPhages data Base (BPdB)</title>
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
		<td colspan="7"> <table width="95%" align="center"><tr><td><p align="justify"></p>
        <br>
        <p>BPdB (<strong>B</strong>acterio<strong>P</strong>hages <strong>d</strong>ata <strong>B</strong>ase) is a dedicated database created to serve as a platform to do  functional, evolutionary and ecological bacteriophages&rsquo; analysis in a genomic  context.</p>
        <p><strong>Information stored in BPdB</strong><br>
          This database is divided in three  main sources of information about bacteriophages: molecular morphology, genome  features and functional characteristics.</p>
        <p><strong><em>Molecular morphology </em></strong><br>
  &nbsp;A typical search can retrieve phage information  about its capsid type; the nucleic acid type that it is made of; its  classification; presence or absence of lipid particles inside the capsid, among  other characteristics of a typical phage. Furthermore, phages images are  available for visual inspection.<u></u></p>
        <p><strong><em>Genome </em></strong><br>
  &nbsp;This is the main part of BPdB&rsquo;s resources. Information  of this kind includes complete and incomplete genome sequences for whole genome  comparisons. For a more focused analyses, however, gene and protein sequences  with full GO and annotations are available. Less common information like  experimentally identified promoters and transcription units are also accessible  for scientific inquiry. The user will find at his/her disposition other genomic  information like G + C content, genome size etcetera. <u></u></p>
        <p><strong><em>Functional characteristics</em></strong><br>
  &nbsp;This kind of information includes phage&rsquo;s mode  of infection, replication and diversity of hosts. The database is organized in  a way that is easy for the user to know whether a phage infects a specific  bacterium with or without the aid of another phage(s) (i.e. coinfection). </p>
        <p><strong>Bioinformatic tools</strong><br>
          BPdB allows the researcher to use  a variety of bioinformatics tools to analyze a set of sequences of particular  interest. <br>
          Among the tools BPdB offers is  BLAST; it can be used to look for similar sequences stored in BPdB, or in a  bigger and more general database (e.g. entrez). <br>
          More specialized tools like  promoter prediction tool or a codon usage estimator are also at the user  disposition. Furthermore, a HMM-based search method is available to find motifs  related to a particular sequence.</p>
        <p><strong>Stages of BPdB development</strong><br>
  &nbsp;Due to the huge amount this ambitious project needs;  we have decided to divide its development in various stages. <br>
          The first one is planned to be  complete at the end of this year (2007). The main goals for this stage are the creation and organization of BPdB  structure in a relational form (i.e. creating and joining mySQL tables in an appropriate  form); uploading of genome, gene and protein sequences and the basic information  associated with them; and uploading of phage and host names and their classification,  as well as their basic characteristics.<br>
  &nbsp;Data that require manual upload will be  postponed for further stages. <br>
  &nbsp;Different modes of searching information are  also planned to be available at the end of this phase. For instance, a novel  mode to look for associated host(s) of a specific phage (or for a group of  them) will be accessible to facilitate this kind of information. <br>
          Finally, BLAST is going to be the  sole tool for this stage. Nonetheless, more tools will be established later in  the development of this database (see above.<br>
          The precise aims of next stages  are not yet defined. These are going to be announced when the first stage is  complete.<u></u></p>
        <br><br></td></tr>
        <tr><td align="center"><?php require_once ("search.php"); ?><br><br></td></tr>
        <tr><td><p align="center"><a href="about.php" target="_self">About us<br><br></a><br>
          <br></p></td></tr>
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
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-3152397-3");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
