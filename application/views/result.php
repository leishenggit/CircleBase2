<div class="container-fluid"> 
<div class="col-md-10 col-md-offset-1">

<br><br>

<?php if ($assembly == 'hg19' or $assembly == 'hg38'): ?>
<h3 >Search result for <span style='color:red;' class="ellipsis"><?php echo $item; ?></span> in <i>Homo_sapiens</i></h3>
<hr style='border:2px solid black'>
<table class='table table-bordered table-striped table-hover' id='batch-result-table' style="width:100%">
<thead>
<tr class='danger'>
<th>eccDNA_id</th>
<th>Chr_hg19</th>
<th>Start_hg19</th>
<th>End_hg19</th>
<th>Length</th>
<th>Score</th>
<th>Chr_hg38</th>
<th>Start_hg38</th>
<th>End_hg38</th>
<th>Cell line</th>
<th>Tissue</th>
<th>Sample type</th>
<th>Motif</th>
<th>Library type</th>
<th>Validation</th>
<th>Pubmed</th>
<th>Public date</th>
<th>Annotation</th>
<th>Detailed_annotation</th>
<th>Distance to TSS</th>
<th>Nearest promoterID</th>
<th>NCBI geneID</th>
<th>Nearest Unigene</th>
<th>Nearest Refseq</th>
<th>Nearest Ensembl</th>
<th>Gene name</th>
<th>Gene alias</th>
<th>Gene description</th>
<th>Gene type</th>
</tr>
</thead>
<?php
foreach ($query->result_array() as $row){
	$id = $row["ecc_id"];
	echo "<tr>";
	echo "<td><a href='ajax/detail/$id' target='_blank'>$id</a></td>";
	echo "<td>". $row['chr_hg19'] ."</td>";
	echo "<td>". $row['start_hg19'] ."</td>";
	echo "<td>". $row['end_hg19'] ."</td>";
	echo "<td>". $row['Seq_length'] ."</td>";
	echo "<td>". $row['Score'] ."</td>";
	echo "<td>". $row['chr_hg38'] ."</td>";
	echo "<td>". $row['start_hg38'] ."</td>";
	echo "<td>". $row['end_hg38'] ."</td>";
	echo "<td>". $row['cell_line'] ."</td>";
	echo "<td>". $row['tissue'] ."</td>";
	echo "<td>". $row['sample_type'] ."</td>";
	$value = $row['motif_url_1'];
	if($value == "NA")
		echo "<td>No result</td>";
	else
		echo "<td><a href='ajax/motif/$value' target='_blank'>Motif</a></td>";
	echo "<td>". $row['library_type'] ."</td>";
	echo "<td>". $row['validation'] ."</td>";
	$value = $row['pubmed_id'];
	echo "<td><a href='https://pubmed.ncbi.nlm.nih.gov/$value' target='_blank'>$value</a></td>";
	echo "<td>". $row['public_date'] ."</td>";
	echo "<td>". $row['Annotation'] ."</td>";
	echo "<td>". $row['Detailed_Annotation'] ."</td>";
	echo "<td>". $row['Distance_to_TSS'] ."</td>";
	echo "<td>". $row['Nearest_PromoterID'] ."</td>";
	$value = $row['Entrez_ID'];
	echo "<td><a href='https://www.ncbi.nlm.nih.gov/gene/?term=$value' target='_blank'>$value</a></td>";
	echo "<td>". $row['Nearest_Unigene'] ."</td>";
	echo "<td>". $row['Nearest_Refgene'] ."</td>";
	$value = $row['Nearest_Ensembl_gene'];
	echo "<td><a href='http://www.ensembl.org/Homo_sapiens/geneview?gene=$value' target='_blank'>$value</a></td>";
	echo "<td>". $row['Gene_Name'] ."</td>";
	echo "<td>". $row['Gene_Alias'] ."</td>";
	echo "<td>". $row['Gene_Description'] ."</td>";
	echo "<td>". $row['Gene_Type'] ."</td>";
    echo "</tr>";
}

?>
</table>

<?php elseif ($assembly === 'mm10'): ?>
<h3 >Search result for <span style='color:red;'  class="ellipsis"><?php echo $item; ?></span> in <i>Mus_musculus</i></h3>
<hr style='border:2px solid black'>
<table class='table table-bordered table-striped table-hover' id='batch-result-table' style="width:100%">
<thead>
<tr class='danger'>
<th>eccDNA_id</th>
<th>Chr_mm10</th>
<th>Start_mm10</th>
<th>End_mm10</th>
<th>Length</th>
<th>Score</th>
<th>Cell line</th>
<th>Tissue</th>
<th>Sample type</th>
<th>Motif</th>
<th>Library type</th>
<th>Validation</th>
<th>Pubmed</th>
<th>Public date</th>
<th>Annotation</th>
<th>Detailed_annotation</th>
<th>Distance to TSS</th>
<th>Nearest promoterID</th>
<th>NCBI geneID</th>
<th>Nearest Unigene</th>
<th>Nearest Refseq</th>
<th>Nearest Ensembl</th>
<th>Gene name</th>
<th>Gene alias</th>
<th>Gene description</th>
<th>Gene type</th>
</tr>
</thead>
<?php
foreach ($query->result_array() as $row){
	$id = $row["ecc_id"];
	echo "<tr>";
	echo "<td><a href='ajax/detail_mouse/$id' target='_blank'>$id</a></td>";
	echo "<td>". $row['chr_mm10'] ."</td>";
	echo "<td>". $row['start_mm10'] ."</td>";
	echo "<td>". $row['end_mm10'] ."</td>";
	echo "<td>". $row['Seq_length'] ."</td>";
	echo "<td>". $row['Score'] ."</td>";
	echo "<td>". $row['cell_line'] ."</td>";
	echo "<td>". $row['tissue'] ."</td>";
	echo "<td>". $row['sample_type'] ."</td>";
	$value = $row['motif_url_1'];
	if($value == "NA")
		echo "<td>No result</td>";
	else
		echo "<td><a href='ajax/motif/$value' target='_blank'>Motif</a></td>";
	echo "<td>". $row['library_type'] ."</td>";
	echo "<td>". $row['validation'] ."</td>";
	$value = $row['pubmed_id'];
	echo "<td><a href='https://pubmed.ncbi.nlm.nih.gov/$value' target='_blank'>$value</a></td>";
	echo "<td>". $row['public_date'] ."</td>";
	echo "<td>". $row['Annotation'] ."</td>";
	echo "<td>". $row['Detailed_Annotation'] ."</td>";
	echo "<td>". $row['Distance_to_TSS'] ."</td>";
	echo "<td>". $row['Nearest_PromoterID'] ."</td>";
	$value = $row['Entrez_ID'];
	echo "<td><a href='https://www.ncbi.nlm.nih.gov/gene/?term=$value' target='_blank'>$value</a></td>";
	echo "<td>". $row['Nearest_Unigene'] ."</td>";
	echo "<td>". $row['Nearest_Refgene'] ."</td>";
	$value = $row['Nearest_Ensembl_gene'];
	echo "<td><a href='http://www.ensembl.org/Mus_musculus/geneview?gene=$value' target='_blank'>$value</a></td>";
	echo "<td>". $row['Gene_Name'] ."</td>";
	echo "<td>". $row['Gene_Alias'] ."</td>";
	echo "<td>". $row['Gene_Description'] ."</td>";
	echo "<td>". $row['Gene_Type'] ."</td>";
    echo "</tr>";
}

?>
</table>
<?php endif; ?>
<br>
<br>
<p class="hidden-info"><?php echo $sql;?></p>
</div>
</div>
