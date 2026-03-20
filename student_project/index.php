<?php
// Database connection variables
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "school_db";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['student_name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $year = $_POST['year_of_study'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (student_name, age, course, year_of_study, email) 
            VALUES ('$name', '$age', '$course', '$year', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>Student registered successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <h2>Student Information Form</h2>
    <form method="post" action="">
        <input type="text" name="student_name" placeholder="Full Name" required><br><br>
        <input type="number" name="age" placeholder="Age" required><br><br>
        <input type="text" name="course" placeholder="Course" required><br><br>
        <input type="number" name="year_of_study" placeholder="Year of Study" required><br><br>
        <input type="email" name="email" placeholder="Email Address" required><br><br>
        <button type="submit">Submit Information</button>
    </form>
    <br>
    <a href="view_students.php">View Registered Students</a>
</body>
</html>