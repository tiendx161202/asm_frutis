<?php
    include("../database/connect.php");
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
                $new_quanity = $product_quanity + $row['quanity'];
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
    <title>Shop Fruit</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700;900&family=Roboto:ital,wght@0,100;0,300;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/product.css">
</head>

<body>

    <?php
        if (isset($message)) {
            echo $message;
        };
    ?>

    <?php include("./header.php"); ?>

    <!-- ---Product_detail--- -->
    <div class="product_detail">
        <h2>Chi tiết sản phẩm</h2>

        <?php
        $sql_chitiet = "SELECT * FROM product WHERE product_id = '$_GET[idsanpham]' LIMIT 1";
        $query_chitiet = mysqli_query($conn, $sql_chitiet);
        while ($row_chitiet = mysqli_fetch_assoc($query_chitiet)) { ?>
            <form action="" method="POST">
                <div class="product_content">
                    <div class="product_img">
                        <div class="product_img_item">
                            <img src="../img/uploads/<?php echo $row_chitiet['product_img']; ?>" width="100%" alt="" id="product_img">
                        </div>
                    </div>

                    <div class="product_content_text">
                        <div class="product_text">
                            <h5>Tên sản phẩm: <?php echo $row_chitiet['product_name']; ?></h5>
                            <p>Mã sản phẩm: <?php echo $row_chitiet['product_id']; ?></p>
                            <p>Số lượng:  <input type="number" name="quanity" min="1" value="1"> KG
                            <p>Danh mục:
                                <?php
                                $sql_danhmuc = "SELECT * FROM category ORDER BY category_id DESC";
                                $query = mysqli_query($conn, $sql_danhmuc);
                                while ($row_danhmuc = mysqli_fetch_array($query)) {
                                    if ($row_danhmuc['category_id'] == $row_chitiet['category_id']) { ?>
                                        <?php echo $row_danhmuc['category_name']; ?>
                                    <?php } ?>
                                <?php } ?>
                            </p>
                            <p>Giá: <?php echo number_format($row_chitiet['product_price'], 0, ',', '.') . 'vnđ' ?></p>
                            <p><?php echo $row_chitiet['product_info']; ?></p>
                        </div>

                        <div class="product_text_btn">
                            <a><i class="bi bi-heart"></i>Yêu Thích</a>
                            <input type="hidden" name="id" value="<?php echo $row_chitiet['product_id'] ?>">
                            <input type="hidden" name="product_name" value="<?php echo $row_chitiet['product_name'] ?>">
                            <input type="hidden" name="product_price" value="<?php echo $row_chitiet['product_price'] ?>">
                            <input type="hidden" name="product_img" value="<?php echo $row_chitiet['product_img'] ?>">
                            <?php
                            if ($is_login == true) {
                                echo '<input type="submit" name="add_to_cart" value="Thêm giỏ" > ';
                                header("Location:../../all_product.php");
                            } elseif ($is_login == false) {
                                echo '
                                    <a class="a_product_details" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart_product_details">
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
                                                    <a type="button" class="btn btn-primary" href="../../pages/main/login.php" style="background-color: #82ae46;">Đăng Nhập</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                            }
                            ?>
                        </div>

                        <div class="sharing">
                            <h6>Sharing</h6>
                            <i class="bi bi-facebook"></i>
                            <i class="bi bi-messenger"></i>
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                    </div>
                </div>
            </form>
    </div>

    <div class="lines"></div>

    <!-- --Product_information--- -->
    <div class="product_information">
        <h2>Thông tin sản phẩm</h2>

        <div class="product_information_text">
            <p><?php echo $row_chitiet['product_content']; ?></p>
        </div>
    </div>

<?php } ?>

<div class="lines"></div>

<!-- ----Customer_review---- -->
<div class="customer_review">
    <h2>Đánh giá của khách hàng</h2>

    <div class="customer_content">
        <div class="customer_img">
            <img src="../../img/img_customer/customer2.jpg" alt="">
        </div>

        <div class="customer_comment">
            <div class="customer_name">
                Dang Xuan Tien
            </div>

            <div class="customer_star">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
            </div>

            <div class="customer_comm">
                “Trái cây rất ngon và sạch, tôi sẽ mua nhiều hơn trong tương lai”
            </div>
        </div>
    </div>

    <div class="customer_content">
        <div class="customer_img">
            <img src="../../img/img_customer/customer3.jpg" alt="">
        </div>

        <div class="customer_comment">
            <div class="customer_name">
                Doan Cong Vu
            </div>

            <div class="customer_star">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
            </div>

            <div class="customer_comm">
                “Tư vấn nhiệt tình, chu đáo, vận chuyển nhanh”
            </div>
        </div>
    </div>

    <div class="customer_content">
        <div class="customer_img">
            <img src="../../img/img_customer/customer4.jpg" alt="">
        </div>

        <div class="customer_comment">
            <div class="customer_name">
                Giang
            </div>

            <div class="customer_star">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
            </div>

            <div class="customer_comm">
                “Very good”
            </div>
        </div>
    </div>
</div>

<div class="lines"></div>

<!-- -----related_products---- -->
<div class="related_product">
    <h2>Related Product</h2>
    <div class="btn_related">
        <i class="bi bi-arrow-left-circle" id="btn_related_left"></i>
        <i class="bi bi-arrow-right-circle" id="btn_related_right"></i>
    </div>

    <div class="related_product_item">
        <div class="related_content">
            <div class="related_img">
                <img src="../img/img_item/item1.jpg" alt="">
            </div>
            <div class="related_text">
                <h6>BELL PEPPER</h6>
                <div class="related_price">$4.90</div>
            </div>
        </div>

        <div class="related_content">
            <div class="related_img">
                <img src="../img/img_item/item1.jpg" alt="">
            </div>
            <div class="related_text">
                <h6>BELL PEPPER</h6>
                <div class="related_price">$4.90</div>
            </div>
        </div>

        <div class="related_content">
            <div class="related_img">
                <img src="../img/img_item/item1.jpg" alt="">
            </div>
            <div class="related_text">
                <h6>BELL PEPPER</h6>
                <div class="related_price">$4.90</div>
            </div>
        </div>

        <div class="related_content">
            <div class="related_img">
                <img src="../img/img_item/item1.jpg" alt="">
            </div>
            <div class="related_text">
                <h6>BELL PEPPER</h6>
                <div class="related_price">$4.90</div>
            </div>
        </div>

        <div class="related_content">
            <div class="related_img">
                <img src="../img/img_item/item1.jpg" alt="">
            </div>
            <div class="related_text">
                <h6>BELL PEPPER</h6>
                <div class="related_price">$4.90</div>
            </div>
        </div>

        <div class="related_content">
            <div class="related_img">
                <img src="../img/img_item/item1.jpg" alt="">
            </div>
            <div class="related_text">
                <h6>BELL PEPPER</h6>
                <div class="related_price">$4.90</div>
            </div>
        </div>

        <div class="related_content">
            <div class="related_img">
                <img src="../img/img_item/item1.jpg" alt="">
            </div>
            <div class="related_text">
                <h6>BELL PEPPER</h6>
                <div class="related_price">$4.90</div>
            </div>
        </div>

        <div class="related_content">
            <div class="related_img">
                <img src="../img/img_item/item1.jpg" alt="">
            </div>
            <div class="related_text">
                <h6>BELL PEPPER</h6>
                <div class="related_price">$4.90</div>
            </div>
        </div>

        <div class="related_content">
            <div class="related_img">
                <img src="../img/img_item/item1.jpg" alt="">
            </div>
            <div class="related_text">
                <h6>BELL PEPPER</h6>
                <div class="related_price">$4.90</div>
            </div>
        </div>


    </div>
</div>

<?php include("../pages/footer.php"); ?>

<script src="../js/app.js"></script>

</body>

</html>