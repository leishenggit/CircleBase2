#!/bin/bash
set -e


#Step-1: get the number of annotated hits (records) for each eccDNA in each regulatory category
for f in Chromatin_access.bed  Chromatin_interaction.bed  Epigenetic_regulation.bed  Genetic_variant.bed  Regulatory_elements.bed  Targeting_genes.bed
do
	echo "Starting bedtools intersect for $f"
	bedtools intersect -c  -a  eccDNA_core.hg19.bed -b $f > hits.stat.$f
	echo "Finish $f"
done

#Step-2: correction for size bias and uneven genomic distribution of regulatory elements
for f in hits.stat.*.bed
do
	echo $f
	fname=${f/hits./}
	awk -F'\t' -v OFS='\t' 'NR==FNR{if($4>0)a[$1]=$4}NR>FNR{if($1 in a){x=$5/($3-$2+1)*1000/a[$1];$5=x; print $0}}' $fname $f > $f.norm
done

#Step-3: get score
for f in hit*.norm
do
	python boxcox.py --table $f --out_f $f.score
done

#Step-4: normalized score to [0,1] via logistic function
for f in hit*.norm
do
	python normalize.py $f.score --score 8 > $f.nor
done

#Step-5: get final score
cat *.nor | awk -F'\t' -v OFS='\t' '{score[$1]+=$10;count[$1]++;}END{for(k in score)printf("%s\t%.10f\n", k, score[k]/count[k])}' > final.score.txt
