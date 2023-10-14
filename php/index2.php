<!--Purav Sidhu 200555445 PHP assignment 1 -->
<!-- second page for the assignment to display the data enteries in the table inserted -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
        <nav>
            <div class="logo">Microsoft</div>
            <ul>
                <li><a href="index.php">Add Employee Data</a></li>
                <li><a href="index2.php">View Employee Data</a></li>
            </ul>
        </nav>
        <img src="images/R.png" height="5%" width="5%">
    </header>

    <main>
        <h2 style="text-align: center;margin-top:2%;">View Employee Data</h2>
    </main>

    <main class="main">
    <?php
        // Database Connectivity
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "php1";

        // Creating a connection
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Sorry, connection not found: " . mysqli_connect_error());
        } else {
            echo "Connection Successful";
        }

        // Fetch and display data
        $sql = "SELECT * FROM employee";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '<table border="5">
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Hours</th>
                <th>Email</th>
            </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . (isset($row['Name']) ? $row['Name'] : '') . '</td>';
        echo '<td>' . (isset($row['Gender']) ? $row['Gender'] : '') . '</td>';
        echo '<td>' . (isset($row['Age']) ? $row['Age'] : '') . '</td>';
        echo '<td>' . (isset($row['Position']) ? $row['Position'] : '') . '</td>';
        echo '<td>' . (isset($row['Salary']) ? $row['Salary'] : '') . '</td>';
        echo '<td>' . (isset($row['Hours']) ? $row['Hours'] : '') . '</td>';
        echo '<td>' . (isset($row['Email']) ? $row['Email'] : '') . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "No records found in the database.";
}

mysqli_close($conn);
        ?>
    </main>
         <footer>
        <div class="copyright">© Purav Sidhu Assignment. 200555445.</div>
        <div class="social-media">
            <a href="#">whatsapp</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </footer>
</body>
</html>