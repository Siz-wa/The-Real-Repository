<?php
require_once '../vendor/autoload.php'; // Make sure you have Faker installed via Composer

$faker = Faker\Factory::create();

// Example using MySQLi
$mysqli = new mysqli("localhost", "root", "", "thcdb");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

for ($i = 0; $i < 10; $i++) {
    // Simulate integer 'productName' – might be a mistake? Assuming you meant a name string
    $productName = $faker->word(); // Replace with `$faker->word` if this should be a string
    
    $description = $faker->text(200);

    // Simulate an image blob (e.g., JPEG content)
    $imagePath = 'C:\xampp\htdocs\public\assets\img\gallery\CookiePookie.png';
    $imageBlob = addslashes(file_get_contents($imagePath)); // Load as binary string

    $cat = $faker->word;

    $query = "INSERT INTO product (productName, description, image, cat) VALUES ('$productName', '$description', '$imageBlob', '$cat')";

    if (!$mysqli->query($query)) {
        echo "Error: " . $mysqli->error . "\n";
    }
}

$mysqli->close();
echo "Fake data inserted successfully.\n";

?>