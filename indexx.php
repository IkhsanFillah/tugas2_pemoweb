<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Northwind Products</title>
</head>
<body>
    <h1>Northwind Products</h1>
    <?php    
    include 'db.php';
    $sql = "SELECT 
            p.ProductID,
            p.ProductName,
            c.CategoryName,
            s.CompanyName,
            p.UnitPrice
            FROM products p
            JOIN categories c ON p.CategoryID = c.CategoryID
            JOIN suppliers s ON p.SupplierID = s.SupplierID";
    $result = $conn->query($sql);
    ?>
    <table border="1">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Company Name</th>
            <th>Unit Price</th>
        </tr>
        <?php
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>". $row["ProductID"] ."</td>";
                echo "<td>". $row["ProductName"] ."</td>";
                echo "<td>". $row["CategoryName"] ."</td>";
                echo "<td>". $row["CompanyName"] ."</td>";
                echo "<td>". $row["UnitPrice"] ."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td> data kosong </td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
if(isset($conn)){
    $conn->close();
}
?>