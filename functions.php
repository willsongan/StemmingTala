<?php
function PrintArray($array)
{
    $json_string = json_encode($array,JSON_PRETTY_PRINT);
    echo "<pre>".$json_string."<pre>";
}

function SeparateByNewLine($document)
{
    $regex = "/[\n]/";
    $paragraphs = preg_split($regex,$document);
    return $paragraphs;
}

function Filtering($paragraphs)
{
    $regex = '/[^a-z \-]/';
    $filteredParagraphs = preg_replace($regex,'',$paragraphs);
    return $filteredParagraphs;
}

function SandangKepunyaanRemoval($tokens)
{
    $regex = '/lah$|kah$|pun$|ku$|mu$|nya$/';
    $filteredTokens = preg_replace($regex,'',$tokens);
    return $filteredTokens;
}

function FirstPrefixRemoval($tokens,&$finishedToken,&$invalidCriteriaToken)
{
    $regex = '/((^meny|^peny|^mem|^pem)[aiueo])|(^meng|^men|^mem|^me|^peng|^pen|^pem|^di|^ter|^ke)/';
    $validCriteriaToken = preg_grep($regex,$tokens);
    $invalidCriteriaToken = preg_grep($regex,$tokens,-1);

    $regexs = array('/(^meny|^peny)[aiueo]/','/(^mem|^pem)[aiueo]/','/^meng|^men|^mem|^me|^peng|^pen|^pem|^di|^ter|^ke/');
    $changedRegex = array('/(^meny|^peny)/','/(^mem|^pem)/','/^meng|^men|^mem|^me|^peng|^pen|^pem|^di|^ter|^ke/');
    $replacement = array('s','p','');
    $leftoverToken = $validCriteriaToken;
    $finishedToken = array();
    foreach ($regexs as $index => $regex)
    {
        $selectedToken = preg_grep($regex,$leftoverToken);
        $finishedToken += preg_filter($changedRegex[$index],$replacement[$index],$selectedToken);
        $leftoverToken = preg_grep($regex,$leftoverToken,-1);
    }
}

function SecondPrefixRemoval($tokens,&$finishedToken,&$invalidCriteriaToken)
{
    $regex = '/((^bel|^pel)ajar)|(^ber|^per|^pe)|((^be)ker)/';
    $validCriteriaToken = preg_grep($regex,$tokens);
    $invalidCriteriaToken = preg_grep($regex,$tokens,-1);

    $regexs = array('/((^bel|^pel)ajar)/','/(^ber|^per|^pe)/','/((^be)ker)/');
    $changedRegex = array('/(^bel|^pel)/','/(^ber|^per|^pe)/','/(^be)/');
    $replacement = '';
    $leftoverToken = $validCriteriaToken;
    $finishedToken = array();
    foreach ($regexs as $index => $regex)
    {
        $selectedToken = preg_grep($regex,$leftoverToken);
        $finishedToken += preg_filter($changedRegex[$index],$replacement,$selectedToken);
        $leftoverToken = preg_grep($regex,$leftoverToken,-1);
    }
}

function SuffixRemoval($tokens,&$finishedToken,&$invalidCriteriaToken)
{
    $regex = '/kan$|an$|[^s]i$/';
    $validCriteriaToken = preg_grep($regex,$tokens);
    $invalidCriteriaToken = preg_grep($regex,$tokens,-1);
    $replacement = '';
    $finishedToken = preg_filter($regex,$replacement,$validCriteriaToken);
}


function Tokenize($string)
{
    $regex = ' ';
    $temp = strtok($string,$regex);
    $array = array();
    while($temp)
    {
        $array[] = $temp;
        $temp = strtok($regex);
    }
    return $array;
}

function StopWordRemoval($array, $stopWordsTokens, &$removedStopWordArrays, &$removedStopWordTokens)
{
    foreach ($array as $stemDoc)
    {
        foreach ($stemDoc as $token)
        {
            if(!in_array($token,$stopWordsTokens))
            {
                $removedStopWordArray[] = $token;
                $removedStopWordTokens[] = $token;
            }
        }
        $removedStopWordArrays[] = $removedStopWordArray;
        $removedStopWordArray = null;
    }
}