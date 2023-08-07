<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./ex2.css">
</head>

<body>
    <form method="get">
            <input type="text" name="search_name" placeholder="Nhập tên tìm kiếm">
            <input type="submit" value="Tìm kiếm">
        </form>
    <?php
    session_start();


    // Kiểm tra nếu mảng đã được lưu trong phiên
    if (isset($_SESSION['product_list'])) {

        if (isset($_GET['search_name'])) { 
            $search_name = $_GET['search_name'];

        $product_list = $_SESSION['product_list'];
            // Chạy hàm tìm kiếm và lưu kết quả vào biến $searchResults
        $product_list = searchByName($product_list, $searchName);
        }
        // Lấy dữ liệu từ phiên và gán vào một biến
        $product_list = $_SESSION['product_list'];

        // Hiển thị dữ liệu từ phiên
        echo '<div class="banner">* Nổi bật nhất *</div>';

        echo '<div class="container1">';
        foreach ($product_list as $product) {
            echo '
                    <div class="card" style="width:20%;border: 1px solid #000; margin-right: 10px">
                        <img class="card-img-top" src="https://cdn.tgdd.vn/Products/Images/42/22701/dien-thoai-di-dong-Nokia-1280-dienmay.com-l.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">' . $product['name'] . '</h4>
                            <p class="card-text price">' . $product['price'] . 'đ</p>
                            <div class="evaluation">
                                <div class="stars">';
            for ($x = 0; $x < 5; $x++) {
                if ($x < $product['star']) echo '<i class="fa-solid fa-star"></i>';
                else echo '<i class="fa-regular fa-star"></i>';
            }
            echo '
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
        }
        echo '</div>';
    } else {
        echo "Dữ liệu không tồn tại trong phiên.";
    }

    function searchByName($array, $name) {
        $results = array();
        foreach ($array as $item) {
            if (strpos(strtolower($item), strtolower($name)) !== false) {
                $results['name'] = $item;
            }
        }
        return $results;
    }
    ?>
</body>

</html>