<?php 
    $sql_lietke = "SELECT * FROM cart,customer WHERE cart.customer_id=customer.customer_id ORDER BY cart_id LIMIT 1";
    $query_lietke = mysqli_query($conn,$sql_lietke);
    include("../database/connect.php");
    $users = (isset($_SESSION['customers'])) ? $_SESSION['customers'] : [];
    $user_id = $_SESSION['customers']['customer_id'];
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
                    <th>Mã đơn hàng</th>
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
                    <td width="30%"><p class="td-name"><?php echo $row['customer_name']; ?></p></td>  
                    <td align="center"><?php echo $row['customer_phone']; ?></td>  
                    <td width="30%" align="center"><?php echo $row['cart_id']; ?></td>
                    <td width="15%">
                        <div class="function_click">
                            <a href="?action=quanlydonhang&query=xem&iddonhang=<?php echo $row['customer_id'] ?>" class="function_click-see">
                                <i class="fas fa-fw fa-bars"></i>
                            </a>
                            <a href="order/xuly.php?iddonhang=<?php echo $row['cart_id'] ?>" class="function_click-delete">
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
