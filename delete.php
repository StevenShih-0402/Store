<?php
    header("Refresh:1;url=shoppingcart.php");

    $id = $_GET["id"];

    if(isset($_COOKIE[$id])){               /*檢查cookie是否存在，若存在則刪除cookie */
        while(list($name, $value) = each($_COOKIE[$id])){
            setcookie($id . "[" . $name . "]" , "" , time()-3600);
        }
    }
?>