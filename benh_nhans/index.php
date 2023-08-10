<?php
include '../db.php';

$sql = "SELECT * FROM `benh_nhans`";
if( isset( $_GET["search"] )  ){
  $s = $_GET["search"];
  $sql .= " WHERE benh_nhans.TENBENHNHAN  LIKE '%$s%'";

}
// Truy vấn
$stmt = $conn->query($sql);
// Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);

// Trả về dữ liệu
$rows = $stmt->fetchAll();
?>

          
<style>
  /* Form */
  form {
    margin: 20px 0;
  }
  input[type="text"],
  input[type="submit"] {
    padding: 10px;
    border-radius: 5px;
    border: none;
    font-size: 18px;
    margin-right: 10px;
  }
  input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #0056B3;
  }

  /* Table */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
  }
  th {
    background: linear-gradient(to bottom, #F2F2F2, #ddd);
    color: #333;
    font-weight: bold;
  }
  tr:nth-child(even) {
    background: #F9F9F9;
  }
  tr:hover {
    background: #ddd;
  }
  td a {
    color: #007BFF;
    text-decoration: none;
  }
  td a:hover {
    color: #0056B3;
  }

  /* Header and Sidebar */
  .header {
    background-color: #007BFF;
    color: #fff;
    padding: 20px;
    text-align: center;
    margin-bottom: 20px;
  }
  .sidebar {
    background-color: #F9F9F9;
    float: left;
    width: 20%;
    padding: 20px;
    margin-right: 20px;
    border-radius: 5px;
  }
  .footer {
    clear: both;
    background-color: #ddd;
    color: #333;
    padding: 20px;
    text-align: center;
    margin-top: 20px;
    border-radius: 5px;
  }
</style>

<body>


<form action="" method="GET">
<input type="text" name="search">
<input type="submit" name="submit" value="Tìm kiếm">
</form>
  <div class="container">
    <table>
      <h2>Liệt kê các bệnh nhân</h2>
      <a href="http://localhost/thi-thuc-hanh/benh_nhans/create.php">THÊM</a> 

      <tr>
        <th>Mã bệnh nhân</th>
        <th>Tên bệnh nhân</th>
    
        <th>Phòng</th>
        <th>Ngày nhập viện</th>
        <th>giới tính</th>
        <th>Tình trạng</th>
        <th>Thông tin</th>
        <th>Thao tác</th>

      </tr>
      <?php foreach($rows as $r) : ?>   
        <tr>
          <td><?php echo $r['MABENHNHAN_id']; ?></td>
          <td><?php echo $r['TENBENHNHAN']; ?></td>
          <td><?php echo $r['PHONG']; ?></td>
          <td><?php echo $r['NGAYNHAPVIEN']; ?></td>
          <td><?php echo $r['GIOITINH']; ?></td>
          <td><?php echo $r['TINHTRANG']; ?></td>
          <td><?php echo $r['THONGTIN']; ?></td>

          
          <td>
            <a href="edit.php?id=<?php echo $r['MABENHNHAN_id']; ?>">Sửa</a> |  
            <a onclick="return confirm('Chắc chắn chưa ?');" href="delete.php?id=<?php echo $r['MABENHNHAN_id']; ?>">Xóa</a>
          </td>
        </tr>
      <?php endforeach; ?>
   
  </div>
</body>

