<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// Koneksi ke PostgreSQL
try {
    $dsn = "pgsql:host=host.docker.internal;port=5432;dbname=solid_happiness";
    $user = "postgres";
    $password = "hashmicro";
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Proses insert
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare("INSERT INTO orders (user_id, product, quantity) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $product, $quantity]);

    echo "<p style='color: green;'>✔ Order berhasil ditambahkan!</p>";
}

// Ambil data users untuk dropdown
$users = $pdo->query("SELECT id, name FROM users")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Form Tambah Order</h2>
<form method="POST">
    <label for="user_id">Nama User:</label><br>
    <select name="user_id" required>
        <option value="">-- Pilih User --</option>
        <?php foreach ($users as $user): ?>
            <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="product">Nama Produk:</label><br>
    <input type="text" name="product" required><br><br>

    <label for="quantity">Jumlah:</label><br>
    <input type="number" name="quantity" required><br><br>

    <button type="submit">Simpan Order</button>
</form>
</body>
</html>