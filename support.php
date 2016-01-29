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
             <tr> <td><p align="center">&nbsp;</p>
             <p align="justify">Hello visitor,</p>
             <p align="justify">First of all, if you would like to know what BPdB is about please go to the <a href="http://kabah.lcg.unam.mx/~lcollado/BPdB/index.php" target="_self">home page</a>. Furthermore, you may contact any of the staff from the page <a href="http://kabah.lcg.unam.mx/~lcollado/BPdB/about.php" target="_self">about us</a>. We are always open to suggestions, remarks and constructive criticism.</p>
             <p align="justify">&nbsp;</p>
             <p align="justify">Below you'll find explanations for specifics parts of the site.</p>
             <p align="justify"><strong>Basic Search</strong></p>
             <p align="justify">This type of search allows the user to find information about phages from their species name, their taxid or their host taxid. Adicionally, you can find information for genes using their name or their accession number. The result will show all the information that is available on the database. This tool is available in all of the sites pages and is quite helpful for users that are looking for simple information. You'll be able to download the phage nucleotide sequence, the gene nucleotide sequence or the protein amino acid sequence depending on your type of query. However, if you would like to make a more detailed search, then go ahead and use the advanced search.</p>
             <p align="justify"><strong>Advanced search</strong></p>
             <p align="justify">This type of search allows the user to obtain sets of phages and/or  sequences with very specific characteristics. These vary from phage taxonomy  information to protein accession number.&nbsp;  The results are restricted by filling any of the blank spaces available.  All the conditions specified by the user in every field must be met to obtain a  non-void result. &nbsp;<br>
               There are some options that allow the user to introduce quantitative  data (e.g. G+C content). The search engine will look for values equal or less  than that introduced by the user. <br>
               Here is an example for you to use this search tool more efficiently. Suppose  you want to obtain all the ssDNA phages that infect the bacterial class  Gammaproteobacteria and that also belongs to the family Microviridae. To get  the appropriate results the user must first choose from the &ldquo;phage taxonomy&rdquo;  drop down menu the option family; then, fill the corresponding box with the  word &ldquo;microviridae&rdquo;. To restrict the type of nucleic acid, the option &ldquo;Nucleic  acid&rdquo; in the &ldquo;phage&rdquo; drop down menu, must be chosen, obviously writing in the  textbox &ldquo;ssDNA&rdquo;. Finally, to specify the host specificity, you must indicate,  with the drop down menu, at which taxonomic level you want to restrict your  search. In this example, you should write &ldquo;Gammaproteobacteria&rdquo;, selecting the  class_name option. We suggest you to try different query combinations to get  used to this tool.</p>
             <p align="justify"><strong>Local BLAST</strong></p>
             <p align="justify">The local BLAST tool from  BPdB is the NCBI blastall program running locally in our server. To use it you  must provide a query sequence in fasta format and then choose to use either the BLASTP or the BLASTN algorithm. The former will search against all the protein sequences  in our database and the latter will search among the nucleotide sequences of  every gene in the BPdB (protein coding genes and RNA molecules). The results  are displayed in a pairwise format and the system uses a default E-value  threshold of 10.0 unless specified by the user.</p>
             <p align="justify">&nbsp;</p>
             <p align="justify"><strong>FAQ</strong></p>
             <p align="justify"><strong>Q.</strong> What is this site about?</p>
             <p align="justify"><strong>A.</strong> Please visit the home page and read the description.</p>
             <p align="justify"><strong>Q.</strong> Can I download all the information without charge for academical purposes?</p>
             <p align="justify"><strong>A. </strong>You are welcome to do so, just visit the download page.</p>
             <p align="justify"><strong>Q. </strong>Where can I BLAST my sequence?</p>
             <p align="justify"><strong>A.</strong> Go to the Tools page and use the local BLAST tool. You may choose between using BLASTP or BLASTN.</p>
             <p align="justify"><strong>Q.</strong> How can I get functional information for a gene?</p>
             <p align="justify"><strong>A. </strong>Look up your gene in the basic search and there will be links to sites with functional information if such a gene has been annotated.</p>
             <p align="justify"><strong>Q.</strong> Can I find all the phages that affect a certain host?</p>
             <p align="justify"><strong>A.</strong> Yes, you only have to look up query host by taxid on the basic search or use the advanced search.</p>
             <p align="justify"><strong>Q.</strong> I found a mistake, should I report it?</p>
             <p align="justify"><strong>A.</strong> Sure! Please do so by visiting our about us page.</p>
             <p align="justify"><strong>Q.</strong> Where can I find a tutorial for this site?</p>
             <p align="justify"><strong>A. </strong>Currently we are developping tutorials. Therefore at this moment you cannot find a tutorial in place, but feel free to direct your questions to us.<br>
               <br> 
             </p></td></tr>
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
