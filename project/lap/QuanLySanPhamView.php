<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-3">
        <h2>Bảng quản lý sản phẩm</h2>

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
                <tr>
                    <form method="POST" action="">
                        <td colspan="4">
                            <label for="gsearch">Tìm kiếm sản phẩm:</label>
                            <input type="text" id="gsearch" name="gsearch" aria-label="Search" required>
                            <button type="submit" name="search"><i class="bi bi-search"></i> Tìm kiếm</button>
                        </td>
                    </form>
                </tr>
                <tr>
                    <form method="POST" action="">
                        <td colspan="4">
                            <label for="sapxep">Sắp xếp sản phẩm:</label>
                            <select id="sapxep" name="sapxep">
                                <option value="gia">Theo giá</option>
                            </select>
                            <button type="submit" name="sort">Sắp xếp</button>
                        </td>
                    </form>
                </tr>
                <?php
                include 'sanpham.php';
                require_once 'quanlysanpham.php';
                $quanLySanPham = new QuanLySanPham();
                $quanLySanPham->themSanPham(new DienThoai(1, "iPhone", 20000, "iOS"));
                $quanLySanPham->themSanPham(new Laptop(2, "MacBook", 30000, "Intel i7"));

                if (isset($_POST['add'])) {
                    $id = intval($_POST['id']);
                    $ten = $_POST['ten'];
                    $gia = intval($_POST['gia']);
                    $loai = $_POST['loai'];
                    $sanPhamMoi = ($loai == "DienThoai") ? new DienThoai($id, $ten, $gia, "Androi") : new Laptop($id, $ten, $gia, "Intel");
                    
                    if ($quanLySanPham->KTSanPhambyid($id)) {
                        echo "ID tồn tại";
                    } else {
                        $quanLySanPham->themSanPham($sanPhamMoi);
                        echo "Đã thêm sản phẩm mới!<br>";
                    }
                }

                if (isset($_POST['search'])) {
                    echo "<h3>Kết quả tìm kiếm cho: " . $_POST['gsearch'] . "</h3>";
                    $quanLySanPham->timKiemSanPham($_POST['gsearch']);
                }

                if (isset($_POST['sort'])) {
                    echo "<h3>Danh sách sản phẩm đã được sắp xếp theo: " . $_POST['sapxep'] . "</h3>";
                    $quanLySanPham->sapXepSanPham($_POST['sapxep']);
                }

                foreach ($quanLySanPham->getDanhSachSanPham() as $sanPham) {
                    echo "<tr>
                        <td>{$sanPham->getId()}</td>
                        <td>{$sanPham->getTen()}</td>
                        <td>{$sanPham->getGia()}</td>
                        <td>
                            <a href='?action=delete&id={$sanPham->getId()}' class='btn btn-danger'>Xóa</a>
                            <a href='?action=update&id={$sanPham->getId()}' class='btn btn-info'>Update</a>
                        </td>
                    </tr>";
                }

                if (isset($_GET['action'])) {
                    $id = intval($_GET['id']);
                    if ($_GET['action'] == 'delete') {
                        $quanLySanPham->xoaSanPham($id);
                        echo "Đã xóa sản phẩm!<br>";
                    } elseif ($_GET['action'] == 'update') {
                        $SP = $quanLySanPham->getSanPhambyid($id);
                        if ($SP) { ?>
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="id" class="form-label">ID Sản phẩm:</label>
                                    <input type="number" value="<?php echo $SP->getid(); ?>" readonly class="form-control" id="id" name="id" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ten" class="form-label">Tên Sản phẩm:</label>
                                    <input type="text" value="<?php echo $SP->getTen(); ?>" class="form-control" id="ten" name="ten" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gia" class="form-label">Giá Sản phẩm:</label>
                                    <input type="number" value="<?php echo $SP->getGia(); ?>" class="form-control" id="gia" name="gia" required>
                                </div>
                                <div class="mb-3">
                                    <label for="loai" class="form-label">Loại sản phẩm:</label>
                                    <select class="form-control" id="loai" name="loai">
                                        <option value="DienThoai">Điện thoại</option>
                                        <option value="Laptop">Laptop</option>
                                    </select>
                                </div>
                                <button type="submit" name="update" class="btn btn-info">Thay đổi</button>
                            </form>
                        <?php }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
