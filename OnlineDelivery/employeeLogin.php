<?php
class DatabaseConnection {
    private $dbConn;

    public function __construct($host, $username, $password, $dbName) {
        $this->dbConn = new mysqli($host, $username, $password, $dbName);
        if ($this->dbConn->connect_error) {
            die("Connection failed: " . $this->dbConn->connect_error);
        }
    }

    public function getDbConn() {
        return $this->dbConn;
    }
}

class EmployeeLoginPage {
    private $dbConn;

    public function __construct($dbConn) {
        $this->dbConn = $dbConn;
    }

    public function authenticateEmployee($username, $password) {
        $query = "SELECT * FROM employees WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($this->dbConn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_num_rows($result) == 1;
    }
}

$databaseConnection = new DatabaseConnection("localhost", "root", "", "onlinedelivery");
$dbConn = $databaseConnection->getDbConn();

$employeeLoginPage = new EmployeeLoginPage($dbConn);

$loginError = null;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            box-sizing: border-box;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        form {
            padding: 20px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login To Employee</h1>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get form data
                $username = $_POST["username"];
                $password = $_POST["password"];
            
                // Authenticate employee
                if ($employeeLoginPage->authenticateEmployee($username, $password)) {
                    echo "Login successful";
                    // Redirect to a success page or any other page as needed
                    header("Location: customer_status.php");
                    exit();
                } else {
                    echo "Invalid username or password.";
                }
            }
            ?>
        </form>
        <!-- Button to go to the registration page -->
        <P>Not Register! Click here?</p>
        <form method="get" action="employeeRegister.php">
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>


