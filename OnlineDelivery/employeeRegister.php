<?php
class Database {
    private $dbConn;

    public function __construct($host, $username, $password, $database) {
        $this->dbConn = mysqli_connect($host, $username, $password, $database);
    }

    public function checkEmployeeIdExists($em_id) {
        $query = "SELECT * FROM employees WHERE em_id=?";
        $stmt = mysqli_prepare($this->dbConn, $query);
        mysqli_stmt_bind_param($stmt, "s", $em_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        return mysqli_num_rows($result) > 0;
    }

    public function insertEmployee($employee) {
        $query = "INSERT INTO employees (em_id, username, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->dbConn, $query);

        if (!$stmt) {
            // Handle error
            return false;
        }

        mysqli_stmt_bind_param($stmt, "sss", 
            $employee->em_id, 
            $employee->username, 
            $employee->password);

        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    }
}

class Employee {
    public $em_id;
    public $username;
    public $passsword;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Registration</title>
    <style>
        /* ...  CSS styles ... */
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            color: #fff;
            background-color: #007BFF;
        }

    </style>
</head>
<body>
    <div class="container">
        <!-- ... HTML form ... -->
<h1>Employee Registration</h1>
<form method="post" action="">
<label>EmployeeId:</label>
<input type="text" name="em_id" required><br>

<label>UserName:</label>
<input type="text" name="username" required><br>

<label>Password:</label>
<input type="password" name="password" placeholder="Password" required><br>    

<input type="submit" value="Register">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database("localhost", "root", "", "onlinedelivery");

    $employee = new Employee();
    $employee->em_id = $_POST["em_id"];
    $employee->username = $_POST["username"];
    $employee->password = $_POST["password"];

    if ($db->checkEmployeeIdExists($employee->em_id)) {
        echo "Error: Employee ID already exists.";
    } else {
        if ($db->insertEmployee($employee)) {
             // Redirect to a EmployeeLogin page
             header("Location: employeeLogin.php");
             exit();
         } else {
             echo "Error: Failed to insert Employee Details.";
         }
     }
}
?>
</form>

</form>
        <!-- Button to go to the Login page -->
        <P>Alredy Register! Click Login here?</p>
        <form method="get" action="employeeLogin.php">
            <input type="submit" value="Login">
        </form>
</div>
</body>
</html>
