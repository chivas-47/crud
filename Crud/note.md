Dưới đây là một số lệnh Git thường được sử dụng khi làm việc với GitHub:

### 1. **Lệnh cấu hình (Configuration)**:
- `git config --global user.name "Tên của bạn"`: Cấu hình tên người dùng Git.
- `git config --global user.email "Email của bạn"`: Cấu hình email người dùng Git.
  
### 2. **Làm việc với kho (Repository)**
- `git init`: Khởi tạo một Git repository mới.
- `git clone <đường dẫn>`: Tạo một bản sao (clone) của repository từ GitHub về máy tính.

### 3. **Lệnh trạng thái và kiểm tra (Status and Checking)**:
- `git status`: Kiểm tra trạng thái hiện tại của repository.
- `git log`: Hiển thị lịch sử các commit.

### 4. **Lệnh thay đổi và commit (Changes and Commit)**:
- `git add .`: Thêm tất cả thay đổi vào staging area (để chuẩn bị commit).
- `git add <tên file>`: Thêm file cụ thể vào staging area.
- `git commit -m "Thông điệp commit"`: Tạo commit với thông điệp mô tả thay đổi.
  
### 5. **Lệnh pull và push (Synchronization)**:
- `git pull`: Lấy các thay đổi từ repository GitHub về máy tính cục bộ.
- `git push`: Đẩy (push) các thay đổi từ máy tính cục bộ lên GitHub.

### 6. **Lệnh nhánh (Branching)**:
- `git branch`: Hiển thị các nhánh hiện có.
- `git branch <tên nhánh>`: Tạo một nhánh mới.
- `git checkout <tên nhánh>`: Chuyển sang nhánh khác.
- `git merge <tên nhánh>`: Gộp nhánh chỉ định vào nhánh hiện tại.

### 7. **Lệnh khôi phục và hoàn tác (Revert and Undo)**:
- `git reset --hard <commit_id>`: Quay lại trạng thái của một commit cụ thể (cẩn thận khi sử dụng lệnh này).
- `git revert <commit_id>`: Tạo một commit mới để đảo ngược thay đổi từ commit đã chọn.

### 8. **Làm việc với remote repository**:
- `git remote add origin <đường dẫn repository>`: Thêm một remote repository với tên "origin".
- `git remote -v`: Kiểm tra các remote repository hiện tại.

Các lệnh trên sẽ giúp bạn làm việc với Git và GitHub một cách hiệu quả hơn trong quản lý phiên bản.