<?php include("../../database/connect.php"); ?>

<?php 
    $tendanhmuc=$_POST['tendanhmuc'];
    //them
    if(isset($_POST['themdanhmuc'])) {
	    $sql_them="INSERT INTO category(category_name) VALUES ('".$tendanhmuc."')";
		mysqli_query($conn,$sql_them);
		header("Location:../index.php?action=quanlydanhmuc&query=lietke&msg=More success!");
    //sua
    }elseif(isset($_POST['suadanhmuc'])) {
        $sql_sua="UPDATE category SET category_name ='".$tendanhmuc."' WHERE category_id='$_GET[iddanhmuc]'";
		mysqli_query($conn,$sql_sua);
		header("Location:../index.php?action=quanlydanhmuc&query=lietke&msg=Successful fix!");
    //xoa
    }else {
        $id = $_GET['iddanhmuc'];
        $strSQL="SELECT COUNT(*) FROM product WHERE category_id = '".$id."'";
        $product=mysqli_query($conn,$strSQL);
        $row=mysqli_fetch_array($product);
        if($row[0]>0) {
            header("Location:../index.php?action=quanlydanhmuc&query=lietke&msg=Can't delete a category that already has products");
            exit();
        }else {
            $sql_xoa="DELETE FROM category WHERE category_id ='".$id."'"; 
        }
		mysqli_query($conn,$sql_xoa);
        header("Location:../index.php?action=quanlydanhmuc&query=lietke&msg=Delete successfully!");
    }
?>