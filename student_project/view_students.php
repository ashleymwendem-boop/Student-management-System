<?php
$conn = new mysqli("localhost", "root", "root", "school_db");

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
</head>
<body>
    <h2>Registered Students</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Course</th>
            <th>Year</th>
            <th>Email</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["student_name"]."</td>
                        <td>".$row["age"]."</td>
                        <td>".$row["course"]."</td>
                        <td>".$row["year_of_study"]."</td>
                        <td>".$row["email"]."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="index.php">Back to Registration</a>
</body>
</html>