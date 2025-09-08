<?php 
ini_set ('memory_limit', '1G');
//error report
//error_reporting(0);
?>
<div class="container-fluid">
<div style="margin:0 40px">
<br>
<br>

<style>
.mytooltip{
    font-family: simsun;
    font-size: 16px;
    width: 300px;
    height: auto;
    position: absolute;
    text-align: center;
    padding: 5px;
    color:white;
    background-color: black;
}
</style>

<div class="panel panel-success">
<div class="panel-heading">
<h3>Details for <span class="keyword" id='keyword'><?php echo $eccDNA_id;?></span></h3>
</div>
<div class="panel-body">

<ul class="nav nav-tabs myTab">
 <li class="active"><a href="#Summary" data-toggle="tab">Summary</a></li>
 <li><a href="#Regulatory" data-toggle="tab">Regulatory elements</a></li>
 <li><a href="#Chromatin_access" data-toggle="tab">Chromatin access</a></li>
 <li><a href="#Epigenetic_regulation" data-toggle="tab">Epigenetic regulations</a></li>
 <li><a href="#Genetic_variants" data-toggle="tab">Genetic variants</a></li>
</ul>

<div class="tab-content" id="outer-tab-content">

<div class="tab-pane fade in active" id="Summary">
<hr style="border:2px solid black">
<div id='hits_picture' class="col-md-6 col-lg-4" style="min-width:550px"></div>
<div id='raw_score_picture' class="col-md-6 col-lg-4" style="min-width:550px"></div>
<div id='normalized_score_picture' class="col-md-6 col-lg-4" style="min-width:550px"></div>
</div>


<div class="tab-pane fade" id="Regulatory">
<hr style="border:2px solid black">
<div class='col-md-6'>
<br>
<br>
<ul class="nav nav-tabs myTab">
 <li class="active"><a href="#Regulatory_element_dbSUPER_mouse" data-toggle="tab">dbSUPER</a></li>
 <li><a href="#Regulatory_element_EnhancerAtlas_mouse" data-toggle="tab">EnhancerAtlas</a></li>
 <li><a href="#Regulatory_element_SEA_mouse" data-toggle="tab">SEA</a></li>
 <li><a href="#Regulatory_element_ChromHMM_mouse" data-toggle="tab">ChromHMM</a></li>
 <li><a href="#Regulatory_element_cCRE_mouse" data-toggle="tab">SCREEN</a></li>
</ul>

<div class="tab-content">
<div id='Regulatory_element_dbSUPER_mouse' class='tab-pane fade in active detail_div'>
<p class="hidden-info"><?php echo $Regulatory_element_dbSUPER_mouse;?></p>
</div>
<div id='Regulatory_element_EnhancerAtlas_mouse' class='tab-pane fade detail_div'>
<p class="hidden-info"><?php echo $Regulatory_element_EnhancerAtlas_mouse;?></p>
</div>
<div id='Regulatory_element_SEA_mouse' class='tab-pane fade detail_div'>
<p class="hidden-info"><?php echo $Regulatory_element_SEA_mouse;?></p>
</div>
<div id='Regulatory_element_ChromHMM_mouse' class='tab-pane fade detail_div'>
<p class="hidden-info"><?php echo $Regulatory_element_ChromHMM_mouse;?></p>
</div>
<div id='Regulatory_element_cCRE_mouse' class='tab-pane fade detail_div'>
<p class="hidden-info"><?php echo $Regulatory_element_cCRE_mouse;?></p>
</div>
</div>
</div>
<div class='col-md-6' id='Regulatory_element_biocircos'>biocircos here</div>
</div>


<div class="tab-pane fade"  id="Chromatin_access">
<hr style="border:2px solid black">
<div class='col-md-6'>
<br>
<br>
<ul class="nav nav-tabs myTab">
 <li  class="active"><a href="#Chromatin_access_ChIP_Atlas_ATAC_seq" data-toggle="tab">ChIP-Atlas ATAC-seq</a></li>
 <li  ><a href="#Chromatin_access_ChIP_Atlas_DNase_seq" data-toggle="tab">ChIP-Atlas DNase-seq</a></li>
</ul>

<div class="tab-content">
<div id='Chromatin_access_ChIP_Atlas_ATAC_seq' class='tab-pane fade in active detail_div'>
<p class="hidden-info"><?php echo $Chromatin_access_ChIP_Atlas_ATAC_seq;?></p>
</div>
<div id='Chromatin_access_ChIP_Atlas_DNase_seq' class='tab-pane fade detail_div'>
<p class="hidden-info"><?php echo $Chromatin_access_ChIP_Atlas_DNase_seq;?></p>
</div>
</div>
</div>

<div class='col-md-6' id='Chromatin_access_biocircos'>biocircos here</div>
</div>


<div class="tab-pane fade" id="Epigenetic_regulation">
<hr style="border:2px solid black">
<div class='col-md-6'>
<br>
<br>
<ul class="nav nav-tabs myTab">
 <li class="active"><a href="#Epigenetic_regulation_ChIP_Atlas_TFBS" data-toggle="tab">ChIP-Atlas TFBS</a></li>
 <li><a href="#Epigenetic_regulation_ChIP_Atlas_HM" data-toggle="tab">ChIP-Atlas HM</a></li>
</ul>

<div class="tab-content">
<div id='Epigenetic_regulation_ChIP_Atlas_TFBS' class='tab-pane fade in active detail_div'>
<p class="hidden-info"><?php echo $Epigenetic_regulation_ChIP_Atlas_TFBS;?></p>
</div>
<div id='Epigenetic_regulation_ChIP_Atlas_HM' class='tab-pane fade detail_div'>
<p class="hidden-info"><?php echo $Epigenetic_regulation_ChIP_Atlas_HM;?></p>
</div>
</div>
</div>

<div class='col-md-6' id='Epigenetic_regulation_biocircos'>biocircos here</div>
</div>

<div class="tab-pane fade" id="Genetic_variants">
<hr style="border:2px solid black">
<br>
<br>
<ul class="nav nav-tabs myTab">
 <li  class="active"><a href="#dbSNP_mouse" data-toggle="tab">dbSNP</a></li>
</ul>

<div class="tab-content">
<div id='dbSNP_mouse'  class='tab-pane fade in active detail_div'>
<p class="hidden-info"><?php echo $dbSNP_mouse;?></p>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
<p class="hidden-info" id='eccDNA_region'><?php echo $region;?></p>
</div>
