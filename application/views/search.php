<div id="banner" style="padding-top:20px;padding-bottom:20px;margin-top:-10px;background-color:rgb(24,37,46);color:#F8F8F8">
<div class="container-fluid">
<div class="col-md-10 col-md-offset-1">
<p id="slogan" style="font-size:20px;color:rgb(216,164,6);">Search</p>
<p class="lead">Choosing a query type, select some filters and then paste terms to search</p>
</div>
</div>
</div>
<br><br>

<div class="container-fluid">
	<div class="col-md-10 col-md-offset-1">
	<h2>Search for eccDNA derived from human</h2>
	<hr style="border: 2px solid black">
	<form class="form-inline" id="batch-search" action="<?php echo site_url('search/batch_search')?>" method="POST">
        <h4>Query by</h4>
		<div class="form-group">
                <label><input type="radio" name="search-type" value="gene">gene symbol&nbsp;&nbsp;</label><a href="javascript:void(0);" name="gene" class="examples">example</a><input name="EGFR;;PAX8;;CDK4;;AKT3" type="hidden"/>&nbsp;&nbsp;
                <label><input type="radio" name="search-type" value="region">location (hg19)&nbsp;&nbsp;</label><a href="javascript:void(0);" name="region" class="examples">example</a><input name="chr14-21853358-21924282;;chrX-61882071-62663252;;chr14-61953046-87867770" type="hidden"/>&nbsp;&nbsp;
                <label><input type="radio" name="search-type" value="region_hg38">location (hg38)&nbsp;&nbsp;</label><a href="javascript:void(0);" name="region_hg38" class="examples">example</a><input name="chr14-21853358-21924282;;chrX-61882071-62663252;;chr14-61953046-87867770" type="hidden"/>&nbsp;&nbsp;
                <label><input type="radio" name="search-type" value="eccDNA">eccDNA ID&nbsp;&nbsp;</label><a href="javascript:void(0);" name="eccDNA" class="examples">example</a><input name="ecc228899;;ecc592934;;ecc395028;;ecc600533;;hg38_man_ID30;;hg19_man_ID1" type="hidden"/>&nbsp;&nbsp;
                <label><input type="radio" name="search-type" value="ncbi_gene_id">NCBI gene ID&nbsp;&nbsp;</label><a href="javascript:void(0);" name="ncbi_gene_id" class="examples">example</a><input name="1956;;4609;;595;;1019" type="hidden"/>&nbsp;&nbsp;
                <label><input type="radio" name="search-type" value="ensembl_gene_id">Ensembl gene ID&nbsp;&nbsp;</label><a href="javascript:void(0);" name="ensembl_gene_id" class="examples">example</a><input name="ENSG00000117020;;ENSG00000110092;;ENSG00000125618;;ENSG00000136997" type="hidden"/>&nbsp;&nbsp;
        </div>
        <h4>Filter by</h4>
        <div class="form-group">
            <label for="">cell line</label>
            <select class="form-control" id="cell_line" name="cell_line">
            <option value="All">All</option>
<option value="A549">A549</option>
<option value="BGC-823">BGC-823</option>
<option value="BT-474 M1">BT-474 M1</option>
<option value="BT70">BT70</option>
<option value="C4-2">C4-2</option>
<option value="C4-2B">C4-2B</option>
<option value="CA-718">CA-718</option>
<option value="COLO 205">COLO 205</option>
<option value="COLO 320DM">COLO 320DM</option>
<option value="DLD-1">DLD-1</option>
<option value="DU145">DU145</option>
<option value="EKVX">EKVX</option>
<option value="ES2">ES2</option>
<option value="FaDu">FaDu</option>
<option value="FaDu-DDP">FaDu-DDP</option>
<option value="GBM39">GBM39</option>
<option value="GBM6">GBM6</option>
<option value="GES1">GES1</option>
<option value="GSC11">GSC11</option>
<option value="H23">H23</option>
<option value="H322M">H322M</option>
<option value="H460">H460</option>
<option value="H522">H522</option>
<option value="HCC1569">HCC1569</option>
<option value="HCC827">HCC827</option>
<option value="HF-2354">HF-2354</option>
<option value="HF-2927">HF-2927</option>
<option value="HF-3016">HF-3016</option>
<option value="HF-3177">HF-3177</option>
<option value="HK296">HK296</option>
<option value="HK301">HK301</option>
<option value="HK359">HK359</option>
<option value="HK423">HK423</option>
<option value="HL-60">HL-60</option>
<option value="HL7702">HL7702</option>
<option value="HOP62">HOP62</option>
<option value="HOP92">HOP92</option>
<option value="HT29">HT29</option>
<option value="HeLaS3">HeLaS3</option>
<option value="HepG2">HepG2</option>
<option value="K562">K562</option>
<option value="LNCaP">LNCaP</option>
<option value="Leukocytes">Leukocytes</option>
<option value="M249">M249</option>
<option value="MB002">MB002</option>
<option value="MB211FH">MB211FH</option>
<option value="MB411FH">MB411FH</option>
<option value="MCF12A">MCF12A</option>
<option value="MCF7">MCF7</option>
<option value="MDA-MB-231">MDA-MB-231</option>
<option value="MDA-MB-435">MDA-MB-435</option>
<option value="MDA-MB-453">MDA-MB-453</option>
<option value="NA">NA</option>
<option value="NCI-ADR-RES">NCI-ADR-RES</option>
<option value="NCI-H460">NCI-H460</option>
<option value="OVCAR-3">OVCAR-3</option>
<option value="OVCAR-4">OVCAR-4</option>
<option value="OVCAR-5">OVCAR-5</option>
<option value="OVCAR-8">OVCAR-8</option>
<option value="Ovarian cancer cell line">Ovarian cancer cell line</option>
<option value="PANC-1">PANC-1</option>
<option value="PC-3">PC-3</option>
<option value="PC-9">PC-9</option>
<option value="RCMB20">RCMB20</option>
<option value="RCMB28">RCMB28</option>
<option value="RPMI-8226">RPMI-8226</option>
<option value="RXF-393">RXF-393</option>
<option value="SF268">SF268</option>
<option value="SF295">SF295</option>
<option value="SF539">SF539</option>
<option value="SK-MEL-2">SK-MEL-2</option>
<option value="SK-MEL-28">SK-MEL-28</option>
<option value="SN12C">SN12C</option>
<option value="SW620">SW620</option>
<option value="T47D">T47D</option>
<option value="U-251">U-251</option>
<option value="U-937">U-937</option>
<option value="UACC-1598-4">UACC-1598-4</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        
        <div class="form-group">
            <label for="">tissue</label>
            <select class="form-control" id="tissue" name="tissue">
                <option value="All">All</option>
<option value="Biliary Tract">Biliary Tract</option>
<option value="Bladder">Bladder</option>
<option value="Blood">Blood</option>
<option value="Bone">Bone</option>
<option value="Brain">Brain</option>
<option value="Breast">Breast</option>
<option value="Cervix">Cervix</option>
<option value="Colon">Colon</option>
<option value="Colorectal">Colorectal</option>
<option value="Epithelium">Epithelium</option>
<option value="Esophagus">Esophagus</option>
<option value="Eye">Eye</option>
<option value="Head and Neck">Head and Neck</option>
<option value="Hypopharynx">Hypopharynx</option>
<option value="Kidney">Kidney</option>
<option value="Lens Capsule">Lens Capsule</option>
<option value="Liver">Liver</option>
<option value="Lung">Lung</option>
<option value="Muscle">Muscle</option>
<option value="Oral Cavity">Oral Cavity</option>
<option value="Ovary">Ovary</option>
<option value="Pancreas">Pancreas</option>
<option value="Placenta">Placenta</option>
<option value="Plasma">Plasma</option>
<option value="Prostate">Prostate</option>
<option value="Skin">Skin</option>
<option value="Soft Tissue ">Soft Tissue </option>
<option value="Sperm">Sperm</option>
<option value="Stomach">Stomach</option>
<option value="Subcutaneous Adipose">Subcutaneous Adipose</option>
<option value="Urine">Urine</option>
<option value="Uterus">Uterus</option>
            </select>
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="">sample type</label>
            <select class="form-control" id="sample_type" name="sample_type">
            <option value="All">All</option>
<option value="Adipose Tissue">Adipose Tissue</option>
<option value="B-cell Lymphoma Tissue">B-cell Lymphoma Tissue</option>
<option value="Biliary Tract Cancer Tissue">Biliary Tract Cancer Tissue</option>
<option value="Bladder Cancer Tissue">Bladder Cancer Tissue</option>
<option value="Blood Tissue">Blood Tissue</option>
<option value="Brain Tissue">Brain Tissue</option>
<option value="Breast Cancer Brain Metastasis Tissue">Breast Cancer Brain Metastasis Tissue</option>
<option value="Breast Cancer Cell Line">Breast Cancer Cell Line</option>
<option value="Breast Cancer Tissue">Breast Cancer Tissue</option>
<option value="Breast Carcinoma Cell Line">Breast Carcinoma Cell Line</option>
<option value="Breast Epithelial Cell Line">Breast Epithelial Cell Line</option>
<option value="Breast Tissue">Breast Tissue</option>
<option value="Cervical Adenocarcinoma Cell Line">Cervical Adenocarcinoma Cell Line</option>
<option value="Cervical Cancer Tissue">Cervical Cancer Tissue</option>
<option value="Chronic Myeloid Leukemia Cell Line">Chronic Myeloid Leukemia Cell Line</option>
<option value="Cisplatin_resistant_hypopharyngeal_squamous_cell_carcinoma_cell_line">Cisplatin_resistant_hypopharyngeal_squamous_cell_carcinoma_cell_line</option>
<option value="Colon Cancer Cell Line">Colon Cancer Cell Line</option>
<option value="Colon Cancer Tissue">Colon Cancer Tissue</option>
<option value="Colorectal Adenocarcinoma Cell Line">Colorectal Adenocarcinoma Cell Line</option>
<option value="Colorectal Adenocarcinoma Epithelial Cell Line">Colorectal Adenocarcinoma Epithelial Cell Line</option>
<option value="Colorectal Cancer Tissue">Colorectal Cancer Tissue</option>
<option value="Endometrial Cancer Tissue">Endometrial Cancer Tissue</option>
<option value="Epithelium_tissue">Epithelium_tissue</option>
<option value="Esophageal Cancer Tissue">Esophageal Cancer Tissue</option>
<option value="Ewing Sarcoma Tissue">Ewing Sarcoma Tissue</option>
<option value="Gastric Cancer (Adjacent Normal Tissue)">Gastric Cancer (Adjacent Normal Tissue)</option>
<option value="Gastric Cancer Cell Line">Gastric Cancer Cell Line</option>
<option value="Gastric Cancer Tissue">Gastric Cancer Tissue</option>
<option value="Gastric Mucosal Cell Line">Gastric Mucosal Cell Line</option>
<option value="Glioblastoma Cell Line">Glioblastoma Cell Line</option>
<option value="Glioblastoma Multiforme Cell Line">Glioblastoma Multiforme Cell Line</option>
<option value="Glioblastoma Stem Cell">Glioblastoma Stem Cell</option>
<option value="Glioblastoma Tissue">Glioblastoma Tissue</option>
<option value="Head and Neck Cancer Tissue">Head and Neck Cancer Tissue</option>
<option value="Healthy Muscle Tissue">Healthy Muscle Tissue</option>
<option value="Healthy Plasma Sample">Healthy Plasma Sample</option>
<option value="High Grade Serous Ovarian Cancer Tissue">High Grade Serous Ovarian Cancer Tissue</option>
<option value="Histiocytic Lymphoma Cell Line">Histiocytic Lymphoma Cell Line</option>
<option value="Hypopharyngeal Squamous Cell Carcinoma Cell Line">Hypopharyngeal Squamous Cell Carcinoma Cell Line</option>
<option value="Kidney Cancer Cell Line">Kidney Cancer Cell Line</option>
<option value="Kidney Cancer Tissue">Kidney Cancer Tissue</option>
<option value="Lens Capsule Tissue">Lens Capsule Tissue</option>
<option value="Leukocytes Cell Line">Leukocytes Cell Line</option>
<option value="Liver Cancer Cell Line">Liver Cancer Cell Line</option>
<option value="Liver Cancer Tissue">Liver Cancer Tissue</option>
<option value="Liver Cell Line">Liver Cell Line</option>
<option value="Lower Grade Glioma Tissue">Lower Grade Glioma Tissue</option>
<option value="Lung Adenocarcinoma Tissue">Lung Adenocarcinoma Tissue</option>
<option value="Lung Cancer Brain Metastasis Tissue">Lung Cancer Brain Metastasis Tissue</option>
<option value="Lung Cancer Cell Line">Lung Cancer Cell Line</option>
<option value="Lung Squamous Cell Cancer Tissue">Lung Squamous Cell Cancer Tissue</option>
<option value="Lung Tissue">Lung Tissue</option>
<option value="Medulloblastoma Cell Line">Medulloblastoma Cell Line</option>
<option value="Medulloblastoma Tissue">Medulloblastoma Tissue</option>
<option value="Melanoma Cell Line">Melanoma Cell Line</option>
<option value="Multiple Myeloma Cell Line">Multiple Myeloma Cell Line</option>
<option value="Muscle Tissue">Muscle Tissue</option>
<option value="Myeloid Leukemia Cell Line">Myeloid Leukemia Cell Line</option>
<option value="Non-Small Cell Lung Cancer Cell Line">Non-Small Cell Lung Cancer Cell Line</option>
<option value="Oral Cancer Tissue">Oral Cancer Tissue</option>
<option value="Ovarian Cancer Cell Line">Ovarian Cancer Cell Line</option>
<option value="Ovarian Cancer Tissue">Ovarian Cancer Tissue</option>
<option value="Ovarian Tissue">Ovarian Tissue</option>
<option value="Ovarian cancer cell line">Ovarian cancer cell line</option>
<option value="Pancreatic Cancer Cell Line">Pancreatic Cancer Cell Line</option>
<option value="Pancreatic Cancer Tissue">Pancreatic Cancer Tissue</option>
<option value="Pediatric Brain Cancer Tissue">Pediatric Brain Cancer Tissue</option>
<option value="Placenta Tissue">Placenta Tissue</option>
<option value="Plasma Leukocytes Sample">Plasma Leukocytes Sample</option>
<option value="Plasma Sample">Plasma Sample</option>
<option value="Prostate Cancer Cell Line">Prostate Cancer Cell Line</option>
<option value="Prostate Cancer Tissue">Prostate Cancer Tissue</option>
<option value="Sarcoma Tissue">Sarcoma Tissue</option>
<option value="Skin Cancer Tissue">Skin Cancer Tissue</option>
<option value="Sperm Cell">Sperm Cell</option>
<option value="Urine Sample">Urine Sample</option>
<option value="Uveal Melanoma Tissue">Uveal Melanoma Tissue</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class="form-group">
            <label for="">library type</label>
            <select class="form-control" id="library_type" name="library_type">
                <option value="All">All</option>
<option value="ATAC-Seq">ATAC-Seq</option>
<option value="ChIA-PET">ChIA-PET</option>
<option value="Circle-Seq">Circle-Seq</option>
<option value="MicroDNA-seq">MicroDNA-seq</option>
<option value="NanoCircle">NanoCircle</option>
<option value="PCR">PCR</option>
<option value="SMOOTH-Seq">SMOOTH-Seq</option>
<option value="Tn-Seq">Tn-Seq</option>
<option value="WES">WES</option>
<option value="WGS">WGS</option>
<option value="cf-eccDNA-seq">cf-eccDNA-seq</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <h4>Search terms</h4>
        <div class="form-group" style="width:100%">
            <textarea class="form-control" rows="10" style="width:50%" name="search-terms" id="search-terms"></textarea>
        </div><br><br>
        <button type="submit" class="btn btn-primary">submit</button>
        <button type="reset" class="btn btn-default">reset</button>
    </form>

<br>
<br>
<br>

<h2>Search for eccDNA derived from mouse</h2>
	<hr style="border: 2px solid black">
	<form class="form-inline" id="batch-search-mouse" action="<?php echo site_url('search/batch_search_mouse')?>" method="POST">
        <h4>Query by</h4>
		<div class="form-group">
                <label><input type="radio" name="search-type1" value="gene1">gene symbol&nbsp;&nbsp;</label><a href="javascript:void(0);" name="gene1" class="examples_1">example</a><input name="Egfr;;Xkr4;;Sox17" type="hidden"/>&nbsp;&nbsp;
                <label><input type="radio" name="search-type1" value="region1">location (mm10)&nbsp;&nbsp;</label><a href="javascript:void(0);" name="region1" class="examples_1">example</a><input name="chr14-21853358-21924282;;chrX-61882071-62663252;;chr14-61953046-87867770" type="hidden"/>&nbsp;&nbsp;
                <label><input type="radio" name="search-type1" value="eccDNA1">eccDNA ID&nbsp;&nbsp;</label><a href="javascript:void(0);" name="eccDNA1" class="examples_1">example</a><input name="mm10_man_ID30;;mm10_man_ID32;;mm10_man_ID9;;mm10_man_ID41" type="hidden"/>&nbsp;&nbsp;
                <label><input type="radio" name="search-type1" value="ncbi_gene_id1">NCBI gene ID&nbsp;&nbsp;</label><a href="javascript:void(0);" name="ncbi_gene_id1" class="examples_1">example</a><input name="108664;;18777;;19888" type="hidden"/>&nbsp;&nbsp;
                <label><input type="radio" name="search-type1" value="ensembl_gene_id1">Ensembl gene ID&nbsp;&nbsp;</label><a href="javascript:void(0);" name="ensembl_gene_id1" class="examples_1">example</a><input name="ENSMUSG00000002459;;ENSMUSG00000025900;;ENSMUSG00000025902;;ENSMUSG00000025903" type="hidden"/>&nbsp;&nbsp;
        </div>
        <h4>Filter by</h4>
        <div class="form-group">
            <label for="">cell line</label>
            <select class="form-control" id="cell_line1" name="cell_line1">
            <option value="All">All</option>
			<option value="NA">NA</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        
        <div class="form-group">
            <label for="">tissue</label>
            <select class="form-control" id="tissue1" name="tissue1">
                <option value="All">All</option>
<option value="Body">Body</option>
<option value="Cortex">Cortex</option>
<option value="Epididymal Visceral Adipose">Epididymal Visceral Adipose</option>
<option value="Epididymis">Epididymis</option>
<option value="Hippocampus">Hippocampus</option>
<option value="Inguinal Subcutaneous Adipose">Inguinal Subcutaneous Adipose</option>
<option value="Liver">Liver</option>
<option value="Pancreas">Pancreas</option>
<option value="Skeletal Muscle">Skeletal Muscle</option>
<option value="Sperm">Sperm</option>
<option value="Spinal Cord">Spinal Cord</option>
            </select>
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="">sample type</label>
            <select class="form-control" id="sample_type1" name="sample_type1">
            <option value="All">All</option>
<option value="Adipose Tissue">Adipose Tissue</option>
<option value="Body Tissue">Body Tissue</option>
<option value="Cortex Tissue">Cortex Tissue</option>
<option value="Hippocampus Tissue">Hippocampus Tissue</option>
<option value="Liver Tissue">Liver Tissue</option>
<option value="Muscle Tissue">Muscle Tissue</option>
<option value="Nervous Tissue">Nervous Tissue</option>
<option value="Pancreas Tissue">Pancreas Tissue</option>
<option value="Reproductive Cell">Reproductive Cell</option>
<option value="Reproductive Tissue">Reproductive Tissue</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class="form-group">
            <label for="">library type</label>
            <select class="form-control" id="library_type1" name="library_type1">
                <option value="All">All</option>
<option value="Circle-seq">Circle-seq</option>
<option value="WGS">WGS</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <h4>Search terms</h4>
        <div class="form-group" style="width:100%">
            <textarea class="form-control" rows="10" style="width:50%" name="search-terms-mouse" id="search-terms-mouse"></textarea>
        </div><br><br>
        <button type="submit" class="btn btn-primary">submit</button>
        <button type="reset" class="btn btn-default">reset</button>
    </form>
    </div>
</div>
