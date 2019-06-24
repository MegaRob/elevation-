<?php
  require_once 'header.php';
  if (!$loggedin) die();
  ?>
<!DOCYYPE html>
<html>
<style>

    table, th,td {
        border : 1ps solid black;
        border-collapse: collapse;
    }
    th, td {
        padding : 5px;
    }
</style>

<body>

<h1>Select a Route</h1>

<form action="">
<select name="grade" onchange="showGrade(this.value)">
<option value="">Select grade:</option>
<option value="5.12">5.12</option>
<option value="5.9">5.9</option>
<option value="5.11">5.11</option>
</select>
</form>
<br>
<div id="txtHint">Grades will be listed here</div>

<script>

function showGrade(str) {
    var xhttp;
    if (str =="")  {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "testers.php?q="+str, true);
    xhttp.send();
}

</script>

</body>
</html>