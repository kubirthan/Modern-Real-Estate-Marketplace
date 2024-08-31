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

class BillingPage {
    private $dbConn;

    public function __construct($dbConn) {
        $this->dbConn = $dbConn;
    }

    public function generateBillingTable() {
        $query = "SELECT name, sender_address, amount, reference, description FROM customers";
        $result = mysqli_query($this->dbConn, $query);

        echo '<style>';
        echo '.dbBillingResult, .dbBillingResult td, .dbBillingResult th { border: 1px solid black; border-collapse: collapse; padding: 8px; }';
        echo '.dbBillingResult { width: 800px; margin: auto; }';
        echo '.dbBillingResult tr:nth-child(odd) { background-color: #b2dod6; }';
        echo '.dbBillingResult tr:nth-child(even) { background-color: lightcyan; }';
        echo '</style>';

        if (mysqli_num_rows($result) > 0) {
            echo '<table class="dbBillingResult">';
            echo '<tr><th>Customer name</th><th>Address</th><th>Price</th><th>Reference number</th><th>Product Description</th></tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['sender_address']) . '</td>';
                echo '<td>' . htmlspecialchars($row['amount']) . '</td>';
                echo '<td>' . htmlspecialchars($row['reference']) . '</td>';
                echo '<td>' . htmlspecialchars($row['description']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';

            // Add a button to go to  check the status page
            echo '<button onclick="window.location.href=\'customer_status.php\'"> Check the status Here</button>';

        } else {
            echo "Details Not Found";
        }
        
    }
}

$databaseConnection = new DatabaseConnection("localhost", "root", "", "onlinedelivery");
$dbConn = $databaseConnection->getDbConn();

$billingPage = new BillingPage($dbConn);
$billingPage->generateBillingTable();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Billing Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        button {
            display: block;
            width: 200px;
            height: 50px;
            margin: 20px auto;
            background-color: #4CAF50; 
            color: white; 
            text-align: center; 
            line-height: 50px; 
            font-size: 1.2em; 
            border-radius: 10px; 
        }
    </style>
</head>
<body>
    <div class="container">
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           // PHP code
           $customer = $status->getCustomerDetails($_POST["cus_id"]);
           if (isset($customer)) {
               echo '<h2>Customer Details</h2>';
               echo '<table>';
               echo '<tr><th>Name</th><th>Address</th><th>Price</th><th>Reference number</th><th>Product Description</th></tr>';
               echo '<tr>';
               echo '<td>' . htmlspecialchars($customer['name']) . '</td>';
               echo '<td>' . htmlspecialchars($customer['sender_address']) . '</td>';
               echo '<td>' . htmlspecialchars($customer['amount']) . '</td>';
               echo '<td>' . htmlspecialchars($customer['reference']) . '</td>';
               echo '<td>' . htmlspecialchars($customer['description']) . '</td>';
               echo '</tr>';
               echo '</table>';
           } else {
               echo "No customer found with the provided ID.";
           }
        }
        ?>
    </div>
</body>
</html>
