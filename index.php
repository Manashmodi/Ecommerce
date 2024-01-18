<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Form</title>
</head>
<body>
    <form method="post" action="process.php">
        <label for="category">Select Category:</label>
        <select name="category" id="category">
        <?php
       include "conn.php";
       $categoryQuery = "SELECT id, name FROM Category WHERE status = 1";
       $categoryResult = mysqli_query($conn, $categoryQuery);

      
       while ($row = mysqli_fetch_assoc($categoryResult)) {
       echo "<option value='{$row['id']}'>{$row['name']}</option>";
       }

mysqli_close($conn);
?>
        </select>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

