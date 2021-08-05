<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車</title>
</head>
<body>
    <table>
    <?php
        $total = 0;

        while(list($array, $value) = each($_COOKIE)){       /*取出所有cookie */
            if(isset($_COOKIE[$array]) && is_array($_COOKIE[$array])){      /*檢查cookie是否存在，且內容為陣列 */
                echo "<tr>\n<td>";
                echo "<a href='delete.php?id=". $array . "'>刪除</a>\n</td>";
                $price = 0;
                $quantity = 0;
            

                while(list($name, $value) = each($_COOKIE[$array])){
                    echo "<td>" . $value . "</td>";
                    if($name == "price"){
                        $price = $value;
                    }
                    if($name == "quantity"){
                        $quantity = $value;
                    }
                    
                }
                $total += $price * $quantity;
                echo "</tr>";
            }
        }

        if($total != 0){
            echo "<tr><td colspan=5>";
            echo "訂購總金額 = NT$" . $total . "元</td></tr>";
        }
    ?>
    </table>

    <ul>
        <li> <a href="index.php">網路商店</a></li>
        <li> <a href="shoppingcart.php">檢視購物車內容</a></li>
    </ul>
</body>
</html>