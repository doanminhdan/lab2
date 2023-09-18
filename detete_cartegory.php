<?php
require_once('database.php');

// Lấy ID danh mục từ biểu mẫu
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Kiểm tra xem category_id hợp lệ không
if ($category_id !== null && $category_id !== false) {
    // Xóa danh mục khỏi cơ sở dữ liệu
    $query = 'DELETE FROM categories WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $success = $statement->execute();
    $statement->closeCursor();
}

// Sau khi xóa xong, chuyển hướng người dùng trở lại trang danh sách danh mục
header('Location: category_list.php');
?>
