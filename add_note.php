<?php

include "db.php";

$title=$_POST['title'];
$content=$_POST['content'];

$sql="INSERT INTO notes(title,content)
VALUES('$title','$content')";

$conn->query($sql);

header("Location: dashboard.php");

?>