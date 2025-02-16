<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản lý sản phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
    </svg>
</head>

<body>
    <div class="container mt-3">
        <h2>Bảng quản lý sản phẩm</h2>

        <!-- Form để thêm sản phẩm -->
        <form method="POST" action="add">
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

            <div>
                <form method="POST" action="">
                    <label for="gsearch">Tìm kiếm sản phẩm:</label>
                    <input type="text" id="gsearch" name="gsearch" aria-label="Search" required>
                    <button type="submit" name="search">
<i class="bi bi-search"></i> Tìm kiếm
                    </button>
                </form>
            </div>
            <div>
                <form method="POST" action="">
                    <label for="sapxep">Sắp xếp sản phẩm:</label>
                    <select id="sapxep" name="sapxep">
                        <option value="gia">Theo giá</option>
                    </select>
                    <button type="submit" name="sort">Sắp xếp</button>
                </form>
            </div>

            <br>
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
                    var_dump($_POST);
                    // die();

                    if ($loai == "DienThoai") {
                        $heDieuHanh = "Androi"; // Giá trị mặc định, có thể cho thêm field để chọn hệ điều hành nếu cần
                        $sanPhamMoi = new DienThoai($id, $ten, $gia, $heDieuHanh);
                    } else {
                        $cpu = "Intel"; // Giá trị mặc định, có thể cho thêm field để chọn CPU nếu cần
                        $sanPhamMoi = new Laptop($id, $ten, $gia, $cpu);
                    }
                    $check = $quanLySanPham->KTSanPhambyid($id); //
                    if ($check == true) {
                        echo "id toonf taij";
                    } else {
                        $quanLySanPham->themSanPham($sanPhamMoi);
                        echo "Đã thêm sản phẩm mới!<br>";
                    }

                    // Thêm sản phẩm mới vào danh sách
                } else 
  if (isset($_POST['update'])) {
                    $id = intval($_POST['id']);
                    $ten = $_POST['ten'];
                    $gia = intval($_POST['gia']);
                    $loai = $_POST['loai'];
                    // var_dump($_POST) ;
                    // die();
                    if ($loai == "DienThoai") {
                        $heDieuHanh = "Androi"; // Giá trị mặc định, có thể cho thêm field để chọn hệ điều hành nếu cần
                        $sanPhamMoi = new DienThoai($id, $ten, $gia, $heDieuHanh);
                    } else {
                        $cpu = "Intel"; // Giá trị mặc định, có thể cho thêm field để chọn CPU nếu cần
                        $sanPhamMoi = new Laptop($id, $ten, $gia, $cpu);
}

                    $check = $quanLySanPham->KTSanPhambyid($id); //
                    if ($check) {
                        $quanLySanPham->suaSanPham($id, $ten, $gia);
                        echo "Đã thêm sản phẩm mới!<br>";
                    }
                    $quanLySanPham->themSanPham($sanPhamMoi);
                    echo "Đã thêm sản phẩm mới!<br>";
                }


                // Kiểm tra nếu có yêu cầu tìm kiếm
                if (isset($_POST['search'])) {
                    $tenSanPham = $_POST['gsearch'];

                    // Gọi hàm tìm kiếm sản phẩm từ danh sách
                    echo "<h3>Kết quả tìm kiếm cho: $tenSanPham</h3>";
                    $quanLySanPham->timKiemSanPham($tenSanPham);
                }

                //  sắp xếp
                if (isset($_POST['sort'])) {
                    $tieuChiSapXep = $_POST['sapxep'];

                    // Gọi hàm sắp xếp sản phẩm từ danh sách
                    echo "<h3>Danh sách sản phẩm đã được sắp xếp theo: $tieuChiSapXep</h3>";
                    $quanLySanPham->sapXepSanPham($tieuChiSapXep);
                    $quanLySanPham->hienThiDanhSach();
                }

                // Hiển thị danh sách sản phẩm
                $danhSachSanPham = $quanLySanPham->getDanhSachSanPham();
                foreach ($danhSachSanPham as $sanPham) {
                    echo "<tr>";
                    echo "<td>" . $sanPham->getId() . "</td>";
                    echo "<td>" . $sanPham->getTen() . "</td>";
                    echo "<td>" . $sanPham->getGia() . "</td>";


                    echo "<td>
          <a href='?action=delete&id=" . $sanPham->getId() . "' class='btn btn-danger'>Xóa</a>
         <a href='?action=update&id=" . $sanPham->getId() . "' class='btn btn-info'>update</a>
         
          </td>";
                }

                // Xử lý xóa sản phẩm
                if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
                    $id = intval($_GET['id']);
                    $quanLySanPham->xoaSanPham($id);
                    echo "Đã xóa sản phẩm!<br>";
                }
                //   sử  lí   sửa  sản phẩm 
                if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])) {
                    $id = intval($_GET['id']);
                    $SP = $quanLySanPham->getSanPhambyid($id);
                    if ($SP) { ?>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID Sản phẩm:</label>
                                <input type="number" value="<?php echo $SP->getid() ?>" readonly class="form-control" id="id" name="id" required>
                            </div>
                            <div class="mb-3">
<label for="ten" class="form-label">Tên Sản phẩm:</label>
                                <input type="text" value="<?php echo $SP->getTen() ?>" class="form-control" id="ten" name="ten" required>
                            </div>
                            <div class="mb-3">
                                <label for="gia" class="form-label">Giá Sản phẩm:</label>
                                <input type="number" value="<?php echo $SP->getGia() ?>" class="form-control" id="gia" name="gia" required>
                            </div>
                            <div class="mb-3">
                                <label for="loai" class="form-label">Loại sản phẩm:</label>
                                <select class="form-control" id="loai" name="loai">
                                    <option value="DienThoai">Điện thoại</option>
                                    <option value="Laptop">Laptop</option>
                                </select>
                            </div>
                            <div class="mb-3" id="extraField"></div>
                            <button type="submit" name="update" class="btn btn-info">Thay đổi</button>
                        </form>

                <?php  }
                    // var_dump($SP);
                    echo "Đã xóa sản phẩm!<br>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>