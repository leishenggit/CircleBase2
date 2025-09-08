<p class="section-title"><button class="btn btn-default"><span class="glyphicon glyphicon-minus"></span></button>&nbsp;&nbsp;HM(histone modification) from ChIP-Atlas</p>
<table class='table table-bordered table-striped detail-table'><thead><tr class="danger">
<th>Chromosome</th>
<th>Start</th>
<th>End</th>
<th>Experimental_ID</th>
<th>Qvalue(-10*log10qvalue)</th>
<th>Genome assembly</th>
<th>Track_type_class</th>
<th>Antibody</th>
<th>Cell_type_class</th>
<th>Cell_type</th>
</tr></thead><tbody>
<?php
if(isset($query)){
    foreach ($query->result_array() as $row){
        echo "<tr>";
        foreach($row as  $key => $value) echo "<td>$value</td>";
        echo "</tr>";
    }
}
?>
</tbody>
</table>

