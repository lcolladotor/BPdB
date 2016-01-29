#!/usr/local/bin/perl -W
#This script generates fasta files from information of BPdB, and prepares the databases for blastn and blastp.
use strict;
my ($line,@line);
#First we create the fasta files with all the sequences
# we open the file created with the mysql dump function from table phage_gene. Each column is tab delimited. The order is:
# 0pg_id	1pg_name	2pg_sequence	3pg_pos_left	4pg_pos_right	5pg_strand	6pg_accession_number	7pg_product_name	8pg_product_type	9pg_protein_sequence	10phage_id  
open(PG,"$ARGV[0]")|| die "I can't open file $ARGV[0]\n";
open(BLASTP,">blastp/all_proteins.fasta")|| die "I can`t create file blastp/all_proteins.fasta\n";
open(BLASTN,">blastn/all_genes.fasta")|| die "I can`t create file blastp/all_genes.fasta\n";
while($line=<PG>){
	@line=split(/\t/,$line);
	if($line[8]eq'protein'){
		print BLASTP ">$line[0]|$line[1]|$line[6]|$line[7]|$line[10]\n$line[9]\n\n";
	}
	print BLASTN ">$line[0]|$line[1]|$line[10]\n$line[2]\n\n";
}
print "FASTA files where generated\n";
close PG;
close BLASTP;
close BLASTN;

#Secon we format the sequences with formatdb so they can be used with blastall
system("/usr/local/bin/formatdb -i blastp/all_proteins.fasta -l blastp/formatdb.log -o -p T");
print "Protein sequences where formated\n";
system("/usr/local/bin/formatdb -i blastn/all_genes.fasta -l blastn/formatdb.log -o -p F");
print "Nucleotide sequences where formated\n";
