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
  <h2>Thêm sản phẩm</h2>
  <form method="POST" action="">
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input type="text" class="form-control" id="id" name="id" required>
    </div>
    <div class="mb-3">
      <label for="ten" class="form-label">Tên</label>
      <input type="text" class="form-control" id="ten" name="ten" required>
    </div>
    <div class="mb-3">
      <label for="gia" class="form-label">Giá</label>
      <input type="number" class="form-control" id="gia" name="gia" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
  </form>

  <h2 class="mt-5">Danh sách sản phẩm</h2>         
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
      <?php foreach ($_SESSION['danhSachSanPham'] as $sanPham): ?>
      <tr>
        <td><?php echo $sanPham->getId(); ?></td>
        <td><?php echo $sanPham->getTen(); ?></td>
        <td><?php echo $sanPham->getGia(); ?></td>
        <td>
          <a href="?delete=<?php echo $sanPham->getId(); ?>" class="btn btn-danger">Xóa</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>
