<?php
    $db = mysqli_connect("localhost", "root", "A12345678");
    mysqli_select_db($db, "store");

    $sql = "SELECT * FROM `merchandise`";
    $rows = mysqli_query($db, $sql);
    $num = mysqli_num_rows($rows);

    mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品目錄</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>編號</th>       <!--表格標題列的格子-->
            <th>圖書名稱</th>
            <th>價格</th>
            <th>數量</th>
            <th>訂購</th>
        </tr>
        <?php
            if($num > 0){
                while($row = mysqli_fetch_array($rows)){
                    $id = $row["id"];
                    $name = $row["name"];
                    $price = $row["price"];
        ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $price; ?></td>
                        <td>
                            <form action="savecart.php" method="POST">
                                <input type="text" name="Quantity" placeholder="輸入數量" size="5"/>
                        </td>
                        <td>
                                <input type="submit" value="訂購"/>
                        </td>
                                <input type="hidden" name="bookID" value="<?php echo $id; ?>"/>
                                <input type="hidden" name="bookName" value="<?php echo $name; ?>"/>
                                <input type="hidden" name="bookPrice" value="<?php echo $price; ?>"/>
                            </form>
                    </tr>
            <?php
                }
            ?>
    </table>
    <?php
        }

        mysqli_free_result($rows);      /*釋放游標記憶體 */
    ?>

    <ul>
        <li> <a href="index.php">網路商店</a></li>
        <li> <a href="shoppingcart.php">檢視購物車內容</a></li>
    </ul>

</body>
</html>