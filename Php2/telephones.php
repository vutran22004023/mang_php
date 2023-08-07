<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_star = $_POST['product_star'];

        $new_product = array(
            'name' => $product_name,
            'price' => $product_price,
            'star' => $product_star,
        );

        if (!isset($_SESSION['product_list'])) {
            $_SESSION['product_list'] = array();
        }

        if($product_name != "" &&$product_price != "" && $product_star != "") {
            $_SESSION['product_list'][] = $new_product;
            header('Location: show_telephones.php');
            exit();
        }else {
            echo "<script>alert('Vui lòng nhập thông tin đầy đủ');</script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="display: block;">

    <form method="post" action="telephones.php">
    <input type="text" name="product_name" placeholder="tên điện thoại" ><br>
    <input type="text" name="product_price" placeholder="giá tiền"><br>
    <input type="text" name="product_star" placeholder="số sao"><br>
    <input type="submit" name="submit" value="lưu">
</body>
</html>