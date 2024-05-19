<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
</head>
<body>
    <h1>Welcome to my bakery!</h1>
    <h2>Order Form</h2>
    <p>Please place your order below~</p>
    <p>Prices:</p>
    <ul>
        <li>Cookies: PHP 20 each</li>
        <li>Cakes: PHP 150 each</li>
        <li>Cupcakes: PHP 40 each</li>
    </ul>
    <form action="order_summary.php" method="post">
        <label for="item">Menu:</label>
        <select id="item" name="item">
            <option value="Cookie">Cookie</option>
            <option value="Cake">Cake</option>
            <option value="Cupcake">Cupcake</option>
        </select><br><br>
        <label for="quantity">Quantity: </label>
        <input type="number" id="quantity" name="quantity" required><br><br>
        <label for="cash">Cash: </label>
        <input type="number" id="cash" name="cash" required><br><br>
        <input type="submit" value="Submit Order">
    </form>
    <p>Thank you so much!~</p>
</body>
</html>
