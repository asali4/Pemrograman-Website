<?php
$db = 'assetadmin';
$conn = new mysqli('localhost', 'root', '', $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function mysqli_result($result, $row, $field = 0)
{
    // Adjust the result pointer to that specific row
    $result->data_seek($row);
    // Fetch result array
    $data = $result->fetch_array();

    return $data[$field];
}
