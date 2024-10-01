<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>

  <?php
  

  
  
  ?>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="id" class="form-label">ID Sản phẩm:</label>
            <input type="number" class="form-control" id="id" name="id">
            <div class="text-danger"></div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Tên Sản phẩm:</label>
            <input type="text" class="form-control" id="name" name="name">
            <div class="text-danger"></div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá Sản phẩm:</label>
            <input type="number" class="form-control" id="price" name="gia">
            <div class="text-danger"></div>
        </div>
        <div class="mb-3">
        <label for="description" class="form-label">Mô tả :</label>
        <input type="text" class="form-control" id="description" name="description">
        </div> 
        <div class="mb-3"></div>
        <label for="image" class="form-label">Hình ảnh :</label>
        <input type="text" class="form-control" id="image" name="image">
            <div class="text-danger"></div>
        </div>
        <div class="mb-3" id="extraField"></div>
        <button type="submit" name="add" class="btn btn-primary">Thêm sản phẩm</button>
    </form>

    <th>Danh mục</th>
    <h3>Danh sách sản phẩm</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Image</th>
            <th>danh mục </th>
            
            
        </tr>
    </thead>

 
        <?php
        require_once 'Connect.php';

        // Truy vấn lấy dữ liệu sản phẩm từ cơ sở dữ liệu
        $result = $conn->query("SELECT id, name, price, description, image FROM Product");

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";  // Mở thẻ hàng của bảng
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            // echo "<td><img src='$row->['image'] width='200px' alt=''></td>";
            echo "<td><img src='" . $row['image'] . "' width='200px' alt=''></td>";

            // echo "<td><img src='" . $row['image'] . "' width='200px' alt=''></td>";?


            echo "</tr>";  // Đóng thẻ hàng của bảng
        };
      

        if (isset($_POST['add'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['gia']; // Đồng nhất với tên của trường form
            $description = $_POST['description'];
            $image = $_POST['image'];
        
            // Thêm sản phẩm vào bảng Product
            try {
                $sql = "INSERT INTO Product (name, price, description, image) VALUES (:name, :price, :description, :image)";

                $stmt = $conn->prepare($sql);
                // $stmt->bindParam(':id', $id);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image', $image);
                
                if ($stmt->execute()) {
                    echo "Sản phẩm đã được thêm thành công.";
                } else {
                    echo "Lỗi khi thêm sản phẩm: " . implode(" ", $stmt->errorInfo());
                }
            } catch(PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }
        var_dump($stmt); // Kiểm tra chi tiết câu truy vấn và các tham số bind

        
?>

       
        
    </tbody>
</table>


