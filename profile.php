<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Profile</title>

<style>

body{
font-family:Arial;
background:#eef2f7;
text-align:center;
margin:0;
}

.card{
background:white;
width:400px;
margin:100px auto;
padding:25px;
border-radius:12px;
box-shadow:0 0 15px rgba(0,0,0,0.2);
}

h2{
color:#007bff;
}

button{
background:#007bff;
color:white;
border:none;
padding:10px 20px;
border-radius:6px;
cursor:pointer;
}

button:hover{
background:#0056b3;
}

a{
text-decoration:none;
color:white;
}

</style>
</head>

<body>

<div class="card">

<h2>User Profile 👤</h2>

<p><b>Username:</b> <?php echo $_SESSION['user']; ?></p>

<p><b>Role:</b> Student</p>

<p><b>Status:</b> Active ✅</p>

<br>

<button>
<a href="dashboard.php">Back to Dashboard</a>
</button>

<br><br>

<button>
<a href="logout.php">Logout</a>
</button>

</div>

</body>
</html>