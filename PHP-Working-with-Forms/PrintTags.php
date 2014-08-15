<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Problem 6. HTML Table</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div>Enter tags:</div>
    <form action="PrintTags.php" method="post">
        <input type="text" name="tags">
        <input type="submit" name="submit" value="Submit">
    </form>
    </br>
    <?php
    if(isset($_POST['tags'])):
        $tags = explode(", ", $_POST['tags']);
        for($i = 0; $i < count($tags); $i++):
    ?>
    <div>
        <?php
        echo $i,' : ',$tags[$i];
        ?>
    </div>
    <?php
        endfor;
    endif
    ?>
</body>
</html>