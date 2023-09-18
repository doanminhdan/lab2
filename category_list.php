<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->

<body>
    <header>
        <h1>Product Manager</h1>
    </header>
    <main>
        <h1>Category List</h1>
        <table>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?php echo $category['categoryName']; ?></td>
                        <td>
                            <form action="detete_cartegory.php" method="post">
                                <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>


            <!-- add code for the rest of the table here -->

        </table>

        <h2>Add Category</h2>
        <form action="add_cartegory.php" method="post">
            <label for="category_name">Category Name:</label>
            <input type="text" id="category_name" name="category_name" required>
            <input type="submit" value="Add">
        </form>


        <!-- add code for the form here -->

        <br>
        <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>

</html>