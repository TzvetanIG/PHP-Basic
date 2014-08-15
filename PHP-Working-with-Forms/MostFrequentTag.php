<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Problem 6. HTML Table</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<div>Enter tags:</div>
<form action="MostFrequentTag.php" method="post">
    <input type="text" name="tags">
    <input type="submit" name="submit" value="Submit">
</form>
</br>
<?php
if (isset($_POST['tags'])):

    $tags = explode(", ", $_POST['tags']);
    $tagsFrequency = array();

    foreach ($tags as $tag) :
        if (isset($tagsFrequency[$tag])):
            $tagsFrequency[$tag]++;
        else:
            $tagsFrequency[$tag] = 1;
        endif;
    endforeach;

    arsort($tagsFrequency, SORT_NUMERIC);


    foreach($tagsFrequency as $key => $value):
        ?>
        <div>
            <?php
            echo $key, ' : ', $value, ' times';
            ?>
        </div>
    <?php
    endforeach;
endif
?>
</br>
<div>
    <?php
    reset($tagsFrequency);
    echo 'Most Frequent Tag is: ', key($tagsFrequency) ;
    ?>
</div>
</body>
</html>