<!-- <?php
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
?> -->
