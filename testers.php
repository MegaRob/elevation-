<?php
  require_once 'header.php';
  if (!$loggedin) die();

  $sql = "SELECT  grade, person, color FROM leadRoutes WHERE grade = "?";

  $stmt =  $mysqli->prepare($sql);
  $stmt -> bind_param("s" $_GET['q']);
  $stmt -> execute();
  $stmt -> store_result();
  $stmt -> bind_result($name, $grade, $person, $date, $color);
  $stmt -> fetch();
  #stmt -> close(); 

  echo "<table>";
  echo "<tr>";
  echo "<th> Name </th>";
  echo "<td>" . $name . "</td>";

  echo "<th> Grade </th>";
  echo "<td>" . $grade . "</td>";

  echo "<th> Person </th>";
  echo "<td> . $person . "</td>";

  echo "<th> Date </th>";
  echo "<td> . $date . "</td>";
  
  echo "<th> Color </th>";
  echo "<td> . $color . "</td>";

  echo "</tr>";
  echo "</table>";
  ?>