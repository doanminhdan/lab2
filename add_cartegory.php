<?php
require_once('database.php');

// Lấy tên danh mục từ biểu mẫu
$category_name = filter_input(INPUT_POST, 'category_name');

// Kiểm tra và thêm danh mục mới vào cơ sở dữ liệu
if ($category_name !== null) {
    $query = 'INSERT INTO categories (categoryName) VALUES (:category_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();
}

// Sau khi thêm xong, chuyển hướng người dùng trở lại trang danh sách danh mục
header('Location: category_list.php');
?>
