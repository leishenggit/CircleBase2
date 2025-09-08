<p class="section-title"><button class="btn btn-default"><span class="glyphicon glyphicon-minus"></span></button>&nbsp;&nbsp;Regulatory element from EnhancerAtlas</p>
<table class='table table-bordered table-striped detail-table'><thead><tr class="danger">
<th>Chr_enhancer</th>
<th>Start_enhancer</th>
<th>End_enhancer</th>
<th>Target gene id</th>
<th>Target gene symbol</th>
<th>Target gene chromosome</th>
<th>TSS of target gene</th>
<th>Score of the enhancer-gene interaction</th>
<th>Cell line</th>
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