<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_SESSION['userid'])) {
    // header('Location: screen5.php');
    // exit();
}

$msg = null;
include 'dbconfig.php'; // Ensure this file correctly sets up the $conn variable

if (isset($_POST['submit'])) {
    $userFullname = $_POST['fullname'];
    $userPhonenumber = $_POST['phonenumber'];

    if (empty($userFullname) || empty($userPhonenumber)) {
        $msg = "All fields are required";
    } else {
        $sql = "SELECT * FROM createaccounttbl WHERE fullname = ? AND phonenumber = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            $msg = "SQL prepare failed: " . htmlspecialchars($conn->error);
        } else {
            $stmt->bind_param('ss', $userFullname, $userPhonenumber);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $userData = $result->fetch_assoc();

                // Successful login
                $_SESSION['username'] = $userData['fullname'];
                $_SESSION['userid'] = $userData['id'];
                $_SESSION['userPhonenumber'] = $userData['phonenumber'];
                $msg = "Login successful! Redirecting...";
                header('Location: screen5.php');
                exit();
            } else {
                $msg = "No user found with that fullname and phone number";
            }

            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduParamount</title>
   
</head>
<body>
    <img src="images/ol.png" id="two">
    <form method="POST">
        <input type="text" name="fullname" placeholder="Fullname" required>
        <br><br><br>
        <br>
        <input type="tell" name="phonenumber" placeholder="phonenumber" required>
        <br><br><br>
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
    <?php if ($msg): ?>
        <p class="<?php echo $msg == "Invalid phonenumber" ? 'danger' : 'success'; ?>">
            <?php echo htmlspecialchars($msg); ?>
        </p>
    <?php endif; ?>
</body>
</html>
 <style type="text/css">
        body {
            background-color: #4FB8D9;
            text-align: center;
        }

        #two {
            width: 300px;
            height: 300px;
/*            margin-top: 45px;*/
        }

        input {
            width: 65%;
            height: 45px;
            border-radius: 7px;
            text-align: center;
            font-size: 18px;
            background-color: #4FB8D9;
            margin-top: 5%;
            background-color: white;
        }

        input[type="submit"] {
            width: 40%;
            height: 45px;
            border-radius: 100px;
/*            margin-top: 25%;*/
        }

        .danger {
            color: green;
        }

        .success {
            color: red;
        }
    </style>