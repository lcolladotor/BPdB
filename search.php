
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
    </form>