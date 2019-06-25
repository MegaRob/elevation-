<?php
  require_once 'header.php';
  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($conn->connect_error) die ("Fatal error");

  $query  = "SELECT * FROM leadRoutes";
  $result = $conn->query($query);
  if (!$result) die("Fatal Error");

  echo "<div class='main'>";

  $rows   = $result->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo '<input type="checkbox" name="grade[]" value="1">Name: '              . htmlspecialchars($row['name'])                      . '<br>';
    echo 'Grade: '                                                             . htmlspecialchars($row['grade'])                     . '<br>';
    echo 'Setter: '                                                            . htmlspecialchars($row['person'])                    . '<br>';
    echo 'Date: '                                                              . htmlspecialchars($row['date'])                      . '<br>';
    echo 'Color: '                                                             . htmlspecialchars($row['color'])                     . '<br><br>';
  }   

  $result->close();
  $conn->close();
  ?>