<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD']=="POST"){
    // echo '<pre>';
    // print_r ($_REQUEST);
    // die();
    $MABENHNHAN_id = $_REQUEST['MABENHNHAN_id'];
    $TENBENHNHAN = $_REQUEST['TENBENHNHAN'];
    $PHONG = $_REQUEST['PHONG'];
    $NGAYNHAPVIEN = $_REQUEST['NGAYNHAPVIEN'];
    $GIOITINH = $_REQUEST['GIOITINH'];
    $TINHTRANG = $_REQUEST['TINHTRANG'];
    $THONGTIN = $_REQUEST['THONGTIN'];
    

    $sql = "INSERT INTO `benh_nhans`
    ( `TENBENHNHAN`, `PHONG`,`NGAYNHAPVIEN`,`GIOITINH`, `TINHTRANG`, `THONGTIN`) 
    VALUES 
    ('$TENBENHNHAN','$PHONG','$NGAYNHAPVIEN','$GIOITINH', '$TINHTRANG', '$THONGTIN')";
     //Thuc hien truy van
    $conn->exec($sql);

    // chuyen huong ve trang danh sach
    header("Location: index.php");

}


?>

    
<style>
  form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 5px;
    font-family: Arial, sans-serif;
  }

  h1 {
    text-align: center;
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
  }

  input[type="text"] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>

<form action="" method="POST">
 
  <h1>Thêm bệnh nhân</h1>

  <label for="fname">Tên bệnh nhân:</label><br>
  <input type="text" id="fname" name="TENBENHNHAN" placeholder="Nhập tên bệnh nhân" required title="Vui lòng nhập tên bệnh nhân"><br>
  
  <label for="lname">Phòng:</label><br>
  <input type="text" id="lname" name="PHONG" placeholder="Nhập phòng" required title="Vui lòng nhập phòng"> <br>
  
  <label for="lname">Ngày nhập viện:</label><br>
  <input type="date" id="lname" name="NGAYNHAPVIEN" placeholder="Nhập ngày nhập viện" required title="Vui lòng nhập ngày nhập viện"> <br>
  
  <label for="lname">Giới tính:</label><br>
  <input type="text" id="lname" name="GIOITINH" placeholder="Nhập giới tính" required title="Vui lòng nhập giới tính"> <br>
  
  <label for="lname">Tình trạng:</label><br>
  <input type="text" id="lname" name="TINHTRANG" placeholder="Nhập tình trạng" required title="Vui lòng nhập tình trạng"> <br>
  
  <label for="lname">Thông tin:</label><br>
  <input type="text" id="lname" name="THONGTIN" placeholder="Nhập thông tin" required title="Vui lòng nhập thông tin"> <br>





  <style>
  .submit-container {
    display: flex;
    justify-content: center;
  }

  .submit-container input[type="submit"] {
  }
</style>

<div class="submit-container">
  <input type="submit" value="Thêm">
</div>
</form>
