<?php
    $sql_lietke = "SELECT * FROM category ORDER BY category_id DESC";
    $query_lietke = mysqli_query($conn,$sql_lietke);
?>

<div class="card-body">
    <div class="table-responsive">
        <div class="container-add-right">
            <div class="container-add">
                <a href="index.php?action=quanlydanhmuc&query=them" class="container-add-click">Add</a>
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
                    <th>Danh mục</th>
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
                        <p class="td-name"><?php echo $row['category_name']; ?></p>
                    </td>
                    <td width="15%">
                        <div class="function_click">
                            <a href="?action=quanlydanhmuc&query=sua&iddanhmuc=<?php echo $row['category_id'] ?>"class="function_click-edit">
                                <i class="fas fa-fw fa-pen"></i>
                            </a>
                            <a href="category/xuly.php?iddanhmuc=<?php echo $row['category_id'] ?>" class="function_click-delete">
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