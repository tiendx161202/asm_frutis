<div class="card-body">
    <div class="table-responsive">
        <form action="" method="post" autocomplete="off">
            <div class="container-content">
                <div class="container-search">
                    <div class="container-wrap">
                        <input type="text" name="tukhoa" id="tukhoa" placeholder="Nhập để tìm kiếm" class="container-input"/>
                        <button type="submit" name="search" class="container-btn">
                            <input type="hidden" name="query" value="lietke">
                            <i class="container-icon fa-sharp fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
                <div class="container-add">
                    <a href="index.php?action=quanlysanpham&query=them" class="container-add-click">Add</a>
                </div>
            </div>
        </form>
        <?php 
            if(isset($_POST['search'])) {
                $tukhoa = $_POST['tukhoa'];
                if($tukhoa == "") {
                    include("product/timkiem.php");
                }else {
                $sql_timkiem = "SELECT * FROM product,category WHERE product.category_id=category.category_id AND product_name LIKE '%$tukhoa%'";
                $query_timkiem = mysqli_query($conn,$sql_timkiem);
                    $row_timkiem=mysqli_num_rows($query_timkiem);
                    if($row_timkiem <= 0) {
                        echo "Không tìm thấy, <b>". $tukhoa ." </b>";
                    }else {
                        echo "Tìm thấy ". $row_timkiem ." kết quả, <b>". $tukhoa ." </b>";
                        ?>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên quả</th>
                                        <th>Hình ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <?php
                                    $i = 0;
                                    while($row = mysqli_fetch_array($query_timkiem)) {
                                    $i++;
                                ?>
                                <tbody>
                                    <tr>
                                        <td width="5%" align="center"><?php echo $i; ?></td>
                                        <td>  
                                            <p class="td-name"><?php echo $row['product_name']; ?></p>
                                        </td>    
                                        <td width="10%"><img src="../../img/uploads/<?php echo $row['product_img']; ?>" style="width:100%; padding: 5px;"></td>
                                        <td width="15%" align="center"><?php echo $row['category_name']; ?></td>
                                        <td width="15%" align="center">
                                            <?php if($row['product_status'] == 1) {
                                                echo "<img src='../img/img_admin/onl.jpg' border='0'> Hoạt động";
                                                }else {
                                                    echo "<img src='../img/img_admin/off.jpg' border='0'> Ẩn";
                                                }
                                            ?>
                                        </td>
                                        <td width="15%">
                                            <div class="function_click">
                                                <a href="?action=quanlysanpham&query=xem&idsanpham=<?php echo $row['product_id'] ?>" class="function_click-see">
                                                    <i class="fas fa-fw fa-bars"></i>
                                                </a>
                                                <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['product_id'] ?>" class="function_click-edit">
                                                    <i class="fas fa-fw fa-pen"></i>
                                                </a>
                                                <a href="product/xuly.php?idsanpham=<?php echo $row['product_id'] ?>" class="function_click-delete">
                                                    <i class="fas fa-fw fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                        <?php
                    }
                }
            }else {
                include('product/timkiem.php');
            }
        ?>
    </div>
</div>
