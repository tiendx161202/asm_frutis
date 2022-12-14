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
</head>

<body>
    <!-- slider_img -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/img_slider/slider1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/img_slider/slider2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/img_slider/slider3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="bi bi-arrow-left-circle left_icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="bi bi-arrow-right-circle right_icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- End slider_img -->

    <div class="lines"></div>

    <!-- --Store offers-- -->
    <div class="content_store">
        <div class="text_store">
            <h2>D???CH V???</h2>
            <p>Kh??ch h??ng s??? nh???n ???????c nhi???u <br> ??u ????i kh??c nhau</p>
        </div>

        <div class="endows">
            <div class="endow_content">
                <img src="../img/img_endows/free-delivery.jpg" alt="">
                <div class="endow_text">
                    <h5>MI???N PH?? V???N CHUY???N</h5>
                    <p>?????i v???i ????n ?????t h??ng tr??n $100</p>
                </div>
            </div>
            <div class="endow_content">
                <img src="../img/img_endows/diet.jpg" alt="">
                <div class="endow_text">
                    <h5>HOA QU??? T????I S???CH</h5>
                    <p>Quy tr??nh nh???p h??ng, v???n chuy???n, <br> b???o qu???n chuy??n nghi???p</p>
                </div>
            </div>
            <div class="endow_content">
                <img src="../img/img_endows/award.jpg" alt="">
                <div class="endow_text">
                    <h5>CH???T L?????NG CAO</h5>
                    <p>?????t s???c kh???e ng?????i ti??u d??ng <br> l??n h??ng ?????u</p>
                </div>
            </div>
            <div class="endow_content">
                <img src="../img/img_endows/customer-service.jpg" alt="">
                <div class="endow_text">
                    <h5>H??? TR???</h5>
                    <p>24/7</p>
                </div>
            </div>
        </div>
    </div>
    <!-- -- End Store offers-- -->

    <div class="lines"></div>

    <!-- --New_product----- -->
    <div class="content_news">
        <div class="text_news">
            <h2>S???n ph???m m???i</h2>
            <p>S???n ph???m m???i ph?? h???p v???i ng?????i d??ng</p>
        </div>
        <div class="all_product">
            <div class="list_product">
                <div class="row_product" id="product">
                    <?php
                    $sql_products = "SELECT * FROM product LIMIT 1,4";
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
                                                <?php echo $ftech_product['product_price'] ?> vn??
                                            </div>
                                        </div>

                                        <div class="icon_product">
                                            <input type="hidden" name="id" value="<?php echo $ftech_product['product_id'] ?>">
                                            <input type="hidden" name="product_name" value="<?php echo $ftech_product['product_name'] ?>">
                                            <input type="hidden" name="product_price" value="<?php echo $ftech_product['product_price'] ?>">
                                            <input type="hidden" name="product_img" value="<?php echo $ftech_product['product_img'] ?>">
                                            <a href="../pages/detail_product.php?idsanpham=<?php echo $ftech_product['product_id'] ?>" class="favorites">Chi ti???t</a>
                                            <?php
                                            if ($is_login == true) {
                                                echo '<input type="submit" name="add_to_cart" value="Th??m gi???" class="bi bi-cart-fill cart"> ';
                                                header("Location:../../../pages/cart.php");
                                            } elseif ($is_login == false) {
                                                echo '
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <input type="submit" name="add_to_cart" value="Th??m gi???" class="bi bi-cart-fill cart">
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Th??ng B??o</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">B???n ph???i ????ng nh???p ????? th??m gi??? h??ng</div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">????ng</button>
                                                                        <a type="button" class="btn btn-primary" href="../../pages/login.php" style="background-color: #82ae46;">????ng Nh???p</a>
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
        <div class="view_all">
            <button class="btn_all"><a href="../pages/search.php">Xem t???t c??? </a></button>
        </div>
    </div>
    <!-- --End New_product----- -->

    <div class="lines"></div>

    <!-- ---Vegetable--- -->
    <div class="content_news">
        <div class="text_news">
            <h2>Rau</h2>
            <p>Rau t????i v?? s???ch an to??n v??? sinh th???c ph???m</p>
        </div>

        <div class="products">
            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/item4.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi ti???t" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Th??m gi???" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/cachua.jpg" alt="">
                </div>

                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi ti???t" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Th??m gi???" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/carot.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi ti???t" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Th??m gi???" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/hanh.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi ti???t" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Th??m gi???" class="bi bi-cart-fill cart">
                </div>
            </div>
        </div>

        <div class="view_all">
            <button class="btn_all"><a href="../pages/search.php">Xem t???t c??? </a></button>
        </div>
    </div>
    <!-- ---End Vegetable--- -->

    <div class="lines"></div>

    <!-- ---Fruit------ -->
    <div class="content_news">
        <div class="text_news">
            <h2>Tr??i c??y</h2>
            <p>Tr??i c??y s???ch v?? ch???t l?????ng cho ng?????i d??ng</p>
        </div>

        <div class="products">
            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/ot.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi ti???t" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Th??m gi???" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/suplo.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi ti???t" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Th??m gi???" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/tao.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi ti???t" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Th??m gi???" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/toi.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi ti???t" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Th??m gi???" class="bi bi-cart-fill cart">
                </div>
            </div>
        </div>

        <div class="view_all">
            <button class="btn_all"><a href="../pages/search.php">Xem t???t c??? </a></button>
        </div>
    </div>
    <!-- ---End Fruit--- -->

    <div class="lines"></div>


    <!-- ---Customer_reviews---- -->
    <div class="customer_review">
        <div class="text_customer">
            <h2>PH???N H???I C???A KH??CH H??NG</h2>
            <p>Nh???ng ????nh gi?? v?? ?? ki???n c???a kh??ch h??ng ???????c ch??ng t??i c???p nh???t li??n t???c</p>
        </div>

        <div class="customers_evaluate">
            <div class="content_customer">
                <div class="img_content">
                    <img src="../img/img_customer/customer2.jpg" alt="">
                </div>
                <div class="text_content">
                    <h5>Dang Xuan Tien</h5>
                    <p>???Tr??i c??y r???t ngon v?? s???ch, <br>t??i s??? mua nhi???u h??n trong t????ng lai???</p>
                </div>
            </div>

            <div class="content_customer">
                <div class="img_content">
                    <img src="../img/img_customer/customer3.jpg" alt="">
                </div>
                <div class="text_content">
                    <h5>Doan Cong Vu</h5>
                    <p>???T?? v???n nhi???t t??nh, <br> chu ????o, v???n chuy???n nhanh???</p>
                </div>
            </div>

            <div class="content_customer">
                <div class="img_content">
                    <img src="../img/img_customer/customer4.jpg" alt="">
                </div>
                <div class="text_content">
                    <h5>Giang</h5>
                    <p>???Very good???</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ---End Customer_reviews---- -->

</body>

</html>