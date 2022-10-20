<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    if($_SESSION['phanquyen']!='admin') { ?>
        <p class="thongbao-phanquyen">
            <span>Bạn Không Đủ Quyền Quản Lý Mục Này</span><br>
            <span><a href="index.php">Bấm Vào Đậy Để Quay Lại Trang Chủ!</a></span>
        </p>
        <?php }else {
        $sql_lietke = "SELECT * FROM admin ORDER BY admin_id DESC";
        $query_lietke = mysqli_query($conn,$sql_lietke);
    ?>

    <div class="card-body">
        <div class="table-responsive">
            <div class="container-add-right">
                <div class="container-add">
                    <a href="index.php?action=quanlyadmin&query=them" class="container-add-click">Add</a>
                </div>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php if(isset($_GET['msg'])) { ?>
                    <p class="msg">
                        <?php echo $_GET['msg']; ?>
                    </p>
                <?php } ?>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Tên đăng nhập</th>
                        <th>Quyền hạn</th>
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
                        <td width="30%" align="center"><?php echo $row['admin_name']; ?></td>
                        <td align="center"><?php echo $row['admin_username']; ?></td>
                        <td align="center"> 
                            <?php if($row['admin_id'] == 1) {
                                echo "Admin";
                                }else {
                                    echo "Quản trị viên";
                                }
                            ?>
                        </td>
                        <td width="15%">
                            <div class="function_click">
                                <a href="?action=quanlyadmin&query=xem&idadmin=<?php echo $row['admin_id'] ?>" class="function_click-see">
                                    <i class="fas fa-fw fa-bars"></i>
                                </a>
                                <a href="?action=quanlyadmin&query=sua&idadmin=<?php echo $row['admin_id'] ?>"class="function_click-edit">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>
                                <a href="admin/xuly.php?idadmin=<?php echo $row['admin_id'] ?>" class="function_click-delete">
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
<?php } ?>

