<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solid-Happiness</title>
</head>
<body>
    <?php
        echo "My first PHP script!";
    ?> 
<br/>
    <?php
try {
    $dsn = "pgsql:host=host.docker.internal;port=5432;dbname=postgres";
    $user = "postgres";
    $password = "hashmicro";

    $pdo = new PDO($dsn, $user, $password);

    echo "✅ Koneksi ke PostgreSQL berhasil!";
} catch (PDOException $e) {
    echo "❌ Gagal koneksi: " . $e->getMessage();
}
?>
<br/>

<?php
echo phpversion();
?> 
<?php
// This is a single-line comment

# This is also a single-line comment

/* This is a
multi-line comment */
?>
<br/>
<?php
$x = 5;
$y = 4;
echo $x + $y;
?>
<br/>
<?php
$x = 5;

var_dump($x);
var_dump(5);
var_dump("John");
var_dump(3.14);
var_dump(true);
var_dump([2, 3, 56]);
var_dump(NULL);
?>

<?php
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
?>

<?php
try {
    $dsn = "pgsql:host=host.docker.internal;port=5432;dbname=solid_happiness";
    $user = "postgres";
    $password = "hashmicro";

    $pdo = new PDO($dsn, $user, $password);

    $stmt = $pdo->query("
        SELECT orders.id, users.name, orders.product, orders.quantity
        FROM orders
        JOIN users ON orders.user_id = users.id
    ");

    echo "<h2>Daftar Pesanan</h2><ul>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<li><strong>{$row['name']}</strong> memesan <em>{$row['product']}</em> sebanyak {$row['quantity']}</li>";
    }
    echo "</ul>";

} catch (PDOException $e) {
    echo "❌ Gagal koneksi: " . $e->getMessage();
}
?>
<br/>
<?php
echo '<a href="../pages/orderform.php" style="text-decoration: none;">';
echo '<button style="padding: 10px 20px; font-size: 16px;">➕ Tambah Order</button>';
echo '</a>';
?>

</body>
</html>