<html>
<head>
<title>Basic Results</title>
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
             <tr> <td><p align="center"><br>Basic Results Page for<?php 
			 $text=$_POST["search"];
			 $option=$_POST["options"];
			 echo " $text under $option";
			 ?></p> 
             <br><br></td></tr>
             <tr> <td width="90%" colspan="7"><?php 
			 
			 
			 
			 require_once("adodb/adodb.inc.php");
			 $db = NewADOConnection("mysql");
			 $db -> Connect("www.lcg.unam.mx", "lbezares","lbe431","BPdB") or die($db ->ErrorMsg()." " . __LINE__);
			 
			 if ($option == "phage_species") {
			 	$query = "SELECT *
				FROM phage p
				LEFT JOIN host_phage_link l
				ON p.phage_taxid = l.phage_taxid 
				LEFT JOIN host h
				ON l.host_taxid = h.host_taxid 
				LEFT JOIN host_taxonomy t
				ON h.host_taxid = t.host_taxid
				LEFT JOIN p_genus g
				ON p.p_genus_taxid = g.p_genus_taxid
				LEFT JOIN p_family f
				ON g.p_family_taxid = f.p_family_taxid
				LEFT JOIN p_order o
				ON f.p_order_taxid = o.p_order_taxid
				WHERE p.phage_species like '%$text%'
				;";
			 }
			 elseif ($option == "phage_taxid") {
			 	$query = "SELECT * 				
				FROM phage p
				LEFT JOIN host_phage_link l
				ON p.phage_taxid = l.phage_taxid 
				LEFT JOIN host h
				ON l.host_taxid = h.host_taxid 
				LEFT JOIN host_taxonomy t
				ON h.host_taxid = t.host_taxid
				LEFT JOIN p_genus g
				ON p.p_genus_taxid = g.p_genus_taxid
				LEFT JOIN p_family f
				ON g.p_family_taxid = f.p_family_taxid
				LEFT JOIN p_order o
				ON f.p_order_taxid = o.p_order_taxid
				WHERE p.phage_taxid = $text
				;";
			 }
			 elseif ($option == "host_taxid") {
			 	$query = "SELECT * 
				FROM phage p			
				LEFT JOIN host_phage_link l
				ON l.phage_taxid = p.phage_taxid
				LEFT JOIN host h
				ON l.host_taxid = h.host_taxid
				LEFT JOIN host_taxonomy t
				ON h.host_taxid = t.host_taxid
				LEFT JOIN p_genus g
				ON p.p_genus_taxid = g.p_genus_taxid
				LEFT JOIN p_family f
				ON g.p_family_taxid = f.p_family_taxid
				LEFT JOIN p_order o
				ON f.p_order_taxid = o.p_order_taxid
				WHERE h.host_taxid = $text
				;";
			 }
			 elseif ($option == "pg_name") {
			  	$query = "SELECT *
				FROM phage_gene2 g
				LEFT JOIN gene_ref_link2 l
				ON g.pg_id = l.pg_id
				LEFT JOIN ref2 r
				ON l.ref_id = r.ref_id
				LEFT JOIN reference_type2 t
				ON r.ref_type_id = t.ref_type_id
				WHERE g.pg_name like '%$text%'
				;";
			}
			elseif ($option == "pg_accession_number") {
				$query = "SELECT *
				FROM phage_gene2 g
				LEFT JOIN gene_ref_link2 l
				ON g.pg_id = l.pg_id
				LEFT JOIN ref2 r
				ON l.ref_id = r.ref_id
				LEFT JOIN reference_type2 t
				ON r.ref_type_id = t.ref_type_id
				WHERE g.pg_accession_number like '%$text%'
				;";
			}
			 $buscar = array ("phage_species","phage_genome_comp_status","phage_nucleic_acid", "phage_topology", "phage_genome_size", "phage_gc_content", "phage_nucleotide_sequence", "phage_capsid_type_lipid", "phage_capsid_type_polysac", "phage_capsid_diameter", "phage_lipid_vesicle", "phage_coding_percentage", "phage_original_status", "phage_taxid", "host_genome_comp_status", "host_gram_status", "host_ncbi_link", "p_genus_name", "p_family_name", "p_order_name", "p_order_description", "host_taxid", "subspecies_name", "species_name", "species_subgroup_name", "species_group_name", "genus_name", "subfamily_name", "family_name" , "suborder_name", "order_name", "subclass_name", "class_name", "subphylum_name", "phylum_name", "pg_name", "pg_sequence", "pg_pos_left", "pg_posright", "pg_strand", "pg_accession_number", "pg_product_name", "pg_product_type", "pg_protein_sequence", "ref_accession_number", "ref_description", "ref_type", "ref_type_description_site", "ref_type_link");
			 
		     $rs = $db -> Execute($query) or die($db -> 	ErrorMsg() . " " . __LINE__);
			if ($rs->EOF) {
				echo "<strong>There were no results with your query. Please check your input or visit the support page.</strong><br>";
			}
			else {
				 echo "<strong>Go To Result Number: </strong>";
				 while(!$rs -> EOF) {
					$cont ++;
					echo "<a href=\"#res$cont\" target=\"_self\">$cont</a>&nbsp;";
					$rs->MoveNext();
				}
				echo "<br><br>";
				$rs->MoveFirst();
				$total = $cont;
				 $cont = 0;
				 //$rs2 = $db -> Execute($query) or die($db -> 	ErrorMsg() . " " . __LINE__);
				 while($row = $rs -> FetchRow()) {
					$cont ++;
					echo "<br><br><br><strong>Result $cont<a name=\"res$cont\"></a></strong>&nbsp;&nbsp;<a href=\"#top\" target=\"_self\">Top</a><br>";
					foreach ($buscar as $actual) { 
						$result = $row[$actual];
						if ($result) {
							if ($actual == "phage_nucleotide_sequence") {
								//echo "<br><strong>phage_nucleotide_sequence</strong><br><span class=\"style4\">";
								$rand = rand(1,10000);
								$archivo = fopen ("download/$text$rand.txt","w");
								echo "<br><strong>phage_nucleotide_sequence</strong><br><a href=\"download/$text$rand.txt\" target=\"_self\">Download</a>&nbsp;(use right click and save as)<br>";
								for ($length=0; $length <= strlen($result); $length+=60) {
									$partial = substr($result,$length,60);
									fwrite ($archivo, "$partial\n");
									//echo "$partial<br>";
								}
								//echo "</span>";
								fclose ($archivo);
							}
							elseif ($actual == "pg_sequence") {
								$rand = rand(1,10000);
								$archivo = fopen ("download/pgs$text$rand.txt","w");
								echo "<br><strong>pg_sequence</strong><br><a href=\"download/pgs$text$rand.txt\" target=\"_self\">Download</a>&nbsp;(use right click and save as)<br>";
								for ($length=0; $length <= strlen($result); $length+=60) {
									$partial = substr($result,$length,60);
									fwrite ($archivo, "$partial\n");
								}
								fclose ($archivo);
							}
							elseif ($actual == "pg_protein_sequence") {
								$rand = rand(1,10000);
								$archivo = fopen ("download/pps$text$rand.txt","w");
								echo "<br><strong>pg_protein_sequence</strong><br><a href=\"download/pps$text$rand.txt\" target=\"_self\">Download</a>&nbsp;(use right click and save as)<br>";
								for ($length=0; $length <= strlen($result); $length+=60) {
									$partial = substr($result,$length,60);
									fwrite ($archivo, "$partial\n");
								}
								fclose ($archivo);
							}
							elseif ($actual == "ref_type_link") {
								echo "<br><strong>ref_type_link</strong><br><a href=\"$result\" target=\"self\">$result</a><br>";
							}
							elseif ($actual == "ref_type_description") {
								echo "<br><p align=\"justify\">$actual</strong></p><br>$result<br>";
							}
							else {
								echo "<br><strong>$actual</strong><br>$result<br>";
							}
						}
					}
					//print_r ($row);
					//echo " alternativa<br>";
					//array_push($result,$row["$buscar"]);
				 }
			}
				 
				 ?>
               <br>
               <br></td></tr>
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
