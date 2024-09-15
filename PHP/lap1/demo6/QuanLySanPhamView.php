<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quản lý sản phẩm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <h2>Bảng quản lý sản phẩm</h2>
  
  <!-- Form để thêm sản phẩm -->
  <form method="POST" action="">
    <div class="mb-3">
      <label for="id" class="form-label">ID Sản phẩm:</label>
      <input type="number" class="form-control" id="id" name="id" required>
    </div>
    <div class="mb-3">
      <label for="ten" class="form-label">Tên Sản phẩm:</label>
      <input type="text" class="form-control" id="ten" name="ten" required>
    </div>
    <div class="mb-3">
      <label for="gia" class="form-label">Giá Sản phẩm:</label>
      <input type="number" class="form-control" id="gia" name="gia" required>
    </div>
    <div class="mb-3">
      <label for="loai" class="form-label">Loại sản phẩm:</label>
      <select class="form-control" id="loai" name="loai">
        <option value="DienThoai">Điện thoại</option>
        <option value="Laptop">Laptop</option>
      </select>
    </div>
    <div class="mb-3" id="extraField"></div>
    <button type="submit" name="add" class="btn btn-primary">Thêm sản phẩm</button>
  </form>
  
  <h3>Danh sách sản phẩm</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'sanpham.php';

      $quanLySanPham = new QuanLySanPham();

      // Thêm sản phẩm ban đầu để kiểm tra
      $quanLySanPham->themSanPham(new DienThoai(1, "iPhone", 20000, "iOS"));
      $quanLySanPham->themSanPham(new Laptop(2, "MacBook", 30000, "Intel i7"));

      // Xử lý thêm sản phẩm
      if (isset($_POST['add'])) {
          $id = intval($_POST['id']);
          $ten = $_POST['ten'];
          $gia = intval($_POST['gia']);
          $loai = $_POST['loai'];

          if ($loai == "DienThoai") {
              $heDieuHanh = "Androi"; // Giá trị mặc định, có thể cho thêm field để chọn hệ điều hành nếu cần
              $sanPhamMoi = new DienThoai($id, $ten, $gia, $heDieuHanh);
          } else {
              $cpu = "Intel"; // Giá trị mặc định, có thể cho thêm field để chọn CPU nếu cần
              $sanPhamMoi = new Laptop($id, $ten, $gia, $cpu);
          }

          // Thêm sản phẩm mới vào danh sách
          $quanLySanPham->themSanPham($sanPhamMoi);
          echo "Đã thêm sản phẩm mới!<br>";
      }

      // Hiển thị danh sách sản phẩm
      $danhSachSanPham = $quanLySanPham->getDanhSachSanPham();
      foreach ($danhSachSanPham as $sanPham) {
          echo "<tr>";
          echo "<td>" . $sanPham->getId() . "</td>";
          echo "<td>" . $sanPham->getTen() . "</td>";
          echo "<td>" . $sanPham->getGia() . "</td>";
          echo "<td><a href='?action=delete&id=" . $sanPham->getId() . "' class='btn btn-danger'>Xóa</a></td>";
          echo "</tr>";
      }

      // Xử lý xóa sản phẩm
      if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
          $id = intval($_GET['id']);
          $quanLySanPham->xoaSanPham($id);
          echo "Đã xóa sản phẩm!<br>";
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
