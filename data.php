<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collected Data</title>
    <style>
        .product {
            background-color:blue;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
        }

        h3 {
            margin: 0;
        }

        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Collected Data</h1>
    <div style="position:absolute;bac">
    <form method="post" action="insert_data.php">
        <?php
        // Start or resume the PHP session
        session_start();

        // Check if the collected data exists in the session
        if (isset($_SESSION['collectedData'])) {
            $collectedData = $_SESSION['collectedData'];
            foreach ($collectedData as $product) {
                echo '<div class="product">';
                echo '<h3>Name:</h3>' . htmlspecialchars($product['name']);
                echo '<p>Description: ' . htmlspecialchars($product['description']) . '</p>';
                echo '<span>Quantity: ' . htmlspecialchars($product['quantity']) . ' kgs</span>';
                echo '</div>';
            }
        } else {
            echo "<p>No data collected.</p>";
        }
        ?>
        <input type="submit" value="Submit to Database">
    </form>
    </div>
</body>
</html>
