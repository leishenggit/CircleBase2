#!/data1/anaconda3/bin/python
import argparse
from multiprocessing import Pool
import numpy as np
from scipy import stats


def setArgs():
	parser = argparse.ArgumentParser(description="Computing score of eccDNA")
	parser.add_argument('--table', help='hits stat file', type=str, required=True)
	parser.add_argument('--out_f', help='output filename', type=str, required=True)
	parser.add_argument('--chromosome', help="The column number of the chromosome in the data file, default is 1 ", type=int, default=1)
	parser.add_argument('--hits', help="The column number of the hits number, default is 5 ", type=int, default=5)
	parser.add_argument('--ecc', help="The column number of the eccDNA, default is 4 ", type=int, default=4)
	parser.add_argument('--by_chr', help='Whether to process according to different chromosomes', action="store_true")
	parser.add_argument('--head', help='Whether to delete the first line of the file', action="store_true")
	return parser.parse_args()


def get_score(chromo, taxonomy, idx, idx2, idx3, out_f):
	# running
	records = [line for line in taxonomy if line[idx] == chromo]
	hits = [float(line[idx2])+1 for line in records]
	y, lambda0 = stats.boxcox(hits)
	u = np.mean(y)
	sd = np.std(y)
	print("chromosome: %s, records: %d, lambda0: %f, mean: %f, sd: %f" % (chromo, len(records), lambda0, u,sd))
	with open(out_f, 'w') as f:
		for i in range(len(records)):
			k = y[i]
			p = stats.norm.sf(k, u, sd) #reverse is stats.norm.cdf(k, u, sd)
			rel = [records[i][idx3], chromo, records[i][idx2], k, u, sd, p, -np.log10(p)]
			f.write('\t'.join(map(str, rel)) + '\n')



def get_score_1(records, idx, idx2, idx3, out_f):
	# running
	hits = [float(line[idx2])+1 for line in records]
	y, lambda0 = stats.boxcox(hits)
	u = np.mean(y)
	sd = np.std(y)
	print("chromosome: %s, records: %d, lambda0: %f, mean: %f, sd: %f" % ('all', len(records), lambda0, u,sd))
	with open(out_f, 'w') as f:
		for i in range(len(records)):
			k = y[i]
			p = stats.norm.sf(k, u, sd) #reverse is stats.norm.cdf(k, u, sd)
			rel = [records[i][idx3], 'all', records[i][idx2], k, u, sd, p, -np.log10(p)]
			f.write('\t'.join(map(str, rel)) + '\n')



if __name__ == "__main__":
	args = setArgs()
	##get result
	with open(args.table) as f: taxonomy = [l.strip().split('\t') for l in f]
	if args.head: del taxonomy[0]
	idx, idx2, idx3 = args.chromosome - 1, args.hits - 1, args.ecc - 1
	if args.by_chr:
		chromos = [l[idx] for l in taxonomy]
		p = Pool()
		for chromo in chromos:
			out_f = args.out_f + '.' + chromo
			p.apply_async(get_score, args = (chromo, taxonomy, idx, idx2, idx3, out_f))
		p.close()
		p.join()
	else:
		get_score_1(taxonomy, idx, idx2, idx3, args.out_f)


