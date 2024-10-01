<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản lý sản phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-3">
        <h2>Bảng quản lý sản phẩm</h2>

        <?php 
        include_once 'DienThoai.php';
        require_once 'quanlysanpham.php';
        $quanLySanPham = new QuanLySanPham();
        $result = $quanLySanPham->getDanhSachSanPham();

         $errors=[]; 
        // var_dump($errors);
        // echo "abc";
        
        if (isset( $_POST['add'])) {
            
            $id = intval($_POST['id']);
            $name = $_POST['name'];
            $gia = intval($_POST['gia']);
            $loai = $_POST['loai'];

            //validate 
            if (empty($id)) {
                
               $errors['id'] ='ID không được để trống';
            } else {
                if (!is_numeric($id) || $id < 0) {
                   $errors['id']='ID phải là số nguyên dương';
                }
            }
            if(empty($name)) {
                $errors['name']='Tên không được để trống';
            }else{
                if(strlen($name)<6){
                  $errors[]='Tên phải có ít nhất 6 kí tự';
                }
            }
            if(empty($gia)) {
               $errors['gia']='Giá không được để trống';
            }else{
                if (!is_numeric($gia) || $gia < 0) {
                   $errors['gia']= 'giá phải là số nguyên dương';
                }
            }
        
            

            if ($loai == "DienThoai") {
                $heDieuHanh = "Androi"; // Giá trị mặc định
                $sanPhamMoi = new DienThoai($id, $name, $gia, $heDieuHanh);
            } else {
                $cpu = "Intel"; // Giá trị mặc định
                $sanPhamMoi = new Laptop($id, $name, $gia, $cpu);
            }

            $check = $quanLySanPham->getSanPhambyid($id);
            // var_dump($check);
            if ($check) {
                echo "ID tồn tại";
             $errors['id']='id tồn tại';
            } else {
                $quanLySanPham->themSanPham($sanPhamMoi);
                echo "Đã thêm sản phẩm mới!<br>";
            }
        }
            // var_dump($errors);
        

         ?>
         <?php 
        //  if (count($errors) > 0) {
        //     echo "<div class='alert alert-danger' role='alert'>
        //         " . implode('<br>', $errors) . "
        //     </div>";
        // }

         ?>
      

        <!-- Form để thêm sản phẩm -->
        <form method="POST" action="">
            <div class="mb-3">


                <label for="id" class="form-label">ID Sản phẩm:</label>
                <input type="number" class="form-control" id="id" name="id" >
                <?php if (isset($errors['id'])): ?>
                <div class="text-danger"><?php echo $errors['id']; ?></div>
            <?php endif; ?>
                
            
            <div class="mb-3">
            <label for="ten" class="form-label">Tên Sản phẩm:</label>
            <input type="text" class="form-control" id="ten" name="name">
            <?php if (isset($errors['name'])): ?>
                <div class="text-danger"><?php echo $errors['name']; ?></div>
            <?php endif; ?>
        </div>

            </div>
            <div class="mb-3">
                <label for="gia" class="form-label">Giá Sản phẩm:</label>
                <input type="number" class="form-control" id="gia" name="gia" >
                <?php if (isset($errors['gia'])): ?>
                <div class="text-danger"><?php echo $errors['gia']; ?></div>
            <?php endif; ?>
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
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Image</th>
                    <th>Danh mục</th>
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
               

                // Xử lý thêm sản phẩm
                

                // Xử lý cập nhật sản phẩm
                if (isset($_POST['update'])) {
                    $id = intval($_POST['id']);
                    $ten = $_POST['ten'];
                    $gia = intval($_POST['gia']);
                    $loai = $_POST['loai'];

                    if ($loai == "DienThoai") {
                        $heDieuHanh = "Androi"; // Giá trị mặc định
                        $sanPhamMoi = new DienThoai($id, $ten, $gia, $heDieuHanh);
                    } else {
                        $cpu = "Intel"; // Giá trị mặc định
                        $sanPhamMoi = new Laptop($id, $ten, $gia, $cpu);
                    }

                    $check = $quanLySanPham->KTSanPhambyid($id);
                    if ($check) {
                        $quanLySanPham->suaSanPham($id, $ten, $gia);
                        echo "Đã thay đổi sản phẩm!<br>";
                    } else {
                        $quanLySanPham->themSanPham($sanPhamMoi);
                        echo "Đã thêm sản phẩm mới!<br>";
                    }
                }

                // Xử lý tìm kiếm sản phẩm
                if (isset($_POST['search'])) {
                    $tenSanPham = $_POST['gsearch'];
                    echo "<h3>Kết quả tìm kiếm cho: $tenSanPham</h3>";
                    $quanLySanPham->timKiemSanPham($tenSanPham);
                }

                // Xử lý sắp xếp sản phẩm
                if (isset($_POST['sort'])) {
                    $tieuChiSapXep = $_POST['sapxep'];
                    echo "<h3>Danh sách sản phẩm đã được sắp xếp theo: $tieuChiSapXep</h3>";
                    $quanLySanPham->sapXepSanPham($tieuChiSapXep);
                    $quanLySanPham->hienThiDanhSach();
                }

                // Hiển thị danh sách sản phẩm
                $danhSachSanPham = $quanLySanPham->getDanhSachSanPham();
                foreach ($danhSachSanPham as $sanPham) {
                    echo "<tr>";
                    echo "<td>" . $sanPham->id . "</td>";
                    echo "<td>" . $sanPham->name . "</td>";
                    echo "<td>" . $sanPham->gia . "</td>";
                    echo "<td>" . $sanPham->mota . "</td>";
                    echo "<td><img src='$sanPham->image' width='200px' alt=''></td>";
                    echo "<td>" . $sanPham->danhmuc . "</td>";
                    echo "<td>
                            <form name='form-xoa' method='get'>
                                <input type='hidden' name='id' value='$sanPham->id'/>
                                <input type='hidden' name='action' value='delete'/>
                                <button type='submit' class='btn btn-danger btn-xoa' name='action' value='delete'>Xóa</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }

                // Xử lý xóa sản phẩm
                if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
                    $id = intval($_GET['id']);
                    $quanLySanPham->xoaSanPham($id);
                    echo "Đã xóa sản phẩm!<br>";
                }

                // Xử lý cập nhật sản phẩm
                if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])) {
                    $id = intval($_GET['id']);
                    $SP = $quanLySanPham->getSanPhambyid($id);
                    if ($SP) {
                        ?>
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
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        let elements = document.getElementsByClassName("btn-xoa");

        for (let i = 0; i < elements.length; i++) {
            elements[i].onclick = function(event) {
                event.preventDefault();
                if (confirm("ban co muon xoa khong?") == true) {
                    text = "You pressed OK!";
                    let forms = document.querySelectorAll('form[name="form-xoa"]');

                    // Find the form associated with the clicked button (the closest one)
                    let form = this.closest('form');
                    form.submit();
                } else {
                    //   return false
                }
            }
        }
    </script>

</body>

</html>