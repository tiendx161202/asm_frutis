<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    $sql_lietke = "SELECT * FROM personnel ORDER BY personnel_id DESC";
    $query_lietke = mysqli_query($conn,$sql_lietke);

    if($_SESSION['phanquyen']!='admin') { ?>
        <p class="thongbao-phanquyen">
            <span>Bạn Không Đủ Quyền Quản Lý Mục Này</span><br>
            <span><a href="index.php">Bấm Vào Đậy Để Quay Lại Trang Chủ!</a></span>
        </p>
    <?php }else { ?>
        
    <div class="card-body">
        <div class="table-responsive">
            <div class="container-add-right">
                <div class="container-add">
                    <a href="index.php?action=quanlynhansu&query=them" class="container-add-click">Add</a>
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
                        <th>Vị trí</th>
                        <th>Cửa hàng</th>
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
                        <td> 
                            <p class="td-name"><?php echo $row['personnel_name']; ?></p>
                        </td>
                        <td width="25%" align="center">
                            <?php if($row['personnel_location'] == 1) {
                                echo "Nhân viên thử việc";
                                }else {
                                    echo "Nhân viên chính thức";
                                }
                            ?>
                        </td> 
                        <td width="20%" align="center">
                            <?php if($row['personnel_branch'] == 1) {
                                echo "Cơ sở 1";
                                }else {
                                    echo "Cơ sở 2";
                                }
                            ?>
                        </td>
                        <td width="15%">
                            <div class="function_click">
                                <a href="?action=quanlynhansu&query=xem&idnhansu=<?php echo $row['personnel_id'] ?>" class="function_click-see">
                                    <i class="fas fa-fw fa-bars"></i>
                                </a>
                                <a href="?action=quanlynhansu&query=sua&idnhansu=<?php echo $row['personnel_id'] ?>" class="function_click-edit">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>
                                <a href="personnel/xuly.php?idnhansu=<?php echo $row['personnel_id'] ?>"  class="function_click-delete">
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
