<?php
include_once '../db.php';
if( isset( $_GET['id'] ) ){
    $id = $_GET['id'];
}else{
    $id = 0;
}

$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;

if( !$id ){
    header("Location: index.php");
}
$sql = "SELECT * FROM `benh_nhans` WHERE MABENHNHAN_id = $id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
// Lay ve du lieu duy nhat
$row = $stmt->fetch();
// echo '<pre>';
// print_r($row);
// die();

if( $_SERVER['REQUEST_METHOD'] == "POST" ){
    // in du lieu nguoi dung gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();
    // 
    $MABENHNHAN_id = $_REQUEST['MABENHNHAN_id'];
    $TENBENHNHAN = $_REQUEST['TENBENHNHAN'];
    $PHONG = $_REQUEST['PHONG'];


    $NGAYNHAPVIEN = $_REQUEST['NGAYNHAPVIEN'];
    
   

    $GIOITINH = $_REQUEST['GIOITINH'];

    $TINHTRANG = $_REQUEST['TINHTRANG'];
    $THONGTIN = $_REQUEST['THONGTIN'];
    
    $sql = "UPDATE `benh_nhans` SET `MABENHNHAN_id` = '$MABENHNHAN_id', `TENBENHNHAN` = '$TENBENHNHAN',  `PHONG` = '$PHONG',
      `NGAYNHAPVIEN` = '$NGAYNHAPVIEN', `GIOITINH` = '$GIOITINH',`TINHTRANG` = '$TINHTRANG',`THONGTIN` = '$THONGTIN' WHERE `MABENHNHAN_id` = $id";
     //Thuc hien truy van
     $conn->exec($sql);

     // chuyen huong ve trang danh sach
     header("Location: index.php");
}

?>

<form action="" method="POST">
<style>
  body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
  }

  h1 {
    margin-top: 20px;
    font-size: 24px;
    text-align: center;
  }

  .add-item {
    display: block;
    text-align: center;
    margin-bottom: 20px;
  }

  form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  label {
    display: block;
    font-weight: bold;
    margin-bottom: 10px;
  }

  input[type="text"] {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    box-sizing: border-box;
    font-size: 16px;
    outline: none;
  }

  input[type="text"]:focus {
    border-color: #4CAF50;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>

<h1>Sửa mặt hàng</h1>

</style>

<h1>Sửa thông tin bệnh nhân</h1>

<form>
  <label for="fname">Mã bệnh nhân:</label>
  <input type="text" id="fname" name="MABENHNHAN_id" value="<?= $row['MABENHNHAN_id']; ?>">

  <label for="fname">Tên bệnh nhân:</label>
  <input type="text" id="fname" name="TENBENHNHAN" value="<?= $row['TENBENHNHAN']; ?>">

  <label for="fname">Phòng:</label>
  <input type="text" id="fname" name="PHONG" value="<?= $row['PHONG']; ?>">

  <label for="lname">Ngày nhập viện:</label>
  <input type="date" id="lname" name="NGAYNHAPVIEN" value="<?= $row['NGAYNHAPVIEN']; ?>">

  <label for="lname">Giới tính:</label>
  <input type="text" id="lname" name="GIOITINH" value="<?= $row['GIOITINH']; ?>">

  <label for="lname">Tình trạng:</label>
  <input type="text" id="lname" name="TINHTRANG" value="<?= $row['TINHTRANG']; ?>">

  <label for="lname">Thông tin:</label>
  <input type="text" id="lname" name="THONGTIN" value="<?= $row['THONGTIN']; ?>">

  <input type="submit" value="Sửa">
</form>
 