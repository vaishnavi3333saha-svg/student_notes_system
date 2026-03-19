<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.html");
    exit();
}

include "db.php";

/* ADD NOTE */
if(isset($_POST['add_note'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $subject = $_POST['subject'];
    $favorite = isset($_POST['favorite']) ? 1 : 0;

    $conn->query("INSERT INTO notes
    (title, content, subject, favorite)
    VALUES
    ('$title','$content','$subject','$favorite')");
}

/* FETCH NOTES AFTER INSERT */
if(isset($_GET['search'])){

$search = $_GET['search'];

$result = $conn->query(
"SELECT * FROM notes
 WHERE title LIKE '%$search%'
 OR content LIKE '%$search%'
 ORDER BY id DESC"
);

}
else{

$result = $conn->query(
"SELECT * FROM notes ORDER BY id DESC"
);

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<style>
body{
margin:0;
font-family:Segoe UI;
background:#eef2f7;
}

.navbar{
background:#007bff;
color:white;
padding:15px;
display:flex;
justify-content:space-between;
align-items:center;
}

.navbar a{
color:white;
text-decoration:none;
font-weight:bold;
margin-left:20px;
}

.container{
padding:20px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.2);
margin:20px;
}

.note{
background:#fafafa;
padding:15px;
border-radius:8px;
margin:10px 0;
}

/* 🌙 DARK MODE */

.dark{
background:#121212;
color:white;
}

.dark .navbar{
background:#000;
}

.dark .card{
background:#1e1e1e;
color:white;
}

.dark .note{
background:#2a2a2a;
color:white;
}

.navbar a{
background:white;
color:#007bff;
padding:6px 12px;
border-radius:6px;
margin-left:10px;
}

</style>

</head>

<body>

<!-- ✅ NAVBAR -->
<div class="navbar">

<h2>Student Notes System</h2>

<div>
Welcome <?php echo $_SESSION['user']; ?>
<a href="profile.php">👤 Profile</a>
<button onclick="toggleDark()">🌙 Dark Mode</button>
<a href="logout.php">Logout</a>
</div>

</div>

<div class="container">

<!-- ✅ ADD NOTE FORM -->
<div class="card">

<h3>Add New Note</h3>

<form method="POST">

<input type="text" name="title"
placeholder="Enter Note Title" required>

<br><br>

<input type="text" name="subject"
placeholder="Enter Subject (e.g. DBMS, Java)">

<br><br>

<textarea name="content"
placeholder="Write your note here..." required></textarea>

<br><br>

<label>
<input type="checkbox" name="favorite">
Mark as Important ⭐
</label>

<br><br>

<button type="submit" name="add_note">
Add Note
</button>

</form>

</div>

<!-- ✅ SHOW NOTES -->
<div class="card">

<form method="GET">

<input type="text" name="search"
placeholder="Search notes by title or content">

<button type="submit">Search</button>

</form>

<h3>All Notes</h3>

<?php
while($row = $result->fetch_assoc()){
?>

<div class="note">

<h3><?php echo $row['title']; ?></h3>

<p><b>Subject:</b> <?php echo $row['subject']; ?></p>

<p><?php echo $row['content']; ?></p>

<p>
<small>
Created on: <?php echo $row['created_at']; ?>
</small>
</p>

<?php
if($row['favorite'] == 1){
    echo "<p>⭐ Important Note</p>";
}
?>

<br>

<a href="edit_note.php?id=<?php echo $row['id']; ?>">
✏ Edit
</a>

|

<a href="delete_note.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this note?');">
❌ Delete
</a>

</div>

<hr>

<?php
}
?>


</div>

</div>

<script>
function toggleDark(){
  document.body.classList.toggle("dark");
}
</script>

</body>
</html>