
function draw_regulatory(nodes, edges, dom_id, width=800, height=450){
  var svg = d3.select("#"+dom_id)
      .append("svg")
      .attr("width", width)
      .attr("height", height)
      
  var page_rank = nodes.map(function (d) {
      return parseFloat(d.page_rank)
  });
  
  var min = d3.min(page_rank);
  var max = d3.max(page_rank);
  
  var linear_linkDistance = d3.scale.linear()
                              .domain([min, max])
                              .range([100, 300]);

  var force = d3.layout.force()
          .nodes(nodes)		//指定节点数组
          .links(edges)		//指定连线数组
          .size([width,height])	//指定范围
          .linkDistance(150)	//指定连线长度
          .linkStrength(0.2)	//指定连接线的坚硬度，值的范围为[ 0 , 1 ]，值越大越坚硬。
          .charge(-300);	//相互之间的作用力是排斥还是吸引，默认值为-30。
          
  force.start();//开始作用

  //添加连线
  var svg_edges = svg.selectAll("line")
                  .data(edges)
                  .enter()
                  .append("line")
                  .style("stroke","#ccc")
                  .style("stroke-width",1);

  var color = d3.scale.category20();

  var linear = d3.scale.linear()
              .domain([min, max])
              .range([10, 30]);

  //tooltips
  var mytooltip = d3.select("body")
  .append("div")
  .attr("class","mytooltip")
  .style("opacity",0.0);

  //添加节点
  var svg_nodes = svg.selectAll("circle")
          .data(nodes)
          .enter()
          .append("circle")
          .attr("r", function(d){
              return linear(d.page_rank)
          })
          .style("fill",function(d,i){
              return color(i);
          })
          .call(force.drag)//使得节点能够拖动 
          .on('mouseover', function(d,i){
              mytooltip.html("PageRank: " +d.page_rank)
              .style("left", (d3.event.pageX) + "px")
              .style("top", (d3.event.pageY + 20) + "px")
              .style("opacity",1.0);
          })
          .on("mousemove",function(d){
              mytooltip.style("left", (d3.event.pageX) + "px")
                      .style("top", (d3.event.pageY + 20) + "px");
          })
          .on('mouseout', function(){
              mytooltip.style("opacity",0.0);
          })

  //添加描述节点的文字
  var svg_texts = svg.selectAll("text")
          .data(nodes)
          .enter()
          .append("text")
          .style("fill", "black")
          .attr("dx", 20)
          .attr("dy", 8)
          .text(function(d){
              return d.name;
          });


  force.on("tick", function(){//对于每一个时间间隔
      //更新连线坐标
      svg_edges.attr("x1",function(d){ return d.source.x; })
      .attr("y1",function(d){ return d.source.y; })
      .attr("x2",function(d){ return d.target.x; })
      .attr("y2",function(d){ return d.target.y; });

      //更新节点坐标
      svg_nodes.attr("cx",function(d){ return d.x; })
               .attr("cy",function(d){ return d.y; });

      //更新文字坐标
      svg_texts.attr("x", function(d){ return d.x; })
               .attr("y", function(d){ return d.y; });
  });
}

function draw_polar(data, my_title, dom_id){
    Highcharts.chart(dom_id, {
        chart: {
                polar: true,
                type: 'line'
        },
        title: {
                text: my_title,
                align: 'center',
                style:{ fontSize: '22px', fontWeight:"bold"},
                x: 0
        },
        credits:{
             enabled: false // 禁用版权信息
        },
        pane: {
                size: '85%'
        },
        xAxis: {
                categories: data.x,
                tickmarkPlacement: 'on',
                labels:{style:{fontSize: '20px'}},
                lineWidth: 0
        },
        yAxis: {
                gridLineInterpolation: 'polygon',
                labels:{style:{fontSize: '20px'}},
                lineWidth: 1,
                gridLineColor: '#C0C0C0',
                min: 0
        },
        legend: {
                enabled: false,
                align: 'right',
                verticalAlign: 'top',
                y: 70,
                layout: 'vertical'
        },
        series: [{
                name: data.name,
                color: 'rgba(186,60,61)',
                data: data.y,
                pointPlacement: 'on'
        }]
    });
}

$(document).ready(function(){

//form examples click event
$(".tip").on("click", function(){
$('#item').val($(this).text());
return false;
})


$("#organism").on("change",function(){
	var organism = $(this).val()
	console.log(organism)
	$("#assembly").empty()
	if(organism == 'human'){
		$("#assembly").append("<option value='hg19'>hg19</option>")
		$("#assembly").append("<option value='hg38'>hg38</option>")
	}else{
		$("#assembly").append("<option value='mm10'>mm10</option>")
	}
})

//examples search terms
$("a.examples").on("click", function(){
	$("input:radio").prop("checked",false);
	var search_type = $(this).attr("name");
	//console.log(search_type);
	$("input:radio[value='"+search_type+"']").prop("checked",true);
	var terms = $(this).next().attr("name").replace(/;;/g,"\n");
	//console.log(terms);
	$('#search-terms').val(terms);
})
//examples search terms for mouse
$("a.examples_1").on("click", function(){
	$("input:radio").prop("checked",false);
	var search_type = $(this).attr("name");
	//console.log(search_type);
	$("input:radio[value='"+search_type+"']").prop("checked",true);
	var terms = $(this).next().attr("name").replace(/;;/g,"\n");
	//console.log(terms);
	$('#search-terms-mouse').val(terms);
})

//quick search process
$("form.quick").on('submit', function(){
var item = $(this).find("input").val().trim().replace(/\s/g, "");
if(item == ""){alert("search term can not be null");return false;}
})

//batch search process
$('#batch-search').on('submit', function(){
//check query type
if(!$('input:radio:checked').val()){
  alert('Please choose a query type corresponding the input terms');
  return false;
}
//check query terms
var item = $("#search-terms").val().trim().replace(/\s/g, "");
if(item == ""){alert("search term can not be null");return false;}
})

//batch search process for mouse
$('#batch-search-mouse').on('submit', function(){
//check query type
if(!$('input:radio:checked').val()){
  alert('Please choose a query type corresponding the input terms');
  return false;
}
//check query terms
var item = $("#search-terms-mouse").val().trim().replace(/\s/g, "");
if(item == ""){alert("search term can not be null");return false;}
})

//初始化表格
$("#batch-result-table").DataTable({
    "scrollX": true,
    "dom": '<".col-md-4"l><".col-md-4"B><".col-md-4"f>t<".col-md-6"i><".col-md-6"p>',
    "order": [[2, "desc"]],
    "lengthMenu": [ [10, 20, 40, 60, 100, -1],[10,20, 40,60,100,"All"] ],
    "buttons": [
      'copy', 'excel', 'csv'
    ]
});



if ($("#hits_picture").length > 0) {
    var eccDNA =  $('#keyword').text().trim()
    $.ajax({
        async: true,
        cache: false,
        data:{"eccDNA": eccDNA},
        type : 'POST',
        dataType: "json",
        url : 'ajax/eccdna_score',
        beforeSend: function () {
            $("#hits_picture").html("<img src='assets/img/load.gif' alt='oops'/>");
            $("#raw_score_picture").html("<img src='assets/img/load.gif' alt='oops'/>");
            $("#normalized_score_picture").html("<img src='assets/img/load.gif' alt='oops'/>");
        }, 
        success: function (res) {
            // console.log(res);
            var sources = res.hits.map( function(x){return(x.source)} )
            var hits = res.hits.map( function(x){return(parseInt(x.hits))} )
            // console.log(sources)
            // console.log(hits)
            draw_polar({'x':sources, 'y':hits, 'name':"hits number"}, 'Hits number from annotation sections', 'hits_picture')
            if(res.score){
                var sources = res.score.map( function(x){return(x.source)} )
                var raw_score = res.score.map( function(x){return(parseFloat(x.row_score))} )
                //console.log(sources)
                //console.log(raw_score)
                draw_polar({'x':sources, 'y':raw_score, 'name':"raw score"}, 'Raw score of annotation sections', 'raw_score_picture')
                var normalized_score = res.score.map( function(x){return(parseFloat(x.normalized_score))} )
                //console.log(normalized_score)
                draw_polar({'x':sources, 'y':normalized_score, 'name':"normalized score"}, 'Normalized score of annotation sections', 'normalized_score_picture')
            }else{
                $("#raw_score_picture").html("<h3>No data available</h3>");
                $("#normalized_score_picture").html("<h3>No data available</h3>");
            }
        },
        error: function() {
            $("#hits_picture").html("sorry, something is wrong");
            $("#raw_score_picture").html("sorry, something is wrong");
            $("#normalized_score_picture").html("sorry, something is wrong");
        }
    });
}



//detail page table generation
$("div.detail_div").each(function(i, ele){
  var eccDNA =  $('#keyword').text().trim()
  var table = $(this).attr('id');
  var sql = $(this).find('p.hidden-info').text().trim();
  // console.log("table is : ", table);
  // console.log("sql is : ", sql);
  // console.log("element is : ", ele);

	//console.log("cycle number is : ", i);
	setTimeout(function(){
     $.ajax({
          async: true,
          data: {'sql_line':sql, 'table':table, "eccDNA":eccDNA},
          type : 'POST',
          url : 'ajax/table',
          beforeSend: function(){$(ele).html("<img src='assets/img/load.gif' alt='oops'/>");},
          success: function(response){
                  $(ele).html(response);
                  // detail page tables init of DataTable
                  $(ele).find("table.detail-table").DataTable({
                      "scrollX": true,
                      // 当处理大数据时，延迟渲染数据，有效提高Datatables处理能力
                      "deferRender": true,
                      "dom": '<".col-md-4"l><".col-md-4"B><".col-md-4"f>t<".col-md-4"i><".col-md-8"p>',
                      "buttons": [
                          'copy', 'excel', 'csv'
                      ]
                      ,"autoWidth": false
                  });
          },
          error: function(jqXHR, textStatus, errorThrown) {
              if(textStatus=="timeout"){
                  $(ele).html("<h3>Loading timed out, please refresh the page</h3>");
              }else{
                  $(ele).html("<h3>"+textStatus+"</h3>");
              }
          }
      })
    }, (i)*100 );
})




$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
   //当切换tab时，强制重新计算列宽
   $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
} );

////tab menu
$('.myTab a').click(function (e) {
e.preventDefault()
$(this).tab('show')
})

//toggleClass
$("#outer-tab-content").on("click", "p.section-title > button", function(){
$(this).children(".glyphicon").toggleClass("glyphicon-minus");
$(this).children(".glyphicon").toggleClass("glyphicon-plus");
$(this).parent().next().slideToggle("slow");
})

// $(".tab-content-second").on("click", "p.section-title > button", function(){
// $(this).children(".glyphicon").toggleClass("glyphicon-minus");
// $(this).children(".glyphicon").toggleClass("glyphicon-plus");
// $(this).parent().next().slideToggle("slow");
// })



//ajax to load network data
if ($("#Network").length > 0) {
  var eccDNA =  $('#keyword').text().trim()
  $.ajax({
      async: true,
      data:{"eccDNA":eccDNA},
      type : 'POST',
      dataType: "json",
      url : 'Ajax/network',
      beforeSend: function () {$("#Network").html("<img src='assets/img/load.gif' alt='oops'/>");}, 
      success: function (data) {
          console.log(data);
          if(data.nodes.length == 0){
              $('#Network').html("No data available");
          }else{
              $("#Network").empty();
              $('#Network').append("<div class='col-md-6'><br><table class='table table-bordered table-striped' width='100%' id='page_rank_table'></table></div>")
              $('#page_rank_table').DataTable( {
                  "data": data.rows,
                  "columns": [
                      { "title": "eccDNA" },
                      { "title": "Gene" },
                      { "title": "Weight" },
                      { "title": "Source" },
                      { "title": "PageRank_eccDNA" },
                      { "title": "PageRank_Gene" }
                  ],
                  "scrollX": true,
                  "dom": '<".col-md-4"l><".col-md-4"B><".col-md-4"f>t<".col-md-4"i><".col-md-8"p>',
                  "buttons": [
                      'copy', 'excel', 'csv'
                  ]
              })

              $('#Network').append("<div class='col-md-6'><br><p class='alert alert-warning'>The interacting genes with the eccDNA are ranked by Google PageRank and the size of the circle is positively correlated with the PageRank score.</p><div id='page_rank_regulatory'></div></div>")
              if(data.nodes.length < 30)
                  draw_regulatory(data.nodes, data.edges, 'page_rank_regulatory');
              else
                  draw_regulatory(data.nodes, data.edges, 'page_rank_regulatory', 1000, 700);
          }
      },
      error: function() {
          $("#Network").html("sorry, something is wrong")
      }
  })
}


//ajax to load Enrichment info
if ($("#Enrichment").length > 0) {
  var eccDNA = $('#keyword').text().trim()
  $.ajax({
      async: true,
      data:{"eccDNA":eccDNA},
      type : 'POST',
      dataType: "json",
      url : 'Ajax/enrichment',
      beforeSend: function () {$("#Enrichment").html("<img src='assets/img/load.gif' alt='oops'/>");}, 
      success: function (data) {
          console.log(data);
          if(data.flag == 'success'){
              $('#Enrichment').html(data.html);
          }else{
              $('#Enrichment').html("<h3>No data available</h3>");
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
          if(textStatus=="timeout"){
              $("#Enrichment").html("Loading timed out, please try again");
          }else{
              $("#Enrichment").html("<h3>"+textStatus+"</h3>");
          }
      }
  })
}


if($("#Targeting_genes_biocircos").length > 0 ){
  var eccDNA_region = $('#eccDNA_region').text().trim()
  var eccDNA = $('#keyword').text().trim()
  $.ajax({
      async: true,
      data:{"eccDNA":eccDNA, "eccDNA_region":eccDNA_region, "circos_type":"ARC", "tables":['Targeting_genes_GeneHancer', 'Targeting_genes_JEME', 'Targeting_genes_VARAdb']},
      type : 'POST',
      dataType: "json",
      url : 'Ajax/biocircos',
      beforeSend: function(){$("#Targeting_genes_biocircos").html("<img src='assets/img/load.gif' alt='oops'/>")},
      success: function (data) {
          //console.log(data);
          if(data.flag == 'success'){
              $("#Targeting_genes_biocircos").html(data.html_src)
          }else{
              $("#Targeting_genes_biocircos").html("<h3>"+data.info+"</h3>");
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
          if(textStatus=="timeout"){
              $("#Targeting_genes_biocircos").html("Loading timed out, please try again");
          }else{
              $("#Targeting_genes_biocircos").html("<h3>Error, something is wrong</h3>"+"<h3>"+textStatus+"</h3>");
          }
      }
  });
}



if($("#Regulatory_element_biocircos").length > 0 ){
  var eccDNA_region = $('#eccDNA_region').text().trim()
  var eccDNA = $('#keyword').text().trim()
  if(eccDNA.startsWith("mm10_")){
	var tables = ['Regulatory_element_dbSUPER_mouse', 'Regulatory_element_EnhancerAtlas_mouse', 'Regulatory_element_SEA_mouse', 'Regulatory_element_ChromHMM_mouse', 'Regulatory_element_cCRE_mouse']
  }else{
	var tables = ['Regulatory_element_dbSUPER', 'Regulatory_element_EnhancerAtlas', 'Regulatory_element_SEA', 'Regulatory_element_SEdb', 'Regulatory_element_ChromHMM']
  }
  $.ajax({
      async: true,
      data:{"eccDNA":eccDNA, "eccDNA_region":eccDNA_region, "circos_type":"ARC", "tables":tables},
      type : 'POST',
      dataType: "json",
      url : 'Ajax/biocircos',
      beforeSend: function(){$("#Regulatory_element_biocircos").html("<img src='assets/img/load.gif' alt='oops'/>")},
      success: function (data) {
          // console.log(data);
          if(data.flag == 'success'){
              $("#Regulatory_element_biocircos").html(data.html_src);
          }else{
              $("#Regulatory_element_biocircos").html("<h3>"+data.info+"</h3>");
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
            if(textStatus=="timeout"){
                $("#Regulatory_element_biocircos").html("Loading timed out, please try again");
            }else{
                $("#Regulatory_element_biocircos").html("<h3>"+textStatus+"</h3>");
            }
        }
  });
}




if($("#Chromatin_interaction_biocircos").length > 0 ){
  var eccDNA_region = $('#eccDNA_region').text().trim()
  var eccDNA = $('#keyword').text().trim()
  $.ajax({
      async: true,
      data:{"eccDNA":eccDNA,  "eccDNA_region":eccDNA_region, "circos_type":"LINK", "tables":['Chromatin_interaction_EpiTensor', 'Chromatin_interaction_4DGenome','Chromatin_interaction_ENCODE']},
      type : 'POST',
      dataType: "json",
      url : 'Ajax/biocircos',
      beforeSend: function(){$("#Chromatin_interaction_biocircos").html("<img src='assets/img/load.gif' alt='oops'/>")},
      success: function (data) {
          //console.log(data);
          if(data.flag == 'success'){
              $("#Chromatin_interaction_biocircos").html(data.html_src);
          }else{
              $("#Chromatin_interaction_biocircos").html("<h3>"+data.info+"</h3>");
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
            if(textStatus=="timeout"){
                $("#Chromatin_interaction_biocircos").html("Loading timed out, please try again");
            }else{
                $("#Chromatin_interaction_biocircos").html("<h3>Error, something is wrong</h3>"+"<h3>"+textStatus+"</h3>");
            }
        }
  });
}


if($("#Chromatin_access_biocircos").length > 0 ){
  var eccDNA_region = $('#eccDNA_region').text().trim()
  var eccDNA = $('#keyword').text().trim()
  if(eccDNA.startsWith("mm10_")){
	var tables = ['Chromatin_access_ChIP_Atlas_ATAC_seq', 'Chromatin_access_ChIP_Atlas_DNase_seq']
  }else{
	var tables = ['Chromatin_access_ATACdb', 'Chromatin_access_Cistrome', 'Chromatin_access_TCGA_ATAC', 'Chromatin_access_ENCODE_DHS']
  }
  $.ajax({
      async: true,
      data:{"eccDNA":eccDNA, "eccDNA_region":eccDNA_region, "circos_type":"ARC", "tables": tables},
      type : 'POST',
      dataType: "json",
      url : 'Ajax/biocircos',
      beforeSend: function(){$("#Chromatin_access_biocircos").html("<img src='assets/img/load.gif' alt='oops'/>")},
      success: function (data) {
          // console.log(data);
          if(data.flag == 'success'){
              $("#Chromatin_access_biocircos").html(data.html_src);
          }else{
              $("#Chromatin_access_biocircos").html("<h3>"+data.info+"</h3>");
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
            if(textStatus=="timeout"){
                $("#Chromatin_access_biocircos").html("Loading timed out, please try again");
            }else{
                $("#Chromatin_access_biocircos").html("<h3>Error, something is wrong</h3>"+"<h3>"+textStatus+"</h3>");
            }
        }
  });
}


if($("#Epigenetic_regulation_biocircos").length > 0 ){
  var eccDNA_region = $('#eccDNA_region').text().trim()
  var eccDNA = $('#keyword').text().trim()
  if(eccDNA.startsWith("mm10_")){
	var tables = ['Epigenetic_regulation_ChIP_Atlas_TFBS','Epigenetic_regulation_ChIP_Atlas_HM']
  }else{
	var tables = ['Epigenetic_regulation_TFBS_HM', 'Epigenetic_regulation_HM_ENCODE', 'Epigenetic_regulation_HM_RoadMap']
  }
  $.ajax({
      async: true,
      data:{"eccDNA":eccDNA, "eccDNA_region":eccDNA_region, "circos_type":"ARC", "tables":tables},
      type : 'POST',
      dataType: "json",
      url : 'Ajax/biocircos',
      beforeSend: function(){$("#Epigenetic_regulation_biocircos").html("<img src='assets/img/load.gif' alt='oops'/>")},
      success: function (data) {
          console.log(data);
          if(data.flag == 'success'){
              $("#Epigenetic_regulation_biocircos").html(data.html_src);
          }else{
              $("#Epigenetic_regulation_biocircos").html("<h3>"+data.info+"</h3>");
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
            if(textStatus=="timeout"){
                $("#Epigenetic_regulation_biocircos").html("Loading timed out, please try again");
            }else{
                $("#Epigenetic_regulation_biocircos").html("<h3>Error, something is wrong</h3>"+"<h3>"+textStatus+"</h3>");
            }
      }
  });
}


if($("#Genetic_variants_biocircos").length > 10 ){
  var eccDNA_region = $('#eccDNA_region').text().trim()
  var eccDNA = $('#keyword').text().trim()
  $.ajax({
      async: true,
      data:{"eccDNA":eccDNA, "eccDNA_region":eccDNA_region, "circos_type":"SNP", "tables":['Gene4Denovo', 'dbSNP', 'GTEx_eQTLs','GWAS_Catalog', 'GWASdb','variants','PancanQTL', 'gnomad_exomes']},
      type : 'POST',
      dataType: "json",
      url : 'Ajax/biocircos',
      beforeSend: function(){$("#Genetic_variants_biocircos").html("<img src='assets/img/load.gif' alt='oops'/>")},
      success: function (data) {
          //console.log(data);
          if(data.flag == 'success'){
              $("#Genetic_variants_biocircos").empty()
              $("#Genetic_variants_biocircos").append("<br><br>");
              $("#Genetic_variants_biocircos").append("<iframe id='BioCircos_View_SVG' src='"+data.html_src+"' height='700' width='100%'></iframe>");
          }else{
              $("#Genetic_variants_biocircos").html("<h3>"+data.info+"</h3>");
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
            if(textStatus=="timeout"){
               $("#Genetic_variants_biocircos").html("Loading timed out, please try again");
            }else{
               $("#Genetic_variants_biocircos").html("<h3>Error, something is wrong</h3>"+"<h3>"+textStatus+"</h3>");
            }
        }
  });
}


$("#biocircos_view_query").on('submit', function(){
  var eccDNA_region = $('#eccDNA_region').text().trim()
  var eccDNA = $('#keyword').text().trim()
  //add paras
  var formData = new FormData($("#biocircos_view_query")[0]);
  formData.append("eccDNA_region", eccDNA_region);
  formData.append("eccDNA", eccDNA);
  console.log("formData: ",formData);
  //submit query
  $.ajax({
      async: true,
      timeout:120000,
      data:formData,
      processData : false, //// 告诉jQuery不要去处理发送的数据，用于对data参数进行序列化处理 这里必须false
      contentType : false, //// 告诉jQuery不要去设置Content-Type请求头
      type : 'POST',
      dataType: "json",
      url : 'Ajax/biocircos_update',
      beforeSend: function(){$("#BioCircos_View_result").html("<img src='assets/img/load.gif' alt='oops'/>")},
      success: function (data) {
          console.log(data);
          if(data.flag == 'success'){
              $("#BioCircos_View_result").empty()
              var html_src = 'assets/circosJS/biocircos/'+eccDNA+'/circlebase.html'
              $("#BioCircos_View_result").append("<iframe id='BioCircos_View_SVG' src='"+html_src+"' height='700' width='100%'></iframe>");
          }else{
              $("#BioCircos_View_result").html("<h3>sorry, please try again</h3>");
          }
      },
      error: function() {
          $("#BioCircos_View_result").html("sorry, something is wrong");
      }
  });
  return false;
})



// active tooltip tool
var options = {
selector: "[data-toggle=tooltip]", 
container: 'body',
placement:"auto",
html:true
}
$("body").tooltip(options);



//stat page charts
if ($("#container_cell_line").length > 0) {
Highcharts.chart('container_cell_line', {
  chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
  },
  title: {
      text: 'eccDNA distribution by cell line'
  },
  credits:{
     enabled: false // 禁用版权信息
  },
  tooltip: {
      pointFormat: '<b>{point.percentage:.2f}%</b>'
  },
  plotOptions: {
      pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.2f} %',
              style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
              }
          }
      }
  },
  series: [{
      name: 'cell line',
      colorByPoint: true,
      data: [
			{name: "UACC-1598-4", y:29.446, sliced: true, selected: true}
			,{name: "ES2", y:17.015}
			,{name: "LnCap", y:12.573}
			,{name: "U937", y:10.306}
			,{name: "OVCAR8", y:8.578}
			,{name: "C4-2", y:6.120}
			,{name: "HeLaS3", y:5.771}
			,{name: "MDA-MB-453", y:2.825}
			,{name: "PC-3", y:2.177}
			,{name: "GES1", y:1.026}
            ,{name: "Others", y:4.163}
        ]
  }]
});
}


if ($("#container_tissue").length > 0) {
Highcharts.chart('container_tissue', {
  chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
  },
  title: {
      text: 'eccDNA distribution by tissue'
  },
  credits:{
     enabled: false // 禁用版权信息
  },
  tooltip: {
      pointFormat: '<b>{point.percentage:.2f}%</b>'
  },
  plotOptions: {
      pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.2f} %',
              style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
              }
          }
      }
  },
  series: [{
      name: 'tissue',
      colorByPoint: true,
      data: [
        {name: "Gastric_Cancer", y:74.673, sliced: true, selected: true}
		,{name: "Gastric_CancerNormal-Adjacent-Tissue", y:9.403}
		,{name: "Blood", y:2.925}
		,{name: "Muscle", y:2.517}
		,{name: "Subcutaneous_adipose", y:0.497}
		,{name: "Plasma", y:0.361}
		,{name: "Sperm", y:0.177}
		,{name: "Lens_capsule:_high_myopia_Anterior", y:0.085}
		,{name: "Leukocytes", y:0.045}
		,{name: "Placenta", y:0.020}
        ,{name: "Others", y:9.297}
      ]
  }]
});
}


if ($("#container_tissue_mouse").length > 0) {
Highcharts.chart('container_tissue_mouse', {
  chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
  },
  title: {
      text: 'eccDNA distribution by tissue'
  },
  credits:{
     enabled: false // 禁用版权信息
  },
  tooltip: {
      pointFormat: '<b>{point.percentage:.2f}%</b>'
  },
  plotOptions: {
      pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.2f} %',
              style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
              }
          }
      }
  },
  series: [{
      name: 'tissue',
      colorByPoint: true,
      data: [
        {name: "Sperm", y:51.138, sliced: true, selected: true}
		,{name: "Pancreas", y:12.280}
		,{name: "Cortex", y:9.461}
		,{name: "Liver", y:5.999}
		,{name: "Inguinal_subcutaneous_adipose", y:5.821}
		,{name: "Hippocampus", y:4.691}
		,{name: "Skeletal_muscle", y:4.395}
		,{name: "Epididymal_visceral_adipose", y:3.318}
		,{name: "Spinal_cord", y:2.109}
		,{name: "Body", y:0.498}
        ,{name: "Others", y:0.29}
      ]
  }]
});
}


if ($("#container_sample_type_mouse").length > 0) {
Highcharts.chart('container_sample_type_mouse', {
  chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
  },
  title: {
      text: 'eccDNA distribution by sample type'
  },
  credits:{
     enabled: false // 禁用版权信息
  },
  tooltip: {
      pointFormat: '<b>{point.percentage:.2f}%</b>'
  },
  plotOptions: {
      pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.2f} %',
              style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
              }
          }
      }
  },
  series: [{
      name: 'sample type',
      colorByPoint: true,
      data: [
        {name: "Reproductive system", y:51.428, sliced: true, selected: true}
		,{name: "Digestive system", y:18.279}
		,{name: "Nervous system", y:16.261}
		,{name: "Adipose", y:9.139}
		,{name: "Musculoskeletal", y:4.395}
		,{name: "Other", y:0.498}
      ]
  }]
});
}

});

