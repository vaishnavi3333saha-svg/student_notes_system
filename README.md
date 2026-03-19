1. Project Title:-
   
# Student Notes Management System

2. Description
   
This is a web-based Student Notes Management System developed using HTML, CSS, JavaScript, PHP, and MySQL.
The system allows users to register, login, and manage their personal notes efficiently with features like add, edit, delete, and search.

4. Features
 
-  User Registration and Login
-  Add Notes
-  View Notes
-  Edit & Update Notes
-  Delete Notes
-  Search Notes
-  Add Subject to Notes
-  Mark Important Notes
-  Dark Mode
-  User Profile Page
-  Logout Functionality

 4. Technologies Used

- Frontend: HTML, CSS, JavaScript
- Backend: PHP
- Database: MySQL
- Server: XAMPP (Apache)
  
 5. Project Structure

student_notes_system/
│
├── index.html
├── login.html
├── register.php
├── login.php
├── dashboard.php
├── edit_note.php
├── delete_note.php
├── profile.php
├── logout.php
├── db.php
└── style.css

6. Installation / How to Run

1. Install XAMPP
2. Start Apache and MySQL
3. Copy project folder to:
   C:\xampp\htdocs\
4. Open phpMyAdmin
5. Create database: notes_db
6. Import/create tables (users, notes)
7. Open browser and go to:
   http://localhost/student_notes_system

7. Database Structure

Table: users
- id (INT, Primary Key)
- username (VARCHAR)
- password (VARCHAR)

Table: notes
- id (INT, Primary Key)
- title (VARCHAR)
- content (TEXT)
- subject (VARCHAR)
- favorite (TINYINT)
- created_at (TIMESTAMP)
