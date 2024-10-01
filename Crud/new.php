<!-- <?php
require_once 'Connect.php';
class QuanLyDanhMuc {
    private $danhSachDanhMuc = [];

    // Thêm danh mục
    public function themDanhMuc($ten, $moTa, $danhMucCha = null) {
        try {
            global $conn;
            if (!$conn) {
                throw new Exception("Connection failed");
            }
            $sql = "INSERT INTO danhmuc (ten, mo_ta, danh_muc_cha) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$ten, $moTa, $danhMucCha]);
            return true;
        } catch (\Exception $e) {
            echo "Lỗi khi thêm danh mục: " . $e->getMessage();
            return false;
        }
    }

    // Xóa danh mục
    public function xoaDanhMuc($id) {
        try {
            global $conn;
            if (!$conn) {
                throw new Exception("Connection failed");
            }
            $sql = "DELETE FROM danhmuc WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->rowCount() > 0;
        } catch (\Exception $e) {
            echo "Lỗi khi xóa danh mục: " . $e->getMessage();
            return false;
        }
    }

    // Sửa danh mục
    public function suaDanhMuc($id, $ten, $moTa, $danhMucCha = null) {
        try {
            global $conn;
            if (!$conn) {
                throw new Exception("Connection failed");
            }
            $sql = "UPDATE danhmuc SET ten = ?, mo_ta = ?, danh_muc_cha = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$ten, $moTa, $danhMucCha, $id]);
            return true;
        } catch (\Exception $e) {
            echo "Lỗi khi sửa danh mục: " . $e->getMessage();
            return false;
        }
    }

    // Lấy danh sách danh mục
    public function getDanhSachDanhMuc() {
        try {
            global $conn;
            if (!$conn) {
                throw new Exception("Connection failed");
            }
            $sql = "SELECT * FROM danhmuc";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            echo "Lỗi khi lấy danh sách danh mục: " . $e->getMessage();
            return [];
        }
    }

    // Lấy danh mục theo ID
    public function getDanhMucById($id) {
        try {
            global $conn;
            if (!$conn) {
                throw new Exception("Connection failed");
            }
            $sql = "SELECT * FROM danhmuc WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            echo "Lỗi khi lấy danh mục: " . $e->getMessage();
            return null;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản lý danh mục</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <h2>Quản lý danh mục</h2>

        <!-- Form thêm danh mục -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="ten" class="form-label">Tên danh mục:</label>
                <input type="text" class="form-control" id="ten" name="ten" required>
            </div>

            <div class="mb-3">
                <label for="mota" class="form-label">Mô tả danh mục:</label>
                <textarea class="form-control" id="mota" name="mota" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="danhMucCha" class="form-label">Danh mục cha:</label>
                <select class="form-control" id="danhMucCha" name="danhMucCha">
                    <option value="">Không có</option>
                    <?php
                    // Lấy danh sách danh mục cha từ cơ sở dữ liệu
                    include_once 'QuanLyDanhMuc.php';
                    $quanLyDanhMuc = new QuanLyDanhMuc();
                    $danhMucChaList = $quanLyDanhMuc->getDanhSachDanhMuc();
                    foreach ($danhMucChaList as $danhMuc) {
                        echo "<option value='{$danhMuc->id}'>{$danhMuc->ten}</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" name="add" class="btn btn-primary">Thêm danh mục</button>
        </form>

        <h3>Danh sách danh mục</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Danh mục cha</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $danhMucList = $quanLyDanhMuc->getDanhSachDanhMuc();
                foreach ($danhMucList as $danhMuc) {
                    echo "<tr>";
                    echo "<td>{$danhMuc->id}</td>";
                    echo "<td>{$danhMuc->ten}</td>";
                    echo "<td>{$danhMuc->mo_ta}</td>";
                    echo "<td>" . ($danhMuc->danh_muc_cha ? $danhMuc->danh_muc_cha : 'Không có') . "</td>";
                    echo "<td>
                            <a href='?action=edit&id={$danhMuc->id}' class='btn btn-warning'>Sửa</a>
                            <a href='?action=delete&id={$danhMuc->id}' class='btn btn-danger'>Xóa</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Xử lý thêm danh mục
    if (isset($_POST['add'])) {
        $ten = $_POST['ten'];
        $moTa = $_POST['mota'];
        $danhMucCha = $_POST['danhMucCha'] ? $_POST['danhMucCha'] : null;
        if ($quanLyDanhMuc->themDanhMuc($ten, $moTa, $danhMucCha)) {
            echo "Đã thêm danh mục mới!";
        } else {
            echo "Lỗi khi thêm danh mục!";
        }
    }

    // Xử lý xóa danh mục
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($quanLyDanhMuc->xoaDanhMuc($id)) {
            echo "Đã xóa danh mục!";
        } else {
            echo "Lỗi khi xóa danh mục!";
        }
    }

    // Xử lý sửa danh mục
    if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $danhMuc = $quanLyDanhMuc->getDanhMucById($id);
        if ($danhMuc) {
            ?>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $danhMuc->id ?>">
                <div class="mb-3">
                    <label for="ten" class="form-label">Tên danh mục:</label>
                    <input type="text" class="form-control" id="ten" name="ten" value="<?php echo $danhMuc->ten ?>" required>
                </div>

                <div class="mb-3">
                    <label for="mota" class="form-label">Mô tả danh mục:</label>
                    <textarea class="form-control" id="mota" name="mota" rows="3" required><?php echo $danhMuc->mo_ta ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="danhMucCha" class="form-label">Danh mục cha:</label>
                    <select class="form-control" id="danhMucCha" name="danhMucCha">
                        <option value="">Không có</option>
                        <?php
                        foreach ($danhMucChaList as $danhMucCha) {
                            $selected = ($danhMucCha->id == $danhMuc->danh_muc_cha) ? "selected" : "";
                            echo "<option value='{$danhMucCha->id}' $selected>{$danhMucCha->ten}</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" name="edit" class="btn btn-info">Sửa danh mục</button>
            </form>
            <?php
        }
    }

    // Xử lý cập nhật danh mục sau khi sửa
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $ten = $_POST['ten'];
        $moTa = $_POST['mota'];
        $danhMucCha = $_POST['danhMucCha'] ? $_POST['danhMucCha'] : null;
        if ($quanLyDanhMuc->suaDanhMuc($id, $ten, $moTa, $danhMucCha)) {
            echo "Đã sửa danh mục!";
        } else {
            echo "Lỗi khi sửa danh mục!";
        }
    }
    ?>
</body>

</html> -->
