<?php
$nameString = $_GET["name"];
$genderString = $_GET["gender"];
$pinString = $_GET["pin"];

$isValidData = true;

$namePattern = "/[A-Z][a-z]*\s[A-Z][a-z]*/";
preg_match($namePattern, $nameString, $name);

//var_dump($name);

$pinPattern = "/[0-9]{10}/";
preg_match($pinPattern, $pinString, $pin);

if(empty($name) || empty($pin)) {
    $isValidData = false;

} else {
    $name = $name[0];
    $pin = $pin[0];
    $isValidData = pinValidate($pin,$genderString);
}

if ($isValidData) {
    $output = [
        "name" => $name,
        "gender" => $genderString,
        "pin" => $pin
    ];

    echo json_encode($output);
} else {
    echo "<h2>Incorrect data</h2>";
}

function pinValidate($pin,$genderString) {

    if ($genderString == "male") {
        $genderChk = 0;
    } else {  //$genderString == "female";
        $genderChk = 1;
    }

    $year = substr($pin,0,2);
    $month = substr($pin,2,2);
    $day = substr($pin,4,2);

    if ($month > 40) {
        $month -= 40;
        $year = "20".$year;
    } elseif ($month > 20) {
        $month -= 20;
        $year = "18".$year;
    } else {
        $year = "19".$year;
    }
    $dateString = $day."-".$month."-".$year;
    $date = date_create($dateString, timezone_open("Europe/Sofia"));
    //$dateChk = date_format($date, "d-m-Y");

    if (!$date) {
        return false;
    }

    $gender = substr($pin,8,1);

    if ($gender % 2 != $genderChk) {
        return false;
    }

    $pinWeights = [2,4,8,5,10,9,7,3,6];
    $sum = 0;
    for ($i = 0; $i < count($pinWeights); $i++) {
        $sum += $pinWeights[$i] * $pin[$i];
    }

    $checksum = $pin[9];
    $sumChk = $sum % 11 % 10;

    if ($sumChk != $checksum) {
        return false;
    }

    return true;
}