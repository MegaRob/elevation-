<?php 
require_once 'header.php';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) die("Fatal Error");

if (isset($_POST['delete']) && isset($_POST['name']))
{
       $name   = get_post($conn, 'name');
       $query  = "DELETE FROM leadRoutes WHERE name='$name'";
       $result = $conn->query($query);
       if (!$result) echo "DELETE failed<br><br>";
}

 if (isset($_POST['name'])       &&
     isset($_POST['grade'])      &&
     isset($_POST['person'])     &&
     isset($_POST['date'])       &&
     isset($_POST['color']))      
 {
   $name       = get_post($conn, 'name');
   $grade      = get_post($conn, 'grade');
   $person     = get_post($conn, 'person');
   $date       = get_post($conn, 'date');
   $color      = get_post($conn, 'color');
   $query      = "INSERT INTO  leadRoutes VALUES"  . "('$name', '$grade', '$person', '$date', '$color')";
   $result     = $conn->query($query);
   if (!$result) echo "INSERT failed<br><br>";
 }

 echo <<<_END
        <form action="update.php" method="post"><pre>
            Name:
            <input type="text" name="name" placeholder="Name of Route">
            Grade:
            <input type="text" name="grade" placeholder="Grade of Route">
            Setter:
            <input type="text" name="person" placeholder="Person who Set">
            Date:
            <input type="date" name="date"
            value="2019-03-25" min="2019-02-14" max="2020-05-12">
            Color:
            <input type="text" name="color" placeholder="Route Color">
            <input type="submit" value="ADD RECORD">
</pre></form>
_END;

 $query = "SELECT * FROM leadRoutes";
 $result = $conn->query($query);
 if (!$result) die ("Database access failed");

 $rows = $result->num_rows;

 for ($j = 0 ; $j < $rows ; ++$j)
 {
    $row = $result->fetch_array(MYSQLI_NUM);

    $r0  = htmlspecialchars($row[0]);
    $r1  = htmlspecialchars($row[1]);
    $r2  = htmlspecialchars($row[2]);
    $r3  = htmlspecialchars($row[3]);
    $r4  = htmlspecialchars($row[4]);
    echo <<<_END
    <pre>
       Name     $r0
       Grade    $r1
       Person   $r2
       Date     $r3
       Color    $r4    
    </pre>
    <form action='update.php' method='post'>
    <input type='hidden' name='delete' value='yes'>
    <input type='hidden' name='name' value='$r0'>
    <input type='submit' value='DELETE RECORD'></form>
   _END;
   }
   
   $result->close();
   $conn->close();

   function get_post($conn, $var)
   {
       return $conn->real_escape_string($_POST[$var]);
   }
?>