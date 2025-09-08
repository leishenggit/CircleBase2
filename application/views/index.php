<div id="banner" style="padding-top:40px;padding-bottom:40px;margin-top:-10px; background-image: url(assets/img/background-1.png);background-repeat: no-repeat;background-size:cover;">
<div class="container-fluid">
<div class="col-md-10 col-md-offset-1">
<p id="slogan" style="font-size:35px;color:rgb(216,164,6); margin-left:40px">CircleBase V2: An Integrated Platform for eccDNA Annotation Across Cancers and Species
</p>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
</div>
</div>

<div class="container-fluid">
	<br>
	<br>
	<div class="col-md-10 col-md-offset-1">
		<form class="form" role="form" class="quick" action="<?php echo site_url('search/quick')?>" method="POST">
            <div class="form-group col-xs-2 col-sm-2 col-md-2">
                <select class="form-control" id="organism" name="organism">
                <option value="human">Human</option>
                <option value="mouse">Mouse</option>
                </select>
            </div>
			<div class="form-group col-xs-2 col-sm-2 col-md-2">
                <select class="form-control" id="assembly" name="assembly">
                <option value="hg19">hg19</option>
                <option value="hg38">hg38</option>
                </select>
            </div>
			<div class="form-group col-xs-8 col-sm-8 col-md-8">
				<div class="input-group">
				<input class="form-control" id="item" name="item" type="text" placeholder="gene symbol, genomic region, eccDNA_id" >
				<span class="input-group-btn"> <button class="btn btn-danger" type="submit" title="Click to search"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span> </button> </span> 
				</div> 
				examples&nbsp;:&nbsp;
				<a href="javascript:void(0);" class="tip">EGFR</a> &nbsp;/&nbsp;
				<a href="javascript:void(0);" class="tip">MYC</a> &nbsp;/&nbsp;
                <a href="javascript:void(0);" class="tip">chr7-52165741-53138302</a> &nbsp;/&nbsp;
				<a href="javascript:void(0);" class="tip">hg38_man_ID440422</a> &nbsp;/&nbsp;
				<a href="javascript:void(0);" class="tip">mm10_man_ID1139503</a>
			</div>
		</form>
		<br>
		<br>
		<br>
		<div class='row'>
		<div class="col-md-6">
		<h2>Welcome to CircleBase V2</h2>
		<hr style="border: 2px solid black">
		<p class="lead text-justify">
Here, we have developed the upgraded CircleBase V2, a novel database extending its scope to provide comprehensive interpretation of extrachromosomal circular DNAs (eccDNAs) in both human and mouse genomes. Building upon the first version, CircleBase V2 incorporates two major advancements: cross-species eccDNA annotation and junction sites motif analysis. CircleBase V2 now integrates over 10,359,862 human eccDNAs (a 17-fold increase from the first version) and newly added 1,221,834 mouse eccDNAs from more than 20 mouse tissue/cell types.
The database identifies putative functional eccDNAs by combining computational predictions, manual curations, and a refined scoring system. The junction sites motif analysis helps uncover sequence patterns at eccDNA formation sites, shedding light on their biogenesis mechanisms. This platform facilitates the identification of eccDNA-mediated regulatory networks in both human and mouse systems, supporting research into cancer evolution, developmental biology, and biomark identification. We are dedicated to expanding organismal coverage and integrating real-time sequencing data to keep CircleBase at the forefront of eccDNA research.
		</p>
		<h2>Motivation of CircleBase V2</h2>
		<hr style="border:2px solid black">
		<p class="lead text-justify">
		Extrachromosomal circular DNA (eccDNA) has emerged as a pivotal player in genomic plasticity, with implications spanning cancer evolution, developmental biology, and beyond. Building on the foundational work of CircleBase V1, the upgraded CircleBase V2 addresses two critical knowledge gaps that hinder the translational potential of eccDNA research.
		First, the biogenesis of eccDNA—particularly the sequence determinants governing junction sites selection—remains enigmatic. Existing tools cannot systematically analyze junction sites motifs, impeding insights into how genomic instability drives eccDNA formation.
		Secondly, the exponential growth of eccDNA datasets (e.g., CircleBase V2 houses 17x more human eccDNAs than V1) demands advanced annotation frameworks. Without carefully curated and cross-referenced data, researchers face considerable challenges in distinguishing actual eccDNAs from genomic noises such as tandem duplications. By enabling systematic analysis of junction site motifs and curating massive cross-species datasets with a refined scoring system, CircleBase V2 empowers researchers to identify functionally relevant eccDNAs.</p>
		</div>

		<div class="col-md-6">
		<h2>Workflow of CircleBase V2</h2>
		<hr style="border:2px solid black">
		<img src="assets/img/workflow.png" class="img-responsive" alt="pipeline">
		</div>
		</div>
		
<h2>Features of CircleBase V2</h2>
<hr style="border: 2px solid black">
<p class="lead text-justify">Enhanced data resource and functional analysis:</p>
<ul class="lead text-justify">
<li>Mouse eccDNA ecosystem: Comprehensive annotations across 20+ tissue/cell types, enabling cross-species comparative genomics.</li>
<li>Junction sites motif analysis: Cutting-edge motif discovery algorithms uncover sequence signatures at junction sites, linking genomic context to eccDNA formation.</li>
<li>Enhanced functional prioritization: A refined scoring system by incorporating two critical normalization steps: normalization of eccDNA length and chromosome-specific annotation element density to prioritize high-impact eccDNAs.</li>
</ul>
<p class="lead text-justify">This platform empowers researchers to:</p>
<ul class="lead text-justify">
<li>Decipher conserved regulatory roles of eccDNAs between humans and model organisms.</li>
<li>Predict functional consequences of junction sites motifs in cancer and developmental disorders.</li>
<li>Validate therapeutic targets by leveraging cross-species validation pipelines.</li>
</ul>
<p class="lead text-justify">By bridging species boundaries and mechanistic gaps, CircleBase V2 accelerates the translation of eccDNA biology into clinical applications, from non-invasive diagnostics to precision therapeutics.</p>

		<!--<h2>Publication detail</h2>
		<hr style="border:2px solid black">
		<p><a href="https://academic.oup.com/nar/article/4588107" target="_blank" class="not-new-window">CircleBase: an integrated genetic and clinical database for coding variants in the human genome.</a> 2018. Nucleic Acids Research.</p>
		<br><br>-->
	</div>

</div>
