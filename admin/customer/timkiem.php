<?php
    $sql_lietke = "SELECT * FROM customer ORDER BY customer_id DESC";
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
                    <th>Tên khách hàng</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($query_lietke)){
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
    </div>
</div>