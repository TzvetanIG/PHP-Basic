<?php
session_start();
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Problem 1. Print Tags</title>
    <link href="styles.css" rel="stylesheet">
    <style>
        .bigSize{ font-size: 25px;}
    </style>
</head>
<body>
<div>Enter HTML tag:</div>
<form action="04.HTMLTagsCounter.php" method="post">
    <input type="text" name="tag">
    <input type="submit" name="submit" value="Submit">
</form>
</br>
<?php
if (isset($_POST['submit'])) {

    $tagsString = 'html head body div span DOCTYPE title link meta style p h1 h2 h3 h4 h5 and h6 strong em abbr acronym'.
    'address bdo blockquote cite q code ins del dfn kbd pre samp var br a base img area map object param ul ol li dl dt dd'.
    'table tr td th tbody thead tfoot col colgroup caption form input textarea select option optgroup button label fieldset'.
    'legend script noscript bi tt sub sup big small hr b i';

    $tags = explode(' ', $tagsString);

    if(array_search($_POST['tag'], $tags)){
        $isValidTag = 'Valid';
        $_SESSION['score']++;
    } else {
        $isValidTag = 'Invalid';
    }

    echo "<div class='bigSize'>{$isValidTag} HTML tag! </br>Score: {$_SESSION['score']}</div>";
}

?>
</body>
</html>