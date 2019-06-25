<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>


<?php
require_once 'header.php';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) die("Fatal Error");

$sql = "SELECT color, name, grade FROM leadRoutes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
            <th>Color</th>
            <th>Name</th>
            <th>Grade</th>
            </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["color"]."</td>
                          <td>".$row["name"]."</td>
                          <td><input type='checkbox' name='grade[]' value='grade'>".$row["grade"]."</td>
                          </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        if ( isset($_GET['grade']) && is_array($_GET['grade']) ) { foreach ( $_GET['keyword'] as $v ) {

        }
    }


        $conn->close();
?>
</body>
</html>