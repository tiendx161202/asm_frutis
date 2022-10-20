<?php
    $sql_lietke = "SELECT * FROM post ORDER BY post_id DESC";
    $query_lietke = mysqli_query($conn,$sql_lietke);
?>

<div class="card-body">
    <div class="table-responsive">
        <div class="container-add-right">
            <div class="container-add">
                <a href="index.php?action=quanlybaiviet&query=them" class="container-add-click">Add</a>
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
                    <th>Tiêu đề</th>
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
                        <p class="td-name"><?php echo $row['post_name']; ?></p>
                    </td>
                    <td width="15%">
                        <div class="function_click">
                            <a href="?action=quanlybaiviet&query=xem&idbaiviet=<?php echo $row['post_id'] ?>" class="function_click-see">
                                <i class="fas fa-fw fa-bars"></i>
                            </a>
                            <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['post_id'] ?>"class="function_click-edit">
                                <i class="fas fa-fw fa-pen"></i>
                            </a>
                            <a href="post/xuly.php?idbaiviet=<?php echo $row['post_id'] ?>" class="function_click-delete">
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