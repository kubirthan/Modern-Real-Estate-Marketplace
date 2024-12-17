<?php
session_start();

class DatabaseConnection {
    private $dbConn;

    public function __construct($host, $username, $password, $dbName) {
        $this->dbConn = new mysqli($host, $username, $password, $dbName);
        if ($this->dbConn->connect_error) {
            die("Connection failed: " . $this->dbConn->connect_error);
        }
    }

    public function query($sql) {
        return mysqli_query($this->dbConn, $sql);
    }

    public function close() {
        mysqli_close($this->dbConn);
    }
}

class CustomerStatus {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCustomerDetails($cus_id) {
        $query = "SELECT * FROM customers WHERE cus_id = '$cus_id'";
        $result = $this->db->query($query);
        return mysqli_fetch_assoc($result);
    }
}

$db = new DatabaseConnection("localhost", "root", "", "onlinedelivery");
$status = new CustomerStatus($db);
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer = $status->getCustomerDetails($_POST["cus_id"]);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            box-sizing: border-box;
        }
        h1 {
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
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
        h2 {
            margin-top: 20px;
            text-align: left;
        }
        ol {
            text-align: left;
            margin-left: 20px;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome To Online Delivery</h1>
        <form method="post" action="">
            <input type="text" name="cus_id" placeholder="Enter Customer ID" required>
            <input type="submit" value="Check Status">
        </form>
        <?php if (isset($customer)): ?>
            <!-- Display customer details -->
            <h2>Customer Details</h2>
            <ol>
                <li><strong>Name:</strong> <?php echo $customer["name"]; ?></li>
                <li><strong>PhoneNumber:</strong> <?php echo $customer["mobile_number"]; ?></li>
                <li><strong>Email:</strong> <?php echo $customer["email"]; ?></li>
                <li><strong>Address:</strong> <?php echo $customer["receiver_address"]; ?></li>
                <li><strong>Items:</strong> <?php echo $customer["items"]; ?></li>
                <li><strong>Product Description:</strong> <?php echo $customer["description"]; ?></li>
                <li><strong>Price:</strong> <?php echo $customer["amount"]; ?></li>
                <li><strong>Reference Number:</strong> <?php echo $customer["reference"]; ?></li>
            </ol>
        <?php endif;?>
    </div>
</body>
</html>
