<?php
    $sql_chitiet = "SELECT * FROM contact WHERE contact_id = '$_GET[idlienhe]' LIMIT 1";
    $query_chitiet = mysqli_query($conn,$sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)) { ?>

    <div class="xem">
        <div class="gioithieu_sanpham">
            <p>Họ: <?php echo $row_chitiet['contact_firstname']; ?> Tên: <?php echo $row_chitiet['contact_lastname']; ?></p>
            <p>SĐT: <?php echo $row_chitiet['contact_phone']; ?></p>
            <p>Email: <?php echo $row_chitiet['contact_email']; ?></p>
            <p>Nội dung: <?php echo $row_chitiet['contact_content']; ?></p>
        </div>
        <div class="function_click">
            <a href="index.php?action=quanlylienhe&query=lietke" class="function_click-delete">
                <i class="fas fa-fw fa-arrow-left"></i>
            </a>
        </div>
    </div>

<?php } ?>