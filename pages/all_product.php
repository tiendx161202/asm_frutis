<?php
    include('../database/connect.php');
    $users = (isset($_SESSION['customers'])) ? $_SESSION['customers'] : [];
    $customer = $_SESSION['customers'];
    $user_id = $_SESSION['customers']['customer_id'];

    $is_login = false;
    if (isset($_SESSION['customers'])) {
        $is_login = true;
    } else {
        $is_login = false;
    }

    if ($is_login == true) {
        if (isset($_POST['add_to_cart'])) {
            $customer_id = $customer['customer_id'];
            $product_id = $_POST['id'];
            $cart_id = $_POST['cart_id'];
            $product_img = $_POST['product_img'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_quanity = $_POST['quanity'];

            $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id' AND product_id = '$product_id'");

            if (mysqli_num_rows($select_cart) > 0) {
                $row = $select_cart->fetch_array();
                $new_quanity = $row['quanity'];
                // var_dump($new_quanity);
                $sql = "UPDATE cart SET quanity ='$new_quanity' WHERE customer_id = '$customer_id' AND product_id = '$product_id'";
                $query = mysqli_query($conn, $sql);
                $message = '<div class="alert alert-success d-flex align-items-center" role="alert">
                    Thêm sản phẩm thành công
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                
            } else {
                $sql = "INSERT INTO cart (customer_id,product_id,product_img, product_name, product_price, quanity) VALUES ('$customer_id','$product_id','$product_img','$product_name','$product_price','$product_quanity')";
                $query = mysqli_query($conn, $sql);
                $message = '<div class="alert alert-success d-flex align-items-center" role="alert">
                Thêm sản phẩm mới thành công
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700;900&family=Roboto:ital,wght@0,100;0,300;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/all_product.css">
</head>

<body>

    <!--  -->

    <!-- ---Category----- -->
    <?php
        $sql_category = "SELECT * FROM category ORDER BY category_id DESC";
        $query_category = mysqli_query($conn, $sql_category);
    ?>
    <div class="container_category">
        <div class="category">
            <div class="list_category">
                <?php
                    while ($row_category = mysqli_fetch_array($query_category)) { ?>
                    <li id="li_actives"><a id="category_actives" href="category.php?iddanhmuc=<?php echo $row_category['category_id'] ?>"> <?php echo $row_category['category_name'] ?></a></li>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <div class="all_product">
        <div class="list_product">
            <div class="row_product" id="product">
                <?php
                    $sql_products = "SELECT * FROM product ";
                    $select_products = mysqli_query($conn, $sql_products);
                    if (mysqli_num_rows($select_products) > 0) {
                        while ($ftech_product = mysqli_fetch_assoc($select_products)) { ?>
                            <form action="" method="POST">
                                <div class="col_product">
                                    <div class="product_item">
                                        <div class="product_img">
                                            <img src="../img/uploads/<?php echo $ftech_product['product_img'] ?>" alt="">
                                        </div>
                                        <div class="product_text">
                                            <h6><?php echo $ftech_product['product_name'] ?></h6>
                                            <input type="number" name="quanity" min="1" value="1"> KG
                                            <div class="product_price">
                                                <?php echo $ftech_product['product_price'] ?> vnđ
                                            </div>
                                        </div>

                                        <div class="icon_product">
                                            <input type="hidden" name="id" value="<?php echo $ftech_product['product_id'] ?>">
                                            <input type="hidden" name="product_name" value="<?php echo $ftech_product['product_name'] ?>">
                                            <input type="hidden" name="product_price" value="<?php echo $ftech_product['product_price'] ?>">
                                            <input type="hidden" name="product_img" value="<?php echo $ftech_product['product_img'] ?>">
                                            <a href="detail_product.php?idsanpham=<?php echo $ftech_product['product_id'] ?>" class="favorites">Chi tiết</a>
                                            <?php
                                                if ($is_login == true) {
                                                    echo '<input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart"> ';
                                                    header("Location:../../../pages/cart.php");
                                                }elseif ($is_login == false) {
                                                    echo '
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart">
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông Báo</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">Bạn phải đăng nhập để thêm giỏ hàng</div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                                    <a type="button" class="btn btn-primary" href="../pages/login.php" style="background-color: #82ae46;">Đăng Nhập</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- --pagination_product---- -->
    <div class="pagination_product" id="pagination">
        <ul>
            <li><i class="bi bi-arrow-left btn_prev"></i></li>
            <div class="number_page" id="number_page"></div>
            <li><i class="bi bi-arrow-right btn_next"></i></li>
        </ul>
    </div>

    <script src="../js/panigation.js"></script>

</body>
</html>