<?php
    $sql_lietke = "SELECT * FROM contact ORDER BY contact_id DESC";
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
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Mã liên hệ</th>
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
                    <td width="25%" align="center"><?php echo $row['contact_firstname']; ?></td>
                    <td width="25%" align="center"><?php echo $row['contact_lastname']; ?></td>
                    <td width="30%" align="center"><?php echo $row['contact_id']; ?></td>
                    <td width="15%">
                        <div class="function_click">
                            <a href="?action=quanlylienhe&query=xem&idlienhe=<?php echo $row['contact_id'] ?>" class="function_click-see">
                                <i class="fas fa-fw fa-bars"></i>
                            </a>
                            <a href="contact/xuly.php?idlienhe=<?php echo $row['contact_id'] ?>" class="function_click-delete">
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