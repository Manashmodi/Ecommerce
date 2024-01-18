<?php
include "conn.php";

if (isset($_POST['submit'])) {
    if (isset($_POST['category'])) {
        $selectedCategoryId = $_POST['category'];

        $productQuery = "SELECT Product.name AS product_name, Product.price, Brand.name AS brand_name, Category.name AS category_name
                        FROM Product
                        INNER JOIN Brand ON Product.brand_id = Brand.id
                        INNER JOIN Category ON Product.category_id = Category.id
                        WHERE Product.category_id = ? AND Product.status = 1";

        $stmt = mysqli_prepare($conn, $productQuery);
        mysqli_stmt_bind_param($stmt, "i", $selectedCategoryId);
        mysqli_stmt_execute($stmt);

        $productResult = mysqli_stmt_get_result($stmt);

        if ($productResult) {
            while ($row = mysqli_fetch_assoc($productResult)) { 
              
                echo "Product Name &nbsp:  " . $row['product_name'] . "<br>";
                echo "Price &nbsp: Rs" . $row['price'] . "<br>";
                echo "Brand &nbsp: " . $row['brand_name'] . "<br>";
                echo "Category &nbsp: " . $row['category_name'] . "<br><br>";
                
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Please select a category.";
    }
}

mysqli_close($conn);
?>
