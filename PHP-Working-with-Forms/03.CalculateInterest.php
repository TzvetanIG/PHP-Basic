<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Problem 3. Calculate Interest</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>

<div>
<?php
if (isset($_POST['submit'])){
    $monthInterest = $_POST['interest'] / 12;
    $amount = $_POST['amount'];
    $period = $_POST['period'];
    $newAmount = $amount * pow(1 + $monthInterest / 100, $period);
    $currency = $_POST['currency'];

    if($currency == 'USD') {
        $currency = '$';
    }
}

echo $currency, ' ', number_format($newAmount, 2, '.', ''), '</br></br>';
?>
</div>


<form action="03.CalculateInterest.php" method="post">
    <label>Enter Amount</label><input type="text" name="amount">

    <div><input type="radio" name="currency" value="USD" checked><label>USD</label>
        <input type="radio" name="currency" value="EUR"><label>EUR</label>
        <input type="radio" name="currency" value="EUR" ><label>BGL</label></div>
    <div><label>Compound Interest Amount</label><input type="text" name="interest"></div>
    <select name="period">
        <option value="6">6 Months</option>
        <option value="12">1 Year</option>
        <option value="24">2 Years</option>
        <option value="60">5 Years</option>
    </select>
    <input type="submit" name="submit" value="Calculate">
</form>

</body>
</html>