<?php
    $msg = "";

    $id = $_POST["bookID"];
    $name = $_POST["bookName"];
    $price = $_POST["bookPrice"];
    $quantity = $_POST["Quantity"];

    if($quentity == "")
        $quantity = 1;

    setcookie($id."[ID]", $id, time()+3600);
    setcookie($id."[Name]", $name, time()+3600);
    setcookie($id."[Price]", $price, time()+3600);
    setcookie($id."[Quantity]", $quantity, time()+3600);

    $msg = "成功將選購商品放入購物車！<br/>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>存放成功！</title>
</head>
<body>
    <p><?php echo $msg; ?></p>
    <ul>
        <li> <a href="index.php">網路商店</a></li>
        <li> <a href="shoppingcart.php">檢視購物車內容</a></li>
    </ul>
</body>
</html>