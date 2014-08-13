<?php
$currentMonth = date('m');
$timestampSunday = strtotime("first Sunday of this month");

do {
    $sundayDate = date('jS F, Y', $timestampSunday);
    echo $sundayDate . "\n";
    $timestampSunday += 7 * 24 * 60 * 60;
} while ($currentMonth == date('m', $timestampSunday));