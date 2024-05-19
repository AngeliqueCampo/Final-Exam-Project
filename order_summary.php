<!DOCTYPE html>
<html>
<head>
    <title>Order Summary</title>
</head>
<body>
    <h2>Order Summary</h2>
    <?php
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $cash = $_POST['cash'];

    $prices = array(
        "Cookie" => 20.00,
        "Cake" => 150.00,
        "Cupcake" => 40.00
    );

    $total_cost = $prices[$item] * $quantity;
    $change = $cash - $total_cost;

    if ($change >= 0) {
        echo "<p>Thank you for your order!</p>";
        echo "<p>Item ordered: $item</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p><b>Total Cost: PHP $total_cost</b></p>";
        echo "<p>Cash Received: PHP $cash</p>";
        echo "<p><b>Change: PHP $change</b></p>";
        echo "<p>Enjoy the food!~</p>";
    } else {
        echo "<p>Sorry :(( the cash received is not enough for the total cost. Please go back and check the amount, thank you~</p>";
    }
    ?>
</body>
</html>
