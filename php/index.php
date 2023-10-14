<!--Purav Sidhu 200555445 PHP assignment 1 -->
<!-- creating main page for the assingment to collect data -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee Data</title>
    <!-- linking the page to add css -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <!-- creating a nav bar -->
        <nav>
            <div class="logo">Microsoft</div>
            <ul>
                <!-- link to the second page to see the employee data -->
                <li><a href="index.php">Add Employee Data</a></li>
                <li><a href="index2.php">View Employee Data</a></li>
            </ul>
        </nav>
        <img src="images/R.png" height="5%" width="5%">
    </header>

    <main class="main">
        <!-- creating a form to collect data -->
        <form action="index.php" method="post"><!-- using post to collect data-->
            <fieldset id="head">
                <legend style="font-size: 2rem; text-align:center;"><strong>Add Employee Data</strong></legend>
                <div class="name">
                    <label for="name">Name:</label><br>
                    <input type="text" id="Name" name="Name" required ><br><br>
                </div>
                <div class="gender">
                    <label for="Gender">Gender:</label><br>  
                    <input type="Gender" id="Gender" name="Gender"><br><br>
                </div>
                <div class="age">
                    <label for="age">Age:</label><br>
                    <input type="number" id="Age" name="Age" min="20" required><br><br>
                </div>

                <div class="position">
                    <label for="position">Position:</label><br>
                    <input type="text" id="Position" name="Position" required><br><br>
                </div>
                <div class="salary">
                    <label for="salary">Salary:</label><br>
                    <input type="number" id="Salary" name="Salary" min="0" required><br><br>
                </div>
                <div class="hours">
                    <label for="hours">Hours:</label><br>
                    <input type="number" id="Hours" name="Hours" min="0" required><br><br>
                </div>
                <div class="email">
                    <label for="email">Email;:</label><br>
                    <input type="email" id="Email" name="Email" min="0"><br><br>
                </div>

                <div class="button" >
                    <input type="submit" value="Submit" class="button">
                </div>

            </fieldset>
        </form>
    </main>
    <?php
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {    //checking if the method to get data is post
                if (isset($_POST['Name'])) {     //if the input form contains a feild called name then the data is entered
                    $Name = $_POST['Name'];
                }
                if (isset($_POST['Gender'])) {
                    $Gender = $_POST['Gender'];
                }
                if (isset($_POST['Age'])) {
                    $Age = $_POST['Age'];
                }
                if (isset($_POST['Position'])) {
                    $Position = $_POST['Position'];
                }
                if (isset($_POST['Salary'])) {
                    $Salary = $_POST['Salary'];
                }
                if (isset($_POST['Hours'])) {
                    $Hours = $_POST['Hours'];
                }
                if (isset($_POST['Email'])) {
                    $Email = $_POST['Email'];
                }

                // Database Connectivity
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "php1";

                // Creating a connection
                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Sorry, connection not found!" . mysqli_connect_error());   //. mysqli_connect_error()  helps in generating the specific error
                } else {
                    // Submit the insertion queries/data to the database
                    $sql = "INSERT INTO `employee` (`Name`, `Gender`, `Age`, `Position`, `Salary`, `Hours`, `Email`) VALUES ('$Name', '$Gender', $Age, '$Position', $Salary, $Hours, '$Email')";
                    $result = mysqli_query($conn, $sql);    //executing the sql query using mysqli_query

                    if ($result) {
                        echo "Data has been inserted successfully";
                    } else {
                        echo "Data has not been inserted due to " . mysqli_error($conn);  //  mysqli_error($conn)  generates the specific error
                    }
                }
            }
            ?>

    <footer>

    <!-- creating footer for the page -->
        <div class="copyright">© Purav Sidhu Assignment. 200555445.</div>
        <div class="social-media">
            <a href="#">whatsapp</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </footer>

</body>

</html>