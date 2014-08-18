<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Problem 1. Print Tags</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div>Enter tags:</div>
    <form action="01.PrintTags.php" method="post">
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
        echo $i,' : ',htmlspecialchars($tags[$i]);
        ?>
    </div>
    <?php
        endfor;
    endif
    ?>
</body>
</html>