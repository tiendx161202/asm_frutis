<?php 
    $sql_lietke = "SELECT * FROM product,category WHERE product.category_id=category.category_id ORDER BY product_id DESC";
    $query_lietke = mysqli_query($conn,$sql_lietke);
?>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <?php if(isset($_GET['msg'])) { ?>
                <p class="msg">
                    <?php echo $_GET['msg']; ?>
                </p>
            <?php } ?>
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
                while($row = mysqli_fetch_array($query_lietke)) {
                $i++;
            ?>
            <tbody>
                <tr>
                    <td width="5%" align="center"><?php echo $i; ?></td>
                    <td>  
                        <p class="td-name"><?php echo $row['product_name']; ?></p>
                    </td>    
                    <td width="10%"><img src="../img/uploads/<?php echo $row['product_img']; ?>" style="width:100%; padding: 5px;"></td>
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
    </div>
</div>
