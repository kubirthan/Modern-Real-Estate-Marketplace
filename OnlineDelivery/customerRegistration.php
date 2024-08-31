<?php
   class Database {
    private $dbConn;

    public function __construct($host, $username, $password, $database) {
        $this->dbConn = mysqli_connect($host, $username, $password, $database);
    }

    public function checkCustomerIdExists($cus_id) {
        $query = "SELECT * FROM customers WHERE cus_id=?";
        $stmt = mysqli_prepare($this->dbConn, $query);
        mysqli_stmt_bind_param($stmt, "s", $cus_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        return mysqli_num_rows($result) > 0;
    }

    public function insertCustomer($customer) {
        $query = "INSERT INTO customers (cus_id, name, mobile_number, reference, sender_address, receiver_address, delivery_status, items, email, nic_number, amount, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->dbConn, $query);

        if (!$stmt) {
            // Handle error
            return false;
        }
        mysqli_stmt_bind_param($stmt, "ssssssssssss", 
            $customer->cus_id, $customer->name, $customer->mobile_number, $customer->reference, $customer->sender_address, 
            $customer->receiver_address, $customer->delivery_status, $customer->items, $customer->email, $customer->nic_number, 
            $customer->amount, $customer->description);

        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    }
}

class Customer {
    public $cus_id;
    public $name;
    public $mobile_number;
    public $reference;
    public $sender_address;
    public $receiver_address;
    public $delivery_status;
    public $items;
    public $email;
    public $nic_number;
    public $amount;
    public $description;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }
        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }
        .submit-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Customer Registration</h1>
        <form method="post" action="">
            <label>CustomerId:</label>
            <input type="text" name="cus_id" required>

            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Mobile Number:</label>
            <input type="text" name="mobile" required>

            <label>Reference:</label>
            <input type="text" name="reference" required>

            <label>Sender's Address:</label>
            <input type="text" name="sender_address" required>

            <label>Receiver's Address:</label>
            <input type="text" name="receiver_address" required>

            <label>Delivery Status:</label>
            <input type="text" name="delivery_status" required>

            <label>Items:</label>
            <input type="text" name="items" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>NIC Number:</label>
            <input type="text" name="nic_number" required>

            <label>Amount:</label>
            <input type="text" name="amount" required>

            <label>Description:</label>
            <textarea name="description" required></textarea>

            <button type="submit" class="submit-button">Register</button>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $db = new Database("localhost", "root", "", "onlinedelivery");

                $customer = new Customer();
                $customer->cus_id = $_POST["cus_id"];
                $customer->name = $_POST["name"];
                $customer->mobile_number = $_POST["mobile"];
                $customer->reference = $_POST["reference"];
                $customer->sender_address = $_POST["sender_address"];
                $customer->receiver_address = $_POST["receiver_address"];
                $customer->delivery_status = $_POST["delivery_status"];
                $customer->items = $_POST["items"];
                $customer->email = $_POST["email"];
                $customer->nic_number = $_POST["nic_number"];
                $customer->amount = $_POST["amount"];
                $customer->description = $_POST["description"];

                if ($db->checkCustomerIdExists($customer->cus_id)) {
                    echo "Error: Customer ID already exists.";
                } else {
                    if ($db->insertCustomer($customer)) {
                        header("Location:billing.php");
                        exit();
                    } else {
                        echo "Error: Failed to insert customer.";
                    }
                }
            }
            ?>
        </form>
    </div>
</body>
</html>

