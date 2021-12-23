<?php
include_once "./models/Products.php";

$servername = $_ENV['DB_HOST'];
$dbName = $_ENV['DB_NAME'];
$username = $_ENV['DB_USER'];
$password = $_ENV["DB_PASSWORD"];

$pdo = new PDO("mysql:host=${servername};dbname=${dbName}", $username, $password);

$products = new Products($pdo);

//$newProduct = new Products($pdo);
//$newProduct->id = 3;
//$newProduct->name = "tester";
//$newProduct->price = 55;
//$newProduct->save();

foreach ($products->fetchAll() as $product){
    echo $product['name']. "-" . $product["price"]. "\n";
}

/**
 * insert
 */
//$pdo->prepare("INSERT INTO `products` (`id`, `name`, `price`) VALUES ('4', 'Some', 11)")
//    ->execute();
//$pdo->prepare("INSERT INTO `products` (`id`, `name`, `price`) VALUES (?, ?, ?)")
//    ->execute(["5", "Banana", 11.5]);


/**
 * Delete
 */
//$pdo->prepare("DELETE FROM products")->execute();

/**
 * List
 */
//$stmt = $pdo->query("SELECT * FROM products");
//while ($row = $stmt->fetch()) {
//    echo $row['name']."<br />\n";
//}

exit;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Products</h1>
</body>
</html>