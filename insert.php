<?php
// Start or resume the PHP session
session_start();

// Replace these with your actual database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "dow";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $productData = json_decode($_POST["products"], true);

        foreach ($productData as $product) {
            $productName = $product["name"];
            $productDescription = $product["description"];
            $productQuantity = $product["quantity"];

            $sql = "INSERT INTO user2 (product_name, product_description, product_quantity) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$productName, $productDescription, $productQuantity]);
            // Get the ID of the inserted record
            $lastInsertId = $pdo->lastInsertId();

            // Store the ID in a session variable
            $_SESSION['lastInsertId'] = $lastInsertId;
        }

        // Store the collected data in a session variable
        $_SESSION['collectedData'] = $productData;

        echo "Data inserted successfully!";
    } else {
        echo "Invalid request!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
