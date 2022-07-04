<?php
require 'functions.php';

//Input Dokumen
$docFile = "Docs/doc1.txt";
$doc = file_get_contents($docFile);

//Case Folding
$docfold = strtolower($doc);

//Membagi per Paragraf
$paragraphs = SeparateByNewLine($docfold);

//Filtering
$filteredParagraphs = Filtering($paragraphs);

//Stopword Removal & Tokenisasi
$stopWordFile = "Docs/stopword_list_tala.txt";
$stopWord = file_get_contents($stopWordFile);
$stopWordTokens = SeparateByNewLine($stopWord);
foreach ($filteredParagraphs as $filteredParagraph)
    $tokens[] = Tokenize($filteredParagraph);

StopWordRemoval($tokens,$stopWordTokens,$a,$b);


//Menghilangkan kata sandang dan kepunyaan
$filteredTokens = SandangKepunyaanRemoval($b);

//Stemming
FirstPrefixRemoval($filteredTokens,$FPRtoken,$nonFPRtoken);
SuffixRemoval($FPRtoken,$SRtoken,$nonSRtoken);
SecondPrefixRemoval($nonFPRtoken,$SPRtoken,$nonSPRtoken);

SecondPrefixRemoval($SRtoken,$SPRtoken1,$nonSPRtoken1);
SuffixRemoval($SPRtoken,$SRtoken1,$nonSRtoken1);

//nonSRtoken + (SPRtoken1 + nonSPRtoken1) + (SRtoken1 + nonSPRtoken + nonSRtoken1)
$finalToken = array_merge($nonSRtoken,$SPRtoken1,$nonSPRtoken1,$SRtoken1,$nonSPRtoken,$nonSRtoken1);
PrintArray($finalToken);

//untuk token tanpa duplikat
$uniqueFinalToken = array_values(array_unique($finalToken));
//PrintArray($uniqueFinalToken);