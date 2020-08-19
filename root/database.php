<?php

// Name of the file
$filename = 'code.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = '';

// Connect to MySQL server
$conn = new mysqli($mysql_host, $mysql_username, $mysql_password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
    // Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

    // Add this line to the current segment
    $templine .= $line;
    // If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';')
    {
        // Perform the query
        if (!$conn->query($templine) === TRUE) {
            echo "Error creating database: " . $conn->error;
          } 
        // Reset temp variable to empty
        $templine = '';
    }
}

 echo "Database, table and data imported successfully";
 header("Refresh: 2; url=index.php");
?>