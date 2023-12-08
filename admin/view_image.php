<!-- view-image.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Viewer</title>
</head>
<body>

<?php
// Retrieve image file path from the query string
$imagePath = $_GET['image'];

// Display the image
echo '<img src="' . $imagePath . '" alt="Full-size Image" class="img-fluid">';

?>

</body>
</html>
