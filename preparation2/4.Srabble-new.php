<?php
$mainWordInput = $_GET['mainWord'];
$wordsInput = $_GET['words'];

$mainWordObj = json_decode($mainWordInput);

preg_match('/\d+/', key($mainWordObj), $rowMainWord);
$rowMainWord = $rowMainWord[0];

$mainWordArr = (array)$mainWordObj;

$mainWord = $mainWordArr[key($mainWordObj)];

$words = json_decode($wordsInput);

$board = array();

$tempRow = array_fill(0, strlen($mainWord), '');
for ($i = 0; $i < strlen($mainWord); $i++) {
    $board[] = $tempRow;
    if ($rowMainWord - 1 == $i) {
        $board[$i] = str_split($mainWord);
    }
}

usort($words, function ($a, $b) {
    return strlen($b) - strlen($a);
});

$tableSize = strlen($mainWord);

$topRow = $rowMainWord - 1;
$bottomRow = $tableSize - $rowMainWord;

foreach ($words as $k => $word) {
    $wordLen = strlen($word);

    for ($col = 0; $col < $tableSize; $col++) {
        for ($wordIndex = 0; $wordIndex < $wordLen; $wordIndex++) {
            if ($mainWord[$col] == $word[$wordIndex]) {
                $topLen = $wordIndex;
                $bottomLen = $wordLen - $wordIndex - 1;
                if ($topLen <= $topRow && $bottomLen <= $bottomRow) {
                    $targetWord = $word;
                    $targetCol = $col;
                    $targetRow = $topRow - $topLen;
                    break;
                }
            }
        }

        if (isset($targetWord)) {
            break;
        }
    }

    if (isset($targetWord)) {
        break;
    }

}

$words = array_count_values($words);
$result = [];
$index = 0;

if(isset($targetWord)){
    for ($row = $targetRow; $row < strlen($targetWord) + $targetRow; $row++) {
        $board[$row][$targetCol] = $targetWord[$index];
        $index++;
    }
    //използваме htmlspecialchars() или htmlentities() за  тест 10
    foreach ($words as $word => $repetition) {
        if ($word != $targetWord) {
            $result[htmlentities($word)] = sumASCIICodes($word, $repetition);
        }
    }
} else {

    foreach ($words as $word => $repetition) {
            $result[htmlentities($word)] = sumASCIICodes($word, $repetition);
    }
}


ksort($result);

echo "<table>";
for ($i = 0; $i < $tableSize; $i++) {
    echo "<tr>";

    for ($j = 0; $j < $tableSize; $j++) {
        echo "<td>{$board[$i][$j]}</td>";
    }

    echo "</tr>";
}
echo "</table>";
echo json_encode($result);


function sumASCIICodes($word, $repetition)
{
    $sum = 0;

    for ($i = 0; $i < strlen($word); $i++) {
        $sum += ord($word[$i]);
    }

    return $sum * $repetition;
}