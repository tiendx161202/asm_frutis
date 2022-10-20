<div class="card-body">
    <div class="table-responsive">
        <form action="" method="post" autocomplete="off">
            <div class="container-content">
                <div class="container-search">
                    <div class="container-wrap">
                        <input type="text" name="tukhoa" id="tukhoa" placeholder="Nhập để tìm kiếm" class="container-input"/>
                        <button type="submit" name="search" class="container-btn">
                            <input type="hidden" name="action" value="quanlysanpham">
                            <input type="hidden" name="query" value="lietke">
                            <i class="container-icon fa-sharp fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <?php 
            if(isset($_POST['search'])) {
                $tukhoa = $_POST['tukhoa'];
                if($tukhoa == "") {
                    include('customer/timkiem.php');
                }else {
                $sql_timkiem = "SELECT * FROM customer WHERE customer_name LIKE '%$tukhoa%'";
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
                                        <th>Tên khách hàng</th>
                                        <th>SĐT</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <?php
                                    $i = 0;
                                    while($row = mysqli_fetch_array($query_timkiem)){
                                    $i++;
                                ?>
                                <tbody>
                                    <tr>
                                        <td width="5%" align="center"><?php echo $i; ?></td>
                                        <td align="center"><?php echo $row['customer_name']; ?></td>
                                        <td align="center"><?php echo $row['customer_phone']; ?></td>
                                        <td align="center"><?php echo $row['customer_address']; ?></td>
                                        <td align="center"><?php echo $row['customer_email']; ?></td>
                                        <td width="15%">
                                            <div class="function_click">
                                                <a href="customer/xuly.php?idkhachhang=<?php echo $row['customer_id'] ?>" class="function_click-delete">
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
                include('customer/timkiem.php');
            }
        ?>
    </div>
</div>
